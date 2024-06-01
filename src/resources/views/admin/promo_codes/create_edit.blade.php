@extends('admin.admin')

@section('content')

    {{-- <form class="card card-primary" method="POST" action="{{$selectedNavigation->url . (isset($item)? "/{$item->id}" : '')}}" accept-charset="UTF-8" enctype="multipart/form-data"> --}}
    <form class="card card-primary" method="POST" action="{{isset($item)? route('promo-code.update'.$item->id) : route('promo-code.store')}}" accept-charset="UTF-8" enctype="multipart/form-data">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <input name="_method" type="hidden" value="{{isset($item)? 'PUT':'POST'}}">

        <div class="card-header">
            <h3 class="card-title">
                <span><i class="fa fa-edit"></i></span>
                <span>{{ isset($item)? 'Edit the ' . $item->title . ' entry': 'Create a new Promo code' }}</span>
            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            @include('admin.partials.card.info')

            <fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="properties_names">Properties Names</label>
                            {!! form_select('properties_names', ([0 => 'Please select a properties name'] + $data['name_properties']), ($errors && $errors->any()? old('properties_names') : (isset($item)? $item->properties_names : '')), ['class' => 'select2 form-control '.form_error_class('properties_names', $errors) ]) !!}
                            {!! form_error_message('properties_names', $errors) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="properties_general">Properties General</label>
                            {!! form_select('properties_general', ([0 => 'Please select a properties general'] + $data['general_properties']), ($errors && $errors->any()? old('properties_general') : (isset($item)? $item->properties_general : '')), ['class' => 'select2 form-control '.form_error_class('properties_general', $errors) ]) !!}
                            {!! form_error_message('properties_general', $errors) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="properties_sorting">Properties Sortings</label>
                            {!! form_select('properties_sorting', ([0 => 'Please select a properties sortings'] + $data['sorting_properties']), ($errors && $errors->any()? old('properties_sorting') : (isset($item)? $item->properties_sorting : '')), ['class' => 'select2 form-control '.form_error_class('properties_sorting', $errors) ]) !!}
                            {!! form_error_message('properties_sorting', $errors) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="properties_search_engine">Properties Search Engine</label>
                            {!! form_select('properties_search_engine', ([0 => 'Please select a properties search engine'] + $data['search_engine_properties']), ($errors && $errors->any()? old('properties_search_engine') : (isset($item)? $item->properties_search_engine : '')), ['class' => 'select2 form-control '.form_error_class('properties_search_engine', $errors) ]) !!}
                            {!! form_error_message('properties_search_engine', $errors) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="properties_teaser">Properties Teaser</label>
                            {!! form_select('properties_teaser', ([0 => 'Please select a properties teaser'] + $data['teaser_properties']), ($errors && $errors->any()? old('properties_teaser') : (isset($item)? $item->properties_teaser : '')), ['class' => 'select2 form-control '.form_error_class('properties_teaser', $errors) ]) !!}
                            {!! form_error_message('properties_teaser', $errors) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="properties_whats_new">Properties Whats New</label>
                            {!! form_select('properties_whats_new', ([0 => 'Please select a properties whats new'] + $data['whats_new_properties']), ($errors && $errors->any()? old('properties_whats_new') : (isset($item)? $item->properties_whats_new : '')), ['class' => 'select2 form-control '.form_error_class('properties_whats_new', $errors) ]) !!}
                            {!! form_error_message('properties_whats_new', $errors) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="properties_advanced">Properties Advanced</label>
                            {!! form_select('properties_advanced', ([0 => 'Please select a properties advanced'] + $data['advanced_properties']), ($errors && $errors->any()? old('properties_advanced') : (isset($item)? $item->properties_advanced : '')), ['class' => 'select2 form-control '.form_error_class('properties_advanced', $errors) ]) !!}
                            {!! form_error_message('properties_advanced', $errors) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="properties_options">Properties Options</label>
                            {!! form_select('properties_options', ([0 => 'Please select a properties options'] + $data['option_properties']), ($errors && $errors->any()? old('properties_options') : (isset($item)? $item->properties_options : '')), ['class' => 'select2 form-control '.form_error_class('properties_options', $errors) ]) !!}
                            {!! form_error_message('properties_options', $errors) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="properties_custom">Properties Custom</label>
                            {!! form_select('properties_custom', ([0 => 'Please select a properties custom'] + $data['custom_properties']), ($errors && $errors->any()? old('properties_custom') : (isset($item)? $item->properties_custom : '')), ['class' => 'select2 form-control '.form_error_class('properties_custom', $errors) ]) !!}
                            {!! form_error_message('properties_custom', $errors) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="properties_dynamic">Properties Dynamic</label>
                            {!! form_select('properties_dynamic', ([0 => 'Please select a properties dynamic'] + $data['dynamic_properties']), ($errors && $errors->any()? old('properties_dynamic') : (isset($item)? $item->properties_dynamic : '')), ['class' => 'select2 form-control '.form_error_class('properties_dynamic', $errors) ]) !!}
                            {!! form_error_message('properties_dynamic', $errors) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                   
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tags">Tags </label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="tags" class="custom-control-input" id="tags" {!! ($errors && $errors->any()? (old('tags') == 'Tags'? 'checked':'') : (isset($item)&& $item->tags == 'Tags'? 'checked' : '' )) !!}>
                                <label class="custom-control-label" for="tags">Tags</label>
                                {!! form_error_message('tags', $errors) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tags">Display security </label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="display_security" class="custom-control-input" id="display_security" {!! ($errors && $errors->any()? (old('display_security') == 'Security'? 'checked':'') : (isset($item)&& $item->display_security == 'Security'? 'checked' : '' )) !!}>
                                <label class="custom-control-label" for="display_security">Security</label>
                                {!! form_error_message('display_security', $errors) !!}
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="display_security">Properties display security</label>
                            {!! form_select('display_security', ([0 => 'Please select a display security'] + $data['display_securities']), ($errors && $errors->any()? old('display_security') : (isset($item)? $item->display_security : '')), ['class' => 'select2 form-control '.form_error_class('display_security', $errors) ]) !!}
                            {!! form_error_message('display_security', $errors) !!}
                        </div>
                    </div> --}}
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="workflow_assingments">Properties workflow actions</label>
                            {!! form_select('workflow_assingments', ([0 => 'Please select a properties workflow actions'] + $data['workflow_assignments']), ($errors && $errors->any()? old('workflow_assingments') : (isset($item)? $item->workflow_assingments : '')), ['class' => 'select2 form-control '.form_error_class('workflow_assingments', $errors) ]) !!}
                            {!! form_error_message('workflow_assingments', $errors) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="workflow_actions">Properties workflow actions</label>
                            {!! form_select('workflow_actions', ([0 => 'Please select a properties workflow actions'] + $data['workflow_actions']), ($errors && $errors->any()? old('workflow_actions') : (isset($item)? $item->workflow_actions : '')), ['class' => 'select2 form-control '.form_error_class('workflow_actions', $errors) ]) !!}
                            {!! form_error_message('workflow_actions', $errors) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="promo_code_info">Properties promocode info</label>
                            {!! form_select('promo_code_info', ([0 => 'Please select a properties promocode info'] + $data['promocode_infos']), ($errors && $errors->any()? old('promo_code_info') : (isset($item)? $item->promo_code_info : '')), ['class' => 'select2 form-control '.form_error_class('promo_code_info', $errors) ]) !!}
                            {!! form_error_message('promo_code_info', $errors) !!}
                        </div>
                    </div>
                  
                </div>

               
            </fieldset>

        </div>
        @include('admin.partials.form.form_footer')
    </form>

@endsection

@section('scripts')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function () {
            setDateTimePickerRange('#active_from', '#active_to');
        })
    </script>
@endsection
