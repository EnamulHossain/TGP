<?php

namespace App\Http\Controllers\Admin\RecycleBin;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use Exception;
use App\Models\Grant;
use App\Models\Interest;
use App\Models\Province;
use App\Models\WorkFlow;
use App\Models\WorkFlowHistory;
use App\Models\Eligibilty;
use Illuminate\Http\Request;
use App\Models\FundingAgency;
use App\Models\User;

class RecycleBinController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');
        $userName = $request->input('user_name');

        // Retrieve all users
        $users = User::all();

        $Tcount = Grant::count();
        // $grants = Grant::with('user');
        $grants = Grant::with('user')->onlyTrashed(); // Add onlyTrashed() to retrieve soft-deleted grants


        if (!empty($status)) {
            $statusKey = array_search($status, Grant::STATUSES_MAP);
            if ($statusKey !== false) {
                $grants->where('status', $statusKey)->paginate(10);
            }
        }

        if (!empty($userName)) {
            $grants->where('user_id', $userName)->paginate(10);
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
            $grants->whereNotNull('deleted_at');
        }

        $items = $grants->paginate(50)->appends(request()->query());


        return $this->view('recycle_bin.index', [
            'total' => $Tcount,
            'items' => $items,
            'search' => $search,
            'status' => $status,
            'sortField' => $sortField,
            'sortOrder' => $sortOrder,
            'users' => $users,
            'userName' => $userName,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grant = Grant::withTrashed()->findOrFail($id);

        if ($grant->forceDelete()) {
            notify()->success('Successfully', 'The ' . $grant->opportunity_title . ' has been permanently deleted');
        } else {
            notify()->error('Oops', 'We could not find the ' . $grant->opportunity_title . ' to delete');
        }

        return redirect()->route('recycle-bin.index')->with('delete', 'Delete Grant permanently.');
    }


    public function restore($id)
    {
        $item = Grant::withTrashed()->findOrFail($id); // Assuming your model is named "Item"

        $item->restore(); // Restore the item by setting the deleted_at value to null

        return redirect()->route('recycle-bin.index')->with('success', 'Item restored successfully.');
    }
}
