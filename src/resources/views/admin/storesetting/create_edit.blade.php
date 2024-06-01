@extends('admin.admin')
@section('content')
<form class="card card-primary" method="POST"
action="{{ isset($storeSetting) ? route('store-setting.update', $storeSetting->id) : route('store-setting.store') }}"
accept-charset="UTF-8">
<input name="_token" type="hidden" value="{{ csrf_token() }}">
<input name="_method" type="hidden" value="{{ isset($storeSetting) ? 'PUT' : 'POST' }}">
<div class="card-header">
    <h3 class="card-title">
        <span><i class="fa fa-edit"></i></span>
        <span>{{ isset($storeSetting) ? 'Edit the ' . $storeSetting->title . ' entry' : 'Create a new Pricing Propertty' }}</span>
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
                    <label for="store_name">Store Name</label>
                    <input type="text" name="store_name" class="form-control " placeholder="Store Name" 
                        value="{{ isset($storeSetting) ? $storeSetting->store_name : '' }}">
                        @error('store_name')
                         <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="store_url">Store Url</label>
                    <input type="url" name="store_url" class="form-control " placeholder="Store Url" 
                        value="{{ isset($storeSetting) ? $storeSetting->store_url : '' }}">
                        @error('store_url')
                        <span class="text-danger">{{ $message }}</span>
                       @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="app_name">App Name</label>
                    <input type="text" name="app_name" class="form-control " placeholder="App Name" 
                        value="{{ isset($storeSetting) ? $storeSetting->app_name : '' }}">
                        @error('app_name')
                        <span class="text-danger">{{ $message }}</span>
                       @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="token">Token</label>
                    <input type="text" name="token" class="form-control " placeholder="Token" 
                        value="{{ isset($storeSetting) ? $storeSetting->token : '' }}">
                        @error('token')
                        <span class="text-danger">{{ $message }}</span>
                       @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="private_key">Private Key</label>
                    <input type="text" name="private_key" class="form-control " placeholder="Private Key" 
                        value="{{ isset($storeSetting) ? $storeSetting->private_key : '' }}">
                        @error('private_key')
                        <span class="text-danger">{{ $message }}</span>
                       @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="public_key">Public Key</label>
                    <input type="text" name="public_key" class="form-control " placeholder="Public Key" 
                        value="{{ isset($storeSetting) ? $storeSetting->public_key : '' }}">
                        @error('public_key')
                        <span class="text-danger">{{ $message }}</span>
                       @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="host">Host</label>
                    <input type="text" name="host" class="form-control " placeholder="Host" 
                        value="{{ isset($storeSetting) ? $storeSetting->host : '' }}">
                        @error('host')
                        <span class="text-danger">{{ $message }}</span>
                       @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="is_active">Is Active</label>
                    <select id="yes-no-select" name="is_active" class="form-control">
                        <option value="1" @if (isset($storeSetting) && $storeSetting->is_active == '1') selected @endif>Yes</option>
                        <option value="0" @if (isset($storeSetting) && $storeSetting->is_active != '1') selected @endif>No</option>
                    </select>
                    @error('is_active')
                        <span class="text-danger">{{ $message }}</span>
                       @enderror
                </div>
            </div>
        </div>
    </fieldset>

</div>
<div class="row">
    <div class="col-md-6 text-right mb-1 ml-1">
        <a href="/admin/store-setting" class="btn btn-secondary">
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
