<?php

namespace App\Http\Controllers\Admin\Grant;

use Exception;
use App\Models\User;
use App\Models\Grant;
use App\Models\Interest;
use App\Models\Province;
use App\Models\WorkFlow;
use App\Models\WorkFlowHistory;
use App\Models\Eligibilty;
use Illuminate\Http\Request;
use App\Models\FundingAgency;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\AdminController;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Exports\GrantsExport;
use App\Models\Country;
use App\Models\GrantAccessLog;
use App\Models\Profile;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class GrantController extends AdminController

{
    /**
     * Display a listing of grants.
     *
     * @return Response
     */

    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');
        $contributors = $request->input('contributor');
        $publishers = $request->input('publisher');

        $grants = Grant::with('user');

        if (!empty($status)) {
            $statusKey = array_search($status, Grant::STATUSES_MAP);
            if ($statusKey !== false) {
                $grants->where('status', $statusKey)->paginate(10);
            }
        }

        $publisher = DB::table('users')
            ->join('grants_info', 'users.id', '=', 'grants_info.approved_by')
            ->whereNotNull('grants_info.approved_by')
            ->select('users.email', 'users.id')
            ->distinct()
            ->get();


        $contributor = DB::table('users')
            ->join('grants_info', 'users.id', '=', 'grants_info.user_id')
            ->whereNotNull('grants_info.user_id')
            ->select('users.email', 'users.id')
            ->distinct()
            ->get();

        if (!empty($contributors)) {
            $grants->where('user_id', $contributors);
        }

        if (!empty($publishers)) {
            $grants->where('approved_by', $publishers);
        }

        if (!empty($search)) {
            $grants->where(function ($query) use ($search) {
                $query->where('opportunity_title', 'LIKE', "%$search%")
                    ->orWhere('amount_high', 'LIKE', "%$search%")
                    ->orWhere('id', 'LIKE', "%$search%")
                    ->orWhere('amount_low', 'LIKE', "%$search%")
                    ->orWhere('close_date_at', 'LIKE', "%$search%");
            });
        }

        $sortField = $request->input('sort_field');
        $sortOrder = $request->input('sort_order', 'asc');
        if (!empty($sortField)) {
            $grants->orderBy($sortField, $sortOrder);
        } else {
            $grants->latest();
        }

        $items = $grants->paginate(50)->appends(request()->query());
        $Tcount = $items->total();


        return $this->view('grants.index', [
            'total' => $Tcount,
            'items' => $items,
            'search' => $search,
            'status' => $status,
            'sortField' => $sortField,
            'sortOrder' => $sortOrder,
            'contributor' => $contributor,
            'contributors' => $contributors,
            // 'userName' => $userName,
            'publisher' => $publisher,
            'publishers' => $publishers,
        ]);
    }

    public function accessLog()
    {
        $items = GrantAccessLog::with('user', 'grant')->latest()->limit(50)->get();

        return $this->view('grants.access-list', compact('items'));
    }


    public function updateAccessLog($grantID)
    {
        GrantAccessLog::updateOrCreate(
            ['user_id' => auth()->user()->id, 'grant_id' => $grantID],
            ['visited_at' => Carbon::now()]
        );
    }

    public function show($id)
    {
        $item = Grant::with(['states', 'interests', 'eligibilties'])->find($id);
        $country_states = Country::with('states')->get();
        $user = User::with('profile')->whereIn('id', [$item->user_id, $item->approved_by])->get();
        $contributor = $user->firstWhere('id', $item->user_id);
        $publisher = $user->firstWhere('id', $item->approved_by);

        $grantInterests = [];
        if ($item->interests) {
            $grantInterests = $item->interests->pluck('id')->toArray();
        }

        $selectedRegions = [];
        if ($item->states) {
            $selectedRegions = $item->states->pluck('id')->toArray();
        }
        $grantEligibilties = [];
        if ($item->eligibilties) {
            $grantEligibilties = $item->eligibilties->pluck('id')->toArray();
        }
        $funding_agencies = FundingAgency::whereIsActive(true)->orderBy('name')->get()->pluck('name', 'id')->toArray();
        $states = Province::whereIsActive(true)->orderBy('name')->get()->pluck('name', 'id')->toArray();
        $interests = Interest::whereIsActive(true)->orderBy('title')->get()->pluck('title', 'id')->toArray();
        $eligibilties = Eligibilty::whereIsActive(true)->orderBy('title')->get()->pluck('title', 'id')->toArray();

        // udpate grant access log
        $this->updateAccessLog($id);

        return $this->view('grants.show', compact('item', 'grantEligibilties', 'funding_agencies', 'interests', 'eligibilties', 'selectedRegions', 'states', 'grantInterests', 'user', 'contributor', 'country_states', 'publisher'));
    }



    public function grantApprovalStatus($workFlowDirectApproveCount, $workFlowDirectRejectCount, $workFlowEditBeforeCount, $workflow)
    {
        $grantStatus = 1;
        switch ($workflow) {
            case 2:
                if ($workFlowDirectApproveCount >= 1) {
                    $grantStatus = 2;
                    break;
                }

                if ($workFlowDirectRejectCount >= 1) {
                    $grantStatus = 3;
                    break;
                }
            case 3:
                if ($workFlowEditBeforeCount >= 1) {
                    $grantStatus = 2;
                    break;
                }

                if ($workFlowDirectRejectCount >= 1) {
                    $grantStatus = 3;
                    break;
                }
            case 4:
                if ($workFlowDirectApproveCount >= 2) {
                    $grantStatus = 2;
                    break;
                }

                if ($workFlowDirectRejectCount >= 2) {
                    $grantStatus = 3;
                    break;
                }
            case 5:
                if ($workFlowEditBeforeCount >= 3) {
                    $grantStatus = 2;
                    break;
                }
                if ($workFlowDirectRejectCount >= 3) {
                    $grantStatus = 3;
                    break;
                }
            default:
                $grantStatus = 2;
                break;
        }

        return $grantStatus;
    }

    /**
     * Update the specified grants in storage.
     *
     * @param grants  $grants
     * @param Request $request
     * @return Response
     */
    public function changeUpdate($id, Request $request)
    {
        $request->validate(Grant::$rule, Grant::$messages);
        $grant = Grant::find($id);
        try {
            DB::beginTransaction();

            $status = $request->status;
            $approved_by = $grant->approved_by;
            $rejected_by = $grant->rejected_by;

            $approval_count = $grant->approval_count;
            if ($status == '2') {
                if ($approved_by != auth()->user()->id) {
                    $approval_count += 1;
                }
                $approved_by = auth()->user()->id;
            }

            $reject_count = $grant->reject_count;
            if ($status == '3') {
                if ($rejected_by != auth()->user()->id) {
                    $reject_count += 1;
                }
                $rejected_by = auth()->user()->id;
            }

            $workflow_count = $grant->workflow_count + 1;

            $grant->update([
                "opportunity_title" => $request->opportunity_title,
                "opportunity_teaser" => $request->opportunity_teaser,
                "opportunity_title_for_subscriber" => $request->opportunity_title_for_subscriber,
                "opportunity_description_for_subscriber" => $request->opportunity_description_for_subscriber,
                "amount_low" => $request->amount_low,
                "amount_high" => $request->amount_high,
                "close_date_at" => $request->close_date_at,
                "deadline_at" => $request->deadline_at,
                "letter_of_intent_deadline_at" => $request->letter_of_intent_deadline_at,
                "posted_date_at" => $request->posted_date_at,
                "url" => $request->url,
                "funding_source" => $request->funding_source,
                "funding_agency_id" => $request->funding_agency,
                "additional_notes" => $request->additional_notes,
                "is_ongoing" => $request->is_ongoing,
                "is_opening" => $request->is_opening,
                "created_by" => auth()->user()->id,
                "user_id " => auth()->user()->id,
                'approved_by' => $approved_by,
                'rejected_by' => $rejected_by,
                'workflow_count' => $workflow_count,
                'approval_count' => $approval_count,
                'reject_count' => $reject_count,
                'status' => $status,
            ]);

            if (!empty($request->states)) {
                $states = $request->states;
                $grant->states()->sync($states);
            }
            if (!empty($request->eligibilties)) {
                $eligibilties = $request->eligibilties;
                $grant->eligibilties()->sync($eligibilties);
            }
            if (!empty($request->interests)) {
                $interests = $request->interests;
                $grant->interests()->sync($interests);
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return  $e->getMessage();
        }

        $grantStatus = 1;
        $workflow = WorkFlow::first();
        $workflowHistory = WorkFlowHistory::where('grant_id', $grant->id)->get();
        $workFlowDirectApproveCount = $workflowHistory->where('status', 2)->count();
        $workFlowDirectRejectCount = $workflowHistory->where('status', 3)->count();
        $workFlowEditBeforeApproveCount = $workflowHistory->where('status', 2)->where('is_edit', 1)->count();

        if ($workflow && $workflowHistory) {
            $grantStatus = $this->grantApprovalStatus($workFlowDirectApproveCount, $workFlowDirectRejectCount, $workFlowEditBeforeApproveCount, $workflow->work_flow);
        }

        if ($request->status == 5) {
            $grantStatus = 5;
        }

        $grant->update(
            [
                'status' => $grantStatus
            ]
        );

        $queryParams = $request->getQueryString();
        return redirect()->route('grants', [$queryParams])->with('success', 'Grant updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $grant = Grant::findOrFail($id);

        if ($grant->delete()) {
            notify()->success('Successfully', 'The ' . $grant->opportunity_title . ' has been removed');
        } else {
            notify()->error('Oops', 'We could not find the ' . $grant->opportunity_title . ' to delete');
        }

        return back()->with('delete', 'Delete Grant successfully.');
    }

    public function export(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');
        $contributors = $request->input('contributors');
        $publishers = $request->input('publishers');

        return Excel::download(new GrantsExport($search, $status, $contributors, $publishers), 'grants.xlsx');
    }
}
