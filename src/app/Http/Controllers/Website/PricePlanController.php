<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\PricePlan;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class PricePlanController extends Controller
{
    // public function index()
    // {
    //     $data['pricePlans'] = PricePlan::orderBy('order')->limit(4)->get();
    //     return view('website.pricing-plans', $data);
    // }

    public function index()
    {
        $isPaidSubscriber = false;
        if (auth()->user()) {
            $paidSubscriber = Subscriber::select('is_active')->where('user_id', auth()->user()->id)->first();
            if ($paidSubscriber) {
                $isPaidSubscriber = $paidSubscriber->is_active;
            }
        }
        $data['pricePlans'] = PricePlan::orderBy('order')->limit(4)->get();
        $data['isPaidSubscriber'] = $isPaidSubscriber;
        return view('website.pricing-plans', $data);
    }
}
