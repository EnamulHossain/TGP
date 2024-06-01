@extends('admin.admin')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <span>List All Subscriptions</span>
            </h3>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('subscriptions.index') }}" class="form-inline mb-3">
                <div class="input-group input-group-sm">
                    <input type="text" name="search" class="form-control" placeholder="Search"
                        value="{{ $search }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <a href="{{ route('subscriptions.export', ['search' => $search]) }}" class="btn btn-primary ml-2">Export</a>
            </form>
            <table id="tbl-lists" data-server="false" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th><a href="{{ route('subscriptions.index', ['sort_field' => 'user_name', 'sort_order' => $sortField == 'user_name' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}">User Name</a></th>
                    <th><a href="{{ route('subscriptions.index', ['sort_field' => 'type', 'sort_order' => $sortField == 'type' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}">Type</a></th>
                    <th><a href="{{ route('subscriptions.index', ['sort_field' => 'order_number', 'sort_order' => $sortField == 'order_number' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}">Order Number</a></th>
                    <th><a href="{{ route('subscriptions.index', ['sort_field' => 'subtotal', 'sort_order' => $sortField == 'subtotal' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}">Subtotal</a></th>
                    <th><a href="{{ route('subscriptions.index', ['sort_field' => 'tax', 'sort_order' => $sortField == 'tax' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}">Tax</a></th>
                    <th><a href="{{ route('subscriptions.index', ['sort_field' => 'expired_at', 'sort_order' => $sortField == 'expired_at' && $sortOrder == 'asc' ? 'desc' : 'asc']) }}">Expired At </a></th>
                    
                    <th style="min-width: 50px;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->user_name }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->order_number }}</td>
                        <td>{{ $item->subtotal }}</td>
                        <td>{{ $item->tax }}</td>
                        @if($item->expired_at)
                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->expired_at)->format('D, F j, Y') }}</td>
                        @else
                        <td></td>
                        @endif
                        <td>
                            <div class="" style="display: inline-block;">
                                <a href="/admin/subscriptions/{{ $item->id }}/edit" class="btn btn-info btn-xs"
                                    data-toggle="tooltip" title="Crop {{ $item->user_name }}">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <form style="display: inline-block;" class="delete-form" action="{{ route('subscriptions.destroy', $item->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-xs" title="Delete {{ $item->plan_name }}">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                        <script>
                            // Handle the delete button click event
                            document.addEventListener('DOMContentLoaded', function() {
                                const deleteForms = document.querySelectorAll('.delete-form');
                                deleteForms.forEach(form => {
                                    form.addEventListener('submit', function(e) {
                                        e.preventDefault();
                                        const currentForm = this;

                                        // Show confirmation dialog
                                        Swal.fire({
                                            title: 'Are you sure?',
                                            text: "You won't be able to revert this!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Yes, delete it!',
                                            cancelButtonText: 'Cancel'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                // If confirmed, submit the form
                                                currentForm.submit();
                                            }
                                        });
                                    });
                                });
                            });
                        </script>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagination justify-content-end mt-4">
                <div class="pagination justify-content-end mt-2">
                    <span class="text-muted">Showing</span>
                    <span class="mx-2">{{{ count($items) }}}</span>
                    <span class="text-muted">of</span>
                    <span class="mx-2">{{$total}}</span>
                </div>
                {{ $items->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
