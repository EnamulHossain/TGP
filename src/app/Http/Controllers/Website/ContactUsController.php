<?php

namespace App\Http\Controllers\Website;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\FeedbackContactUs;
use App\Events\ContactUsFeedback;
use App\Http\Controllers\Traits\GoogleCaptcha;
use App\Mail\FeedbackCreated;
use Illuminate\Mail\SendQueuedMailable;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends WebsiteController
{
    use GoogleCaptcha;

    public function index()
    {
        return $this->view('contact');
    }

    public function feedback(Request $request)
    {
        $request->validate(FeedbackContactUs::$rules);
        $input = $request->all();
        $feedback = FeedbackContactUs::create($input, FeedbackContactUs::$messages);
        try {
            Mail::to('promeroaccounting@promero.com')->send(new FeedbackCreated($feedback));
            $feedback->status = '1';
            $feedback->save();
            return back()->with('success', 'Thank you for your submissions. We will be in contact with you shortly.');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while sending the feedback. Please try again later.');
        }
    }

} 