<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Subscriber;
use App\Models\Subscription;
use Carbon\Carbon;
use DateInterval;

class ImportSubscriptionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    public $timeout = 9000;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->data as $record) {
            $this->UpdateSubscriptionData($record);
        }
    }

    private function UpdateSubscriptionData($record)
    {
        $subscription = Subscription::where('user_name', $record['oemail'])->first();
        if (!$subscription) {
            $subscription = Subscription::where('user_name', $record['titan_email'])->first();
        }
        $subscriber = Subscriber::where('email', $record['oemail'])->first();
        if (!$subscriber) {
            $subscriber = Subscriber::where('email', $record['titan_email'])->first();
        }
        if (!$subscription && !$subscriber) {
            print '\n return: ' . $record['oemail'] . '\n';
            return;
        }
        $period = null;
        switch ($record['Plan']) {
            case "Weekly":
                $period = "P7D";
                break;
            case "Monthly":
                $period = "P1M";
                break;
            case "Yearly":
                $period = "P1Y";
                break;
        }

        $expired_at = null;
        if ($period) {
            $date = Carbon::createFromFormat('m/d/Y', $record['odate']);
            $expired_at = $date->add(new DateInterval($period));
        }

        if ($subscription) {
            $subscription->update(
                [
                    'type' => $record['Plan'],
                    'expired_at' => $expired_at,
                    'subtotal' => $record['orderamount'],
                    'total' => $record['orderamount'],
                ]
            );
        }


        if ($subscriber) {
            $subscriber->update(
                [
                    'is_active' => 1
                ]
            );
        }
    }
}


