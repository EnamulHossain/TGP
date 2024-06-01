<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Jobs\ImportDataJob;
use App\Jobs\ImportUserJob;
use Illuminate\Support\Facades\Redis;

class ImportController extends AdminController
{
    /**
     * importGrant
     *
     * @return string|void
     */
    public function index()
    {
        return $this->view('import');
    }
    /**
     * import Data
     *
     * @param        $file
     * @return string|void
     */
    public function importData(Request $request)
    {
        // Redis::command('flushdb');
        // die;
        // $file = $request->file('file');
        $file_type = $request->get('file_type');
        if ($file_type == "grant") {
            $jsonData = file_get_contents(app_path() . "/grants_10th.json");
            $jsonData =  json_decode($jsonData);
            $this->importGrant($jsonData);
        } else if ($file_type == "user") {
            $jsonData = file_get_contents(app_path() . "/UserAdmins.json");
            // $jsonData = file_get_contents($file->getRealPath());
            $jsonData =  json_decode($jsonData);
            $this->importUser($jsonData);
        }
        // die;
        return redirect()->route('import-get');
    }
    /**
     * importGrant
     *
     * @param        $jsondata
     * @return string|void
     */
    private function importGrant($jsonData)
    {
        $jsonDatas = $this->uniqueGrant($jsonData);
        $totalData = [];
        foreach ($jsonDatas as $key => $data) {
            $totalData[] = $this->grantDataFormat($data);
        }
        $job = (new ImportDataJob($totalData));
        dispatch($job);
    }

    private function uniqueGrant($jsonData)
    {
        $returnData = [];
        $totalData = [];
        foreach ($jsonData as $data) {
            $data = (array)$data;
            $totalData[$data['DocID']][] = $data;
        }
        
        foreach ($totalData as $data) {
            $data = (array)$data;
            $tempDta = $data[0];
            $tempDta['ContributorUserCN'] = '';
            $tempDta['EditorUserCN'] = '';
            $tempDta['PublisherUserCN'] = '';
            $tempDta['GrantStatus'] = 1;
            foreach ($data as $tmp) {
                $sts = explode("###", $tmp["Status"]);
                if (isset($sts[0]) && $sts[0] == "Archived") {
                    $tempDta['GrantStatus'] = 5;
                    if ($tmp['STID'] == 1) {
                        $tempDta['ContributorUserCN'] = filter_var($tmp['wfsUserCN'], FILTER_VALIDATE_EMAIL) ? $tmp['wfsUserCN'] : $tmp['wfsUserCN'] . "@thegrantportal.com";
                    } else if ($tmp['STID'] == 2) {
                        $tempDta['EditorUserCN'] = filter_var($tmp['wfsUserCN'], FILTER_VALIDATE_EMAIL) ? $tmp['wfsUserCN'] : $tmp['wfsUserCN'] . "@thegrantportal.com";
                    } else if ($tmp['STID'] == 3) {
                        $tempDta['PublisherUserCN'] = filter_var($tmp['wfsUserCN'], FILTER_VALIDATE_EMAIL) ? $tmp['wfsUserCN'] : $tmp['wfsUserCN'] . "@thegrantportal.com";
                    }
                    continue;
                }
                if ($tmp['STID'] == 1) {
                    $tempDta['ContributorUserCN'] = filter_var($tmp['wfsUserCN'], FILTER_VALIDATE_EMAIL) ? $tmp['wfsUserCN'] : $tmp['wfsUserCN'] . "@thegrantportal.com";
                }
                if ($tmp['STID'] == 2) {
                    $tempDta['EditorUserCN'] = filter_var($tmp['wfsUserCN'], FILTER_VALIDATE_EMAIL) ? $tmp['wfsUserCN'] : $tmp['wfsUserCN'] . "@thegrantportal.com";
                }
                if ($tmp['STID'] == 3 || $tmp['STID'] == 2) {
                    if ($tmp['STID'] == 3 && $tmp['wfsIsActive'] == 0 && $tmp['wfsStatus'] == 1) {
                        $tempDta['PublisherUserCN'] = filter_var($tmp['wfsUserCN'], FILTER_VALIDATE_EMAIL) ? $tmp['wfsUserCN'] : $tmp['wfsUserCN'] . "@thegrantportal.com";
                        $tempDta['GrantStatus'] = 2;
                    } else if ($tmp['STID'] == 3 && $tmp['wfsIsActive'] == 0 && $tmp['wfsStatus'] == -1) {
                        $tempDta['PublisherUserCN'] = filter_var($tmp['wfsUserCN'], FILTER_VALIDATE_EMAIL) ? $tmp['wfsUserCN'] : $tmp['wfsUserCN'] . "@thegrantportal.com";
                        if ($tmp['STID'] == 2 && $tmp['wfsIsActive'] == 0) {
                            $tempDta['GrantStatus'] = 1;
                        } else if ($tmp['STID'] == 2 && $tmp['wfsIsActive'] == 1) {
                            $tempDta['GrantStatus'] = 3;
                        }
                    }
                }
            }
            $returnData[$tmp['DocID']] = $tempDta;
        }
        return $returnData;
    }

    /**
     * importUser
     *
     * @param        $jsondata
     * @return string|void
     */
    private function importUser($jsonData)
    {
        $totalData = [];
        foreach ($jsonData as $key => $data) {
            $totalData[] = $this->userDataFormat((array)$data);
        }
        $job = (new ImportUserJob($totalData));
        dispatch($job);
    }
    /**
     * importGrant
     *
     * @param        $jsondata
     * @return string|void
     */
    private function grantDataFormat($data)
    {
        // EditorUserCN
        $grantData = [
            'doc_id' => $data['DocID'],
            'opportunity_title' => $data['NavDisplayName'],
            'opportunity_teaser' => $data['LongDescription'],
            'opportunity_title_for_subscriber' => $data['OpportunityNameForSubscriber'],
            'opportunity_description_for_subscriber' => $data['OpportunityTeaserForSubscriber'],
            'amount_low' => $data['GrantFundingAmountLow'],
            'amount_high' => $data['GrantFundingAmountHigh'],
            'close_date_at' => $data['CloseDate'],
            'deadline_at' => $data['Deadline'],
            'letter_of_intent_deadline_at' => $data['LetterOfIntentDeadline'],
            'posted_date_at' => $data['PostDate'],
            'url' => $data['OpportunityUrl'],
            'funding_source' => $data['FundingSource'],
            'funding_agency_id' => 1, // default value
            'additional_notes' => $data['AdditionalNotes'],
            'status' => $data['GrantStatus'],
            'is_ongoing' => ($data['Deadline'] == "12/31/2099") ? 1 : 0,
            'is_opening' => ($data['GrantFundingAmountLow'] == 1 && $data['GrantFundingAmountHigh'] == 1) ? 1 : 0,
            'user_id' => $data['ContributorUserCN'],
            'approved_by' => $data['PublisherUserCN'],
            'site_id' => 0,
        ];
        if (isset($data['Eligibility']) && $data['Eligibility'] != "") {
            $grantData['Eligibility'] = explode("###", $data['Eligibility']);
        } else {
            $grantData['Eligibility'] = [];
        }
        if (isset($data['Interest']) && $data['Interest'] != "") {
            $grantData['Interest'] = explode("###", $data['Interest']);
        } else {
            $grantData['Interest'] = [];
        }
        if (isset($data['Geography']) && $data['Geography'] != "") {
            $grantData['Geography'] = explode("###", $data['Geography']);
        } else {
            $grantData['Geography'] = [];
        }
        if (isset($data['FAgency']) && $data['FAgency'] != "") {
            $grantData['FAgency'] = explode("###", $data['FAgency']);
        } else {
            $grantData['FAgency'] = [];
        }
        return $grantData;
    }
    /**
     * user Data Format
     *
     * @param        $jsondata
     * @return string|void
     */
    private function userDataFormat($data)
    {
        $results = [];
        $results['user_data'] = [
            'email' => filter_var($data['UserCN'], FILTER_VALIDATE_EMAIL) ? $data['UserCN'] : $data['UserCN'] . "@thegrantportal.com",
            'password' => $data['PasswordHash'],
            'firstname' => $data['FirstName'],
            'lastname' => $data['MiddleName'] . ' ' . $data['LastName'],
            'gender' => '',
            'cellphone' => '',
            'image' => '',
            'logged_in_at' => $data['AccountCreated'],
            'remember_token' => $data['PasswordSalt'],
            'email_verified_at' => $data['AccountApproved'],
            'role' => $data['Role'],
        ];
        $results['profile_data'] = [
            'user_id' => 0,
            'site_id' => 0,
            'company' => $data['Company'],
            'job_title' => $data['JobTitle'],
            'first_name' => $data['FirstName'],
            'last_name' => $data['MiddleName'] . ' ' . $data['LastName'],
            'country_id' => 0,
            'state_id' => 0,
            'subscription_level_id' => 0,
            'address_line_1' => $data['Address1'],
            'address_line_2' => $data['Address2'],
            'city' => $data['City'],
            'is_active' => 0,
            'created_by' => $data['AccountCreated'],
            'updated_by' => $data['PasswordLastChanged'],
            'postal_code' => $data['PostalCode'],
        ];
        $results['subscriber_data'] = [
            'password' => $data['PasswordHash'],
            'first_name' => $data['FirstName'],
            'last_name' => $data['MiddleName'] . ' ' . $data['LastName'],
            'email' => filter_var($data['UserCN'], FILTER_VALIDATE_EMAIL) ? $data['UserCN'] : $data['UserCN'] . "@thegrantportal.com",
            'user_id' => 0,
            'company' => $data['Company'],
            'address_line_1' => $data['Address1'],
            'address_line_2' => $data['Address2'],
            'city' => $data['City'],
            'postal_code' => $data['PostalCode'],
            'state' => $data['City'],
            'order_key' => $data['OrderID'],
            'customer_id' => $data['PaymentProviderCustomerID'],
        ];
        $results['subscription_data'] = [
            'site_id' => 0,
            'user_name' => !empty($data['NavDisplayName']) ? $data['NavDisplayName'] : $data['UserCN'],
            'order_number' => $data['OrderID'],
            'subtotal' => $data['Subtotal'],
            'tax' => $data['Tax'],
            'shipping' => $data['Shipping'],
            'service_fee' => $data['AddedFees'],
            'discount' => $data['Discount'],
            'discount_code' => $data['DiscountRef'],
            'total' => $data['Total'],
            'provider_customer_id' => $data['PaymentProviderCustomerID'],
            'transaction_id' => $data['PaymentProviderTransactionID'],
            'expired_at' => $data['AccountExpiration'],
        ];
        if (isset($data['Interest']) && $data['Interest'] != "") {
            $results['Interest'] = explode("###", $data['Interest']);
        } else {
            $results['Interest'] = [];
        }
        if (isset($data['Geography']) && $data['Geography'] != "") {
            $results['Geography'] = explode("###", $data['Geography']);
        } else {
            $results['Geography'] = [];
        }
        return $results;
    }
}
