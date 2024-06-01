@extends('admin.admin')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">List All Promo Code</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="card-body">

            @include('admin.partials.card.info')

            @include('admin.partials.card.buttons', ['order' => true])

            <table id="tbl-list" data-page-length="25" class="dt-table table table-sm table-bordered table-striped table-hover">
                <thead>
                <tr>
                    
                    <th>properties names</th>
                    <th>properties general</th>
                    <th>properties sorting</th>
                    <th>properties search engine</th>
                    <th>properties teaser</th>
                    <th>properties whats new</th>
                    <th>properties advanced</th>
                    <th>properties options</th>
                    <th>properties custom</th>
                    <th>properties dynamic</th>
                    <th>tags</th>
                    <th>display security</th>
                    <th>workflow assingments</th>
                    <th>promo code info</th>
                    
                    <th style="min-width: 125px;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($items as $item)
                    <tr>
                       
                        <td>{{ $item->properties_names }}</td>
                        <td>{{ $item->properties_general }}</td>
                        <td>{{ $item->properties_sorting }}</td>
                        <td>{{ $item->properties_search_engine }}</td>
                        <td>{{ $item->properties_teaser }}</td>
                        <td>{{ $item->properties_whats_new }}</td>
                        <td>{{ $item->properties_advanced }}</td>
                        <td>{{ $item->properties_options }}</td>
                        <td>{{ $item->properties_custom }}</td>
                        <td>{{ $item->properties_dynamic }}</td>
                        <td>{{ $item->tags }}</td>
                        <td>{{ $item->display_security }}</td>
                        <td>{{ $item->workflow_assingments }}</td>
                        <td>{{ $item->promo_code_info }}</td>
                        
                       <td>
                            <a href="/admin/promo-code/{{ $item->id }}" class="btn btn-info btn-xs" data-toggle="tooltip" title="Crop {{ $item->properties_names }}">
                                <i class="fa fa-fw fa-crop-alt"></i>
                            </a>
                            {!! action_row($selectedNavigation->url, $item->id, $item->properties_names , ['show', 'edit', 'delete'], false) !!}

                            {!! $item->properties_names !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
