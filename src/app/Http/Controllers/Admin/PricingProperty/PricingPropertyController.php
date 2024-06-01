<?php

namespace App\Http\Controllers\Admin\PricingProperty;
use App\Http\Controllers\Admin\AdminController;
use App\Models\PricingProperty;
use Illuminate\Http\Request;

class PricingPropertyController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        save_resource_url();
        return $this->view('plan-properties.index')->with('items', PricingProperty::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view('plan-properties.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, PricingProperty::$rules);

        PricingProperty::create($request->all(),PricingProperty::$errors);
        return redirect_to_resource()->with('success', 'Create Pricing Property successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PricingProperty $pricing_property)
    {
        return $this->view('plan-properties.show')->with('item', $pricing_property);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PricingProperty $pricing_property)
    {
        return $this->view('plan-properties.create_edit', compact('pricing_property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PricingProperty $pricing_property, Request $request)
    {
        $this->validate($request, PricingProperty::$rules);

        $this->updateEntry($pricing_property, $request->all());
        return redirect_to_resource()->with('success', 'Update Pricing Property successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PricingProperty $pricing_property, Request $request)
    {
        if($pricing_property->forceDelete()){
            notify()->success('Successfully', 'The '.$pricing_property->name. ' has been removed');
        }else{
            notify()->error('Oops', 'We could not find the '.$pricing_property->name. ' to delete');
        }
        return redirect_to_resource()->with('delete', 'Delete Pricing Property successfully.'); 
    }
}
