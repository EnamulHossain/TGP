<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Interest;
use App\Models\Province;
use App\Models\Role;
use App\Models\ProfileInterestMap;
use App\Models\ProfileLocationMap;
use App\Models\Profile;
use App\Models\Subscriber;
use App\Models\Subscription;

class ImportUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    public $timeout = 899;

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
        $intrests = $this->GetInterest();
        $geos = $this->GetProvince();
        // for debug only
        $dta = [];
        $allDats = [];
        foreach ($this->data as $item) {
            $dta[$item['user_data']['email']] = $item['user_data']['email'];
            $allDats[$item['user_data']['email']] = $item;
        }  
        foreach ($allDats as $item) {
            print "\n".$item['user_data']['email'];
            $item_role = $item['user_data']['role'];
            unset($item['user_data']['role']);
            $item_Interest = $item['Interest'];
            unset($item['Interest']);
            $item_Geography = $item['Geography'];
            unset($item['Geography']);
            $usrObj = null;
            $id = 0;
            $profileID = 0;
            try {
                $usrObj = User::getUsrsByEmail($item['user_data']['email']);
                if (!isset($usrObj) || $usrObj == null) {
                    $usrObj = User::Create($item['user_data']);
                }
                $id = $usrObj->id;
            } catch (\Illuminate\Database\QueryException $exception) {
                $errorInfo = $exception->errorInfo;
                // print '<pre>errorInfo';
                // print_r($errorInfo);
                // print '</pre>';
            }
            if ($usrObj == null) {
                // print "<br>"."usrObj continue";
                continue;
            }
            if (isset($usrObj) && isset($item_role) && !empty($item_role)) {
                $this->attachRole($usrObj, $item_role);
            }
            if ($item_role != "Grant Portal Subscribers" && $item_role != "Grant Portal Paid Subscribers") {
                // print "<br>"."item_role continue";
                continue;
            }
            $profileObj = null;
            try {
                $profileObj = Profile::getProfileByUserID($id);
                if (!isset($profileObj) || $profileObj == null) {
                    $item['profile_data']['user_id'] = $id;
                    $profileObj = Profile::Create($item['profile_data']);
                }
            } catch (\Illuminate\Database\QueryException $exception) {
                $errorInfo = $exception->errorInfo;
                // print '<pre>profileObj';
                // print_r($errorInfo);
                // print '</pre>';
            }
            if ($profileObj == null) {
                // print "<br>"."profileObj continue";
                continue;
            }
            $profileID = $profileObj->id;
            if (isset($item_Interest) && count($item_Interest) > 0) {
                foreach ($item_Interest as $elgb) {
                    if (isset($elgb) && isset($intrests[$elgb])) {
                        $retID = $intrests[$elgb];
                        $obj = new ProfileInterestMap();
                        $obj->profile_id = $profileID;
                        $obj->interest_id = $retID;
                        $obj->save();
                    }
                }
            }
            if (isset($item_Geography) && count($item_Geography) > 0) {
                foreach ($item_Geography as $elgb) {
                    if (isset($elgb) && isset($geos[$elgb])) {
                        $retID = $geos[$elgb];
                        $obj = new ProfileLocationMap();
                        $obj->province_id = $profileID;
                        $obj->profile_id = $retID;
                        $obj->save();
                    }
                }
            }
            $subscriberObj = null;
            try {
                $item['subscriber_data']['user_id'] = $id;
                $subscriberObj = Subscriber::Create($item['subscriber_data']);
            } catch (\Illuminate\Database\QueryException $exception) {
                $errorInfo = $exception->errorInfo;
                // print '<pre>subscriberObj';
                // print_r($errorInfo);
                // print '</pre>';
            }
            if ($subscriberObj == null) {
                $subscriberObj = Subscriber::getSubscriberByUserID($id);
                if (!isset($subscriberObj) || $subscriberObj == null) {
                    // print "<br>"."subscriberObj continue";
                    continue;
                }
            }
            try {
                $subscriptionObj = Subscription::Create($item['subscription_data']);
            } catch (\Illuminate\Database\QueryException $exception) {
                $errorInfo = $exception->errorInfo;
                // print '<pre>subscriptionObj';
                // print_r($errorInfo);
                // print '</pre>';
            }
        }
    }
    private function GetInterest()
    {
        $intrests = Interest::all();
        $data = [];
        foreach ($intrests as $int) {
            $data[$int->title] = $int->id;
        }
        return $data;
    }
    private function GetProvince()
    {
        $intrests = Province::all();
        $data = [];
        foreach ($intrests as $int) {
            $data[$int->name] = $int->id;
        }
        return $data;
    }
    public function attachRole($user, $roleName)
    {
        $role = Role::where('name', $roleName)->first();
        $user->roles()->attach([$role->id]);

        return $user->roles;
    }
}
