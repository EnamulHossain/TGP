<?php

namespace App\Http\Controllers\Admin\PricePlan;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Navigation;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CRUDNotify;
use App\Models\Grant;
use App\Models\PricePlan;
use App\Models\PricingProperty;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PricePlanController extends AdminController

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        save_resource_url();
        return $this->view('price_plan.index')->with('items', PricePlan::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $priceplans = PricingProperty::query()->where('is_active', 1)->get();
        return $this->view('price_plan.create_edit', compact('priceplans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, PricePlan::$rules);

        PricePlan::create($request->all(), PricePlan::$rules, PricePlan::$message);
        return redirect_to_resource()->with('success', 'Created Price Plan successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  price_plans  $price_plans
     * @return Response
     */
    public function show(PricePlan $price_plan)
    {
        return $this->view('price_plan.show')->with('item', $price_plan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  promo_plans  $price_plans
     * @return Response
     */
    public function edit(PricePlan $price_plan)
    {
        $priceplans = PricingProperty::query()->where('is_active', 1)->get();
        return $this->view('price_plan.create_edit', compact('price_plan','priceplans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param price_plans  $price_plans
     * @param Request $request
     * @return Response
     */
    public function update(PricePlan $price_plan, Request $request)
    {
        $this->validate($request, PricePlan::$rules);

        $this->updateEntry($price_plan, $request->all());

        return redirect_to_resource()->with('success', 'Update Price Plan successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param price_plans  $promo_codes
     * @param Request $request
     * @return Response
     */
    public function destroy(PricePlan $price_plan, Request $request)
    {
        if($price_plan->forceDelete()){
            notify()->success('Successfully', 'The '.$price_plan->plan_name. ' has been removed');
        }else{
            notify()->error('Oops', 'We could not find the '.$price_plan->plan_name. ' to delete');
        }
        // $this->deleteEntry($price_plan, $request);

        return redirect_to_resource()->with('success', 'Delete Price Plan successfully.');
    }
}
