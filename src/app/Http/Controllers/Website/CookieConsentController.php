<?php

namespace App\Http\Controllers\Website;

use App\Models\CookieConsent;
use Illuminate\Http\Request;

class CookieConsentController extends WebsiteController
{
    public function store(Request $request)
    {
        // Store the user's consent
        CookieConsent::updateOrCreate(
            ['ip_address' => $request->ip()],
            ['consent' => true]
        );

        return redirect('/');
    }
}
