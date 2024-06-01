@extends('admin.admin')
@section('content')
<form class="card card-primary" method="POST" action="{{ route('workflow.store') }}" accept-charset="UTF-8">
    <input name="_token" type="hidden" value="{{ csrf_token() }}">
    <div class="card-header">
        <h3 class="card-title">
            <span><i class="fa fa-edit"></i></span>
            <span>Edit Workflow</span>
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        @if (Session::get('success'))
        <div class="alert alert-info">{{ Session::get('success') }}</div>
        @endif
        @include('admin.partials.card.info')
        <fieldset>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label><h1>Select Workflow</h1></label>
                        <fieldset>
                            <input type="hidden" name="work_flow" value="@if(isset($workFlow->work_flow)) {{ $workFlow->work_flow }} @endif" id="work_flow_id">
                            <div data-toggle="tooltip" data-placement="bottom" title="Save items are immediately available on the website" class="workflow-item @if(isset($workFlow->work_flow) && $workFlow->work_flow == 1) workflow-item-checked @endif" data-id="auto_approval" data-value="1">
                                <span for="auto_approval">No Workflow</span>
                            </div>
                        
                            <div data-toggle="tooltip" data-placement="bottom" title="Single author can save items separately from publishing to the website" class="workflow-item @if(isset($workFlow->work_flow) && $workFlow->work_flow == 2) workflow-item-checked @endif" data-id="one_direct_approval" data-value="2">
                                <span for="one_direct_approval">1-Step Workflow</span>
                            </div>
                        
                            <div data-toggle="tooltip" data-placement="bottom" title="Single editor must approve the item before it is available on the website" class="workflow-item @if(isset($workFlow->work_flow) && $workFlow->work_flow == 3) workflow-item-checked @endif" data-id="one_before_edit_approval" data-value="3">
                                <span for="one_before_edit_approval">2-Step Workflow</span>
                            </div>
                        
                            <div data-toggle="tooltip" data-placement="bottom" title="Two steps of editor approval are needed before it is available on the website" class="workflow-item @if(isset($workFlow->work_flow) && $workFlow->work_flow == 4) workflow-item-checked @endif" data-id="two_direct_approval" data-value="4">
                                <span for="two_direct_approval">3-Step Workflow</span>
                            </div>
                        
                            <div data-toggle="tooltip" data-placement="bottom" title="Three steps of editor approval are needed before it is available on the website" class="workflow-item @if(isset($workFlow->work_flow) && $workFlow->work_flow == 5) workflow-item-checked @endif" data-id="two_before_edit_approval" data-value="5">
                                <span for="two_before_edit_approval">4-Step Workflow</span>
                            </div>
                            <!-- and so on for each workflow item -->
                        </fieldset>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                    <label>Select User Roles</label>
                        {!! form_select('roles[]', $roles->pluck('name', 'id'), $workFlowRoles, ['id' => 'roles', 'class' => 'custom-select rounded-0 select2', 'multiple']) !!}
                    </div>
                    @error('roles')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </fieldset>
    </div>
    <div class="row">
        <div class="col-md-6 text-right mb-1 ml-1">
            <a href="/admin/workflow" class="btn btn-secondary">
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@section("scripts")
    <script>
        $(document).ready(function(){
            $(".workflow-item").click(function(){
                $(".workflow-item").removeClass("workflow-item-checked");
                let id = $(this).data("value");
                $("#work_flow_id").val(id);
                $(this).addClass("workflow-item-checked");
            }); 
        });
    </script>
@endsection
@section("prestyles")
    <style>
        .workflow-item {
            display: inline-block;
            width: 30%;
            height: 71px;
            background: #f1f1f1;
            margin-bottom: 10px;
            padding: 20px;
            border-radius: 10px;
            font-size: 20px;
            text-align: center;
            margin-right: 10px;
        }
        .select2-selection__choice {
            display: inline-block;
            padding-right: 10px;
            font-size: 15px;
        }
        .select2-container .select2-selection--multiple .select2-selection__rendered {
            display: block;
            overflow: hidden;
            padding-left: 8px;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .select2-selection__choice__remove {
            padding-right: 2px;
        }
        .select2-container .select2-selection--single, .select2-selection.select2-selection--multiple {
            height: 36px !important;
        }
        .select2-container--bootstrap4 .select2-search {
            width: auto !important;
            display: inline-block !important;
            float: right !important;
        }
        .workflow-item.workflow-item-checked {
            background: #a3a3a3;
        }
        .workflow-item:hover {
            background: #a3a3a3;
        }
    </style>
@endsection