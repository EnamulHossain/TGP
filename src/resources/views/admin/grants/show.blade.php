@extends('admin.admin')
@section('content')
<div class="card  card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <span><i class="fa fa-edit"></i></span>
            <span>Edit - Grants</span>
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    @if (Session::get('success'))
    <div class="alert alert-info">{{ Session::get('success') }}</div>
    @endif
    <form method="post" , action="{{ route('grant.status', $item->id) . '?' . request()->getQueryString() }}">
        @csrf
        @method('put')
        <div class="card-body">
            @include('admin.partials.card.info')
            <fieldset>
                <div class="row mb-3">
                    <div class="col col-1/3">
                        <p class="text-2xl">Grant ID: <span style="color: #495057;">{{$item->id}}</span></p>
                    </div>
                    @if ($contributor)
                    <div class="col col-1/3">
                        <p class="text-2xl">Contributor: <span style="color: #495057;">{{ $contributor->profile && $contributor->profile->first_name ? $contributor->profile->first_name : $contributor->email }}</span></p>
                    </div>
                    @endif
                    @if ($publisher)
                    <div class="col col-1/3">
                        <div class="text-right">
                            <p class="text-2xl">Publisher: <span style="color: #495057;">{{ $publisher->profile && $publisher->profile->first_name ? $publisher->profile->first_name : $publisher->email }}</span></p>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="row">
                    <section class="col col-12">
                        <section class="form-group">
                            <label>Opportunity Title</label>
                            <input type="text" class="form-control" value="{{ $item->opportunity_title }}" spellcheck="true" name="opportunity_title">
                            @error('opportunity_title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </section>
                    </section>
                </div>
                <div class="row">
                    <section class="col col-12">
                        <section class="form-group">
                            <label for="opportunity_teaser">Opportunity Teaser</label>
                            <textarea class="form-control" name="opportunity_teaser" id="myeditorinstance" placeholder="Enter the opportunity teaser here">{!! $item->opportunity_teaser !!}</textarea>
                            @error('opportunity_teaser')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </section>
                    </section>
                </div>

                <div class="row">
                    <section class="col col-12">
                        <section class="form-group">
                            <label>Opportunity Title for Subscriber</label>
                            <input type="text" class="form-control" value="{{ $item->opportunity_title_for_subscriber }}" name="opportunity_title_for_subscriber">
                            @error('opportunity_title_for_subscriber')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </section>
                    </section>

                </div>
                <div class="row">
                    <section class="col col-12">
                        <section class="form-group">
                            <label>Opportunity Description for Subscriber</label>
                            <textarea class="form-control" id="myeditorinstance" contenteditable="true" spellcheck="true" name="opportunity_description_for_subscriber">{!!$item->opportunity_description_for_subscriber!!}</textarea>
                            @error('opportunity_description_for_subscriber')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </section>
                    </section>
                </div>
                <div class="row">
                    <section class="col col-6">
                        <section class="form-group">
                            <input name="is_opening" type="checkbox" value="1" @if ($item->is_opening == 1 || old('is_opening') == 1) checked @endif>
                            <label class="">Open</label>
                        </section>

                    </section>
                </div>

                <div class="row">
                    <section class="col col-6">
                        <section class="form-group">
                            <label>Amount Low</label>
                            <input id="amtlow" type="number" class="form-control" value="{{ $item->amount_low }}" name="amount_low">
                            @error('amount_low')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </section>
                    </section>

                    <section class="col col-6">
                        <section class="form-group">
                            <label>Amount High</label>
                            <input id="amthigh" type="number" class="form-control" value="{{ $item->amount_high }}" name="amount_high">
                            @error('amount_high')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </section>
                    </section>
                </div>



                <script>
                    const checkboxisop = document.querySelectorAll('input[type="checkbox"][name="is_opening"]');
                    const amtlow = document.getElementById('amtlow');
                    const amthigh = document.getElementById('amthigh');
                    var selectedValue;

                    checkboxisop.forEach(checkBox => {
                        checkBox.addEventListener('change', event => {
                            if (event.target.checked) {
                                selectedValue = event.target.name;
                                if (selectedValue === 'is_opening') {
                                    amtlow.value = '';
                                    amthigh.value = '';
                                    amtlow.setAttribute('disabled', true);
                                    amthigh.setAttribute('disabled', true);
                                }
                            } else {
                                amtlow.removeAttribute('disabled');
                                amthigh.removeAttribute('disabled');
                            }
                        });
                    });
                </script>


                <div class="row">
                    <section class="col col-6">
                        <section class="form-group">
                            <input name="is_ongoing" type="checkbox" value="1" @if ($item->is_ongoing == 1 || old('is_ongoing') == 1) checked @endif class="form-group">
                            <label class="">Ongoing</label>
                        </section>
                    </section>
                </div>
                <div class="row">
                    <section class="col col-6">
                        <section class="form-group">
                            <label>Close date</label>
                            <input id="close_date" type="date" class="form-control" value="{{ $item->close_date_at }}" name="close_date_at">
                            @error('close_date_at')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </section>
                    </section>
                    <section class="col col-6">
                        <section class="form-group">
                            <label>Deadline</label>
                            <input id="deadline" type="date" class="form-control" value="{{ $item->deadline_at }}" name="deadline_at">
                            @error('deadline_at')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </section>
                    </section>
                </div>

                <script>
                    const checkboxisongoing = document.querySelectorAll('input[type="checkbox"][name="is_ongoing"]');
                    const close_date = document.getElementById('close_date');
                    const deadline = document.getElementById('deadline');
                    var selectedValue;

                    checkboxisongoing.forEach(checkBox => {
                        checkBox.addEventListener('change', event => {
                            if (event.target.checked) {
                                selectedValue = event.target.name;
                                if (selectedValue === 'is_ongoing') {
                                    close_date.value = '';
                                    deadline.value = '';
                                    close_date.setAttribute('disabled', true);
                                    deadline.setAttribute('disabled', true);
                                }
                            } else {
                                close_date.removeAttribute('disabled');
                                deadline.removeAttribute('disabled');
                            }
                        });
                    });
                </script>


                <div class="row">
                    <section class="col col-6">
                        <section class="form-group">
                            <label>Letter of Intent Deadline</label>
                            <input type="date" class="form-control" value="{{ $item->letter_of_intent_deadline_at }}" name="letter_of_intent_deadline_at">
                            @error('letter_of_intent_deadline_at')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </section>
                    </section>

                    <section class="col col-6">
                        <section class="form-group">
                            <label>Posted Date</label>
                            <input type="date" class="form-control" value="{{ $item->posted_date_at }}" name="posted_date_at">
                            @error('posted_date_at')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </section>
                    </section>
                </div>

                <div class="row">
                    <section class="col col-12">
                        <section class="form-group">
                            <label>URL</label>
                            <input type="text" class="form-control" value="{{ $item->url }}" name="url">
                            @error('url')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </section>
                    </section>
                </div>

                <div class="row">
                    <section class="col col-6">
                        <section class="form-group">
                            <label>Funding Source</label>
                            <input type="text" class="form-control" value="{{ $item->funding_source }}" name="funding_source">
                            @error('funding_source')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </section>
                    </section>
                    <section class="col col-6">
                        <section class="form-group">
                            <label>Funding Agency</label>
                            {!! form_select(
                            'funding_agency',
                            [0 => 'Please select a Funding agency'] + $funding_agencies,
                            $errors && $errors->any() ? old('funding_agency') : (isset($item) ? $item->funding_agency_id : ''),
                            ['class' => 'select2 form-control ' . form_error_class('funding_agency', $errors)],
                            ) !!}
                            {{-- {!! form_error_message('funding_agency', $errors) !!} --}}
                            @error('funding_agency')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </section>
                    </section>
                </div>
                <!-- Button to open Interests Modal -->
                <div class="basis-1/2 md:basis-1/2 mx-1 mt-4">
                    <label class="label">
                        <span class="label-text text-base text-[#2d4352]">Interests</span>
                    </label>
                    <button type="button" class="btn w-full bg-[#2d4352] text-[#d7e1e8] border-[#2d4352] border-2 hover:bg-[#d7e1e8] hover:text-[#2d4352]" data-toggle="modal" data-target="#interestModal">
                        Add Interest +
                    </button>
                    @error('interests')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror

                    <div class="selected-interests mt-4">
                        <div class="grid grid-cols-4 gap-4">
                            @foreach($interests as $interestId => $interestTitle)
                            @if ($grantInterests && in_array($interestId, $grantInterests))
                            <div class="">
                                <label class="custom-checkbox">
                                    <input type="checkbox" name="selected_interests[]" value="{{ $interestId }}" checked>
                                    <span class="checkmark"></span>
                                    {{ $interestTitle }}
                                </label>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>

                </div>

                <!-- Button to open Eligibilities Modal -->
                <div class="basis-1/2 md:basis-1/2 mx-1 mt-4">
                    <label class="label">
                        <span class="label-text text-base text-[#2d4352]">Eligibilities</span>
                    </label>
                    <button type="button" class="btn w-full bg-[#2d4352] text-[#d7e1e8] border-[#2d4352] border-2 hover:bg-[#d7e1e8] hover:text-[#2d4352]" data-toggle="modal" data-target="#eligibilityModal">
                        Add Eligibility +
                    </button>
                    @error('eligibilities')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror

                    <div class="selected-eligibilities mt-4">
                        <div class="grid grid-cols-4">
                            @foreach($eligibilties as $eligibilityId => $eligibilityTitle)
                            @if ($grantEligibilties && in_array($eligibilityId, $grantEligibilties))
                            <div class="">
                                <label class="custom-checkbox">
                                    <input type="checkbox" name="selected_eligibilities[]" value="{{ $eligibilityId }}" checked>
                                    <span class="checkmark"></span>
                                    {{ $eligibilityTitle }}
                                </label>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>

                </div>


                <!-- Button to open Regions Modal -->
                <div class="basis-1/2 md:basis-1/2 mx-1 mt-4">
                    <label class="label">
                        <span class="label-text text-base text-[#2d4352]">Regions</span>
                    </label>
                    <button type="button" class="btn w-full bg-[#2d4352] text-[#d7e1e8] border-[#2d4352] border-2 hover:bg-[#d7e1e8] hover:text-[#2d4352]" data-toggle="modal" data-target="#regionModal">
                        Add Region +
                    </button>
                    @error('regions')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror

                    <div class="selected-regions mt-4">
                        <div class="grid grid-cols-4 gap-4">
                            @foreach ($country_states as $country)
                            @foreach ($country->states as $st)
                            @if (in_array($st->id, $selectedRegions))
                            <div>
                                <input name="selected_states[]" value="{{ $st->id }}" type="checkbox" id="selected-state-{{ $st->id }}" class="checkbox checkbox-sm selected-state" checked>
                                <label for="selected-state-{{ $st->id }}">{{ $st->name }}</label>
                            </div>
                            @endif
                            @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
                <script>
                    window.onload = function() {
                        // Existing code

                        // Mark selected checkboxes as checked
                        var stateCheckboxes = document.querySelectorAll('.checkbox-sm');
                        stateCheckboxes.forEach(function(checkbox) {
                            if (checkbox.checked) {
                                var regionName = checkbox.nextElementSibling.textContent;
                                var selectedRegionItem = document.createElement('span');
                                selectedRegionItem.classList.add('selected-region-item');
                                selectedRegionItem.textContent = regionName;
                                document.querySelector('.selected-regions').appendChild(selectedRegionItem);
                            }
                        });
                    };
                </script>

                <!-- Regions Modal -->
                <div class="modal fade" id="regionModal" tabindex="-1" role="dialog" aria-labelledby="regionModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="regionModalLabel">Select Regions</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body" id="main-wrap">
                                @foreach ($country_states as $country)
                                <div class="mt-5 main-geo">
                                    <div class="sub-geo">
                                        <div class="flex w-full max-w-md mt-3 main-elm">
                                            <input name="countries" type="checkbox" value="{{ $country->id }}" id="country-{{ $country->id }}" class="checkbox checkbox-sm countries rounded-none parent-checkbox">
                                            <span class="label-text ml-1"> <strong>{{ $country->name }}</strong></span>
                                        </div>
                                        <div class="modal-body" id="state">
                                            <div class="row">
                                                @if ($country->states)
                                                @foreach ($country->states as $st)
                                                <div class="col-md-4">
                                                    <input name="states[]" value="{{ $st->id }}" type="checkbox" id="state-{{ $st->id }}" class="checkbox checkbox-sm state-{{ $country->id }} rounded-none" @if(in_array($st->id, $selectedRegions)) checked @endif />
                                                    <span class="checkmark">{{ $st->name }}</span>
                                                </div>
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="modal-footer">
                                <button onclick="clearRegions()" type="button" class="btn bg-[#2d4352] text-[#d7e1e8] border-[#2d4352] border-2 hover:bg-[#d7e1e8] hover:text-[#2d4352]">Clear</button>
                                <button type="submit" class="btn bg-[#2d4352] text-[#d7e1e8] border-[#2d4352] border-2 hover:bg-[#d7e1e8] hover:text-[#2d4352]" data-dismiss="modal">Add Region</button>
                            </div>
                        </div>
                    </div>
                </div>
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
                    window.onload = function() {
                        var countryCheckboxes = document.querySelectorAll('.countries');
                        var stateCheckboxes = document.querySelectorAll('.checkbox-sm');

                        // When parent countries checkbox is clicked
                        countryCheckboxes.forEach(function(checkbox) {
                            checkbox.addEventListener('click', function() {
                                var countryId = this.value;
                                var stateClass = '.state-' + countryId;

                                // Check/uncheck all child state checkboxes
                                var stateCheckboxes = document.querySelectorAll(stateClass);
                                stateCheckboxes.forEach(function(stateCheckbox) {
                                    stateCheckbox.checked = checkbox.checked;
                                });
                            });
                        });

                        // When child state checkboxes are clicked
                        stateCheckboxes.forEach(function(checkbox) {
                            checkbox.addEventListener('click', function() {
                                var countryId = this.className.match(/state-(\d+)/)[1];
                                var stateClass = '.state-' + countryId;
                                var allChecked = true;

                                // Check if all child state checkboxes are checked
                                var stateCheckboxes = document.querySelectorAll(stateClass);
                                stateCheckboxes.forEach(function(stateCheckbox) {
                                    if (!stateCheckbox.checked) {
                                        allChecked = false;
                                    }
                                });

                                // Update parent country checkbox
                                var countryCheckbox = document.getElementById('country-' + countryId);
                                countryCheckbox.checked = allChecked;
                            });
                        });
                    };
                </script>

                <!-- Interests Modal -->
                <div class="modal fade" id="interestModal" tabindex="-1" role="dialog" aria-labelledby="interestModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="interestModalLabel">Select Interests</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    @foreach($interests as $interestId => $interestTitle)
                                    <div class="col-md-4">
                                        <label class="custom-checkbox">
                                            <input type="checkbox" name="interests[]" value="{{ $interestId }}" @if ($grantInterests && in_array($interestId, $grantInterests)) checked @endif>
                                            <span class="checkmark"></span>
                                            {{ $interestTitle }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-footer">

                                <button onclick="clearInterests()" type="button" class="btn bg-[#2d4352] text-[#d7e1e8] border-[#2d4352] border-2 hover:bg-[#d7e1e8] hover:text-[#2d4352]">Clear</button>
                                <button type="button" class="btn bg-[#2d4352] text-[#d7e1e8] border-[#2d4352] border-2 hover:bg-[#d7e1e8] hover:text-[#2d4352]" data-dismiss="modal">Add Interest</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Eligibilities Modal -->
                <div class="modal fade" id="eligibilityModal" tabindex="-1" role="dialog" aria-labelledby="eligibilityModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="eligibilityModalLabel">Select Eligibilities</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    @foreach($eligibilties as $eligibilityId => $eligibilityTitle)
                                    <div class="col-md-4">
                                        <label class="custom-checkbox">
                                            <input type="checkbox" name="eligibilties[]" value="{{ $eligibilityId }}" @if ($grantEligibilties && in_array($eligibilityId, $grantEligibilties)) checked @endif>
                                            <span class="checkmark"></span>
                                            {{ $eligibilityTitle }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button onclick="clearEligibility()" type="button" class="btn bg-[#2d4352] text-[#d7e1e8] border-[#2d4352] border-2 hover:bg-[#d7e1e8] hover:text-[#2d4352]">Clear</button>
                                <button type="button" class="btn bg-[#2d4352] text-[#d7e1e8] border-[#2d4352] border-2 hover:bg-[#d7e1e8] hover:text-[#2d4352]" data-dismiss="modal">Add Eligibilities</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <section class="col col-12">
                        <section class="form-group">
                            <label>Additional Notes</label>
                            <textarea class="form-control" id="myeditorinstance" name="additional_notes">{!!$item->additional_notes!!}</textarea>
                            @error('additional_notes')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </section>
                    </section>
                </div>

                <div class="row">
                    <section class="col col-12">
                        <section class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>Waiting</option>
                                <option value="2" {{ $item->status == 2 ? 'selected' : '' }}>Approve</option>
                                <option value="3" {{ $item->status == 3 ? 'selected' : '' }}>Reject</option>
                                <option value="5" {{ $item->status == 5 ? 'selected' : '' }}>Archive</option>
                            </select>
                            @error('status')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </section>
                    </section>
                </div>
            </fieldset>
        </div>
        @include('admin.partials.form.form_footer', ['submit' => true])
    </form>
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function clearInterests() {
        const checkboxes = document.querySelectorAll('input[name="interests[]"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = false;
        });
    }

    function clearEligibility() {
        const checkboxes = document.querySelectorAll('input[name="eligibilties[]"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = false;
        });
    }

    function clearRegions() {
        const checkboxes = document.querySelectorAll('input[name="states[]"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = false;
        });
        const countryCheckboxes = document.querySelectorAll('input[name="countries"]');
        countryCheckboxes.forEach(checkbox => {
            checkbox.checked = false;
        });
    }
</script>
<script>
    const pageURL = window.location.href;
    // Define a function for sending the lock history request
    function updateLockHistory() {
        fetch('{{ route("update-lock-history") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    "page_url": pageURL
                })
            })
            .then(response => response.json())
            .then(data => console.log(data))
            .catch(error => console.error(error));
    }

    setInterval(updateLockHistory, 60000);
</script>
@endsection