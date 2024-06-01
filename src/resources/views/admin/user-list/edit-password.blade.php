@extends('admin.admin')
@section('content')
    <form class="card card-primary" method="POST" action="{{ route('users.updatepassword', $user->id) }}"
        accept-charset="UTF-8">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <input name="id" type="hidden" value="{{ $user->id }}">
        <input name="_method" type="hidden" value="{{ isset($user) ? 'PUT' : 'POST' }}">
        <div class="card-header">
            <h3 class="card-title">
                <span><i class="fa fa-edit"></i></span>
                <span>Edit Users</span>
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
                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" placeholder=""
                                value="{{ $user->firstname }} {{ $user->lastname }}" readonly>
                        </div>
                    </div> --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm-password" placeholder="Confirm Password">
                            @error('confirm_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="checkbox">Send Mail to User</label>
                            <input type="hidden" name="checkbox" value="0">
                            <input type="checkbox" class="form-control" name="checkbox" value="1">
                        </div>
                    </div> --}}

                    <div class="row">
                        <section class="col col-6">
                            <section class=""> 
                            <div class="d-flex">
                                <div class="ml-1">
                                    <input name="checkbox" type="checkbox" value="1">
                                </div>
                                <div>
                                    <label class="ml-2">SendMail</label>
                                </div>
                            </div>

                            </section>
                        </section>
                    </div>
                    
                </div>
            </fieldset>
        </div>
        <div class="row">
            <div class="col-md-6 text-right mb-1 ml-1">
                <a href="/admin/users" class="btn btn-secondary">
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
