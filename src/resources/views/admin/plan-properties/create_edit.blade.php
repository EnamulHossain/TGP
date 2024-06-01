@extends('admin.admin')
@section('content')
<form class="card card-primary" method="POST"
action="{{ isset($pricing_property) ? route('pricing-property.update', $pricing_property->id) : route('pricing-property.store') }}"
accept-charset="UTF-8">
<input name="_token" type="hidden" value="{{ csrf_token() }}">
<input name="_method" type="hidden" value="{{ isset($pricing_property) ? 'PUT' : 'POST' }}">
<div class="card-header">
    <h3 class="card-title">
        <span><i class="fa fa-edit"></i></span>
        <span>{{ isset($pricing_property) ? 'Edit the ' . $pricing_property->title . ' entry' : 'Create a new Pricing Propertty' }}</span>
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
                    <label for="properties_names">Name</label>
                    <input type="text" name="name" class="form-control " placeholder="Name" 
                        value="{{ isset($pricing_property) ? $pricing_property->name : '' }}">
                        @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="properties_names">Is Active</label>
                    {{-- <input type="text" name="is_active" class="form-control " placeholder="Is Active"
                    value="{{ isset($pricing_property) ? $pricing_property->is_active : '' }}"> --}}


                    <select id="yes-no-select" name="is_active" class="form-control">
                        <option value="1" @if (isset($pricing_property) && $pricing_property->is_active == 1) selected @endif>Yes</option>
                        <option value="0" @if (isset($pricing_property) && $pricing_property->is_active == 0) selected @endif>No</option>
                    </select>
                </div>
            </div>
        </div>
    </fieldset>

</div>
<div class="row">
    <div class="col-md-6 text-right mb-1 ml-1">
        <a href="/admin/pricing-property" class="btn btn-secondary">
            <i class="fa fa-fw fa-chevron-left"></i> Back
        </a>
    </div>
    <div class="text-right mb-1">
        <button type="submit" class="btn btn-primary btn-submit">
            <i class="fa fa-fw fa-save"></i> Submit
        </button>
    </div>
</div>
</form>
@endsection
