<?php

namespace App\Http\Controllers\Website;

use App\Models\Article;
use App\Models\Country;
use App\Models\Eligibilty;
use App\Models\FundingAgency;
use App\Models\Grant;
use App\Models\GrantsInfoFavorite;
use App\Models\Interest;
use App\Models\Page;
use App\Models\ProductCategory;
use App\Models\Subscriber;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class GrantController extends WebsiteController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        $funding_agencies = FundingAgency::whereIsActive(true)->get(['id as value', 'name as text']);
        $interests = Interest::whereIsActive(true)->get(['id as value', 'title as text']);
        $eligibilties = Eligibilty::whereIsActive(true)->get(['id as value', 'title as text']);
        $counttry_states = Country::with('states')->get();

        return view('website.grant.create', compact('funding_agencies', 'interests', 'eligibilties', 'counttry_states'));
    }


    public function store(Request $request)
    {
        try {
            $title = $request->opportunity_title;
            $slug = Str::slug($title);

            $existingSlug = Grant::where('title_slug', $slug)->exists();
                if ($existingSlug) {
                    $uniqueSlug = $slug . '-' . uniqid();
                } else {
                    $uniqueSlug = $slug;
                }

            $rules = Grant::$rules;
            $messages = Grant::$messages;
            $this->validate($request, $rules, $messages);

            
            DB::beginTransaction();
            $grant = Grant::updateOrCreate(
                ['url' => $request->url],
                [
                    "opportunity_title" => $request->opportunity_title,
                    "title_slug" => Str::slug($uniqueSlug),
                    "opportunity_teaser" => $request->opportunity_teaser,
                    "opportunity_title_for_subscriber" => $request->opportunity_title_for_subscriber,
                    "opportunity_description_for_subscriber" => $request->opportunity_description_for_subscriber,
                    "amount_low" => $request->amount_low,
                    "amount_high" => $request->amount_high,
                    "close_date_at" => $request->close_date_at,
                    "deadline_at" => $request->deadline_at,
                    "letter_of_intent_deadline_at" => $request->letter_of_intent_deadline_at,
                    "posted_date_at" => $request->posted_date_at,
                    "funding_source" => $request->funding_source,
                    "funding_agency_id" => $request->funding_agency,
                    "additional_notes" => $request->additional_notes,
                    "is_ongoing" => $request->is_ongoing,
                    "is_opening" => $request->is_opening,
                    "created_by" => auth()->user()->id ?? 1,
                    "user_id" => auth()->user()->id ?? 1,
                    "status" => 1,
                ]
            );

            if ($grant->wasRecentlyCreated) {
                // grant was just created
                if (!empty($request->states)) {
                    $states = $request->states;
                    $grant->states()->sync($states);
                }
                if (!empty($request->eligibilities)) {
                    $eligibilities = $request->eligibilities;
                    $grant->eligibilties()->sync($eligibilities);
                }
                if (!empty($request->interests)) {
                    $interests = $request->interests;
                    $grant->interests()->sync($interests);
                }
            } else {
                // grant already exists, update only the status
                $grant->update(['status' => 1]);
            }

            DB::commit();
            return back()->with('success', 'Grant created successfully.');
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()
                ->back()
                ->withErrors($e->validator->getMessageBag())
                ->withInput();
        }
    }

    public function storePreview(Request $request)
    {
        $request->validate(Grant::$rules);
        try {
            DB::beginTransaction();
            $grant = Grant::create([
                "opportunity_title" => $request->opportunity_title,
                "opportunity_teaser" => $request->opportunity_teaser,
                "opportunity_title_for_subscriber" => $request->opportunity_title_for_subscriber,
                "opportunity_description_for_subscriber" => $request->opportunity_description_for_subscriber,
                "amount_low" => $request->amount_low,
                "amount_high" => $request->amount_high,
                "close_date_at" => $request->close_date_at,
                "deadline_at" => $request->deadline_at,
                "letter_of_intent_deadline_at" => $request->letter_of_intent_deadline_at,
                "posted_date_at" => $request->posted_date_at,
                "url" => $request->url,
                "funding_source" => $request->funding_source,
                "funding_agency_id" => $request->funding_agency,
                "additional_notes" => $request->additional_notes,
                "is_ongoing" => $request->is_ongoing,
                "is_opening" => $request->is_opening,
                "created_by" => auth()->user()->id ?? 1,
                "user_id" => auth()->user()->id ?? 1,
                "status" => 4,
            ]);

            if (!empty($request->states)) {
                $states = $request->states;
                $grant->states()->sync($states);
            }
            if (!empty($request->eligibilties)) {
                $eligibilties = $request->eligibilties;
                $grant->eligibilties()->sync($eligibilties);
            }
            if (!empty($request->interests)) {
                $interests = $request->interests;
                $grant->interests()->sync($interests);
            }

            DB::commit();
            $grant = Grant::with('eligibilties', 'fundingAgency', 'states', 'interests')->find($grant->id);
            $response = ['data' => $grant];
            return response()->json($response);
        } catch (Exception $e) {
            // DB::rollBack();
            return  $e->getMessage();
        }
    }

    public function storeNewFundingAgency(Request $request)
    {
        $new_item = $request->input('new_item');
        $is_item_exist = FundingAgency::where('name', $new_item)
            ->orWhere('id', $new_item)->first();
        if (!$is_item_exist) {
            $item = new FundingAgency();
            $item->name = $new_item;
            $item->save();
            // Return a success response
            return response()->json(['success' => true, 'item' => $item]);
        }
    }

    public function showDetails($id, $title)
    {
        $grant = Grant::with('eligibilties', 'states')->findOrFail($id);
        $date = Carbon::parse($grant->deadline_at);
        $grant->deadline_at = $date->format('F j, Y');
        $isPaidSubscriber = false;
        if (auth()->user()) {
            $paidSubscriber = Subscriber::select('is_active')->where('user_id', auth()->user()->id)->first();
            if ($paidSubscriber) {
                $isPaidSubscriber = $paidSubscriber->is_active;
            }
        }
        
        $isAdmin = false;
        $userId = auth()->id();
        $roleIds = DB::table('role_user')
            ->where('user_id', $userId)
            ->pluck('role_id')
            ->all();

        if (in_array(2, $roleIds)) {
                $isAdmin = true;
            }   

        return view('website.grant.details', compact('grant', 'isPaidSubscriber','isAdmin'));
    }

    public function favouriteUnfavourite($id)
    {
        $gCheck = GrantsInfoFavorite::where('grants_info_id', $id)->where('user_id', auth()->user()->id)->first();
        if ($gCheck) {
            $gCheck->delete();
            return redirect('/')->with('favsuccess', 'Favourite Update Successfully.');
        }

        $g = GrantsInfoFavorite::create([
            'grants_info_id' => $id,
            'user_id' => auth()->user()->id
        ]);
        return redirect('/')->with('favsuccess', 'Favourite Update Successfully.');
    }

    public function previewData(Request $request)
    {
        $data = $request->input('data');
        // Perform any necessary data processing here
        $preview = 'Preview Data: ' . $data;
        return response()->json(['preview' => $preview]);
    }


    public function clearFilter()
    {
        return redirect()->route('grants');
    }

    public function titleSlug()
    {
        $grants = Grant::select('opportunity_title', 'title_slug')->get();
        foreach ($grants as $grant) {
            if (empty($grant->title_slug)) {
                $slug = Str::slug($grant->opportunity_title);
    
                while (Grant::where('title_slug', $slug)->exists()) {
                    $slug = $slug . '-' . uniqid();
                }
    
                $grant->title_slug = $slug;
                $grant->save();
            }
        }
    }
}
