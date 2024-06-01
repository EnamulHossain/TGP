<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Grant;
use App\Models\Newsletter;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class GenerateNewsletterDataSet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'newsletter:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate newsletter data set';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Redis::command('flushdb');
        // die;
        // $job = (new NewsLetterDataSet());
        // dispatch($job);

        $this->newsletter();
        Log::info("Newsletter data set is generated successfully.");
    }

    public function newsletter()
    {
        Newsletter::truncate();
        $users = User::with('profile')->get();
        $userEmails = $users->pluck('email');
        $subscribers = Subscriber::whereIn('email', $userEmails)->get()->keyBy('email');

        $newsletterData = [];
        foreach ($users as $user) {
            $profile = $user->profile;
            $first_name = $user->firstname;
            $last_name = $user->lastname;
            $isPaid = false;
            $subscriber = $subscribers->get($user->email);
            if ($subscriber) {
                $isPaid = $subscriber->is_active;
            }

            $grantsQuery = Grant::select('deadline_at', 'amount_low', 'amount_high', 'opportunity_title', 'opportunity_teaser', 'id', 'updated_at')->where('status', 2)->with(['interests', 'states']);

            $userInterests = [];
            $userStates = [];
            if ($profile) {
                $first_name = $profile->first_name;
                $last_name = $profile->last_name;
                $userInterests = $profile->interests->pluck('id')->toArray();
                $userStates = $profile->states->pluck('id')->toArray();
            }

            if (count($userInterests) > 0) {
                $grantsQuery->whereHas('interests', function ($query) use ($userInterests) {
                    $query->whereIn('interest_id', $userInterests);
                });
            }

            if (count($userStates) > 0) {
                $grantsQuery->whereHas('states', function ($query) use ($userStates) {
                    $query->whereIn('province_id', $userStates);
                });
            }

            $snog = $grantsQuery->count();
            $snof = $grantsQuery->sum('amount_high');
            $grants = $grantsQuery->orderBy('updated_at', 'desc')
                ->limit(10)
                ->get();

            foreach ($grants as $grant) {
                $title = Str::slug($grant->opportunity_title);
                $newsletterData = [
                    'grant_id' => $grant->id,
                    'opportunity_name' => $grant->opportunity_title,
                    'last_changed' => $grant->updated_at,
                    'member_id' => $user->id,
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email_address' => $user->email,
                    'paid_subscriber' => $isPaid,
                    'page_url' => url('/') . '/grant-details/' . $grant->id . '/' . $title,
                    'opportunity_teaser' => $grant->opportunity_teaser,
                    'grant_funding_amount' => $grant->amount_low,
                    'deadline' => ($grant->deadline_at !== null) ? $grant->deadline_at : null,
                    'snog' => $snog,
                    'snof' => $snof,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                Newsletter::create($newsletterData);
            }
        }
    }
}
