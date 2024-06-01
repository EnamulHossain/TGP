<?php

namespace App\Http\Controllers\Admin\Settings;
use App\Http\Controllers\Admin\AdminController;
use App\Models\StoreSetting;
use Illuminate\Http\Request;

class StoreSettingController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        save_resource_url();
        return $this->view('storesetting.index')->with('items', StoreSetting::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view('storesetting.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, StoreSetting::$rules);

        StoreSetting::create($request->all(), StoreSetting::$messages);
        return redirect_to_resource()->with('success', 'Created Store Setting successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(StoreSetting $storeSetting)
    {
        return $this->view('storesetting.show')->with('item', $storeSetting);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(StoreSetting $storeSetting)
    {
        return $this->view('storesetting.create_edit', compact('storeSetting'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSetting $storeSetting ,Request $request)
    {
        $this->validate($request, StoreSetting::$rules);

        $this->updateEntry($storeSetting, $request->all());
        return redirect_to_resource()->with('success', 'Update Store Setting successfully.');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoreSetting $storeSetting ,Request $request)
    {
        if($storeSetting->forceDelete()){
            notify()->success('Successfully', 'The '.$storeSetting->store_name. ' has been removed');
        }else{
            notify()->error('Oops', 'We could not find the '.$storeSetting->store_name. ' to delete');
        }
        return redirect_to_resource()->with('success', 'Delete Store Setting successfully.');
    }
}
