<?php

namespace App\Http\Controllers\Website;

use App\Models\Article;
use App\Models\CookieConsent;
use App\Models\Country;
use App\Models\Eligibilty;
use App\Models\Grant;
use App\Models\Interest;
use App\Models\Page;
use App\Models\ProductCategory;
use App\Models\Profile;
use App\Models\Province;
use App\Models\Role;
use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends WebsiteController
{
    public function index(Request $request)
    {
        // Check if the user has already given consent
        $consent = CookieConsent::where('ip_address', request()->ip())->first();

        set_time_limit(0);
        $clearAll = $request->input('clear');
        $perPage = $request->input('per_page');
        $sort_by = $request->input('sort_by', 'id');

        $status = 2;
        if ($sort_by == 'arch_amount_low' || $sort_by == 'arch_amount_high' || $sort_by == 'arch_opportunity_title_a' || $sort_by == 'arch_opportunity_title_z' || $sort_by == 'arch_deadline_at_a' || $sort_by == 'arch_deadline_at_d' || $sort_by == 'arch_favourite') {
            $status = 5;
        }

        $availableGrants = Grant::where('status', $status);
        $totalGrantsCount = $availableGrants->count();
        $totalGrantAmount = $availableGrants->sum('amount_high');

        $userFavGrants = [];
        if (auth()->user()) {
            $user_id = auth()->user()->id;
            $userFavGrants = $availableGrants->whereHas('favourite', function ($query) use ($user_id) {
                $query->orderBy('grants_info_id', 'desc')
                    ->where('user_id', $user_id);
            })->pluck('id')->toArray();
        }

        $grantsQuery = Grant::select('is_opening','is_ongoing','deadline_at', 'amount_high', 'amount_low', 'user_id', 'opportunity_title', 'id')->with(['interests', 'eligibilties', 'states', 'favourite'])->where('status', '=', $status);

        $keyword = $request->input('search');
        if (!empty($keyword)) {
            $grantsQuery->where(function ($query) use ($keyword) {
                $query->where('opportunity_title', 'like', '%' . $keyword . '%')
                    ->orWhere('opportunity_teaser', 'like', '%' . $keyword . '%')
                    ->orWhere('opportunity_description_for_subscriber', 'like', '%' . $keyword . '%')
                    ->orWhere('opportunity_title_for_subscriber', 'like', '%' . $keyword . '%')
                    ->orWhere('id', 'like', '%' . $keyword . '%');
            });
        }

        $userInterests = [];
        $userStates = [];
        $userProfile = null;
        if (auth()->user() && Profile::where('user_id', auth()->user()->id)->first() && $clearAll == null) {
            $userProfile = Profile::with('states', 'interests')->where('user_id', auth()->user()->id)->first();
            $userInterests = $userProfile->interests->pluck('id')->toArray();
            $userStates = $userProfile->states->pluck('id')->toArray();
        }

        $interestFilters = [];
        $interests = $request->input('interests');
        if (count($userInterests) > 0 && !$interests) {
            $grantsQuery->whereHas('interests', function ($query) use ($userInterests) {
                $query->whereIn('interest_id', $userInterests);
            });
        }

        if ($interests) {
            $interestFilters = explode(',', $interests);
            $grantsQuery->whereHas('interests', function ($query) use ($interestFilters) {
                $query->whereIn('interest_id', $interestFilters);
            });
        }

        $eligibilityFilters = [];
        $eligibilities = $request->input('eligibility');
        if ($eligibilities) {
            $eligibilityFilters = explode(',', $eligibilities);
            $grantsQuery->whereHas('eligibilties', function ($query) use ($eligibilityFilters) {
                $query->whereIn('eligibilty_id', $eligibilityFilters);
            });
        }

        $locationCountry = [];
        $countries = $request->input('countries');
        $locationCountry = explode(',', $countries);

        $locationFilters = [];
        $states = $request->input('states');
        if (!$states && count($userStates) > 0) {
            $grantsQuery->whereHas('states', function ($query) use ($userStates) {
                $query->whereIn('province_id', $userStates);
            });
        }

        if ($states) {
            $locationFilters = explode(',', $states);
            $grantsQuery->whereHas('states', function ($query) use ($locationFilters) {
                $query->whereIn('province_id', $locationFilters);
            });
        }

        $amountFilters = [];
        $amounts = $request->input('amount');
        if ($amounts) {
            $amountFilters = explode(',', $amounts);
            $grantsQuery->where(function ($query) use ($amountFilters) {
                foreach ($amountFilters as $amount) {
                    $range = explode('-', $amount);
                    if (count($range) == 2) {
                        $min = $range[0];
                        $max = $range[1];
                        $query->orWhereBetween('amount_high', [$min, $max]);
                    } else if ($amount == '500001+') {
                        $query->orWhere('amount_high', '>', '500000');
                    }
                }
            });
        }
        if (auth()->user() && ($sort_by == 'favourite' ||  $sort_by == 'arch_favourite')) {
            $user_id = auth()->user()->id;
            $grants = $grantsQuery->whereHas('favourite', function ($query) use ($sort_by, $user_id) {
                $query->orderBy('grants_info_id', 'desc')
                    ->where('user_id', $user_id);
            });
        } elseif ($sort_by == 'amount_low' || $sort_by == 'arch_amount_low') {
            $grants = $grantsQuery->orderBy('amount_low', 'asc');
        } elseif ($sort_by == 'amount_high' || $sort_by == 'arch_amount_high') {
            $grants = $grantsQuery->orderBy('amount_low', 'desc');
        } elseif ($sort_by == 'opportunity_title_a' || $sort_by == 'arch_opportunity_title_a') {
            $grants = $grantsQuery->orderBy('opportunity_title', 'asc');
        } elseif ($sort_by == 'opportunity_title_z' || $sort_by == 'arch_opportunity_title_z') {
            $grants = $grantsQuery->orderBy('opportunity_title', 'desc');
        } elseif ($sort_by == 'deadline_at_a' || $sort_by == 'arch_deadline_at_a') {
            $grants = $grantsQuery->orderBy('deadline_at', 'asc');
        } elseif ($sort_by == 'deadline_at_d' || $sort_by == 'arch_deadline_at_d') {
            $grants = $grantsQuery->orderBy('deadline_at', 'desc');
        } else {
            $grants = $grantsQuery->orderBy($sort_by, 'desc');
        }
        $rawGrants = clone $grantsQuery;
        $grantsAmount = $rawGrants->sum('amount_high');
        $grants = $grantsQuery->paginate($perPage)->appends(['clear' => $clearAll, 'per_page' => $perPage, 'sort_by' => $sort_by, 'interests' => $interests, 'eligibility' => $eligibilities, 'states' => $states, 'amount' => $amounts, 'countries' => $countries]);

        $grants->each(function ($grant) {
            $date = Carbon::parse($grant->deadline_at);
            $grant->deadline_at = $date->format('D, F j, Y');
        });

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

        $eligibilies = Eligibilty::all();
        $countries = Country::with('states')->get();
        $interests = Interest::all();

        return view('website.home', compact(
            'grants',
            'userFavGrants',
            'grantsAmount',
            'perPage',
            'locationFilters',
            'amountFilters',
            'sort_by',
            'eligibilies',
            'countries',
            'interests',
            'interestFilters',
            'eligibilityFilters',
            'totalGrantAmount',
            'locationCountry',
            'isPaidSubscriber',
            'userInterests',
            'userProfile',
            'totalGrantsCount',
            'isAdmin',
            'consent'
        ));
    }

    public function getProvices(Request $request)
    {
        $country_id = $request->input('country_id');
        $states = Province::select('id', 'name')->where('country_id', $country_id)->get();
        return response()->json(['states' => $states]);
    }
}
