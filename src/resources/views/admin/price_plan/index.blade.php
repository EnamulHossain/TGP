@extends('admin.admin')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">List For Price & Plans</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        @if (Session::get('success'))
        <br>
            <div class="alert alert-info">{{ Session::get('success') }}</div>
        @endif


        <div class="card-body">

            <a href="/admin/price-plan/create" class="btn btn-primary btn-xs mb-2 p-1"> + Create Price Plans</a>

            <table id="tbl-list" data-page-length="25"
                class="dt-table table table-sm table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>SKU</th>
                        <th>Price</th>
                        <th>Tag</th>
                        <th>Save Price</th>
                        <th>Order</th>
                        <th style="min-width: 125px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->plan_name }}</td>
                            <td>{{ $item->plan_slug }}</td>
                            <td>{{ $item->sku }}</td>
                            <td>{{ $item->plan_price }}</td>
                            <td>{{ $item->plan_tag }}</td>
                            <td>{{ $item->save_price }}</td>
                            <td>{{ $item->order }}</td>
                            <td>
                                <div class="" style="display: inline-block;">
                                    <a href="/admin/price-plan/{{ $item->id }}/edit" class="btn btn-info btn-xs"
                                        data-toggle="tooltip" title="Crop {{ $item->plan_name }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <form style="display: inline-block;" class="delete-form" action="{{ route('price-plan.destroy', $item->id) }}"
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
        </div>
    </div>
@endsection
