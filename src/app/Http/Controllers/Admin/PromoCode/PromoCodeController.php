<?php

namespace App\Http\Controllers\Admin\PromoCode;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Navigation;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CRUDNotify;
use App\Models\Grant;
use App\Models\PromoCode;
use Illuminate\Http\Request;

class PromoCodeController extends AdminController
{
    /**
     * Display a listing of promo_codes.
     *
     * @return Response
     */
    public function index()
    {
        save_resource_url();
        return $this->view('promo_codes.index')->with('items', PromoCode::all());
    }

    /**
     * Show the form for creating a new promo_codes.
     *
     * @return Response
     */
    public function create()
    {
        $data['name_properties'] = ['Page Name', 'Page Url', 'Url Aliases', 'Workstation Name'];
        $data['general_properties'] = ['Start Date', 'End Date', 'Hide?', 'Linked?'];
        $data['sorting_properties'] = ['Display Order', 'Sort Date', 'Last Published'];
        $data['search_engine_properties'] = ['Page Title', 'Metatag Keywords', 'Metatag Description'];
        $data['teaser_properties'] = ['Short Description', 'Long Description', 'Long Description', 'Teaser Image', 'Teaser Image Alt Text', 'Banner Image', 'Banner Image Alt Text'];
        $data['whats_new_properties'] = ['WNew?', 'WNew? End', 'WNew? New Image', 'WNew? New Image Text'];
        $data['advanced_properties'] = ['Page Layout', 'Comments and Ratings', 'Fav Icon', 'Credited Author', 'Nav Zones', 'SSL?', 'Priority', 'Display'];
        $data['option_properties'] = ['Audit?', 'Idx?', 'Prop?', 'Share?'];
        $data['custom_properties'] = ['Custom Nav Data 1', 'Custom Nav Data 2', 'Custom Nav Data 3', 'Custom Data 1', 'Custom Data 2', 'Custom Data 3', 'Custom Data 4', 'Custom Data 5'];
        $data['dynamic_properties'] = ['Ver Wk', 'Ver Dsp', 'Views', 'Last Changed', 'Edit Status'];
        $data['tags'] = ['Tags'];
        $data['display_securities'] = ['Security'];
        $data['workflow_assignments'] = ['Workflow Type', 'Authors', 'Editors', 'Item Admins'];
        $data['workflow_actions'] = ['Owner', 'Approvers', 'Step'];
        $data['promocode_infos'] = ['PromoCode', 'Discount', 'Expiration', 'DiscountType'];

        return $this->view('promo_codes.create_edit', ['data'=>$data]);
    }

    /**
     * Store a newly created promo_codes in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, PromoCode::$rules, PromoCode::$messages);

        $this->createEntry(PromoCode::class, $request->all());

        return redirect_to_resource();
    }

    /**
     * Display the specified promo_codes.
     *
     * @param promo_codes $promo_codes
     * @return Response
     */
    public function show(PromoCode $promo_code)
    {
        return $this->view('promo_codess.show')->with('item', $promo_code);
    }

    /**
     * Show the form for editing the specified promo_codes.
     *
     * @param promo_codes $promo_codes
     * @return Response
     */
    public function edit(PromoCode $promo_code)
    {
        $data['name_properties'] = ['Page Name', 'Page Url', 'Url Aliases', 'Workstation Name'];
        $data['general_properties'] = ['Start Date', 'End Date', 'Hide?', 'Linked?'];
        $data['sorting_properties'] = ['Display Order', 'Sort Date', 'Last Published'];
        $data['search_engine_properties'] = ['Page Title', 'Metatag Keywords', 'Metatag Description'];
        $data['teaser_properties'] = ['Short Description', 'Long Description', 'Long Description', 'Teaser Image', 'Teaser Image Alt Text', 'Banner Image', 'Banner Image Alt Text'];
        $data['whats_new_properties'] = ['WNew?', 'WNew? End', 'WNew? New Image', 'WNew? New Image Text'];
        $data['advanced_properties'] = ['Page Layout', 'Comments and Ratings', 'Fav Icon', 'Credited Author', 'Nav Zones', 'SSL?', 'Priority', 'Display'];
        $data['option_properties'] = ['Audit?', 'Idx?', 'Prop?', 'Share?'];
        $data['custom_properties'] = ['Custom Nav Data 1', 'Custom Nav Data 2', 'Custom Nav Data 3', 'Custom Data 1', 'Custom Data 2', 'Custom Data 3', 'Custom Data 4', 'Custom Data 5'];
        $data['dynamic_properties'] = ['Ver Wk', 'Ver Dsp', 'Views', 'Last Changed', 'Edit Status'];
        $data['tags'] = ['Tags'];
        $data['display_securities'] = ['Security'];
        $data['workflow_assignments'] = ['Workflow Type', 'Authors', 'Editors', 'Item Admins'];
        $data['workflow_actions'] = ['Owner', 'Approvers', 'Step'];
        $data['promocode_infos'] = ['PromoCode', 'Discount', 'Expiration', 'DiscountType'];

        $promo_code = PromoCode::getAllLists();

        return $this->view('promo_codes.create_edit', ['item'>$promo_code,'data'=>$data]);
    }

    /**
     * Update the specified promo_codes in storage.
     *
     * @param promo_codes  $promo_codes
     * @param Request $request
     * @return Response
     */
    public function update(PromoCode $promo_codes, Request $request)
    {
        $this->validate($request, PromoCode::$rules);

        $this->updateEntry($promo_codes, $request->all());

        return redirect_to_resource();
    }

    /**
     * Remove the specified promo_codes from storage.
     *
     * @param promo_codes  $promo_codes
     * @param Request $request
     * @return Response
     */
    public function destroy(PromoCode $promo_codes, Request $request)
    {
        $this->deleteEntry($promo_codes, $request);

        return redirect_to_resource();
    }
}
