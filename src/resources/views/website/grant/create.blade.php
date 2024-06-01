@extends('website.website')
@section('title', 'Add Grants')
@section('content')
<style>
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
</style>
<form action="{{ route('website.store.grant') }}" method="post" class="md:mx-20 mx-4">
    @csrf
    <section class="md:my-10 md:mx-20 py-10">
        <hr class="border-b-2 border-[#2d4352]">
        <div class="border-t-2 border-[#2d4352] mt-3">
            <h1 class="text-5xl font-bold text-center text-[#2d4352] mt-5">Add A Grant</h1>
            <h2>
                @if (Session::get('success'))
                <div class="alert alert-info">{{ Session::get('success') }}</div>
                @endif
            </h2>
        </div>

        <div class="form-control w-full">
            <label class="label">
                <span class="label-text text-xl text-[#2d4352]">Opportunity Title</span>
            </label>
            <input type="text" name="opportunity_title" value="{{ old('opportunity_title') }}" placeholder="Opportunity Title" id="titleID" class="input input-bordered w-full mt-4 input-md border-1 border-[#2d4352]" />
            @error('opportunity_title')
            <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-control w-full">
            <label class="label">
                <span class="label-text text-xl text-[#2d4352]">Opportunity Teaser</span>
            </label>
            <textarea name="opportunity_teaser" id="opportunityTeaserInstance" class="tinymceInstance opportunity_teaser textarea textarea-bordered h-24 border-1 border-[#2d4352]" placeholder="Opportunity Teaser">{{ old('opportunity_teaser') }}</textarea>
            @error('opportunity_teaser')
            <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-control w-full">
            <label class="label">
                <span class="label-text text-xl text-[#2d4352]">Opportunity Title for Subscriber</span>
            </label>
            <input type="text" name="opportunity_title_for_subscriber" id="opportunity_title_for_subscriber" value="{{ old('opportunity_title_for_subscriber') }}" placeholder="Opportunity Title for Subscriber" class="input input-bordered w-full mt-4 input-md border-1 border-[#2d4352]" />
            @error('opportunity_title_for_subscriber')
            <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-control w-full">
            <label class="label">
                <span class="label-text text-xl text-[#2d4352]">Opportunity Description for Subscriber</span>
            </label>
            <textarea name="opportunity_description_for_subscriber" id="OppDesSubInstance" class="tinymceInstance textarea textarea-bordered h-24 border-1 border-[#2d4352] opportunity_description_for_subscriber" placeholder="Opportunity Description for Subscriber">{{ old('opportunity_description_for_subscriber') }}</textarea>
            @error('opportunity_description_for_subscriber')
            <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <div>
                <div class="flex flex-row w-1/2">
                    <div style="margin-left: -13px" class="form-control pl-4 max-w-md flex flex-row mt-4 items-center">
                        <input type="hidden" name="is_opening" value="0">
                        <input name="is_opening" type="checkbox" value="1" {{ old('is_opening') == 1 ? 'checked' : '' }} class="checkbox checkbox-sm rounded-none" id="is_opening" />
                        <span class="text-xl ml-1">Open</span>
                    </div>
                </div>
                <div class="flex flex-row">
                    <div class="basis-1/2 md:basis-1/2 form-control w-full pr-3">
                        <label class="label">
                            <span class="label-text text-xl text-[#2d4352]">Amount (Low)</span>
                        </label>
                        <input type="number" id="amount_low" name="amount_low" value="{{ old('amount_low') }}" placeholder="Amount (Low)" class="input input-bordered w-full mt-4 input-md border-1 border-[#2d4352]" />
                        @error('amount_low')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="basis-1/2 md:basis-1/2 form-control w-full pl-3">
                        <label class="label">
                            <span class="label-text text-xl text-[#2d4352]">Amount (High)</span>
                        </label>
                        <input type="number" id="amount_high" name="amount_high" value="{{ old('amount_high') }}" placeholder="Amount (High)" class="input input-bordered w-full mt-4 input-md border-1 border-[#2d4352]" />
                        @error('amount_high')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function() {
                    // Listen for changes on the "Open" checkbox
                    $('input[name="is_opening"]').change(function() {
                        // If it's checked, disable the amount low and high fields
                        if ($(this).is(':checked')) {
                            $('input[name="amount_low"]').prop('disabled', true).val('');
                            $('input[name="amount_high"]').prop('disabled', true).val('');
                        } else {
                            // Otherwise, enable the fields
                            $('input[name="amount_low"]').prop('disabled', false);
                            $('input[name="amount_high"]').prop('disabled', false);
                        }
                    });


                    $('input[name="is_ongoing"]').change(function() {
                        if ($(this).is(':checked')) {
                            $('input[name="deadline_at"]').prop('disabled', true).val('');
                            $('input[name="close_date_at"]').prop('disabled', true).val('');
                        } else {
                            // Otherwise, enable the fields
                            $('input[name="deadline_at"]').prop('disabled', false);
                            $('input[name="close_date_at"]').prop('disabled', false);
                        }
                    });
                });
            </script>

            <div class="flex flex-row w-1/2">
                <div class="form-control w-1/2 max-w-md flex flex-row mt-4 items-center">
                    <input type="hidden" name="is_ongoing" value="0">
                    <input name="is_ongoing" type="checkbox" value="1" {{ old('is_ongoing') == 1 ? 'checked' : '' }} class="checkbox checkbox-sm rounded-none" id="is_ongoing" />
                    <span class="text-xl mx-1">Ongoing</span>
                </div>
            </div>

            <div>
                <div class="flex md:flex-row flex-col">
                    <div class="basis-1/4 md:basis-1/4 form-control w-full pr-3">
                        <label class="label">
                            <span class="label-text text-xl text-[#2d4352]">Close Date</span>
                        </label>
                        <input type="date" name="close_date_at" value="{{ old('close_date_at') }}" placeholder="Close Date" id="close_date_at" class="input input-bordered w-full mt-4 input-md border-1 border-[#2d4352]" />
                        @error('close_date_at')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="basis-1/4 md:basis-1/4 form-control w-full px-3">
                        <label class="label">
                            <span class="label-text text-xl text-[#2d4352]">Deadline</span>
                        </label>
                        <input type="date" id="deadline_at" name="deadline_at" value="{{ old('deadline_at') }}" placeholder="Deadline" class="input input-bordered w-full mt-4 input-md border-1 border-[#2d4352]" />
                        @error('deadline_at')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="basis-1/4 md:basis-1/4 form-control w-full px-3">
                        <label class="label">
                            <span class="label-text text-xl text-[#2d4352]">Letter Of Intent Deadline</span>
                        </label>
                        <input type="date" id="letter_of_intent_deadline_at" name="letter_of_intent_deadline_at" value="{{ old('letter_of_intent_deadline_at') }}" placeholder="Letter Of Intent Deadline" class="input input-bordered w-full mt-4 input-md border-1 border-[#2d4352]" />
                        @error('letter_of_intent_deadline_at')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="basis-1/4 md:basis-1/4 form-control w-full pl-3">
                        <label class="label">
                            <span class="label-text text-xl text-[#2d4352]">Posted Date</span>
                        </label>
                        <input type="date" id="posted_date_at" name="posted_date_at" value="{{ old('posted_date_at') }}" placeholder="Posted Date" class="input input-bordered w-full mt-4 input-md border-1 border-[#2d4352]" />
                        @error('posted_date_at')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text text-xl text-[#2d4352]">URL</span>
                </label>
                <input name="url" id="url" type="url" value="{{ old('url') }}" placeholder="URL" class="input input-bordered w-full mt-4 input-md border-1 border-[#2d4352]" />
                @error('url')
                <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <div class="flex flex-row">
                    <div class="form-control w-full basis-2/3 md:basis-2/3 mt-4">
                        <label class="label">
                            <span class="label-text text-xl text-[#2d4352]">Funding Source</span>
                        </label>
                        <input name="funding_source" id="funding_source" type="text" value="{{ old('funding_source') }}" placeholder="Funding Source" class="input input-bordered w-full input-md border-1 border-[#2d4352]" />
                        @error('funding_source')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="basis-1/2 md:basis-1/2 mx-1 mt-4">
                        <label class="label">
                            <span class="label-text text-xl text-[#2d4352]">Region(s)</span>
                        </label>
                        <label for="location" class="btn w-full bg-[#d7e1e8] text-[#2d4352] border-[#2d4352] border-2 hover:bg-[#2d4352] hover:text-[#d7e1e8] ">Add
                            Region +</label>
                        @error('states')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div>
                <div class="flex flex-row">
                    <div class="mt-4 basis-1/2 md:basis-1/2 mx-1">
                        <label class="label">
                            <span class="label-text text-xl text-[#2d4352]">Interest Group(s)</span>
                        </label>
                        <label for="interest_Group" class="btn w-full   bg-[#d7e1e8] text-[#2d4352] border-[#2d4352] border-2 hover:bg-[#2d4352] hover:text-[#d7e1e8]">Interest
                            Group(s) +</label>
                        @error('interests')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-4 basis-1/2 md:basis-1/2 mx-1">
                        <label class="label">
                            <span class="label-text text-xl text-[#2d4352]">Eligibility(ies)</span>
                        </label>
                        <label for="eligibility" class="btn w-full   bg-[#d7e1e8] text-[#2d4352] border-[#2d4352] border-2 hover:bg-[#2d4352] hover:text-[#d7e1e8] ">Eligibility(ies)
                            +</label>
                        @error('eligibilties')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text text-xl text-[#2d4352]">Funding Agency</span>
                </label>
                <select name="funding_agency" id="funding_agency" class="select select-bordered border-1 border-[#2d4352] funding-agency select2">
                    <option disabled selected>Select Agency</option>
                    @foreach ($funding_agencies as $item)
                    <option value="{{ $item->value }}" {{ old('funding_agency') == $item->value ? 'selected' : '' }}>
                        {{ $item->text }}
                    </option>
                    @endforeach
                </select>
                @error('funding_agency')
                <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text text-xl text-[#2d4352]">Additional Notes</span>
                </label>
                <textarea name="additional_notes" id="addNoteInstance" class="tinymceInstance additional_notes textarea textarea-bordered h-24 border-1 border-[#2d4352]" placeholder="Additional Notes">{{ old('additional_notes') }}</textarea>
                @error('additional_notes')
                <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-control w-full">

            </div>
            <button type="submit" class="rounded  px-3 py-2 mt-5 bg-[#2d4352] text-[#d7e1e8] border-[#2d4352] border-2 hover:bg-[#d7e1e8] hover:text-[#2d4352] float-right" name="status" value="publish">Submit</button>
            <button type="button" class="float-right mr-3">
                <label onclick="showPreview()" for="preview" class="rounded  px-3 py-2 mt-5 mr-3  bg-[#2d4352] text-[#d7e1e8] border-[#2d4352] border-2 hover:bg-[#d7e1e8] hover:text-[#2d4352] float-right">Preview
                </label>
            </button>
    </section>

    <div>
        <input type="checkbox" id="preview" class="modal-toggle" style="display: none;" />
        <div class="modal">
            <div class="modal-box" style="max-width: none">
                <label for="preview" class="close btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                <h3 class="font-bold text-4xl underline underline-offset-3">Preview</h3>
                <div class="mt-5 modal-body">
                    <section class="my-10 py-10">
                        <div class="">
                            <hr class="border-b-2 border-[#2d4352]">
                            <hr class="border-b-2 border-[#2d4352]  mt-3">
                            <div class="">
                                <div class=""><br>
                                    <div class="flex">
                                        <div class="col-lg-8">
                                            <h1 class="text-4xl font-bold col-lg-8" id="GrantPreviewTitle"></h1>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="flex text-xl text-amber-600">
                                        <div class="contents">
                                            <div class="flex-1 bg-slate-100 p-2 ml-4 text-lg" id="GrantPreviewAmountLow">Grant Funding Amount Low : </div>
                                            <div class="flex-1 bg-slate-100 p-2 ml-4 text-lg" id="GrantPreviewAmountHigh">Grant Amount High : </div>
                                        </div>
                                        <div class="flex-1  bg-slate-100 p-2 ml-4 text-lg" id="GrantPreviewDeadline">Deadline : </div>
                                    </div>


                                    <br>

                                    <hr class="border-b-2 border-[#2d4352]">
                                    <br>
                                    <h1 class="text-4xl text-amber-900">Opportunity Teaser</h1> <br>
                                    <div class="">
                                        <div class="" id="GrantPreviewOpportunityTeaser">

                                        </div>
                                        <br>
                                        <hr class="border-b-2 border-[#2d4352]">
                                        <br>
                                        <h1 class="text-4xl text-amber-900">Eligible Requirements</h1> <br>

                                        <div class="mx-24text-justify px-6">

                                            <ul class="list-disc" id="GrantPreviewEligibilities">
                                            </ul>
                                        </div>
                                    </div>
                                    <br>
                                    <hr class="border-b-2 border-[#2d4352]">
                                    <br>
                                    <h1 class="text-4xl text-amber-900">Eligible Location</h1> <br>

                                    <div class="mx-24text-justify px-6">

                                        <ul class="list-disc" id="GrantPreviewState">
                                        </ul>
                                    </div>
                                    <br>
                                    <hr class="border-b-2 border-[#2d4352]">
                                    <br>

                                    <h1 class="text-4xl text-amber-900">Detail Description</h1> <br>

                                    <div class="text-justify px-6" id="GrantPreviewOpportunityDescription">
                                        <p></p>
                                    </div>

                                    <hr class="border-b-2 border-[#2d4352]">
                                    <br>

                                    <h1 class="text-4xl text-amber-900">Funding Source</h1> <br>

                                    <div class="text-justify px-6" id="GrantPreviewFundingSourse">
                                        <p></p>
                                    </div>
                                    <hr class="border-b-2 border-[#2d4352]">
                                    <br>

                                    <h1 class="text-4xl text-amber-900">Additional Notes</h1> <br>

                                    <div class="text-justify px-6" id="GrantPreviewAdditionalNotes">
                                        <p></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>
                </section>
            </div>
            <div class="modal-action">
            </div>
        </div>
    </div>
    </div>
    <div>
        <input type="checkbox" id="interest_Group" class="modal-toggle" />
        <div class="modal">
            <div class="modal-box w-11/12 max-w-full mx-20">
                <label for="interest_Group" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                <h3 class="font-bold text-4xl underline underline-offset-2">Grants by Interest</h3>
                <div class="mt-5 mx-10">
                    <div class="grid grid-cols-4">
                        @foreach ($interests as $item)
                        <div class="form-control w-full max-w-md flex flex-row mt-3 basis-1/4">
                            <input name="interests[]" type="checkbox" value="{{ $item->value }}" id="interests-{{ $item->value }}" class="checkbox checkbox-sm rounded-none" <?php if (in_array($item->value, old('interests', []))) echo 'checked'; ?> />
                            <span class="label-text mx-1">{{ $item->text }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="modal-action">
                    <label for="interest_Group" class="btn bg-[#2d4352] text-[#d7e1e8] border-[#2d4352] border-2 hover:bg-[#d7e1e8] hover:text-[#2d4352]">Add
                        Interest</label>
                    <button type="button" onclick="clearSelections()" class="btn bg-[#d7e1e8] text-[#2d4352] border-[#d7e1e8] border-2 hover:bg-[#2d4352] hover:text-[#d7e1e8] ml-2">Clear</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function clearSelections() {
            const checkboxes = document.querySelectorAll('input[name="interests[]"]');

            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
            });
        }
    </script>


    <div>
        <input type="checkbox" id="location" class="modal-toggle" />
        <div class="modal">
            <div class="modal-box  w-11/12 max-w-3xl mx-20" id="locationSection">
                <label for="location" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                <h3 class="font-bold text-4xl underline underline-offset-3">Grants by Location</h3>
                <div class="inputs" id="main-wrap">
                    @foreach ($counttry_states as $item)
                    <div class="mt-5 main-geo">
                        <div class="sub-geo">
                            <div class="flex w-full max-w-md mt-3 main-elm">
                                <input name="countries" type="checkbox" value="{{ $item->id }}" id="country-{{ $item->id }}" class="checkbox checkbox-sm countries rounded-none" <?php if (old('countries') == $item->id) echo 'checked'; ?> />
                                <span class="label-text ml-1">{{ $item->name }}</span>
                            </div>
                            <div class="grid grid-cols-1 mx-10 sub-elm" id="state">
                                @if ($item->states)
                                @foreach ($item->states as $st)
                                <div class="form-control w-full max-w-md flex flex-row mt-3 basis-1/4">
                                    <input name="states[]" value="{{ $st->id }}" type="checkbox" id="state-{{ $st->id }}" class="checkbox checkbox-sm state-{{ $item->id }} rounded-none" <?php if (in_array($st->id, old('states', []))) echo 'checked'; ?> />
                                    <span class="label-text ml-1">{{ $st->name }}</span>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="modal-action">
                    <label for="location" class="btn bg-[#2d4352] text-[#d7e1e8] border-[#2d4352] border-2 hover:bg-[#d7e1e8] hover:text-[#2d4352]">Add
                        Region</label>
                    <button type="button" onclick="clearSelectionw()" class="btn bg-[#d7e1e8] text-[#2d4352] border-[#d7e1e8] border-2 hover:bg-[#2d4352] hover:text-[#d7e1e8] ml-2">Clear</button>
                </div>
            </div>
        </div>
    </div>



    <script>
        function clearSelectionw() {
            const countries = document.querySelectorAll('input[name="countries"]');
            const states = document.querySelectorAll('input[name="states[]"]');

            countries.forEach(country => {
                country.checked = false;
            });

            states.forEach(state => {
                state.checked = false;
            });
        }
    </script>

    <div>
        <input type="checkbox" id="eligibility" class="modal-toggle" />
        <div class="modal">
            <div class="modal-box w-11/12 max-w-full mx-20">
                <label for="eligibility" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                <h3 class="font-bold text-4xl underline underline-offset-3">Grants Eligibility</h3>

                <div class="mt-5">
                    <div class="grid grid-cols-2" id="eligibilitySection">
                        @foreach ($eligibilties as $item)
                        <div class="form-control w-full max-w-md flex flex-row mt-3 basis-1/4">
                            <input name="eligibilities[]" type="checkbox" value="{{ $item->value }}" id="eligibilities-{{ $item->value }}" class="checkbox checkbox-sm rounded-none" <?php if (in_array($item->value, old('eligibilities', []))) echo 'checked'; ?> />
                            <span class="label-text mx-1">{{ $item->text }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>


                <div class="modal-action">
                    <label for="eligibility" class="btn bg-[#2d4352] text-[#d7e1e8] border-[#2d4352] border-2 hover:bg-[#d7e1e8] hover:text-[#2d4352]">Add
                        Eligibility</label>
                    <button type="button" onclick="clearSelection()" class="btn bg-[#d7e1e8] text-[#2d4352] border-[#d7e1e8] border-2 hover:bg-[#2d4352] hover:text-[#d7e1e8] ml-2">Clear</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function clearSelection() {
            const checkboxes = document.querySelectorAll('input[name="eligibilities[]"]');

            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
            });
        }
    </script>

</form>

@endsection
@push('js')
<script type="text/javascript" charset="utf-8">
    $(function() {
        $('.funding-agency').select2();
        // if item not found in dropdown create new item and append to list
        $('.select2').select2({
            tags: true,
        }).on('select2:close', function() {
            var element = $(this);
            var new_item = $.trim(element.val());

            if (new_item != '') {
                $.ajax({
                    url: "/add-new-agency-ajax",
                    method: "POST",
                    data: {
                        new_item: new_item
                    },
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data.success == true) {
                            element.append('<option value="' + data.item.id + '">' +
                                new_item +
                                '</option>').val(data.item.id);
                        }
                    }
                })
            }

        });
        // Get all country checkboxes
        const countryCheckboxes = $('.countries');

        // Loop through all country checkboxes
        countryCheckboxes.each(function() {
            const countryCheckbox = $(this);
            const countryValue = countryCheckbox.val();
            const stateCheckboxes = $('.state-' + countryValue);

            // Add an event listener to the country checkbox
            countryCheckbox.on('change', function() {
                // Loop through all state checkboxes for the current country
                stateCheckboxes.each(function() {
                    // Select or unselect the state checkbox based on the country checkbox's checked state
                    $(this).prop('checked', countryCheckbox.prop('checked'));
                });
            });
        });
    })

    // Grant preview
    function showPreview() {
        const title = document.querySelector("#titleID").value || "N/A";
        const amount_low = document.querySelector("#amount_low").value || "N/A";
        const amount_high = document.querySelector("#amount_high").value || "N/A";
        const deadline_at = document.querySelector("#deadline_at").value || "N/A";
        const eligibilitySection = document.querySelectorAll('#eligibilitySection input[name="eligibilities[]"]:checked');
        const selectedEligibilities = Array.from(eligibilitySection).map(checkbox => checkbox.nextElementSibling.textContent.trim());
        const state = document.querySelectorAll('#state input[name="states[]"]:checked');
        const selectedState = Array.from(state).map(checkbox => checkbox.nextElementSibling.textContent.trim());
        const funding_source = document.querySelector("#funding_source").value || "N/A";
        const opportunity_description_for_subscriber = tinymce.get('OppDesSubInstance').getContent();
        const opportunity_teaser = tinymce.get('opportunityTeaserInstance').getContent();
        const additional_notes = tinymce.get('addNoteInstance').getContent();
        document.querySelector('#GrantPreviewTitle').innerHTML = title;
        // document.querySelector('#GrantPreviewAmountLow').innerHTML = `Grant Funding Amount Low: ${amount_low}`;
        const isOpening = document.querySelector("#is_opening").checked;
        console.log(isOpening);
        if (isOpening) {
            document.querySelector('#GrantPreviewAmountLow').innerHTML = "Grant Funding Amount Low: Open";
        } else {
            document.querySelector('#GrantPreviewAmountLow').innerHTML = `Grant Funding Amount Low: ${amount_low}`;
            document.querySelector('#GrantPreviewAmountHigh').innerHTML = `Grant Funding Amount High: ${amount_high}`;
        }
        // document.querySelector('#GrantPreviewDeadline').innerHTML = `Deadline: ${deadline_at}`;
        const isOngoing = document.querySelector("#is_ongoing").checked;
        console.log(isOngoing);
        if (isOngoing) {
            document.querySelector('#GrantPreviewDeadline').innerHTML = "Deadline: Ongoing";
        } else {
            document.querySelector('#GrantPreviewDeadline').innerHTML = `Deadline: ${deadline_at}`;
        }

        document.querySelector('#GrantPreviewOpportunityDescription').innerHTML = opportunity_description_for_subscriber;
        document.querySelector('#GrantPreviewFundingSourse').innerHTML = funding_source;
        document.querySelector('#GrantPreviewAdditionalNotes').innerHTML = additional_notes;
        document.querySelector('#GrantPreviewOpportunityTeaser').innerHTML = opportunity_teaser;


        const ulElement = document.querySelector('#GrantPreviewEligibilities');
        selectedEligibilities.forEach(content => {
            const liElement = document.createElement('li');
            liElement.textContent = content;
            ulElement.appendChild(liElement);
        });

        const uElement = document.querySelector('#GrantPreviewState');
        selectedState.forEach(content => {
            const liElement = document.createElement('li');
            liElement.textContent = content;
            uElement.appendChild(liElement);
        });
    }
</script>
@endpush()