@extends('admin.admin')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">List For Store Setting</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <a href="/admin/store-setting/create" class="btn btn-primary btn-xs mb-2 p-1"> + Create Store Setting</a>
        <table id="tbl-list" data-page-length="25"
            class="dt-table table table-sm table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Store Name</th>
                    <th>Store Url</th>
                    <th>Token</th>
                    <th>Private Key</th>
                    <th>Host</th>
                    <th>Is Active</th>
                    <th style="min-width: 125px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->store_name }}</td>
                        <td>{{ $item->store_url }}</td>
                        <td>{{ $item->token }}</td>
                        <td>{{ $item->private_key }}</td>
                        <td>{{ $item->host }}</td>
                        @if ($item->is_active == 1)
                            <td>Yes</td>
                         @else 
                            <td>No</td>
                        @endif
                        <td>
                            <div class="" style="display: inline-block;">
                                <a href="/admin/store-setting/{{ $item->id }}/edit" class="btn btn-info btn-xs"
                                    data-toggle="tooltip" title="Crop {{ $item->store_name }}">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <form style="display: inline-block;" class="delete-form" action="{{ route('store-setting.destroy', $item->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-xs" title="Delete {{ $item->name }}">
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
    </div>
</div>
@endsection
