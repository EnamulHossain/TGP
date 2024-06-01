<?php

namespace App\Http\Controllers\Website;

use App\Models\Country;
use App\Models\Profile;
use App\Models\Interest;
use App\Models\Province;
use App\Models\PricePlan;
use App\Models\Eligibilty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ProfileInterestMap;
use App\Models\ProfileLocationMap;
use App\Models\StoreSetting;
use App\Models\Subscriber;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Throwable;

class ProfileController extends Controller
{
    public function index()
    {
        $eligibilies = Eligibilty::all();
        $countries = Country::with('states')->get();
        $provinces = Province::get();
        $interests = Interest::all();

        $user = null;
        $uinterests = null;
        if (auth()->user() && Profile::where('user_id', auth()->user()->id)->first()) {
            $user = Profile::with('states', 'interests')->where('user_id', auth()->user()->id)->first();
            if ($user) {
                $uinterests = $user->interests->pluck('id')->toArray();
            }
        }

        $data['email'] = auth()->user()->email;
        $data['pricePlans'] = PricePlan::where('is_free', 0)
            ->orderBy('order')
            ->limit(3)
            ->get();








        $subscriptionType = "FREE";
        $expiredAt = null;
        $subscription = null;
        $profile = null;
        $isPaidSubscriber = false;
        if (auth()->user()) {
            $subscription = Subscription::select('type', 'expired_at')->where('user_name', auth()->user()->email)->orderBy('id', 'desc')->first();
            $paidSubscriber = Subscriber::select('is_active')->where('user_id', auth()->user()->id)->first();
            if ($paidSubscriber) {
                $isPaidSubscriber = $paidSubscriber->is_active;
            }
            $profile = Profile::where('user_id', auth()->user()->id)->first();
        }

        if ($subscription) {
            if ($subscription->type && $isPaidSubscriber) {
                $subscriptionType = $subscription->type;
            }
            $expiredAt = $subscription->expired_at;
        }

        $storeURL = "#";
        $storeSetting = StoreSetting::select('store_url')->where('is_active', true)
            ->orderBy('created_at', 'asc')
            ->limit(1)
            ->first();

        if ($storeSetting) {
            $storeURL = $storeSetting->store_url . "/myaccount.asp";
        }

        



        return view('website.profile', $data, compact('eligibilies', 'countries', 'provinces', 'interests', 'user', 'uinterests','isPaidSubscriber', 'subscriptionType', 'expiredAt', 'storeURL', 'profile'));
    }

    public function update(Request $request)
    {
        $request->validate(Profile::$rules);
        try {
            DB::beginTransaction();
            $profile = Profile::updateOrCreate([
                'user_id' => auth()->user()->id
            ], [
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "user_id" => auth()->user()->id,
                "company" => $request->company,
                "job_title" => $request->job_title,
                "country" => $request->country,
                "state" => $request->state,
                "subscription_level_id" => 1,
                "address_line_1" => $request->address_line_1,
                "address_line_2" => $request->address_line_2,
                "postal_code" => $request->postal_code,
                "city" => $request->city,
                "updated_by" => auth()->user()->id,
                "created_by" => auth()->user()->id,
            ]);

            ProfileLocationMap::where('profile_id', $profile->id)->delete();
            $states = $request->states;
            $profile->states()->sync($states);

            ProfileInterestMap::where('profile_id', $profile->id)->delete();
            $interests = $request->interests;
            $profile->interests()->sync($interests);

            $user = User::where('id', auth()->user()->id)->first();
            if ($profile && $user) {
                $user->update([
                    'firstname' => $profile->first_name,
                    'lastname' => $profile->last_name,
                    'profile_id' => $profile->id,
                ]);
            }

            DB::commit();
            return back()->with('success', 'Profile updated succesfully.');
        } catch (Throwable $e) {
            DB::rollBack();
            return back()->with('warning', 'Profile updated failed.');
        }
    }

    public function updateApi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'country' => 'required',
            'address_line_1'  => 'required',
            'postal_code'  => 'required',
            'city'  => 'required',
            'state'  => 'required',
        ]);

        if ($validator->fails()) {
            // Return JSON response with validation errors
            return response()->json(['errors' => $validator->errors()]);
        }

        $user = User::where('id', auth()->user()->id)->first();
        $user->update([
            'firstname' => $request->input('first_name'),
            'lastname' => $request->input('last_name'),
        ]);
        try {
            DB::beginTransaction();
            $profile = Profile::updateOrCreate([
                'user_id' => auth()->user()->id
            ], [
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "user_id" => auth()->user()->id,
                "company" => $request->company,
                "job_title" => $request->job_title,
                "country" => $request->country,
                "state" => $request->state,
                "subscription_level_id" => 1,
                "address_line_1" => $request->address_line_1,
                "address_line_2" => $request->address_line_2,
                "postal_code" => $request->postal_code,
                "city" => $request->city,
                "updated_by" => auth()->user()->id,
                "created_by" => auth()->user()->id,
            ]);

            ProfileLocationMap::where('profile_id', $profile->id)->delete();
            $states = $request->states;
            $profile->states()->sync($states);

            ProfileInterestMap::where('profile_id', $profile->id)->delete();
            $interests = $request->interests;
            $profile->interests()->sync($interests);

            DB::commit();
            return response()->json(['success' => 'Profile updated succesfully.']);
        } catch (Throwable $e) {
            DB::rollBack();
            return response()->json(['warning' => $e]);
        }
    }

    public function myplan()
    {
        $subscriptionType = "FREE";
        $expiredAt = null;
        $subscription = null;
        $profile = null;
        $isPaidSubscriber = false;
        if (auth()->user()) {
            $subscription = Subscription::select('type', 'expired_at', 'status')->where('user_name', auth()->user()->email)->orderBy('id', 'desc')->first();
            $paidSubscriber = Subscriber::select('is_active')->where('user_id', auth()->user()->id)->first();
            if ($paidSubscriber) {
                $isPaidSubscriber = $paidSubscriber->is_active;
            }
            $profile = Profile::where('user_id', auth()->user()->id)->first();
        }

        if ($subscription) {
            if ($subscription->type && $isPaidSubscriber) {
                $subscriptionType = $subscription->type;
            }
            $expiredAt = $subscription->expired_at;
        }

        $storeURL = "#";
        $storeSetting = StoreSetting::select('store_url')->where('is_active', true)
            ->orderBy('created_at', 'asc')
            ->limit(1)
            ->first();

        if ($storeSetting) {
            $storeURL = $storeSetting->store_url . "/myaccount.asp";
        }

        return view('website.myplan', compact('subscription','isPaidSubscriber', 'subscriptionType', 'expiredAt', 'storeURL', 'profile'));
    }

    public function destroy($id)
    {
        $userId = Auth::id();
        $profile = Profile::where('user_id', $userId)->first();
        $subscriber = Subscriber::where('user_id', $userId)->first();
        $userEmail = Auth::user()->email;
        $subscription = Subscription::where('user_name', $userEmail)->first();
        $profileDeleted = false;
        $subscriberDeleted = false;
        $subscriptionDeleted = false;

        if ($profile) {
            if ($profile->forceDelete()) {
                $profileDeleted = true;
            }
        }

        if ($subscriber) {
            if ($subscriber->forceDelete()) {
                $subscriberDeleted = true;
            }
        }

        if ($subscription) {
            if ($subscription->forceDelete()) {
                $subscriptionDeleted = true;
            }
        }

        if ($profileDeleted && $subscriberDeleted && $subscriptionDeleted) {
            notify()->success('Successfully', 'The account has been permanently deleted.');
        } else {
            notify()->error('Oops', 'Failed to permanently delete the account.');
        }

        $user = User::findOrFail($userId);
        $user->forceDelete();
        Auth::logout();
        return redirect('/')->with('delete', 'Account deleted permanently.');
    }
}
