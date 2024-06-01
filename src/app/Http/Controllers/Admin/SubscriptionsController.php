<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SubscriptionsExport;
use Image;
use App\Models\User;
use App\Http\Requests;
use App\Models\Subscription;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SubscriptionsController extends AdminController
{
    public function index(Request $request)
    {
        save_resource_url();
        $tcount = Subscription::count();
        $query = Subscription::select(['id', 'type','expired_at','user_name', 'order_number', 'subtotal', 'tax', 'shipping']);
        // Check if a search term was provided
        $search = $request->input('search');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('user_name', 'like', "%$search%")
                    ->orWhere('order_number', 'like', "%$search%");
            });
        }
        $sortField = $request->input('sort_field');
        $sortOrder = $request->input('sort_order', 'asc');
        if (!empty($sortField)) {
            $query->orderBy($sortField, $sortOrder);
        } else {
            $query->latest();
        }
        $items = $query->paginate(10)->appends([
            'search' => $search,
            'sort_field' => $sortField,
            'sort_order' => $sortOrder,
        ]);
        return $this->view('subscription.index', [
            'total' => $tcount,
            'items' => $items,
            'search' => $search,
            'sortField' => $sortField,
            'sortOrder' => $sortOrder,
        ]);
    }

    public function edit(Subscription $subscription)
    {
        return $this->view('subscription.edit', compact('subscription'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Subscription $subscription, Request $request)
    {
        // $validatedData = $request->validate(Subscription::$rules, Subscription::$messages);

        // $this->updateEntry($subscription, $validatedData);

        // return redirect_to_resource()->with('success', 'Update successfully.');

        $this->updateEntry($subscription, $request->all());

        return redirect_to_resource()->with('success', 'Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $Subscription, Request $request)
    {
        if ($Subscription->forceDelete()) {
            notify()->success('Successfully', 'The ' . $Subscription->user_name . ' has been removed');
        } else {
            notify()->error('Oops', 'We could not find the ' . $Subscription->user_name . ' to delete');
        }
        return redirect_to_resource()->with('delete', 'Delete successfully.');
    }

    public function export(Request $request)
    {
        $search = $request->input('search');
       return Excel::download(new SubscriptionsExport($search), 'Subscriptions.xlsx');
    }
}
