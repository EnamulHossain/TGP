<?php

namespace App\Http\Middleware;

use App\Models\LockHistory;
use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LockPage
{
    public function handle(Request $request, Closure $next)
    {
        $pageURL = $request->url();

        $userId = auth()->user()->id;

        $lockHistory = LockHistory::where('page_url', $pageURL)->first();

        if ($lockHistory && $lockHistory->expires_at < now()) {
            $lockHistory->delete();
        }

        if ($lockHistory && $lockHistory->user_id != $userId && $lockHistory->expires_at > now()) {
            $message = 'Sorry, this page is currently being accessed by another user.';
            return response()->view('errors.403', compact('message'), 403);
        }

        LockHistory::updateOrCreate(
            ['user_id' => $userId],
            [
                'page_url' => $pageURL,
                'user_id' => $userId,
                'is_locked' => true,
                'expires_at' => Carbon::now()->addMinute(),
            ]
        );

        return $next($request);
    }
}
