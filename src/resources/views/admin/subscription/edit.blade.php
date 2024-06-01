@extends('admin.admin')
@section('content')
<form class="card card-primary" method="POST" action="{{ route('subscriptions.update', $subscription->id) }}" accept-charset="UTF-8">
    <input name="_token" type="hidden" value="{{ csrf_token() }}">
    <input name="_method" type="hidden" value="{{'PUT'}}">
    <div class="card-header">
        <h3 class="card-title">
            <span><i class="fa fa-edit"></i></span>
            <span>Edit the subscriber</span>
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
                        <label for="user_name">User Name</label>
                        <input type="text" name="user_name" class="form-control" value="{{ $subscription->user_name }}">
                        @error('user_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tax">Type</label>
                        <select name="type" class="form-control">
                            <option disabled selected>Select</option>
                            <option value="Weekly" {{ $subscription->type == 'Weekly' ? 'selected' : '' }}>Weekly</option>
                            <option value="Monthly" {{ $subscription->type == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                            <option value="Yearly" {{ $subscription->type == 'Yearly' ? 'selected' : '' }}>Yearly</option>
                        </select>
                        @error('type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="order_number">Order Number</label>
                        <input type="number" name="order_number" class="form-control" value="{{ $subscription->order_number }}">
                        @error('order_number')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="subtotal">Subtotal</label>
                        <input type="number" name="subtotal" class="form-control" value="{{ $subscription->subtotal }}">
                        @error('subtotal')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tax">Tax</label>
                        <input type="number" name="tax" class="form-control" value="{{ $subscription->tax }}">
                        @error('tax')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="expired_at">Expired At</label>
                        <input type="date" name="expired_at" class="form-control" value="{{ date('Y-m-d', strtotime($subscription->expired_at)) }}">
                        @error('expired_at')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>                
            </div>
        </fieldset>
    </div>
    <div class="row">
        <div class="col-md-6 text-right mb-1 ml-1">
            <a href="/admin/subscription" class="btn btn-secondary">
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