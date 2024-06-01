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
        <a href="/admin/store-setting/create" class="btn btn-primary btn-xs mb-2 p-1"> + Create Setting</a>
        <table id="tbl-list" data-page-length="25"
            class="dt-table table table-sm table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Is Active</th>
                    <th style="min-width: 125px;">Action</th>
                </tr>
            </thead>
            {{-- <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>

                        @if ($item->is_active == 1){
                            <td>Yes</td>
                        } @else {
                            <td>No</td>
                        }
                        @endif

                        <td>
                            <div class="">
                                <a href="/admin/pricing-property/{{ $item->id }}/edit" class="btn btn-info btn-xs"
                                    data-toggle="tooltip" title="Crop {{ $item->name }}">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <form class="" action="{{ route('pricing-property.destroy', $item->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" 
                                        title="Delete {{ $item->name }}">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody> --}}
        </table>
    </div>
</div>
@endsection
