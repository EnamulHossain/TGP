@extends('admin.admin')
@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Pages Recently Accessed</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>

    <div class="card-body">
        <table data-page-length="25" data-order-by="0|desc" class="dt-table table table-sm table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Grant ID</th>
                    <th>
                        <div class="d-flex align-items-center">
                            Opportunity Title
                        </div>
                    </th>
                    <th>
                        <div class="d-flex align-items-center">
                            Status
                        </div>
                    </th>
                    <th>
                        <div class="d-flex align-items-center">
                            User
                        </div>
                    </th>
                    <th>
                        <div class="d-flex align-items-center">
                            Visited At
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    @if($item->grant)
                    <td><strong>{{ $item->grant->id }}</strong></td>
                    <td>{{ $item->grant->opportunity_title }}</td>
                    <td>{!! $item->grant->getStatus() !!}</td>
                    <td>{{ $item->user->email }}</td>
                    <td>{{ $item->visited_at }}</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection