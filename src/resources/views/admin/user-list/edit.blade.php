@extends('admin.admin')
@section('content')
    <form class="card card-primary" method="POST" action="{{ route('users.update', $user->id) }}"
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="firstname" class="form-control " placeholder="First Name"
                                value="{{ $user->firstname }}">
                            @error('firstname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" class="form-control " placeholder="Last Name"
                                value="{{ $user->lastname }}">
                            @error('lastname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control " placeholder="Email" readonly
                                value="{{ $user->email }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Status</label>
                            <select class="form-control" name="is_mfa_verified" id="is_mfa_verified">
                                <option value="1" {{ $user->is_mfa_verified == 1 ? 'selected' : '' }}>Verified</option>
                                <option value="0" {{ $user->is_mfa_verified == 0 ? 'selected' : '' }}>Pending</option>
                            </select>
                            @error('is_mfa_verified')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="custom-select rounded-0 select2" name="roles[]" multiple
                                placeholder="Select a Role">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"
                                        {{ $currentRole->contains($role->id) ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
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
