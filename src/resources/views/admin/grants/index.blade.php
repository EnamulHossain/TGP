@extends('admin.admin')
@section('content')
<style>
    /* Modal */
    .modal {
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
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        max-height: 100%;
        overflow-y: auto;
        background-color: #fff;
        margin: 50px auto;
        padding: 20px;
        border-radius: 4px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .close {
        position: absolute;
        top: 15px;
        right: 15px;
        color: #000;
        font-size: 80px;
        font-weight: bold;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .close:hover {
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
    @if (Session::get('success'))
    <div class="alert alert-info">{{ Session::get('success') }}</div>
    @endif

    @if (Session::get('delete'))
    <div class="alert alert-info">{{ Session::get('delete') }}</div>
    @endif

    <div class="card-header">
        <h3 class="card-title">List All Grants</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('grants') }}" class="form-inline mb-3">
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
            <div class="input-group input-group-sm ml-2" style="width: 280px">
                <select name="contributor" class="adminselect2 form-control">
                    <option value="">Select Contributor</option>
                    @foreach($contributor as $user)
                    <option value="{{ $user->id }}" {{ $contributors == $user->id ? 'selected' : '' }}>{{ $user->email }}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-filter"></i>
                    </button>
                </div>
            </div>
            <div class="input-group input-group-sm ml-2" style="width: 280px">
                <select name="publisher" class="adminselect2 form-control">
                    <option value="">Select Publisher</option>
                    @foreach($publisher as $user)
                    <option value="{{ $user->id }}" {{ $publishers == $user->id ? 'selected' : '' }}>{{ $user->email }}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-filter"></i>
                    </button>
                </div>
            </div>

            <div><a href="{{ route('grants.clear') }}" class="btn btn-primary ml-2" style="padding: 5px">Clear Filter</a></div>

            {{-- <a href="{{ route('grants.export') }}" class="btn btn-primary ml-2">Export</a> --}}

            <a href="{{ route('grants.export', [
                'search' => request()->input('search'),
                'status' => request()->input('status'),
                'contributors' => request()->input('contributor'),
                'publishers' => request()->input('publisher')
            ]) }}" class="btn btn-primary ml-2">Export</a>

        </form>

        <div class="pagination justify-content-end" style="margin-top: -25px">
            <span class="text-muted">Showing</span>
            <span class="mx-2">{{{ count($items) }}}</span>
            <span class="text-muted">of</span>
            <span class="mx-2">{{$total}}</span>
        </div>

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
                            <a href="{{ route('grants', ['sort_field' => 'deadline_at', 'sort_order' => ($sortField === 'deadline_at' && $sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search]) }}">Deadline</a>
                            @if($sortField === 'deadline_at')
                            <a href="{{ route('grants', ['sort_field' => 'deadline_at', 'sort_order' => ($sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search]) }}"><i class="fas fa-sort-{{ ($sortOrder === 'asc') ? 'up' : 'down' }} ml-2"></i></a>
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
                        <div style="min-width: 100px;" class="d-flex align-items-center">
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
                        <div class="d-flex align-items-center" style="min-width: 100px;">
                            <a href="{{ route('grants', ['sort_field' => 'publish_date', 'sort_order' => ($sortField === 'publish_date' && $sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search]) }}">Publish Date</a>
                            @if($sortField === 'publish_date')
                            <a href="{{ route('grants', ['sort_field' => 'publish_date', 'sort_order' => ($sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search]) }}"><i class="fas fa-sort-{{ ($sortOrder === 'asc') ? 'up' : 'down' }} ml-2"></i></a>
                            @endif
                        </div>
                    </th>

                    <th>Status</th>
                    <th style="min-width: 90px;">Action</th>
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
                    <td>{{ date('m-d-Y', strtotime($item->deadline_at)) }}</td>
                    <td>{{ App\Models\User::where('id', $item->user_id)->value('email') }}</td>
                    <td>{{ date('m-d-Y', strtotime($item->created_at)) }}</td>
                    <td>{{ App\Models\User::where('id', $item->approved_by)->value('email') }}</td>
                    <td>
                        @if ($item->status == 2 && !$item->is_ongoing)
                        {{ $item->updated_at->format('d-m-Y') }}
                        @endif
                    </td>          
                    <td>{!! $item->getStatus() !!}</td>
                    <td>
                        <a href="{{ route('grants.show', ['id' => $item->id, 'search' => $search, 'status' => $status, 'contributor' => $contributors, 'publisher' => $publishers]) }}" class="btn btn-primary btn-xs mr-1" data-toggle="tooltip" title="Edit">
                            <i class="fa fa-fw fa-edit text-white"></i>
                        </a>
                        <a onclick="previewGrant(`{{ $item->id }}`)"><i class="fas fa-eye"></i></a>
                        <form style="display: inline-block;" class="delete-form" action="{{ route('grants.delete', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete {{ $item->id }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>


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
                                        text: "You can restore this item from the recycle bin.",
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

        <div class="pagination justify-content-end mt-2">
            {{ $items->links('vendor.pagination.bootstrap-4') }}
        </div>
        <div class="pagination justify-content-end">
            <span class="text-muted">Showing</span>
            <span class="mx-2">{{{ count($items) }}}</span>
            <span class="text-muted">of</span>
            <span class="mx-2">{{$total}}</span>
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
                            <div class="contents">
                                @if ($item->amount_low <= 0 || $item->is_opening == '1')
                                    <div class="flex-1 bg-slate-100 p-2 ml-4 text-lg">Grant Amount Low: Open</div>
                                    @else
                                    <div class="flex-1 bg-slate-100 p-2 ml-4 text-lg">Grant Funding Amount Low: ${{ number_format($item->amount_low) }}</div>
                                    <div class="flex-1 bg-slate-100 p-2 ml-4 text-lg">Grant Amount High: ${{ number_format($item->amount_high) }}</div>
                                    @endif
                            </div>
                            @if ($item->is_ongoing == '1' || $item->deadline_at == 'December 31, 2099' )
                            <div class="flex-1  bg-slate-100 p-2 ml-4 text-lg">Deadline : Ongoing</div>
                            @else
                            <div class="flex-1  bg-slate-100 p-2 ml-4 text-lg">Deadline : {{$item->deadline_at}}</div>
                            @endif
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
                            <hr class="border-b-2 border-[#2d4352]">
                            <br>
                            <h1 class="text-4xl text-amber-900">Eligible Location</h1> <br>

                            <div class="mx-24text-justify px-6" id="fadremove">
                                @if($item->states)
                                <ul class="list-disc" id="fadremove2">
                                    @foreach($item->states as $eligible)
                                    <li>{{$eligible->name}}</li>
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

                            <br>
                            <hr class="border-b-2 border-[#2d4352]">
                            <br>

                            <h1 class="text-4xl text-amber-900 ">Funding Source</h1> <br>

                            <div class=" text-justify px-6">
                                <p>{!!$item->funding_source!!}</p>
                            </div>

                            <hr class="border-b-2 border-[#2d4352]">
                            <br>

                            <h1 class="text-4xl text-amber-900 ">additional_notes</h1> <br>

                            <div class=" text-justify px-6">
                                <p>{!!$item->additional_notes!!}</p>
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