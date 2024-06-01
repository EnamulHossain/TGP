@extends('admin.admin')
@section('content')
<form class="card card-primary" method="POST" action="{{ route('subscriber.update', $subscriber->id)}}" accept-charset="UTF-8">
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
                        <label for="">First Name</label>
                        <input type="text" name="first_name" class="form-control " placeholder="" value="{{$subscriber->first_name}}">
                        @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" class="form-control " placeholder="" value="{{$subscriber->last_name}}">
                        @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control " placeholder="" value="{{$subscriber->email}}">
                        @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="company">Company</label>
                        <input type="text" name="company" class="form-control " placeholder="company" value="{{$subscriber->company}}">
                        @error('company')
                                    <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address_line_1">Order Key</label>
                        <input type="text" name="order_key" class="form-control " placeholder="" value="{{$subscriber->order_key}}">
                        @error('order_key')
                                    <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="customer_id">Customer Id</label>
                        <input type="text" name="customer_id" class="form-control " placeholder="" value="{{$subscriber->customer_id}}">
                        @error('customer_id')
                                    <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address_line_1">Address</label>
                        <input type="text" name="address_line_1" class="form-control " placeholder="" value="{{$subscriber->address_line_1}}">
                        @error('address_line_1')
                                    <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" name="state" class="form-control " placeholder="" value="{{$subscriber->state}}">
                        @error('state')
                                    <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" name="city" class="form-control " placeholder="city" value="{{$subscriber->city}}">
                        @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="state">Postal Code</label>
                        <input type="number" name="postal_code" class="form-control " placeholder="" value="{{$subscriber->postal_code}}">
                        @error('postal_code')
                                    <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="is_active">Status</label>
                <select name="is_active" class="form-control">
                    <option value="1" {{$subscriber->is_active ? 'selected' : ''}}>Paid</option>
                    <option value="0" {{!$subscriber->is_active ? 'selected' : ''}}>Free</option>
                </select>
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
@endsection