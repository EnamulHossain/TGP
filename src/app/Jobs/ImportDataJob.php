<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Grant;
use App\Models\Interest;
use App\Models\Eligibilty;
use App\Models\Province;
use App\Models\GrantInfoEligibiltyMap;
use App\Models\GrantInfoInterestMap;
use App\Models\GrantInfoLocationMap;
use App\Models\FundingAgency;
use App\Models\GrantInfoAgencyMap;

class ImportDataJob implements ShouldQueue
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
        $eligibilities = $this->GetEligibilty();
        $geos = $this->GetProvince();
        $fnds = $this->GetFundingAgency();
        // for debug only
        $dta = [];
        $alldatas = [];
        foreach ($this->data as $item) {
            $dta[$item['doc_id']] = $item['doc_id'];
            $alldatas[$item['doc_id']] = $item;
        }
        foreach ($alldatas as $item) {
            if(!isset($item['doc_id']) || $item['doc_id'] == ""){
                continue;
            }
            if(isset($item['Eligibility']) && count($item['Eligibility']) > 0 ){
                $item_Eligibility = array_unique($item['Eligibility']);
            }
            if(isset($item['Interest']) && count($item['Interest']) > 0 ){
                $item_Interest = array_unique($item['Interest']);
            }
            if(isset($item['Geography']) && count($item['Geography']) > 0 ){
                $item_Geography = array_unique($item['Geography']);
            }
            if(isset($item['FAgency']) && count($item['FAgency']) > 0 ){
                $item_FAgency = array_unique($item['FAgency']);
            }
            unset($item['Eligibility']);
            unset($item['Interest']);
            unset($item['Geography']);
            unset($item['FAgency']);
            $user_id = User::getUserIdByEmail($item['user_id']);
            $item['user_id'] = $user_id;
            $approved_by_id = User::getUserIdByEmail($item['approved_by']);
            $item['approved_by'] = $approved_by_id;
            $FAgency_id = 1;
            if (isset($item_FAgency) && count($item_FAgency) > 0) {
                foreach ($item_FAgency as $elgb) {
                    if (isset($elgb) && isset($fnds[$elgb])) {
                        $FAgency_id = $fnds[$elgb];
                    }
                }
            }
            $item['funding_agency_id'] = $FAgency_id;
            $grntObj = Grant::getGrantByDocID($item['doc_id']);
            if(isset($grntObj) && $grntObj != null) {
                continue;
            } else if (!isset($grntObj) || $grntObj == null) {
                try {
                    $grntObj = Grant::create($item);
                } catch (\Illuminate\Database\QueryException $exception) {
                    $errorInfo = $exception->errorInfo;
                    // print '<pre>grntObj';
                    // print_r($errorInfo);
                    // print '</pre>';
                }
            }
            if (!isset($grntObj) || $grntObj == null) {
                continue;
            }
            $id = $grntObj->id;
            if (isset($item_Eligibility) && count($item_Eligibility) > 0) {
                foreach ($item_Eligibility as $elgb) {
                    if (isset($elgb) && isset($eligibilities[$elgb])) {
                        $retID = $eligibilities[$elgb];
                        $obj = new GrantInfoEligibiltyMap();
                        $obj->grant_info_id = $id;
                        $obj->eligibilty_id = $retID;
                        $obj->save();
                    }
                }
            }
            if (isset($item_Interest) && count($item_Interest) > 0) {
                foreach ($item_Interest as $elgb) {
                    if (isset($elgb) && isset($intrests[$elgb])) {
                        $retID = $intrests[$elgb];
                        $obj = new GrantInfoInterestMap();
                        $obj->grant_info_id = $id;
                        $obj->interest_id = $retID;
                        $obj->save();
                    }
                }
            }
            if (isset($item_Geography) && count($item_Geography) > 0) {
                foreach ($item_Geography as $elgb) {
                    if (isset($elgb) && isset($geos[$elgb])) {
                        $retID = $geos[$elgb];
                        $obj = new GrantInfoLocationMap();
                        $obj->grant_info_id = $id;
                        $obj->province_id = $retID;
                        $obj->save();
                    }
                }
            }
            if (isset($item_FAgency) && count($item_FAgency) > 0) {
                foreach ($item_FAgency as $elgb) {
                    if (isset($elgb) && isset($fnds[$elgb])) {
                        $retID = $fnds[$elgb];
                        $obj = new GrantInfoAgencyMap();
                        $obj->grant_info_id = $id;
                        $obj->agency_id = $retID;
                        $obj->save();
                    }
                }
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
    private function GetEligibilty()
    {
        $intrests = Eligibilty::all();
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
    private function GetFundingAgency()
    {
        $intrests = FundingAgency::all();
        $data = [];
        foreach ($intrests as $int) {
            $data[$int->name] = $int->id;
        }
        return $data;
    }
}
