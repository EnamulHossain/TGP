@extends('website.website')
@section('title', 'Grant Details')
@section('content')
<style>
    .fadedbg {
        --mask: linear-gradient(to bottom,
                rgba(0, 0, 0, 1) 0, rgba(0, 0, 0, 1) 20%,
                rgba(0, 0, 0, 0) 70%, rgba(0, 0, 0, 0) 0) 100% 50% / 100% 100% repeat-x;
        -webkit-mask: var(--mask);
        mask: var(--mask);
    }

    .additional_notes_content ul li::marker {
        unicode-bidi: isolate;
        font-variant-numeric: tabular-nums;
        text-transform: none;
        text-indent: 0px !important;
        text-align: start !important;
        text-align-last: start !important;
    }

    .additional_notes_content ul li {
        display: list-item;
        text-align: -webkit-match-parent;
    }

    .additional_notes_content p {
        display: block;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
    }

    .additional_notes_content ul {
        display: block;
        list-style-type: disc;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        padding-inline-start: 40px;
    }

    .additional_notes_content a {
        color: -webkit-link;
        cursor: pointer;
        text-decoration: underline;
    }

    .additional_notes_content h2 {
        display: block;
        font-size: 1.5em;
        margin-block-start: 0.83em;
        margin-block-end: 0.83em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        font-weight: bold;
    }
</style>

<section class="my-10 mx-6 md:mx-52 py-10">
    <div class="">
        <hr class="border-b-2 border-[#2d4352]">
        <hr class="border-b-2 border-[#2d4352]  mt-3">
        <div class="">
            <div class=""><br>
                <br>
                <br>
                <br>
                <br>
                <div class="flex">
                    <div class="w-4/5">
                        <h1 class="text-4xl font-bold">{{ $grant->opportunity_title }}</h1>
                    </div>
                    <div class="w-1/5 flex justify-end">
                        @if ($isPaidSubscriber || $isAdmin)
                        <button class="flex items-center font-bold py-2 px-4 btn btn-success">
                            <a href="{{ $grant->url }}" target="_blank">Apply Here</a>
                        </button>
                        @endif
                    </div>
                </div>
                <br>
                <div class="flex text-xl text-amber-600">
                    <div class="flex-1 bg-slate-100 p-2 text-lg">GrantID : {{ $grant->id }}</div>
                    @if ($grant->amount_low <= 0 || $grant->is_opening == '1')
                    <div class="contents">
                        <div class="flex-1 bg-slate-100 p-2 ml-4 text-lg">Grant Funding Amount Low : Open</div>
                    </div>
                    @else
                    <div class="contents">
                        <div class="flex-1 bg-slate-100 p-2 ml-4 text-lg">Grant Funding Amount Low: {{ '$'.number_format($grant->amount_low) }}</div>
                        <div class="flex-1 bg-slate-100 p-2 ml-4 text-lg">Grant Amount High: {{ '$'.number_format($grant->amount_high) }}</div>
                    </div>
                    
                    @endif
                    @if ($grant->is_ongoing == '1' || $grant->deadline_at == 'December 31, 2099' )
                    <div class="contents">
                        <div class="flex-1 bg-slate-100 p-2 ml-4 text-lg">Deadline : Ongoing</div>
                    </div>
                    @else
                    <div class="flex-1  bg-slate-100 p-2 ml-4 text-lg">Deadline : {{ $grant->deadline_at }}</div>
                    @endif


                </div>


                <br>

                <hr class="border-b-2 border-[#2d4352]">
                <br>
                <div class="@if (!$isPaidSubscriber && !$isAdmin) fadedbg @endif">
                    <div class="">
                        {!! $grant->opportunity_teaser !!}
                    </div>
                    <br>
                    <hr class="border-b-2 border-[#2d4352]">
                    <br>
                    @if ($isPaidSubscriber || $isAdmin)
                    <h1 class="text-4xl text-amber-900">Eligible Requirements</h1> <br>
                    <div class="mx-24 text-justify px-6" id="fadremove">
                        @if ($grant->eligibilties)
                        <ul class="list-disc" id="fadremove2">
                            @php
                            $titles = [];
                            @endphp
                            @foreach ($grant->eligibilties as $eligible)
                            @php
                            $titles[] = $eligible->title;
                            @endphp
                            @endforeach

                            @php
                            $uniqueTitles = array_unique($titles);
                            @endphp

                            @foreach ($uniqueTitles as $title)
                            <li>{{ $title }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    @endif
                    @if ($isPaidSubscriber || $isAdmin)
                    <br>
                    <hr class="border-b-2 border-[#2d4352]">
                    <br>
                    <h1 class="text-4xl text-amber-900">Eligible Regions</h1> <br>
                    @if ($grant->states)
                    <div class="mx-24 text-justify px-6">
                        @php
                        $uniqueStateNames = $grant->states->unique('name');
                        @endphp

                        @if ($uniqueStateNames->isNotEmpty())
                        <ul class="list-disc">
                            @foreach ($uniqueStateNames as $state)
                            <li>{{ $state->name }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>

                    @endif
                    @endif

                    @if ($isPaidSubscriber || $isAdmin)
                    <br>
                    <hr class="border-b-2 border-[#2d4352]">
                    <br>

                    <h1 class="text-4xl text-amber-900 ">Detail Description</h1> <br>

                    <div class="additional_notes_content text-justify px-6">
                        {!! $grant->opportunity_description_for_subscriber !!}
                    </div>
                    @endif

                </div>

                @if ($isPaidSubscriber || $isAdmin)
                <br>
                <hr class="border-b-2 border-[#2d4352]">
                <br>

                <h1 class="text-4xl text-amber-900 ">Funding Source</h1> <br>

                <div class=" text-justify px-6">
                    <p>{!! $grant->funding_source !!}</p>
                </div>
                @endif

            </div>
            <br>
            @if ($isPaidSubscriber  || $isAdmin)
            <hr class="border-b-2 border-[#2d4352]">
            <br>

            <h1 class="text-4xl text-amber-900 @if (!$isPaidSubscriber && !$isAdmin) fadedbg @endif">AdditionalNotes</h1> <br>

            <div class="additional_notes_content text-justify px-6">
                {!! $grant->additional_notes !!}
            </div>
            @endif
        </div>

    </div>
    </div>
    </div>
</section>
{{-- popup section --}}

@if (!$isPaidSubscriber  && !$isAdmin)
<section class="" id="popup">
    <div class="h-10 w-full"></div>
    <div class=" z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0"></div>

        <div style="top:450px;" class="absolute bottom-0 left-0 right-0 z-10">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-2xl border-2 border-black transition-all sm:my-8">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-center justify-center">
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <a style="justify-content: flex-end;" class="flex pb-4 pr-2" data-dismiss="modal" onclick="location.href=`{{ url('/') . '?' . request()->getQueryString()  }}`">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </a>
                                <h3 class="text-2xl font-semibold leading-6 text-[#2d4352]" id="modal-title">Free
                                    Sign Up | Get Daily Grant Alerts</h3>
                                <ul class="list-disc ml-8 mt-2">
                                    <li>Create your profile & select your grant categories</li>
                                    <li class="pt-1">Get free Daily Grant Alert newsletter</li>
                                    <li class="pt-1">View general grant overviews</li>
                                </ul>
                                <h3 class="text-2xl font-semibold leading-6 text-[#2d4352] mt-2" id="modal-title">
                                    View Full Grant Details with Paid Plans</h3>
                                <ul class="list-disc ml-8 mt-2">
                                    <li>View full grant details and descriptions</li>
                                    <li>Direct links to grant provider's RFPs</li>
                                    <li>View Closing Dates & Funders</li>
                                    <li>Eligible Regions, Requirements & more</li>
                                    <li>Grant Alert Newsletter</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white px-4 py-3 sm:flex items-center justify-center sm:flex-row sm:px-6">
                        <button type="button" class="bg-[#2d4352] px-8 py-3 text-sm font-semibold text-white shadow-sm sm:ml-3 sm:w-auto"><a href="{{ route('pricing.plans') }}">Next</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    function hidenPopup() {
        let popup = document.querySelector('#popup');
        popup.style.display = 'none';
        let fade = document.querySelector('.fadedbg');
        fade.classList.remove("fadedbg");
        fadremove
        var fadremove = document.getElementById('fadremove');
        fadremove.className = ''; // remove all classes
        var fadremove2 = document.getElementById('fadremove2');
        fadremove2.className = ''; // remove all classes
    }
</script>
@endif
@endsection
@include('website.copypastescript')