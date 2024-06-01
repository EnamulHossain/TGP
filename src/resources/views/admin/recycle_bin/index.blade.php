@extends('admin.admin')
@section('content')
<style>
    /* Modal */
    .modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    /* Modal content */
    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 1200px;
    }

    /* Close button */
    .modal-content .close {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    /* Hover effect for close button */
    .modal-content .close:hover {
        color: red;
    }

    /* Additional styling for the modal */
    .modal-content h1 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .modal-content p {
        font-size: 16px;
        line-height: 1.5;
        margin-bottom: 10px;
    }

    .modal-content hr {
        border: none;
        border-top: 1px solid #888;
        margin: 20px 0;
    }

    .modal-content ul {
        margin-left: 24px;
        margin-bottom: 10px;
    }

    .modal-content li {
        list-style-type: disc;
        margin-bottom: 5px;
    }

    .modal-content .text-justify {
        text-align: justify;
    }

    .modal-content .text-lg {
        font-size: 18px;
    }

    .modal-content .text-4xl {
        font-size: 32px;
        font-weight: bold;
    }

    .modal-content .text-amber-600 {
        color: #f59e0b;
    }

    .modal-content .text-amber-900 {
        color: #b45309;
    }

    .modal-content .bg-slate-100 {
        background-color: #d1d5db;
    }

    .modal-content .p-2 {
        padding: 0.5rem;
    }

    .modal-content .ml-4 {
        margin-left: 1rem;
    }

    .modal-content .flex {
        display: flex;
    }

    .modal-content .w-4/5 {
        width: 80%;
    }

    .modal-content .contents {
        display: contents;
    }

    .modal-content .my-5 {
        margin-top: 1.25rem;
        margin-bottom: 1.25rem;
    }

    .modal-content .mx-5 {
        margin-left: 1.25rem;
        margin-right: 1.25rem;
    }

    .modal-content .md\:mx-52 {
        margin-left: 13rem;
        margin-right: 13rem;
    }

    .modal-content .py-5 {
        padding-top: 1.25rem;
        padding-bottom: 1.25rem;
    }
</style>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">List All Grants</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('recycle-bin.index') }}" class="form-inline mb-3">
            <div class="input-group input-group-sm">
                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ $search }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="input-group input-group-sm ml-2">
                <select name="status" class="form-control">
                    <option value="">All</option>
                    <option value="Pending" {{ $status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Accepted" {{ $status == 'Accepted' ? 'selected' : '' }}>Completed</option>
                    <option value="Rejected" {{ $status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                    <option value="Archived" {{ $status == 'Archived' ? 'selected' : '' }}>Archived</option>
                    <!-- <option value="Draft" {{ $status == 'Draft' ? 'selected' : '' }}>Draft</option> -->
                </select>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-filter"></i>
                    </button>
                </div>
            </div>
            <div class="input-group input-group-sm ml-2">
                <select name="user_name" class="adminselect2 form-control">
                    <option value="">Select User</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $userName == $user->id ? 'selected' : '' }}>{{ $user->firstname }} {{ $user->lastname }}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-filter"></i>
                    </button>
                </div>
            </div>

            {{-- <div><a href="{{ route('grants.clear') }}" class="btn btn-primary ml-2" style="padding: 5px">Clear Filter</a></div> --}}

            {{-- <a href="{{ route('grants.export') }}" class="btn btn-primary ml-2">Export</a> --}}
        </form>

        <table id="tbl-lists" class=" table table-sm table-bordered table-hover">
            <thead>
                <tr>
                    <th>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('grants', ['sort_field' => 'id', 'sort_order' => ($sortField === 'id' && $sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search]) }}">ID</a>
                            @if($sortField === 'id')
                            <a href="{{ route('grants', ['sort_field' => 'id', 'sort_order' => ($sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search]) }}"><i class="fas fa-sort-{{ ($sortOrder === 'asc') ? 'up' : 'down' }} ml-2"></i></a>
                            @endif
                        </div>
                    </th>
                    <th>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('grants', ['sort_field' => 'opportunity_title', 'sort_order' => ($sortField === 'opportunity_title' && $sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search]) }}">Opportunity Title</a>
                            @if($sortField === 'opportunity_title')
                            <a href="{{ route('grants', ['sort_field' => 'opportunity_title', 'sort_order' => ($sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search]) }}"><i class="fas fa-sort-{{ ($sortOrder === 'asc') ? 'up' : 'down' }} ml-2"></i></a>
                            @endif
                        </div>
                    </th>
                    <th>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('grants', ['sort_field' => 'amount_high', 'sort_order' => ($sortField === 'amount_high' && $sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search]) }}">Amount High</a>
                            @if($sortField === 'amount_high')
                            <a href="{{ route('grants', ['sort_field' => 'amount_high', 'sort_order' => ($sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search]) }}"><i class="fas fa-sort-{{ ($sortOrder === 'asc') ? 'up' : 'down' }} ml-2"></i></a>
                            @endif
                        </div>
                    </th>
                    <th>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('grants', ['sort_field' => 'amount_low', 'sort_order' => ($sortField === 'amount_low' && $sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search]) }}">Amount Low</a>
                            @if($sortField === 'amount_low')
                            <a href="{{ route('grants', ['sort_field' => 'amount_low', 'sort_order' => ($sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search]) }}"><i class="fas fa-sort-{{ ($sortOrder === 'asc') ? 'up' : 'down' }} ml-2"></i></a>
                            @endif
                        </div>
                    </th>
                    <th>
                        <div style="min-width: 100px;" class="d-flex align-items-center">
                            <a href="{{ route('grants', ['sort_field' => 'close_date_at', 'sort_order' => ($sortField === 'close_date_at' && $sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search]) }}">Close Date</a>
                            @if($sortField === 'close_date_at')
                            <a href="{{ route('grants', ['sort_field' => 'close_date_at', 'sort_order' => ($sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search]) }}"><i class="fas fa-sort-{{ ($sortOrder === 'asc') ? 'up' : 'down' }} ml-2"></i></a>
                            @endif
                        </div>
                    </th>
                    <th>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('grants', ['sort_field' => 'Preview', 'sort_order' => ($sortField === 'opportunity_title' && $sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search]) }}">Preview</a>
                            @if($sortField === 'opportunity_title')
                            <a href="{{ route('grants', ['sort_field' => 'Preview', 'sort_order' => ($sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search]) }}"><i class="fas fa-sort-{{ ($sortOrder === 'asc') ? 'up' : 'down' }} ml-2"></i></a>
                            @endif
                        </div>
                    </th>

                    <th>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('grants', ['sort_field' => 'contributor', 'sort_order' => ($sortField === 'contributor' && $sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search]) }}">Contributor</a>
                            @if($sortField === 'contributor')
                            <a href="{{ route('grants', ['sort_field' => 'contributor', 'sort_order' => ($sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search]) }}"><i class="fas fa-sort-{{ ($sortOrder === 'asc') ? 'up' : 'down' }} ml-2"></i></a>
                            @endif
                        </div>
                    </th>
                    <th>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('grants', ['sort_field' => 'input_date', 'sort_order' => ($sortField === 'input_date' && $sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search]) }}">Input Date</a>
                            @if($sortField === 'input_date')
                            <a href="{{ route('grants', ['sort_field' => 'input_date', 'sort_order' => ($sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search]) }}"><i class="fas fa-sort-{{ ($sortOrder === 'asc') ? 'up' : 'down' }} ml-2"></i></a>
                            @endif
                        </div>
                    </th>
                    <th>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('grants', ['sort_field' => 'Publisher', 'sort_order' => ($sortField === 'Publisher' && $sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search]) }}">Publisher</a>
                            @if($sortField === 'Publisher')
                            <a href="{{ route('grants', ['sort_field' => 'Publisher', 'sort_order' => ($sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search]) }}"><i class="fas fa-sort-{{ ($sortOrder === 'asc') ? 'up' : 'down' }} ml-2"></i></a>
                            @endif
                        </div>
                    </th>
                    <th>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('grants', ['sort_field' => 'publish_date', 'sort_order' => ($sortField === 'publish_date' && $sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search]) }}">Publish Date</a>
                            @if($sortField === 'publish_date')
                            <a href="{{ route('grants', ['sort_field' => 'publish_date', 'sort_order' => ($sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search]) }}"><i class="fas fa-sort-{{ ($sortOrder === 'asc') ? 'up' : 'down' }} ml-2"></i></a>
                            @endif
                        </div>
                    </th>

                    {{-- <th>Status</th> --}}
                    <th style="min-width: 40px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <!-- <td>{{ $item->user->full_name ?? "" }}</td> -->
                    <td> <strong> {{ $item->id }} </strong> </td>
                    <td>{{ $item->opportunity_title }}</td>
                    <td>${{ number_format($item->amount_high) }}</td>
                    <td>${{ number_format($item->amount_low) }}</td>
                    <td>{{ $item->close_date_at }}</td>
                    <td style="text-align: center;"><a onclick="previewGrant({{ $item->id }})"><i class="fas fa-eye"></i></a></td>
                    <td>{{ App\Models\User::where('id', $item->created_by)->value('firstname') }}</td>
                    <td>{{ $item->created_at}}</td>
                    <td>{{ App\Models\User::where('id', $item->approved_by)->value('firstname') }}</td>
                    <td>{{ $item->posted_date_at}}</td>
                    {{-- <td>{!! $item->getStatus() !!}</td> --}}
                    <td>
                        <form action="{{ route('recycle-bin.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i> </button>
                        </form>
                        
                        <form action="{{ route('recycle-bin.restore', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-xs"><i class="fas fa-trash-restore"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination justify-content-end mt-2">
            <span class="text-muted">Showing</span>
            <span class="mx-2">{{{ count($items) }}}</span>
            <span class="text-muted">of</span>
            <span class="mx-2">{{$total}}</span>
        </div>
        <div class="pagination justify-content-end mt-2">
            {{ $items->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</div>

<!-- Modal HTML -->
@foreach ($items as $item)
<div id="grantPreviewModal-{{$item->id}}" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <section class="my-5 mx-5 md:mx-52 py-5">
            <div class="">
                <div class="">
                    <div class="">
                        <div class="flex">
                            <div class="w-4/5">
                                <h1 class="text-4xl font-bold">{{$item->opportunity_title}}</h1>
                            </div>

                        </div>
                        <br>
                        <div class="flex text-xl text-amber-600">
                            <div class="flex-1 bg-slate-100 p-2 text-lg">GrantID : {{$item->id}}</div>
                            <div class="contents	">
                                <div class="flex-1 bg-slate-100 p-2 ml-4 text-lg">Grant Funding Amount Low : ${{$item->amount_low}}</div>
                                <div class="flex-1 bg-slate-100 p-2 ml-4 text-lg">Grant Amount High : ${{$item->amount_high}}</div>
                            </div>
                            <div class="flex-1  bg-slate-100 p-2 ml-4 text-lg">Deadline : {{$item->deadline_at}}</div>
                        </div>


                        <br>

                        <hr class="border-b-2 border-[#2d4352]">
                        <br>
                        <div class="">
                            <h1 class="text-4xl text-amber-900">Opportunity Teaser</h1>
                            <br>
                            <div class="">
                                {!!$item->opportunity_teaser!!}
                            </div>
                            <br>
                            <hr class="border-b-2 border-[#2d4352]">
                            <br>
                            <h1 class="text-4xl text-amber-900">Eligible Requirements</h1> <br>

                            <div class="mx-24text-justify px-6" id="fadremove">
                                @if($item->eligibilties)
                                <ul class="list-disc" id="fadremove2">
                                    @foreach($item->eligibilties as $eligible)
                                    <li>{{$eligible->title}}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                            <br>
                            <hr class="border-b-2 border-[#2d4352]">
                            <br>

                            <h1 class="text-4xl text-amber-900 ">Detail Description</h1> <br>

                            <div class=" text-justify px-6">
                                <p>{!!$item->opportunity_description_for_subscriber!!}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>
</div>
@endforeach
<script>
    function previewGrant(itemId) {
        var modal = document.getElementById('grantPreviewModal-' + itemId);
        modal.style.display = "block";
        var closeBtn = modal.querySelector('.close'); // Add dot (.) before 'close'
        closeBtn.addEventListener('click', function() {
            modal.style.display = 'none';
        });
    }
</script>
@endsection
@section('prestyles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
    .select2-container .select2-selection--single {
        height: 31px !important;
    }
</style>
@endsection
@section('scripts')
<script>
    $(function() {
        $('.adminselect2').select2({
            // dropdownAutoWidth : true,
            width: '180px'
        });
    });
</script>
@endsection