@extends('admin.admin')
@section('content')
<form class="card card-primary" method="POST" action="{{ isset($price_plan) ? route('price-plan.update', $price_plan->id) : route('price-plan.store') }}" accept-charset="UTF-8">
    <input name="_token" type="hidden" value="{{ csrf_token() }}">
    <input name="_method" type="hidden" value="{{ isset($price_plan) ? 'PUT' : 'POST' }}">
    <div class="card-header">
        <h3 class="card-title">
            <span><i class="fa fa-edit"></i></span>
            <span>{{ isset($price_plan) ? 'Edit the ' . $price_plan->title . ' entry' : 'Create a new Price Plan' }}</span>
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
                        <label for="properties_names">Plan Name</label>
                        <input type="text" name="plan_name" class="form-control " placeholder="Name" value="{{ old('name',  isset($price_plan) ? $price_plan->plan_name : '' )}}">
                        @error('plan_name')
                                    <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="properties_names">Plan Slug</label>
                        <input type="text" name="plan_slug" class="form-control " placeholder="Slug" value="{{ old('name', isset($price_plan) ? $price_plan->plan_slug : '' )}}">
                        @error('plan_slug')
                         <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="plan_description">Plan Description</label>
                        <input type="text" name="plan_description" class="form-control " placeholder="Decription" value="{{ old('name', isset($price_plan) ? $price_plan->plan_description : '') }}" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="plan_properties">Plan Properties</label>
                        <select class="custom-select rounded-0" name="plan_properties">
                            @forelse($priceplans as $priceplan)
                            <option value="{{ $priceplan->name }}" {{ isset($price_plan) ? ($priceplan->name == $price_plan->plan_properties ? 'selected' : '') : '' }}>
                                {{ $priceplan->name }}
                            </option>
                            @empty
                            <option>No Data Found</option>
                            @endforelse
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="is_free">Is Free</label>
                        <select id="yes-no-select" name="is_free" class="form-control">
                            <option value="0" @if (isset($price_plan) && $price_plan->plan_price != 0) selected @endif>No</option>
                            <option value="1" @if (isset($price_plan) && $price_plan->plan_price == 0) selected @endif>Yes</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="plan_price">Plan Price</label>
                        <input type="text" name="plan_price" class="form-control " placeholder="Price" value="{{ isset($price_plan) ? $price_plan->plan_price : '' }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="plan_tag">Plan Tag</label>
                        <input type="text" name="plan_tag" class="form-control" placeholder="Tag" value="{{ isset($price_plan) ? $price_plan->plan_tag : '' }}" >
                        @error('plan_tag')
                        <span class="text-danger">{{ $message }}</span>
                       @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="save_price">Save Price</label>
                        <input type="text" name="save_price" class="form-control " placeholder="Save Price" value="{{ isset($price_plan) ? $price_plan->save_price : '' }}">
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="order">Order</label>
                        <input type="number" name="order" class="form-control " placeholder="Order" value="{{ isset($price_plan) ? $price_plan->order : '' }}" >
                        @error('order')
                        <span class="text-danger">{{ $message }}</span>
                       @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sku">SKU</label>
                        <input type="number" name="sku" class="form-control " placeholder="sku" value="{{ old('name', isset($price_plan) ? $price_plan->sku : '' )}}" >
                        @error('sku')
                        <span class="text-danger">{{ $message }}</span>
                       @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="is_free">Period</label>
                        <select id="yes-no-select" name="period" class="form-control">
                            <option value="P7D" @if (isset($price_plan) && $price_plan->period == "P7D") selected @endif>Weekly</option>
                            <option value="P1M" @if (isset($price_plan) && $price_plan->period == "P1M") selected @endif>Monthly</option>
                            <option value="P1Y" @if (isset($price_plan) && $price_plan->period == "P1Y") selected @endif>Yearly</option>
                        </select>
                    </div>
                </div>
            </div>
        </fieldset>

    </div>
    <div class="row">
        <div class="col-md-6 text-right mb-1 ml-1">
            <a href="/admin/price-plan" class="btn btn-secondary">
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

<script>
    var isFreeDropdown = document.getElementById('yes-no-select');
    var planPriceInput = document.getElementsByName('plan_price')[0];
    var savePriceInput = document.getElementsByName('save_price')[0];
    isFreeDropdown.addEventListener('change', function() {
        if (isFreeDropdown.value == '1') { // if "Yes" is selected
            planPriceInput.disabled = true;
            planPriceInput.value = '';
            savePriceInput.disabled = true;
            savePriceInput.value = '';
        } else { // if "No" is selected
            planPriceInput.disabled = false;
            savePriceInput.disabled = false;
        }
    });
</script>
@endsection