@extends('website.website')
@section('title', 'Grant | SBA Loans')
@section('content')
<style>
    .grantfilter {
        height: fit-content;
    }

    .link-cursor {
        cursor: pointer;
    }

    .main-geo {
        margin: 0;
        display: grid;
        grid-template-rows: 1fr auto;
        margin-bottom: 10px;
        break-inside: avoid;
    }

    .sub-geo {
        grid-row: 1 / -1;
        grid-column: 1;
        margin-left: 30px;
    }

    #main-wrap {
        column-count: 2;
        column-gap: 10px;
    }

    .sub-elm {
        margin-left: 30px;
    }

    .label-checkbox {
        display: flex;
        align-items: center;
    }

    .label-checkbox input[type="checkbox"] {
        margin-right: 8px;
    }

    .label-checkbox label {
        font-size: 16px;
        color: #333;
    }

    /* .fixed-width {
      width: 1650px;
      overflow-x: auto;
    } */

    /* @media (max-width: 768px) {
     
      .fixed-width {
        width: auto; 
        overflow-x: hidden;
      }
    } */
    div#grantfilter {
        max-width: 393px;
        width: 393px;
        min-width: 393px;
        overflow-x: scroll;
    }

    .fmain-geo {
        display: inline-block;
        width: 33%;
        padding-left: 30px;
        margin-top: 0px;
    }

    .cls_Israel {
        padding-left: 0px;
    }

    .location-model {
        margin-top: 20px;
    }

    /* @media (max-width: 768px) {
     
      .fixed-width {
        width: auto; 
        overflow-x: hidden;
      }
    } */

    #cookie-consent-modal {
        /* position: fixed; */
        bottom: 10px;
    }

    .loc-modal-loc.modal-box {
        max-height: calc(100vh - 1em) !important;
        padding-right: 32px !important;
    }

    .mainmodald.mt-5 {
        margin-top: 0.25rem !important;
    }
</style>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
<!--hero section-->
<div class="container-mx">
    <section id="hero_section " class="mt-12 py-10">
        <article class="grid md:grid-cols-2  justify-items-stretch gap-4">
            <div class="">
                <div class=" text-left">
                    <h2>
                        @if (Session::get('success'))
                        <div class="alert alert-info">{{ Session::get('success') }}</div>
                        @endif
                    </h2>
                    <h2>
                        @if (Session::get('signupSuccess'))
                        <div class="alert alert-info">{{ Session::get('signupSuccess') }}</div>
                        @endif
                    </h2>
                    <h2>
                        @if (Session::get('delete'))
                        <div class="alert alert-info">{{ Session::get('delete') }}</div>
                        @endif
                    </h2>
                    <br>
                    <h1 class="text-5xl font-bold text-[#2d5237]">Largest Online Grant Catalog</h1>
                    <h1 class="text-4xl font-bold text-[#2d5237] mt-6">Non-Profits | Small Businesses | Individuals</h1>
                    <p class="text-3xl mt-5 decoration-2 underline-offset-4 subtitle">
                        <a href="/signup" class="underline hover:no-underline hover:cursor-pointer">Grant Alert Newsletter - Free Sign Up - Get Daily Alerts</a>
                    </p>
                </div>
                @php
                $totalGrantAmount = '$' . number_format($totalGrantAmount, 0);
                $totalGrantsCount = number_format($totalGrantsCount, 0);
                @endphp
                <div class="">
                    <div class="text-center  md:flex  mt-10">
                        <div class="grant mb-2 GrantDataLeft mr-3">
                            <i class="fa fa-file-text-o py-1 mt-1" style="font-size:3rem;" aria-hidden="true"></i>
                            <div class="text-3xl mt-3"><b>{{ $totalGrantsCount }}</b></div>
                            <div class="text-3xl font-normal mt-2">Available Grants</div>
                            <div class="text-lg my-3">Total number of grants actively seeking applications right now.
                            </div>
                        </div>

                        <div class=" my-3  GrantDataRight">
                            <i class="fa fa-money pt-1" aria-hidden="true" style="font-size:3rem;"></i>
                            <div class="text-3xl mt-3"><b>{{ $totalGrantAmount }}</b></div>
                            <div class="text-3xl font-normal mt-2">Available Funds</div>
                            <div class="text-lg mt-3">
                                Total amount to be awarded by the funding agency to successful grant applications.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img style="height: 500px;" class="mx-auto hero-image" height="" src="{{ asset('images/home.gif') }}" alt="Happy Women">
        </article>

    </section>

    <section class="grid md:grid-cols-2 gap-8" style="">
        <div class="py-4  border-t-2 border-[#2d4352]">
            <h2 class="text-2xl py-2 font-semibold text-[#2d4352]">
                The Grant Portal
            </h2>
            <p class="text-lg py-2">
                The Grant Portal is the largest online catalog of grants currently accepting
                applications. Grants for non-profits, small businesses, individuals plus 50
                other grant categories are included. Grants from the federal government,
                state and local governments, corporations, private and community/public
                foundations are listed. Sign up for the free Grant Alert Newsletter to create
                your profile & grant filters and receive daily grant alerts that fit your
                needs. Purchase a subscription and receive full details, requirements,
                websites and application links to every current and archived grant in the
                grant catalog.
            </p>
        </div>
        <div class="py-4  bg-[#2D5237] text-[#fff]">
            <article class="px-4 my-4 md:my-6 xl:my-0 lg:my-0 md:flex" id="grant-list">
                <div style="margin-right: 3rem;">
                    <div class="text-2xl">Free Grant Alert Newsletter</div>
                    <div class="text-md my-3">Free Grant Alerts from USA grant providers accepting applications. Grants
                        updated daily. Find grants for your specific funding needs.</div>
                </div>
                <button class="bg-[#e0ae67] text-black py-2 px-8 rounded hover:bg-white border-[#e0ae67] border-2 h-fit"> <a href="{{ route('website.signup') }}">Signup</a> </button>
            </article>
            <div class="">
                <hr class="mx-6">
            </div>
            <div class="">
                <hr class="mx-6 pb-4">
            </div>
            <article class="px-4 md:flex py-4" id="grant-list">
                <div style="margin-right: 3rem;">
                    <div class="text-2xl">Subscribe Today only $9.99</div>
                    <div class="text-md my-3">Subscribe & gain full access to the largest online source of grants for
                        businesses, non-profits, individuals and more.</div>
                </div>
                <button class="no-shrink bg-[#e0ae67] text-black py-2 px-1 rounded hover:bg-white border-[#e0ae67] border-2 h-fit">
                    <a href="{{ route('pricing.plans') }}">Pricing & Plans</a>
                </button>
            </article>
        </div>
    </section>

    <section class="p-2">
        <article class="flex flex-row justify-center mx-12">
            <div class="basis-2/6">
                <div class="mx-auto text-center">

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show m-5" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if ($message = Session::get('warning'))
                    <div class="alert alert-warning alert-dismissible fade show m-5" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
        </article>
    </section>
    <section class="grant-search my-10 lg:flex lg:mr-16 fixed-width">
        <div id="grantfilter" class="basis-1/4 grantfilter p-4 mr-4 border md:ml-4 md:mr-8 border-[#2d4352] ">
            <p class="text-3xl font-medium text-[#2d4352]">Search Grants</p>
            <p class="text-[#2d4352] text-end"><a onclick="uncheckCheckbox()" href="#grant-list">clear all</a></p>
            <form id="filter_grant" method="GET" action="{{ url('/') }}#grant-list">
                <div class="search-container">
                    <input class="border border-[#2d4352] mt-2 w-full h-8 px-3 bg-[#eee]" placeholder="Enter Keywords" type="text" name="search" id="search-box" value="{{ request('search') }}">
                    <span class="search-icon mt-2 cursor-pointer" onclick="filterResult()">
                        <i class="fa fa-search"></i>
                    </span>
                </div>
                <style>
                    .search-container {
                        position: relative;
                        display: flex;
                        align-items: center;
                    }

                    .search-icon {
                        position: absolute;
                        right: 8px;
                    }

                    .search-input {
                        padding-right: 24px;
                        /* Adjust as needed */
                    }
                </style>
                <div>
                    <div class="border-b-2 text">
                        <div class="my-4">
                            <p class="text-lg font-normal text-[#2d4352] pl-1">Grant Amount</p>
                        </div>
                    </div>
                    <div id="amountSection" class="py-2">
                        <div class="mt-2">
                            <input onclick="filterResult()" type="checkbox" class="default:ring-2" name="amount[]" value="0-500000" {{ $amountFilters && in_array('0-500000', $amountFilters) ? 'checked' : '' }} />
                            $0 - $500,000
                        </div>
                        <div class="mb-2">
                            <input onclick="filterResult()" type="checkbox" class="default:ring-2" name="amount[]" value="500001+" {{ $amountFilters && in_array('500001+', $amountFilters) ? 'checked' : '' }} />
                            $500,001 +
                        </div>
                    </div>
                </div>
                <div>
                    <div class="@if(!$interestFilters) border-b-2 @endif py-4 border-t-2 text justify-between flex">
                        <p class="lg:text-lg text-sm font-normal text-[#2d4352] pl-1">Grants by Interest</p>
                        <label for="interest_Group" id="open_grants_by_interest" class="px-3 py-1 text-xs lg:text-sm bg-[#2d4352] text-[#d7e1e8] border-[#2d4352] border-2 hover:bg-[#d7e1e8] hover:text-[#2d4352]">
                            See All </label>
                    </div>
                    <div id="InterestFilter" class="@if($interestFilters) border-b-2 pb-4 @endif">
                        @foreach ($interests as $item)
                        @if($interestFilters && in_array($item->id, $interestFilters))
                        <div class="form-control w-full max-w-md flex flex-row mt-3 basis-1/4">
                            <input name="interests[]" type="checkbox" value="{{ $item->id }}" id="interest_{{ $item->id }}" class="checkbox checkbox-sm rounded-none" checked />
                            <span class="label-text mx-1" data-interest="{{ $item->id }}">{{ $item->title }}</span>
                        </div>
                        @endif
                        @if(!$interestFilters && $userInterests && in_array($item->id, $userInterests))
                        <div class="form-control w-full max-w-md flex flex-row mt-3 basis-1/4">
                            <input name="interests[]" type="checkbox" value="{{ $item->id }}" id="interest_{{ $item->id }}" class="checkbox checkbox-sm rounded-none" checked />
                            <span class="label-text mx-1" data-interest="{{ $item->id }}">{{ $item->title }}</span>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="">
                        <div class="@if(!$locationFilters) border-b-2 pb-4 @endif text justify-between flex  py-4">
                            <p class="lg:text-lg text-sm  font-normal text-[#2d4352] pl-1">Grants by Location</p>
                            <label for="location" class="px-3 py-1 text-xs lg:text-sm bg-[#2d4352] text-[#d7e1e8] border-[#2d4352] border-2 hover:bg-[#d7e1e8] hover:text-[#2d4352]">
                                See All </label>
                        </div>
                        <div id="CountryFilter" class="@if($locationFilters) border-b-2 pb-4 @endif">
                            @foreach ($countries as $country)
                            @php
                            $checkvalCnt = 0;
                            $checkvalTtlCnt = 0;
                            if($country->states){
                            $stts = $country->states->pluck('id')->toArray();
                            $checkvalTtlCnt = count($stts);
                            $checkval = array_intersect($stts, $locationFilters);
                            $checkvalCnt = count($checkval);
                            }
                            @endphp
                            @if($checkvalCnt > 0)
                            <div class="flex w-full max-w-md mt-3">
                                <input name="countries[]" id="location-prnt-{{ $country->id }}" type="checkbox" value="{{ $country->id }}" class="checkbox checkbox-sm countries rounded-none state-{{ $country->id }} @if($checkvalCnt == $checkvalTtlCnt) parent-checkbox @endif" />
                                <span class="label-text ml-1">{{ $country->name }}</span>
                            </div>
                            @endif
                            <div class="grid grid-cols-1 mx-8">
                                @if ($country->states)
                                @foreach ($country->states as $state)
                                @if ($locationFilters && in_array($state->id, $locationFilters))
                                <div class="form-control w-full max-w-md flex flex-row mt-3 basis-1/4">
                                    <input name="states[]" value="{{ $state->id }}" type="checkbox" id="states" class="checkbox checkbox-xs state-{{ $country->id }} rounded-none" checked />
                                    <span class="text-xs ml-1">{{ $state->name }}</span>
                                </div>
                                @endif
                                @if (!$locationFilters && $userProfile && $userProfile->states->contains($state->id))
                                <div class="form-control w-full max-w-md flex flex-row mt-3 basis-1/4">
                                    <input name="states[]" value="{{ $state->id }}" type="checkbox" id="states" class="checkbox checkbox-xs state-{{ $country->id }} rounded-none" checked />
                                    <span class="text-xs ml-1">{{ $state->name }}</span>
                                </div>
                                @endif
                                @endforeach
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div>
                    <div class="@if(!$eligibilityFilters) border-b-2 @endif text justify-between flex  py-4">
                        <p class="lg:text-lg text-sm font-normal text-[#2d4352] pl-1">Grants by Eligibility</p>
                        <label for="eligibility" class="px-3 py-1 text-xs lg:text-sm bg-[#2d4352] text-[#d7e1e8] border-[#2d4352] border-2 hover:bg-[#d7e1e8] hover:text-[#2d4352]">
                            See All </label>
                    </div>
                    <div id="EligibilityFilter" class="@if($eligibilityFilters) border-b-2 pb-4 @endif">
                        @foreach ($eligibilies as $item)
                        @if($eligibilityFilters && in_array($item->id, $eligibilityFilters))
                        <div class="form-control w-full max-w-md flex flex-row mt-3 basis-1/4">
                            <input name="eligibility[]" type="checkbox" value="{{ $item->id }}" class="checkbox checkbox-sm rounded-none" checked />
                            <span class="label-text mx-1">{{ $item->title }}</span>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </form>
        </div>
        @php
        $totalGrantAmount = '$' . number_format($grantsAmount, 0);
        $totalGrantsCount = number_format($grants->total(), 0);
        @endphp
        <div class="md:pb-10 flex-1 mx-0 md:mx-2 pb-2 lg:ml-8 ml-0 mt-4 lg:mt-0">
            <header class="flex md:flex-row flex-col justify-between items-start md:items-center mb-1">
                <h2 class="text-2xl md:text-3xl font-bold text-[#2d4352]"> Available Grants: {{ $totalGrantsCount }}
                </h2>
                <h2 class="text-2xl md:text-3xl font-bold text-[#2d4352] py-2 md:py-0"> Available Funding:
                    {{ $totalGrantAmount }}
                </h2>
            </header>
            <div class="flex justify-between items-center mb-2" id="sort-by">
                <div class="flex pr-1 items-center">
                    <p class="text-lg hidden md:visible font-bold text-gray-700 pr-2">
                        Sort by
                    </p>
                    <form method="GET" action="{{ url('/') }}#grant-list">
                        <select name="sort_by" id="sort_by" onchange="this.form.submit()" class="select select-bordered select-sm h-9 w-36 max-w-xs">
                            <option disabled selected style="background-color: #dad8d8;color: black; font-weight: bold;">Current Grants</option>
                            <option value="amount_low" {{ $sort_by == 'amount_low' ? 'selected' : '' }}>Amount (Low to High)</option>
                            <option value="amount_high" {{ $sort_by == 'amount_high' ? 'selected' : '' }}>Amount (High to Low)</option>
                            <option value="opportunity_title_a" {{ $sort_by == 'opportunity_title_a' ? 'selected' : '' }}>Title: A-Z</option>
                            <option value="opportunity_title_z" {{ $sort_by == 'opportunity_title_z' ? 'selected' : '' }}>Title: Z-A</option>
                            <option value="deadline_at_a" {{ $sort_by == 'deadline_at_a' ? 'selected' : '' }}>Deadline (Near to Far)</option>
                            <option value="deadline_at_d" {{ $sort_by == 'deadline_at_d' ? 'selected' : '' }}>Deadline (Far to Near)</option>
                            @if ($isPaidSubscriber || $isAdmin)
                            <option value="favourite" {{ $sort_by == 'favourite' ? 'selected' : '' }}>Favorite</option>
                            @endif
                            {{-- @if ($isPaidSubscriber || $isAdmin) --}}
                            <option disabled style="background-color: #dad8d8;color: black; font-weight: bold;">Archived Grants</option>
                            <option value="arch_amount_low" {{ $sort_by == 'arch_amount_low' ? 'selected' : '' }}>Amount (Low to High)</option>
                            <option value="arch_amount_high" {{ $sort_by == 'arch_amount_high' ? 'selected' : '' }}>Amount (High to Low)</option>
                            <option value="arch_opportunity_title_a" {{ $sort_by == 'arch_opportunity_title_a' ? 'selected' : '' }}>Title: A-Z</option>
                            <option value="arch_opportunity_title_z" {{ $sort_by == 'arch_opportunity_title_z' ? 'selected' : '' }}>Title: Z-A</option>
                            <option value="arch_deadline_at_a" {{ $sort_by == 'arch_deadline_at_a' ? 'selected' : '' }}>Deadline (Near to Far)</option>
                            <option value="arch_deadline_at_d" {{ $sort_by == 'arch_deadline_at_d' ? 'selected' : '' }}>Deadline (Far to Near)</option>
                            <option value="arch_favourite" {{ $sort_by == 'arch_favourite' ? 'selected' : '' }}>Favorite</option>
                            {{-- @endif --}}
                        </select>
                    </form>
                </div>
                <div class="flex items-center justify-between bg-white py-3">
                    <div class="flex flex-1 justify-between sm:hidden">
                        @php
                        $next = 2;
                        $prev = 1;
                        if(isset(request()->page) && (int)request()->page > 0){
                        $next = filter_var(request()->page, FILTER_VALIDATE_INT) + 1 ?? 1;
                        $prev = filter_var(request()->page, FILTER_VALIDATE_INT) - 1 ?? 1;
                        }
                        $totalGrantsCount = $grants->total();
                        $per_page = request()->per_page ?? 10;
                        $totalGrants = ceil($totalGrantsCount / $per_page);
                        @endphp

                        <a href="?page={{ $prev < 1 ? 1 : $prev}}" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                        <a href="?page={{  $next > $totalGrants ? $totalGrants : $next }}" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
                    </div>
                    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between" id="rowFilter">
                        <div class="flex pr-3 items-center">
                            <p class="text-sm text-gray-700 pr-1">
                                Show Rows
                            </p>
                            <select name="per_page" onchange="updatePerPage(this.value)" class="select select-bordered select-sm h-9">
                                <option disabled selected>Select</option>
                                <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                                <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                                <option value="30" {{ $perPage == 30 ? 'selected' : '' }}>30</option>
                            </select>
                        </div>
                        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                            {{ $grants->links('website.pagination') }}
                        </nav>
                    </div>

                    <script>
                        function updatePerPage(value) {
                            const currentUrl = new URL(window.location.href);
                            currentUrl.searchParams.set('per_page', value);
                            window.location.href = currentUrl.href;
                        }
                    </script>
                </div>
            </div>
            <h2>
                @if (Session::get('favsuccess'))
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: '{{ Session::get('
                        favsuccess ') }}',
                    });
                </script>
                <br>
                @endif

            </h2>
            @if ($grants->count() > 0)
            @foreach ($grants as $grant)
            <article class="text-left border-t-2 border-[#2d4352] py-3">
                <h3 class="lg:text-xl text-lg font-bold mt-1">{{ $grant->opportunity_title }}</h3>
                <div class="grantrow flex flex-row my-1 justify-between lg:items-center items-start">
                    <div class="lg:text-lg text-base w-[300px]">
                        <span class="font-bold">Deadline:</span>
                        @if($grant->deadline_at == 'Thu, December 31, 2099' || $grant->is_ongoing == '1')
                        Ongoing
                        @else
                        {{ $grant->deadline_at }}
                        @endif
                    </div>
                    @php
                    $amountLow = '$' . number_format($grant->amount_low, 0);
                    @endphp
                    <div class="lg:text-lg text-base w-64">
                        <span class="font-bold">Funding Amount :</span>
                        @if($grant->amount_low <= 0 || $grant->is_opening == '1')
                            Open
                            @else
                            {{ $amountLow }}
                            @endif
                    </div>
                    <div class="lg:text-lg text-base">
                        <span class="font-bold">TGP Grant ID : </span>{{ $grant->id }}
                    </div>
                    <button class="text-base lg:text-lg rounded px-3 py-1 bg-[#2d4352] text-[#fff] border-[#2d4352] border-2 hover:bg-white hover:text-[#2d4352]">
                        <a href="{{ route('grant-details', ['id' => $grant->id, 'title' => Str::slug($grant->opportunity_title)]) . '?' . request()->getQueryString() }}" action="GET">View Grant</a>
                    </button>
                    <div class="heart" id="favourite">
                        @if (($isPaidSubscriber || $isAdmin) && auth()->check())
                        <div class='large-font text-center'>
                            <a href="{{ route('favourite-unfavourite-grant', ['id' => $grant->id]) }}#grant-list" action="GET">
                                @if ($grant->favourite && in_array($grant->id, $userFavGrants))
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="red" class="w-9 h-9">
                                    <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                </svg>
                                @else
                                <ion-icon name="heart"></ion-icon>
                                @endif
                            </a>
                        </div>
                        @else
                        <div class='large-font text-center'>
                            <a href="{{ route('favourite-unfavourite-grant', ['id' => $grant->id]) }}#grant-list" action="GET" class="heart-icon">
                                <ion-icon name="heart"></ion-icon>
                            </a>
                        </div>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            $(document).ready(function() {
                                $('.heart-icon').click(function(e) {
                                    e.preventDefault();
                                    Swal.fire({
                                        title: 'To select favorites, you need a paid subscription.',
                                        icon: 'info',
                                        confirmButtonText: 'Ok'
                                    });
                                });
                            });
                        </script>
                        @endif
                    </div>
                </div>
            </article>
            @endforeach
            @else
            <p class="text-center text-4xl">No Grants Found</p>
            @endif
            <div class="flex justify-between items-center mb-2" id="sort-by">
                <div class="flex pr-1 items-center">
                    <p class="text-lg hidden md:visible font-bold text-gray-700 pr-2">
                        Sort by
                    </p>
                    <form method="GET" action="{{ url('/') }}#grant-list">
                        <select name="sort_by" id="sort_by" onchange="this.form.submit()" class="select select-bordered select-sm h-9 w-36 max-w-xs">
                            <option disabled selected style="background-color: #dad8d8;color: black; font-weight: bold;">Current Grants</option>
                            <option value="amount_low" {{ $sort_by == 'amount_low' ? 'selected' : '' }}>Amount (Low to High)</option>
                            <option value="amount_high" {{ $sort_by == 'amount_high' ? 'selected' : '' }}>Amount (High to Low)</option>
                            <option value="opportunity_title_a" {{ $sort_by == 'opportunity_title_a' ? 'selected' : '' }}>Title: A-Z</option>
                            <option value="opportunity_title_z" {{ $sort_by == 'opportunity_title_z' ? 'selected' : '' }}>Title: Z-A</option>
                            <option value="deadline_at_a" {{ $sort_by == 'deadline_at_a' ? 'selected' : '' }}>Deadline (Near to Far)</option>
                            <option value="deadline_at_d" {{ $sort_by == 'deadline_at_d' ? 'selected' : '' }}>Deadline (Far to Near)</option>
                            @if ($isPaidSubscriber || $isAdmin)
                            <option value="favourite" {{ $sort_by == 'favourite' ? 'selected' : '' }}>Favorite</option>
                            @endif
                            {{-- @if ($isPaidSubscriber || $isAdmin) --}}
                            <option disabled style="background-color: #dad8d8;color: black; font-weight: bold;">Archived Grants</option>
                            <option value="arch_amount_low" {{ $sort_by == 'arch_amount_low' ? 'selected' : '' }}>Amount (Low to High)</option>
                            <option value="arch_amount_high" {{ $sort_by == 'arch_amount_high' ? 'selected' : '' }}>Amount (High to Low)</option>
                            <option value="arch_opportunity_title_a" {{ $sort_by == 'arch_opportunity_title_a' ? 'selected' : '' }}>Title: A-Z</option>
                            <option value="arch_opportunity_title_z" {{ $sort_by == 'arch_opportunity_title_z' ? 'selected' : '' }}>Title: Z-A</option>
                            <option value="arch_deadline_at_a" {{ $sort_by == 'arch_deadline_at_a' ? 'selected' : '' }}>Deadline (Near to Far)</option>
                            <option value="arch_deadline_at_d" {{ $sort_by == 'arch_deadline_at_d' ? 'selected' : '' }}>Deadline (Far to Near)</option>
                            <option value="arch_favourite" {{ $sort_by == 'arch_favourite' ? 'selected' : '' }}>Favorite</option>
                            {{-- @endif --}}
                        </select>
                    </form>
                </div>
                <div class="flex items-center justify-between bg-white py-3">
                    <div class="flex flex-1 justify-between sm:hidden">
                        @php
                        $next = 2;
                        $prev = 1;
                        if(isset(request()->page) && (int)request()->page > 0){
                        $next = filter_var(request()->page, FILTER_VALIDATE_INT) + 1 ?? 1;
                        $prev = filter_var(request()->page, FILTER_VALIDATE_INT) - 1 ?? 1;
                        }
                        $totalGrantsCount = $grants->total();
                        $per_page = request()->per_page ?? 10;
                        $totalGrants = ceil($totalGrantsCount / $per_page);
                        @endphp

                        <a href="?page={{ $prev < 1 ? 1 : $prev}}" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                        <a href="?page={{  $next > $totalGrants ? $totalGrants : $next }}" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
                    </div>
                    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between" id="rowFilter">
                        <div class="flex pr-3 items-center">
                            <p class="text-sm text-gray-700 pr-1">
                                Show Rows
                            </p>
                            <select name="per_page" onchange="updatePerPage(this.value)" class="select select-bordered select-sm h-9">
                                <option disabled selected>Select</option>
                                <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                                <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                                <option value="30" {{ $perPage == 30 ? 'selected' : '' }}>30</option>
                            </select>
                        </div>
                        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                            {{ $grants->links('website.pagination') }}
                        </nav>
                    </div>

                    <script>
                        function updatePerPage(value) {
                            const currentUrl = new URL(window.location.href);
                            currentUrl.searchParams.set('per_page', value);
                            window.location.href = currentUrl.href;
                        }
                    </script>
                </div>
            </div>
        </div>


    </section>
    <section class="flex my-10 flex-col md:flex-row  ">
        <img onclick="openLink(`{{ route('hire-a-grant-writer') }}`)" class="flex-1 py-3 link-cursor" src="{{ asset('/images/home-page/Hire-a-Grant-Writer-Image-1280-x-400.jpg') }} " alt="Hire-a-Grant-Writer-Image">
        <img onclick="openLink(`https://www.biz2credit.com/thegrantportal/quick-apply`)" class="flex-1 py-3 link-cursor" src="{{ asset('/images/home-page/b2c_photographytest_inaction_1280X400.png') }} " alt="b2c_photographytest_inaction">
    </section>
    <script>
        function openLink(url) {
            window.open(url, '_blank');
        }
    </script>
</div>
</div>

<!-- cookie policy -->
@if (!$consent)
<div id="cookie-consent-modal" class="fixed inset-x-0 flex  bg-gray-900 bg-opacity-60">
    <div class="w-full bg-slate-100 justify-center">
        <div class="my-5">
            <div class="flex justify-center space-x-10">
                <div style="">
                    <p class="text-xl">By using this site, you agree and consent to our use of cookies.</p>
                </div>
                <div class="flex">
                    <div style="margin-left: 50px" class="items-center justify-center">
                        <form method="POST" action="{{ route('store.consent') }}">
                            @csrf
                            <button type="submit" class="rounded bg-[#2d4352] hover:bg-white text-[#fff] hover:text-[#2d4352] font-bold py-2 px-4 w-full">
                                I Consent to Cookies
                            </button>
                        </form>
                    </div>
                    <div style="margin-left: 50px">
                        <a href="{{ route('cookie_policy') }}" class="rounded bg-[#2d4352] hover:bg-white text-[#fff] hover:text-[#2d4352] font-bold py-2 px-4 w-full block text-center">
                            Read Our Consent Policy
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


{{-- Grants By Interests --}}
<div>
    <input type="checkbox" id="interest_Group" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box max-w-full">
            <label for="interest_Group" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            <h3 class="font-bold text-4xl underline underline-offset-2">Grants by Interest</h3>

            <div class="mt-5">
                <div class="grid lg:grid-cols-4 md:grid-cols-2" id="interestSection">
                    @foreach ($interests as $item)
                    <div class="form-control w-full max-w-md flex flex-row mt-3 basis-1/4">
                        <input name="interests[]" type="checkbox" value="{{ $item->id }}" id="interest_{{ $item->id }}" class="checkbox checkbox-sm rounded-none" {{ !$interestFilters && $userInterests && in_array($item->id, $userInterests) ? 'checked' : '' }} {{ $interestFilters && in_array($item->id, $interestFilters) ? 'checked' : '' }} />
                        <span class="label-text mx-1" data-interest="{{ $item->id }}">{{ $item->title }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="modal-action">
                <label onclick="filterResult()" for="interest_Group" id="interestResult" class="btn bg-[#2d4352] text-[#d7e1e8] border-[#2d4352] border-2 hover:bg-[#d7e1e8] hover:text-[#2d4352]">View Results</label>
                <button onclick="clearInterests()" class="btn bg-[#d7e1e8] text-[#2d4352] border-[#d7e1e8] border-2 hover:bg-[#2d4352] hover:text-[#d7e1e8] ml-2">Clear</button>
            </div>
        </div>
    </div>
</div>

{{-- Grants By Location --}}
<div>
    <input type="checkbox" id="location" class="modal-toggle" />
    <div class="modal">
        <div class="loc-modal-loc modal-box max-w-full">
            <label for="location" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            <h3 class="font-bold text-4xl underline underline-offset-2">Grants By Location</h3>
            <div class="mainmodald mt-5">
                <div class="grid lg:grid-cols-4 md:grid-cols-2" id="locationSection">
                    @php
                    $counts = 0;
                    @endphp
                    @foreach ($countries as $country)
                    @if ($counts == 0)
                    <div class="xyz">
                        @endif
                        @php
                        $counts = $counts+1;
                        @endphp
                        <div class="form-control w-full max-w-md flex flex-row mt-3 basis-1/4">
                            <input name="countries[]" type="checkbox" value="{{ $country->id }}" id="location-prnt-{{ $country->id }}" class="location-parent-checkbox checkbox checkbox-sm countries rounded-none" {{ $locationCountry && in_array($country->id, $locationCountry) ? 'checked' : '' }} />
                            <span class="label-text mx-1" data-interest="{{ $country->id }}">{{ $country->name }}</span>
                        </div>
                        @if ($country->states)
                        @foreach ($country->states as $state)
                        <div class="form-control w-full max-w-md flex flex-row mt-3 basis-1/4 mx-8">
                            <input name="states[]" type="checkbox" value="{{ $state->id }}" id="states-{{ $country->id }}" class="location-child-checkbox checkbox checkbox-sm rounded-none state-{{ $country->id }}" @if ((!$locationFilters && $userProfile && $userProfile->states) ? $userProfile->states->contains($state->id) : '') checked @endif
                            {{ $locationFilters && in_array($state->id, $locationFilters) ? 'checked' : '' }} />
                            <span class="label-text mx-1" data-interest="{{ $state->id }}">{{ $state->name }}</span>
                        </div>
                        @php
                        $counts = $counts+1;
                        @endphp
                        @if ($counts%20 == 0)
                    </div>
                    <div class="xyz">
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="modal-action">
                <label onclick="filterResult()" for="location" id="locationResult" class="btn bg-[#2d4352] text-[#d7e1e8] border-[#2d4352] border-2 hover:bg-[#d7e1e8] hover:text-[#2d4352]">View Results</label>
                <button onclick="clearLocations()" class="btn bg-[#d7e1e8] text-[#2d4352] border-[#d7e1e8] border-2 hover:bg-[#2d4352] hover:text-[#d7e1e8] ml-2">Clear</button>
            </div>
        </div>
    </div>
</div>

{{-- Grants by Eligibility --}}
<div>
    <input type="checkbox" id="eligibility" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box max-w-full">
            <label for="eligibility" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            <h3 class="font-bold text-4xl underline underline-offset-3">Grants Eligibility</h3>

            <div class="mt-5">
                <div class="md:grid grid-cols-2" id="eligibilitySection">
                    @foreach ($eligibilies as $item)
                    <div class="form-control w-full max-w-md flex flex-row mt-3 basis-1/4">
                        <input name="eligibility[]" type="checkbox" value="{{ $item->id }}" class="checkbox checkbox-sm rounded-none" {{ $eligibilityFilters && in_array($item->id, $eligibilityFilters) ? 'checked' : '' }} />
                        <span class="label-text mx-1">{{ $item->title }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="modal-action ">
                <label onclick="filterResult()" for="eligibility" id="eligibilityResult" class="btn bg-[#2d4352] text-[#d7e1e8] border-[#2d4352] border-2 hover:bg-[#d7e1e8] hover:text-[#2d4352]">View Results</label>
                <button onclick="clearEligibility()" class="btn bg-[#d7e1e8] text-[#2d4352] border-[#d7e1e8] border-2 hover:bg-[#2d4352] hover:text-[#d7e1e8] ml-2">Clear</button>
            </div>
        </div>
    </div>
</div>
<script>
    // clear interests
    function clearInterests() {
        const checkboxes = document.querySelectorAll('input[name="interests[]"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = false;
        });
    }

    // clear Locations
    function clearLocations() {
        const countries = document.querySelectorAll('input[name="countries[]"]');
        const states = document.querySelectorAll('input[name="states[]"]');

        countries.forEach(country => {
            country.checked = false;
        });

        states.forEach(state => {
            state.checked = false;
        });
    }

    // clear eligibility
    function clearEligibility() {
        const checkboxes = document.querySelectorAll('input[name="eligibility[]"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = false;
        });
    }
</script>
<script>
    // Get all the checkboxes inside the CountryFilter element
    const CountryFilterCheckboxes = document.querySelectorAll('#CountryFilter');
    const InterestFilterCheckboxes = document.querySelectorAll('#InterestFilter');
    const EligibilityFilterCheckboxes = document.querySelectorAll('#EligibilityFilter');

    CountryFilterCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            viewResult();
        });
    });

    InterestFilterCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            viewResult();
        });
    });

    EligibilityFilterCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            viewResult();
        });
    });

    function viewResult() {
        let {
            pathname
        } = window.location;

        // Search grants
        const searchSection = document.getElementById('search-box');
        const searchKey = searchSection.value;

        // Grants by amount  
        const amountSection = document.getElementById('amountSection');
        const selectedAmounts = Array.from(amountSection.querySelectorAll('input[name="amount[]"]:checked')).map(el =>
            el.value);

        // Grants by interest filter
        const selectedInterests = Array.from(document.querySelectorAll('#InterestFilter input[name="interests[]"]:checked')).map(
            el => el.value);

        // Grants by eligibility filter
        const selectedEligibilities = Array.from(document.querySelectorAll(
            '#EligibilityFilter input[name="eligibility[]"]:checked')).map(el => el.value);

        // Grants by location filter
        const selectedStates = Array.from(document.querySelectorAll('#CountryFilter input[name="states[]"]:checked')).map(el =>
            el.value);
        const selectedCountries = Array.from(document.querySelectorAll('#CountryFilter input[name="countries[]"]:checked')).map(
            el => el.value);

        const queryParams = new URLSearchParams();

        if (searchKey) {
            queryParams.append('search', searchKey);
        }

        if (selectedAmounts.length) {
            queryParams.append('amount', selectedAmounts.join(','));
        }

        if (selectedInterests.length) {
            queryParams.append('interests', selectedInterests.join(','));
        }

        if (selectedEligibilities.length) {
            queryParams.append('eligibility', selectedEligibilities.join(','));
        }

        if (selectedStates.length) {
            queryParams.append('states', selectedStates.join(','));
        }

        if (selectedCountries.length) {
            queryParams.append('countries', selectedCountries.join(','));
        }

        window.location.href = `${pathname}?${queryParams.toString()}#grant-list`;
    }
</script>
<script>
    // clear params from url
    function uncheckCheckbox() {
        window.location = window.location.href.split('?')[0] + '?clear=1#grant-list';
    }

    // Search grants
    document.querySelector('#search-box').addEventListener('keydown', function(e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            filterResult();
        }
    });

    function filterResult() {
        let {
            pathname
        } = window.location;

        // Search grants
        const searchSection = document.getElementById('search-box');
        const searchKey = searchSection.value;

        // Grants by amount  
        const amountSection = document.getElementById('amountSection');
        const selectedAmounts = Array.from(amountSection.querySelectorAll('input[name="amount[]"]:checked')).map(el =>
            el.value);

        // Grants by interest filter
        const interestSection = document.getElementById('interestSection');
        const selectedInterests = Array.from(interestSection.querySelectorAll('input[name="interests[]"]:checked')).map(
            el => el.value);

        // Grants by eligibility filter
        const eligibilitySection = document.getElementById('eligibilitySection');
        const selectedEligibilities = Array.from(eligibilitySection.querySelectorAll(
            'input[name="eligibility[]"]:checked')).map(el => el.value);

        // Grants by location filter
        const locationSection = document.getElementById('locationSection');
        const selectedStates = Array.from(locationSection.querySelectorAll('input[name="states[]"]:checked')).map(el =>
            el.value);
        const selectedCountries = Array.from(locationSection.querySelectorAll('input[name="countries[]"]:checked')).map(
            el => el.value);

        const queryParams = new URLSearchParams();

        if (searchKey) {
            queryParams.append('search', searchKey);
        }

        if (selectedAmounts.length) {
            queryParams.append('amount', selectedAmounts.join(','));
        }

        if (selectedInterests.length) {
            queryParams.append('interests', selectedInterests.join(','));
        }

        if (selectedEligibilities.length) {
            queryParams.append('eligibility', selectedEligibilities.join(','));
        }

        if (selectedStates.length) {
            queryParams.append('states', selectedStates.join(','));
        }

        if (selectedCountries.length) {
            queryParams.append('countries', selectedCountries.join(','));
        }

        window.location.href = `${pathname}?${queryParams.toString()}#grant-list`;
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all parent checkboxes
        const parentCheckboxes = document.querySelectorAll('.parent-checkbox');

        // Loop through each parent checkbox
        parentCheckboxes.forEach(function(parentCheckbox) {
            // Get child checkboxes associated with the current parent checkbox
            const childCheckboxes = parentCheckbox.parentNode.nextElementSibling.querySelectorAll('input[name="states[]"]');

            // Function to update the parent checkbox state based on child checkboxes
            function updateParentCheckbox() {
                const allChecked = Array.from(childCheckboxes).every(cb => cb.checked);
                parentCheckbox.checked = allChecked;
            }

            // Check parent checkbox on page load
            updateParentCheckbox();

            // Add change event listener to child checkboxes
            childCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', updateParentCheckbox);
            });
        });
    });
</script>
<script>
    // Get all country checkboxes
    const countryCheckboxes = document.querySelectorAll('.countries');

    // Loop through all country checkboxes
    countryCheckboxes.forEach(function(countryCheckbox) {
        const countryValue = countryCheckbox.value;
        const stateCheckboxes = document.querySelectorAll('.state-' + countryValue);

        // Add an event listener to the country checkbox
        countryCheckbox.addEventListener('change', function() {
            // Loop through all state checkboxes for the current country
            stateCheckboxes.forEach(function(stateCheckbox) {
                // Select or unselect the state checkbox based on the country checkbox's checked state
                stateCheckbox.checked = countryCheckbox.checked;
            });
        });
    });
</script>
@include('website.copypastescript')
@endsection