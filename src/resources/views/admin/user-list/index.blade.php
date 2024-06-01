@extends('admin.admin')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Users</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('users.index') }}" class="form-inline mb-3">
                <div class="input-group input-group-sm">
                    <input type="text" name="search" class="form-control" placeholder="Search" value="{{ $search }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            <a href="{{ route('users.export', ['search' => $search]) }}" class="btn btn-primary ml-2">Export</a>
            </form>
            <table id="tbl-lists" data-page-length="25"
                class=" table table-sm table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            <a href="{{ route('users.index', ['sort_by' => 'firstname', 'sort_direction' => $sortBy == 'firstname' && $sortDirection == 'asc' ? 'desc' : 'asc']) }}">
                                First Name
                                @if ($sortBy == 'firstname')
                                    @if ($sortDirection == 'asc')
                                        <i class="fas fa-sort-up"></i>
                                    @else
                                        <i class="fas fa-sort-down"></i>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('users.index', ['sort_by' => 'lastname', 'sort_direction' => $sortBy == 'lastname' && $sortDirection == 'asc' ? 'desc' : 'asc']) }}">
                                Last Name
                                @if ($sortBy == 'lastname')
                                    @if ($sortDirection == 'asc')
                                        <i class="fas fa-sort-up"></i>
                                    @else
                                        <i class="fas fa-sort-down"></i>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('users.index', ['sort_by' => 'email', 'sort_direction' => $sortBy == 'email' && $sortDirection == 'asc' ? 'desc' : 'asc']) }}">
                                Email
                                @if ($sortBy == 'email')
                                    @if ($sortDirection == 'asc')
                                        <i class="fas fa-sort-up"></i>
                                    @else
                                        <i class="fas fa-sort-down"></i>
                                    @endif
                                @endif
                            </a>
                        </th>
                        {{-- <th>Role</th> --}}
                        <th>
                            <a href="{{ route('users.index', ['sort_by' => 'logged_in_at', 'sort_direction' => $sortBy == 'logged_in_at' && $sortDirection == 'asc' ? 'desc' : 'asc']) }}">
                                Last Log In
                                @if ($sortBy == 'logged_in_at')
                                    @if ($sortDirection == 'asc')
                                        <i class="fas fa-sort-up"></i>
                                    @else
                                        <i class="fas fa-sort-down"></i>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $item->firstname }}</td>
                            <td>{{ $item->lastname }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->logged_in_at }}</td>
                            <td>
                                <div class="" style="display: inline-block;">
                                    <a href="/admin/users/{{ $item->id }}/edit" class="btn btn-info btn-xs" data-toggle="tooltip" title="Crop {{ $item->firstname }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="/admin/users/{{ $item->id }}/editpassword" class="btn btn-info btn-xs" data-toggle="tooltip" title="Crop {{ $item->firstname }}">
                                        <i class="fas fa-edit"></i> Change Password
                                    </a>
                                    <a href="/admin/users/{{ $item->id }}/resend-verification" class="btn btn-info btn-xs" data-toggle="tooltip" title="Crop {{ $item->firstname }}">
                                        <i class="fas fa-edit"></i> Resend Verification
                                    </a>
                                    <form class="" action="{{ route('users.destroy', $item->id) }}" method="POST" style="display: inline-block;" id="delete-form-{{ $item->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-xs" title="Delete {{ $item->firstname }}" onclick="confirmDelete({{ $item->id }}, '{{ $item->firstname }}')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>

                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>

                            <script>
                                function confirmDelete(itemId, itemName) {
                                    Swal.fire({
                                        title: 'Are you sure?',
                                        text: 'You are about to delete ' + itemName,
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Yes, delete it!',
                                        cancelButtonText: 'Cancel'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // User clicked "Yes"
                                            // Submit the form to delete the item
                                            document.getElementById('delete-form-' + itemId).submit();
                                        }
                                    });
                                }
                            </script>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination justify-content-end mt-4">
                <div class="pagination justify-content-end mt-2">
                    <span class="text-muted">Showing</span>
                    <span class="mx-2">{{{ count($users) }}}</span>
                    <span class="text-muted">of</span>
                    <span class="mx-2">{{$total}}</span>
                </div>
                {{ $users->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
