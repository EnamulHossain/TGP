<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SubscriberExport;
use Image;
use App\Models\User;
use App\Http\Requests;
use App\Models\Subscriber;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SubscriberController extends AdminController
{
    public function index(Request $request)
    {
        save_resource_url();
        $tcount = Subscriber::count();
        $query = Subscriber::select('*');


        // Check if a search term was provided
        $search = $request->input('search');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('id', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('company', 'like', "%$search%")
                    ->orWhere('city', 'like', "%$search%")
                    ->orWhere('state', 'like', "%$search%")
                    ->orWhere('postal_code', 'like', "%$search%")
                    ->orWhere('order_key', 'like', "%$search%")
                    ->orWhere('first_name', 'like', "%$search%")
                    ->orWhere('last_name', 'like', "%$search%");
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

        return $this->view('subscriber.index', [
            'total' => $tcount,
            'items' => $items,
            'search' => $search,
            'sortField' => $sortField,
            'sortOrder' => $sortOrder,
        ]);
    }

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
    public function edit(Subscriber $subscriber)
    {
        return $this->view('subscriber.edit', compact('subscriber'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Subscriber $subscriber, Request $request)
    {
        // dd($request);
        $validatedData = $request->validate(Subscriber::$rules, Subscriber::$messages);

        $this->updateEntry($subscriber, $validatedData);

        return redirect_to_resource()->with('success', 'Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber, Request $request)
    {
        if ($subscriber->forceDelete()) {
            notify()->success('Successfully', 'The ' . $subscriber->first_name . ' has been permanently removed');
        } else {
            notify()->error('Oops', 'We could not find the ' . $subscriber->first_name . ' to delete');
        }
        return redirect_to_resource()->with('delete', 'Subscriber deleted successfully.');
    }

    public function export(Request $request)
    {
        $search = $request->input('search');
       return Excel::download(new SubscriberExport($search), 'Subscriber.xlsx');
    }
}
