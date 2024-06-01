@extends('admin.admin')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <span>List All Subscriber</span>
            </h3>
        </div>

        <div class="card-body">
            <form method="GET" action="{{ route('subscriber.index') }}" class="form-inline mb-3">
                <div class="input-group input-group-sm">
                    <input type="text" name="search" class="form-control" placeholder="Search"
                        value="{{ $search }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <a href="{{ route('subscriber.export', ['search' => $search]) }}" class="btn btn-primary ml-2">Export</a>
            </form>
            <table id="" data-server="false" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>
                            <a href="{{ route('subscriber.index', ['sort_field' => 'id', 'sort_order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}">
                                Subscriber Id
                                @if ($sortField === 'id')
                                    @if ($sortOrder === 'asc')
                                        <i class="fa fa-sort-asc"></i>
                                    @else
                                        <i class="fa fa-sort-desc"></i>
                                    @endif
                                @else
                                    <i class="fa fa-sort"></i>
                                @endif
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('subscriber.index', ['sort_field' => 'first_name', 'sort_order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}">
                                Full Name
                                @if ($sortField === 'first_name')
                                    @if ($sortOrder === 'asc')
                                        <i class="fa fa-sort-asc"></i>
                                    @else
                                        <i class="fa fa-sort-desc"></i>
                                    @endif
                                @else
                                    <i class="fa fa-sort"></i>
                                @endif
                            </a>
                        </th>
                        <th>
                            <a href="{{ route('subscriber.index', ['sort_field' => 'email', 'sort_order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}">
                                Email
                                @if ($sortField === 'email')
                                    @if ($sortOrder === 'asc')
                                        <i class="fa fa-sort-asc"></i>
                                    @else
                                        <i class="fa fa-sort-desc"></i>
                                    @endif
                                @else
                                    <i class="fa fa-sort"></i>
                                @endif
                            </a>
                        </th>                        
                        <th>
                            <a href="{{ route('subscriber.index', ['sort_field' => 'company', 'sort_order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}">
                                Company
                                @if ($sortField === 'company')
                                    @if ($sortOrder === 'asc')
                                        <i class="fa fa-sort-asc"></i>
                                    @else
                                        <i class="fa fa-sort-desc"></i>
                                    @endif
                                @else
                                    <i class="fa fa-sort"></i>
                                @endif
                            </a>
                        </th>

                        <th>
                            <a href="{{ route('subscriber.index', ['sort_field' => 'order_key', 'sort_order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}">
                                Order Key
                                @if ($sortField === 'order_key')
                                    @if ($sortOrder === 'asc')
                                        <i class="fa fa-sort-asc"></i>
                                    @else
                                        <i class="fa fa-sort-desc"></i>
                                    @endif
                                @else
                                    <i class="fa fa-sort"></i>
                                @endif
                            </a>
                        </th>

                        <th>
                            <a href="{{ route('subscriber.index', ['sort_field' => 'customer_id', 'sort_order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}">
                                Customer Id
                                @if ($sortField === 'customer_id')
                                    @if ($sortOrder === 'asc')
                                        <i class="fa fa-sort-asc"></i>
                                    @else
                                        <i class="fa fa-sort-desc"></i>
                                    @endif
                                @else
                                    <i class="fa fa-sort"></i>
                                @endif
                            </a>
                        </th>

                        <th>
                            <a href="{{ route('subscriber.index', ['sort_field' => 'is_active', 'sort_order' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}">
                                Status
                                @if ($sortField === 'is_active')
                                    @if ($sortOrder === 'asc')
                                        <i class="fa fa-sort-asc"></i>
                                    @else
                                        <i class="fa fa-sort-desc"></i>
                                    @endif
                                @else
                                    <i class="fa fa-sort"></i>
                                @endif
                            </a>
                        </th>
                        
                        
                        
                        
                        <th style="min-width: 125px;">Action</th>
                    </tr>
                </thead>
                
                <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td> <strong> {{ $item->id }} </strong> </td>
                        <td>{{ $item->first_name.' '.$item->last_name }} </td>
                        <td>{{ $item->email}} </td>
                        <td>{{ $item->company}} </td>
                        <td>{{ $item->order_key}} </td>
                        <td>{{ $item->customer_id}} </td>
                        <td>
                            @if ($item->is_active == 0)
                            Free
                            @else
                            Paid
                            @endif
                        </td>
                        <td>
                            <div class="" style="display: inline-block;">
                                <a href="/admin/subscriber/{{ $item->id }}/edit" class="btn btn-info btn-xs"
                                    data-toggle="tooltip" title="Crop {{ $item->first_name }}">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <form style="display: inline-block;" class="delete-form" action="{{ route('subscriber.destroy', $item->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-xs" title="Delete {{ $item->plan_name }}">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
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
                        </td>
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
