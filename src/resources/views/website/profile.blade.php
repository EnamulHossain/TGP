<!DOCTYPE html>
@include('website.copypastescript')
<!-- saved from url=(0086)https://www.thegrantportal.com/thegrantportal/Sign-Up/Profile?DataID=23233&subscribe=0 -->
<html class="titanDisplay Chrome Chrome109 SliderActive" id="htmlTag" lang="en">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <!-- Stylesheet Link (Site-level) -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="assets/css" rel="stylesheet" type="text/css">
    <style>
        .TitanStripe {
            margin-top: 45px;
        }
    </style>
    <!-- Promero Themes.ReFlex.Grants Pre-Titan Metatag/Code Snippet (Site-level) -->
    <meta content="initial-scale=1,maximum-scale=5.0,minimum-scale=1.0,user-scalable=yes,width=device-width" name="viewport">
    <script language="javascript" src="assets/titanscripts.required.js" type="text/javascript"></script>
    <link href="assets/site.css" rel="stylesheet" type="text/css">
    <title>
        Profile
    </title>
    <meta content="88" name="DocID">
    <meta content="Profile" name="Title">
    <meta content="Subscriber - Basic Info" name="Keywords">
    <meta content="" name="Description">
    <script language="javascript" src="assets/Profile_content.js" type="text/javascript"></script>
    <link href="https://www.thegrantportal.com/display/WhatsNew.rss" rel="alternate+rss" title="RSS" type="application/rss+xml">
    <script async="" language="javascript" src="assets/titanscripts.js" type="text/javascript"></script>
    <script async="" defer="" src="assets/api.js" type="text/javascript"></script>
    <!-- Promero Themes.ReFlex.Grants Post-Titan Metatag/Code Snippet (Site-level) -->
    <script language="javascript" src="assets/site.js"></script>
    <script language="javascript" src="assets/_bundle.js" type="text/javascript"></script>
    <!-- Raw Snippet (Site-level) -->
    <script language="javascript" src="assets/_bundle(1).js" type="text/javascript"></script>
    <!-- Promero NWS.Promero.DataModules.SubscriptionManagement.Subscriber.DataEditor.ModuleLoader (Page-level) -->
    <link href="https://www.thegrantportal.com/Files/Logos/TGP-favicon.png?Thumbnail" rel="shortcut icon" type="image/png">
    <link href="https://www.thegrantportal.com/Files/Logos/TGP-favicon.png?Thumbnail" rel="icon" type="image/png">
    <script language="javascript" src="assets/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script language="javascript" src="assets/jquery.fancybox.min.js" type="text/javascript"></script>
    <link href="assets/jquery.fancybox.min.css" rel="stylesheet" type="text/css">
    <link href="assets/dialog.css" rel="stylesheet" type="text/css">
    <link href="assets/WkstUI.css" rel="stylesheet" type="text/css">
    <link href="assets/WkstStyles.css" rel="stylesheet" type="text/css">
    <link href="assets/WkstLayout.css" rel="stylesheet" type="text/css">
</head>

<body class="titanBody" data-gr-ext-installed="" data-new-gr-c-s-check-loaded="14.1102.0" id="titanBody">
    @if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-dismissible fade show m-5" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show m-5" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form action="{{route('update.profile')}}" enctype="multipart/form-data" id="routerForm" method="post" siq_id="autopick_708">
        @csrf
        <a class="skipNav" href="https://www.thegrantportal.com/thegrantportal/Sign-Up/Profile?DataID=23233&subscribe=0#SkipNav">
            Skip to Content
        </a>
        @include('website.partials.header1')
        <main class="layoutContainer" id="contentArea">
            <a class="skipNav" id="SkipNav" name="SkipNav">
                Main Content
            </a>
            <div id="centerZone">
                <div class="TitanStripe StripeDefault">
                    <div class="siteBounds">
                        <div class="DataEditor InternalForms SubscribeForm New100 CenterZone TitanBlock">
                            <div blockid="42" class="oneEdit" id="DataDiv_42">
                                <!--BeginNoIndex-->
                                <div docid="88" id="cmsFormsControl_42_ProcessingKey" itemid="23233" style="display:none" token="d5nVNwMilfIxSGD86Y6elecAkeEn1KukVkpDnq0QKQE1">
                                    <input id="cmsFormsControl_42_decode" type="hidden" value="">
                                    <input id="cmsForms_42_key" name="cmsForms_42_key" type="hidden" value="MTM5MDU4ODg3ODMyMTg0MTA1">
                                    <input id="cmsFormsControl_42_itemNameForTitle" type="hidden" value="deepayan.cse@gmail.com" />
                                    </input>
                                    </input>
                                </div>
                                <div class="ErrorMessage" id="VerifyMessage_42" style="display:none" width="98%">
                                    Please review the information below.  If everything is correct, click “Send”.  To go
                                    back and edit your entries, click “Edit”.
                                </div>
                                <div class="ErrorMessage" id="cmsForms_DataNotProvided_42" style="display:none">
                                    The following required items were not provided or are in the wrong format. Please
                                    provide the required responses and submit again:
                                    <br>
                                    <br />
                                    </br>
                                </div>
                                <!--EndNoIndex-->
                                <input id="cmsForms_internalSubscribe" name="cmsForms_internalSubscribe" type="hidden" value="0">
                                <input id="cmsForms_internalSKU" name="cmsForms_internalSKU" type="hidden" value="0">
                                <div class="SubscriptionSlides" id="SubscriptionSlide1" style="display: block;">
                                    <div class="TitleSlide">
                                        <h1 class="step1">
                                            Complete Your Profile to Receive Grant Alerts
                                        </h1>
                                        <h6>
                                            @if (Session::get('success'))
                                            <div class="alert alert-info">{{ Session::get('success') }}</div>
                                            @endif
                                            @if (Session::get('warning'))
                                            <div class="alert" style="color: red">{{ Session::get('warning') }}</div>
                                            @endif

                                        </h6>
                                        <div class="progressBar">
                                            <p class="basicInfo currentSlide" onclick="nextTab(0)">
                                                Basic Information
                                            </p>
                                            <p class="Interests" onclick="nextTab(1)">
                                                <a>Your Interests</a>
                                            </p>
                                            <p class="geoInfo" onclick="nextTab(2)">
                                                Geographical Information
                                            </p>
                                            <p class="subLevel" onclick="nextTab(3)">
                                                Subscription Level
                                            </p>
                                        </div>
                                    </div>
                                    <label for="">
                                        Email
                                    </label>
                                    <div class="fourInput mb-1">
                                        <div class="dataField textbox" fieldname="" fieldtype="">
                                            <input value="{{$email}}" readonly>
                                        </div>
                                    </div>
                                    <div class="fourInput">
                                        <p>
                                            <label for="first_name">
                                                First Name:
                                            </label>
                                        </p>
                                        <div class="dataField textbox" fieldname="FirstName" fieldtype="textbox">
                                            <input value="{{ old('first_name') ? old('first_name') : ($user ? $user->first_name : '') }}" errormessage="First Name" fieldname="FirstName" id="first_name" name="first_name" oninvalid="this.setCustomValidity('First Name');" title="First Name" type="text" placeholder="First Name" />
                                            @error('first_name')
                                            <div style="color: red">{{ $message }}</div>
                                            @enderror
                                            <div style="color: red" id="first_name_err"></div>
                                        </div>

                                        <p>
                                            <label for="last_name">
                                                Last Name:
                                            </label>
                                        </p>
                                        <div class="dataField textbox" fieldname="LastName" fieldtype="textbox">
                                            <input value="{{ old('last_name') ? old('last_name') : ($user ? $user->last_name : '') }}" errormessage="Last Name" fieldname="LastName" id="last_name" name="last_name" oninvalid="this.setCustomValidity('Last Name');" title="Last Name" type="text" placeholder="Last Name" />
                                            @error('last_name')
                                            <div style="color: red">{{ $message }}</div>
                                            @enderror
                                            <div style="color: red" id="last_name_err"></div>
                                        </div>

                                        <p>
                                            <label for="company">
                                                Company:
                                            </label>
                                        </p>
                                        <div class="dataField textbox" fieldname="Company" fieldtype="textbox">
                                            <input errormessage="Company" fieldname="Company" id="company" name="company" oninvalid="this.setCustomValidity('Company');" title="Company" type="text" value="{{$user ? $user->company : ''}}" placeholder="company" />
                                        </div>
                                        <p>
                                            <label for="job_title">
                                                Job Title:
                                            </label>
                                        </p>
                                        <div class="dataField textbox" fieldname="JobTitle" fieldtype="textbox">
                                            <input errormessage="Job Title" fieldname="JobTitle" id="job_title" name="job_title" title="Job Title" type="text" value="{{$user ? $user->job_title : ''}}" placeholder="Job Title" />
                                        </div>
                                    </div>
                                    <p>
                                        <label for="cmsForms_Country">
                                            Country:
                                        </label>
                                    </p>
                                    <div class="dataField tags" fieldname="Country" fieldtype="tags">
                                        <div class="inputs">
                                            <select errormessage="Country" name="country">
                                                <option value="">- select -</option>
                                                <option value="CA" {{ (old('country') == "CA") ? 'selected' : '' }} @if($user) @selected($user->country == "CA") @endif>Canada</option>
                                                <option value="IL" {{ (old('country') == "IL") ? 'selected' : '' }} @if($user) @selected($user->country == "IL") @endif>Israel</option>
                                                <option value="US" {{ (old('country') == "US") ? 'selected' : '' }} @if($user) @selected($user->country == "US") @endif>United States</option>
                                            </select>
                                        </div>
                                        @error('country')
                                        <div style="color: red">{{ $message }}</div>
                                        @enderror
                                        <div style="color: red" id="country_err"></div>
                                    </div>
                                    <p>
                                        <label for="address_line_1">
                                            Address Line 1:
                                        </label>
                                    </p>
                                    <div class="dataField textbox" fieldname="Address1" fieldtype="textbox">
                                        <input value="{{ old('last_name') ? old('address_line_1') : ($user ? $user->address_line_1 : '') }}" errormessage="Address Line 1" fieldname="Address1" id="address_line_1" name="address_line_1" oninvalid="this.setCustomValidity('Address Line 1');" title="Address Line 1" type="text" placeholder="Address" />
                                    </div>
                                    @error('address_line_1')
                                    <div style="color: red">{{ $message }}</div>
                                    @enderror
                                    <div style="color: red" id="address_line_1_err"></div>
                                    <p>
                                        <label for="address_line_2">
                                            Address Line 2:
                                        </label>
                                    </p>
                                    <div class="dataField textbox" fieldname="Address2" fieldtype="textbox">
                                        <input errormessage="Address Line 2" fieldname="Address2" id="address_line_2" name="address_line_2" oninvalid="this.setCustomValidity('Address Line 2');" title="Address Line 2" type="text" value="{{$user ? $user->address_line_2: ''}}" placeholder="Address" />
                                    </div>
                                    <div class="addressLine">
                                        <p>
                                            <label for="city">
                                                City:
                                            </label>
                                        </p>
                                        <div class="dataField textbox" fieldname="City" fieldtype="textbox">
                                            <input value="{{ old('city') ? old('city') : ($user ? $user->city : '') }}" errormessage="Please provide a valid city" fieldname="City" id="city" isrequired="false" linked="Own Column" name="city" oninvalid="this.setCustomValidity('Please provide a valid city');" regexp="" title="City" type="text" validationtype="None" placeholder="City" />
                                            @error('city')
                                            <div style="color: red">{{ $message }}</div>
                                            @enderror
                                            <div style="color: red" id="city_err"></div>
                                        </div>
                                        <p>
                                            <label for="cmsForms_Region">
                                                State/Province:
                                            </label>
                                        </p>
                                        <div class="dataField tags" fieldname="Region" fieldtype="tags">
                                            <div class="inputs">
                                                <select name="state">
                                                    <option disabled selected>Select</option>
                                                    <option value="AL" {{ (old('state') == "AL") ? 'selected' : '' }} @if($user) @selected($user->state == "AL") @endif>Alabama</option>
                                                    <option value="AK" {{ (old('state') == "AK") ? 'selected' : '' }} @if($user) @selected($user->state == "AK") @endif>Alaska</option>
                                                    <option value="AZ" {{ (old('state') == "AZ") ? 'selected' : '' }} @if($user) @selected($user->state == "AZ") @endif>Arizona</option>
                                                    <option value="AR" {{ (old('state') == "AR") ? 'selected' : '' }} @if($user) @selected($user->state == "AR") @endif>Arkansas</option>
                                                    <option value="CA" {{ (old('state') == "CA") ? 'selected' : '' }} @if($user) @selected($user->state == "CA") @endif>California</option>
                                                    <option value="CO" {{ (old('state') == "CO") ? 'selected' : '' }} @if($user) @selected($user->state == "CO") @endif>Colorado</option>
                                                    <option value="CT" {{ (old('state') == "CT") ? 'selected' : '' }} @if($user) @selected($user->state == "CT") @endif>Connecticut</option>
                                                    <option value="DE" {{ (old('state') == "DE") ? 'selected' : '' }} @if($user) @selected($user->state == "DE") @endif>Delaware</option>
                                                    <option value="DC" {{ (old('state') == "DC") ? 'selected' : '' }} @if($user) @selected($user->state == "DC") @endif>District of Columbia</option>
                                                    <option value="FL" {{ (old('state') == "FL") ? 'selected' : '' }} @if($user) @selected($user->state == "FL") @endif>Florida</option>
                                                    <option value="GA" {{ (old('state') == "GA") ? 'selected' : '' }} @if($user) @selected($user->state == "GA") @endif>Georgia</option>
                                                    <option value="HI" {{ (old('state') == "HI") ? 'selected' : '' }} @if($user) @selected($user->state == "HI") @endif>Hawaii</option>
                                                    <option value="ID" {{ (old('state') == "ID") ? 'selected' : '' }} @if($user) @selected($user->state == "ID") @endif>Idaho</option>
                                                    <option value="IL" {{ (old('state') == "IL") ? 'selected' : '' }} @if($user) @selected($user->state == "IL") @endif>Illinois</option>
                                                    <option value="IN" {{ (old('state') == "IN") ? 'selected' : '' }} @if($user) @selected($user->state == "IN") @endif>Indiana</option>
                                                    <option value="IA" {{ (old('state') == "IA") ? 'selected' : '' }} @if($user) @selected($user->state == "IA") @endif>Iowa</option>
                                                    <option value="KS" {{ (old('state') == "KS") ? 'selected' : '' }} @if($user) @selected($user->state == "KS") @endif>Kansas</option>
                                                    <option value="KY" {{ (old('state') == "KY") ? 'selected' : '' }} @if($user) @selected($user->state == "KY") @endif>Kentucky</option>
                                                    <option value="LA" {{ (old('state') == "LA") ? 'selected' : '' }} @if($user) @selected($user->state == "LA") @endif>Louisiana</option>
                                                    <option value="ME" {{ (old('state') == "ME") ? 'selected' : '' }} @if($user) @selected($user->state == "ME") @endif>Maine</option>
                                                    <option value="MD" {{ (old('state') == "MD") ? 'selected' : '' }} @if($user) @selected($user->state == "MD") @endif>Maryland</option>
                                                    <option value="MA" {{ (old('state') == "MA") ? 'selected' : '' }} @if($user) @selected($user->state == "MA") @endif>Massachusetts</option>
                                                    <option value="MI" {{ (old('state') == "MI") ? 'selected' : '' }} @if($user) @selected($user->state == "MI") @endif>Michigan</option>
                                                    <option value="MN" {{ (old('state') == "MN") ? 'selected' : '' }} @if($user) @selected($user->state == "MN") @endif>Minnesota</option>
                                                    <option value="MS" {{ (old('state') == "MS") ? 'selected' : '' }} @if($user) @selected($user->state == "MS") @endif>Mississippi</option>
                                                    <option value="MO" {{ (old('state') == "MO") ? 'selected' : '' }} @if($user) @selected($user->state == "MO") @endif>Missouri</option>
                                                    <option value="MT" {{ (old('state') == "MT") ? 'selected' : '' }} @if($user) @selected($user->state == "MT") @endif>Montana</option>
                                                    <option value="NE" {{ (old('state') == "NE") ? 'selected' : '' }} @if($user) @selected($user->state == "NE") @endif>Nebraska</option>
                                                    <option value="NV" {{ (old('state') == "NV") ? 'selected' : '' }} @if($user) @selected($user->state == "NV") @endif>Nevada</option>
                                                    <option value="NH" {{ (old('state') == "NH") ? 'selected' : '' }} @if($user) @selected($user->state == "NH") @endif>New Hampshire</option>
                                                    <option value="NJ" {{ (old('state') == "NJ") ? 'selected' : '' }} @if($user) @selected($user->state == "NJ") @endif>New Jersey</option>
                                                    <option value="NM" {{ (old('state') == "NM") ? 'selected' : '' }} @if($user) @selected($user->state == "NM") @endif>New Mexico</option>
                                                    <option value="NY" {{ (old('state') == "NY") ? 'selected' : '' }} @if($user) @selected($user->state == "NY") @endif>New York</option>
                                                    <option value="NC" {{ (old('state') == "NC") ? 'selected' : '' }} @if($user) @selected($user->state == "NC") @endif>North Carolina</option>
                                                    <option value="ND" {{ (old('state') == "ND") ? 'selected' : '' }} @if($user) @selected($user->state == "ND") @endif>North Dakota</option>
                                                    <option value="OH" {{ (old('state') == "OH") ? 'selected' : '' }} @if($user) @selected($user->state == "OH") @endif>Ohio</option>
                                                    <option value="OK" {{ (old('state') == "OK") ? 'selected' : '' }} @if($user) @selected($user->state == "OK") @endif>Oklahoma</option>
                                                    <option value="OR" {{ (old('state') == "OR") ? 'selected' : '' }} @if($user) @selected($user->state == "OR") @endif>Oregon</option>
                                                    <option value="PA" {{ (old('state') == "PA") ? 'selected' : '' }} @if($user) @selected($user->state == "PA") @endif>Pennsylvania</option>
                                                    <option value="PR" {{ (old('state') == "PR") ? 'selected' : '' }} @if($user) @selected($user->state == "PR") @endif>Puerto Rico</option>
                                                    <option value="RI" {{ (old('state') == "RI") ? 'selected' : '' }} @if($user) @selected($user->state == "RI") @endif>Rhode Island</option>
                                                    <option value="SC" {{ (old('state') == "SC") ? 'selected' : '' }} @if($user) @selected($user->state == "SC") @endif>South Carolina</option>
                                                    <option value="SD" {{ (old('state') == "SD") ? 'selected' : '' }} @if($user) @selected($user->state == "SD") @endif>South Dakota</option>
                                                    <option value="TN" {{ (old('state') == "TN") ? 'selected' : '' }} @if($user) @selected($user->state == "TN") @endif>Tennessee</option>
                                                    <option value="TX" {{ (old('state') == "TX") ? 'selected' : '' }} @if($user) @selected($user->state == "TX") @endif>Texas</option>
                                                    <option value="UT" {{ (old('state') == "UT") ? 'selected' : '' }} @if($user) @selected($user->state == "UT") @endif>Utah</option>
                                                    <option value="VT" {{ (old('state') == "VT") ? 'selected' : '' }} @if($user) @selected($user->state == "VT") @endif>Vermont</option>
                                                    <option value="VI" {{ (old('state') == "VI") ? 'selected' : '' }} @if($user) @selected($user->state == "VI") @endif>Virgin Islands</option>
                                                    <option value="VA" {{ (old('state') == "VA") ? 'selected' : '' }} @if($user) @selected($user->state == "VA") @endif>Virginia</option>
                                                    <option value="WA" {{ (old('state') == "WA") ? 'selected' : '' }} @if($user) @selected($user->state == "WA") @endif>Washington</option>
                                                    <option value="WV" {{ (old('state') == "WV") ? 'selected' : '' }} @if($user) @selected($user->state == "WV") @endif>West Virginia</option>
                                                    <option value="WI" {{ (old('state') == "WI") ? 'selected' : '' }} @if($user) @selected($user->state == "WI") @endif>Wisconsin</option>
                                                    <option value="WY" {{ (old('state') == "WY") ? 'selected' : '' }} @if($user) @selected($user->state == "WY") @endif>Wyoming</option>

                                                </select>
                                            </div>
                                            @error('state')
                                            <div style="color: red">{{ $message }}</div>
                                            @enderror
                                            <div style="color: red" id="state_err"></div>
                                        </div>
                                        <p>
                                            <label for="postal_code">
                                                Postal Code:
                                            </label>
                                        </p>
                                        <div class="dataField textbox" fieldname="PostalCode" fieldtype="textbox">
                                            <input value="{{ old('postal_code') ? old('postal_code') : ($user ? $user->postal_code : '') }}" errormessage="Please provide a valid postal code" fieldname="PostalCode" id="postal_code" isrequired="false" linked="Own Column" name="postal_code" oninvalid="this.setCustomValidity('Please provide a valid postal code');" regexp="" title="PostalCode" type="text" validationtype="None" placeholder="PostalCode" />
                                            @error('postal_code')
                                            <div style="color: red">{{ $message }}</div>
                                            @enderror
                                            <div style="color: red" id="postal_code_err"></div>
                                        </div>
                                    </div>
                                    <input class="SaveForLater" type="submit" value="Save">
                                    <input class="ContinueButton" onclick="changeTab(1)" type="button" value="Next" />
                                    </input>
                                </div>
                                <div class="SubscriptionSlides" id="SubscriptionSlide2" style="display: none;">
                                    <div class="TitleSlide">
                                        <h1 class="step1">
                                            Selects Interest for Your Grant Alerts
                                        </h1>
                                        <div class="progressBar">
                                            <p class="basicInfo pastSlide" onclick="nextTab(0)">
                                                Basic Information
                                            </p>
                                            <p class="Interests currentSlide" onclick="nextTab(1)">
                                                Your Interests
                                            </p>
                                            <p class="geoInfo" onclick="nextTab(2)">
                                                Geographical Information
                                            </p>
                                            <p class="subLevel" onclick="nextTab(3)">
                                                Subscription Level
                                            </p>
                                        </div>
                                    </div>
                                    <fieldset>
                                        <label for="tagInput_18">Interest Areas</label>
                                        <div class="dataField tags" fieldname="InterestArea" fieldtype="tags">
                                            <div class="inputs" id="">
                                                @foreach($interests as $interest)
                                                <span>
                                                    <input errormessage="Aging/Seniors" name="interests[]" value="{{ $interest->id }}" type="checkbox" @if($uinterests && in_array($interest->id, $uinterests)) checked @endif>
                                                    <label for="interests">{{ $interest->title }}</label>
                                                </span>
                                                @endforeach
                                            </div>
                                        </div>
                                        <input class="SaveForLater" type="submit" value="Save">
                                        <input class="BackButton" onclick="changeTab(0)" type="button" value="Back">
                                        <input class="ContinueButton" onclick="changeTab(2)" type="button" value="Next">
                                    </fieldset>

                                </div>
                                <div class="SubscriptionSlides" id="SubscriptionSlide3" style="display: none;">
                                    <div class="TitleSlide">
                                        <h1 class="step1">
                                            Select Geographical Location for Your Grant Alerts
                                        </h1>
                                        <div class="progressBar">
                                            <p class="basicInfo pastSlide" onclick="nextTab(0)">
                                                Basic Information
                                            </p>
                                            <p class="Interests pastSlide" onclick="nextTab(1)">
                                                Your Interests
                                            </p>
                                            <p class="currentSlide geoInfo" onclick="nextTab(2)">
                                                Geographical Information
                                            </p>
                                            <p class="subLevel" onclick="nextTab(3)">
                                                Subscription Level
                                            </p>
                                        </div>
                                    </div>
                                    <fieldset class="geographical">
                                        <label for="">
                                            Geographic Areas
                                        </label>
                                        <div class="" fieldname="InterestArea" fieldtype="tags">
                                            <div class="inputs" id="main-wrap">


                                                @foreach($countries as $country)
                                                <div class="main-geo">
                                                    <div class="sub-geo">
                                                        <div class="main-elm">
                                                            <input name="countries" type="checkbox" value="{{ $country->id }}" class="countries countries-parent-checkbox">
                                                            <label>
                                                                {{$country->name}}
                                                            </label>
                                                        </div>
                                                        @if($country->states)
                                                        @foreach($country->states as $state)
                                                        <div class="sub-elm">
                                                            <input name="states[]" value="{{ $state->id }}" class="state-{{ $country->id }}" type="checkbox" @if (($user && $user->states) ? $user->states->contains($state->id) : '') checked @endif >
                                                            <label for="states">
                                                                {{$state->name}}
                                                            </label>
                                                        </div>
                                                        @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <input class="SaveForLater" type="submit" value="Save">
                                        <input class="BackButton" onclick="changeTab(1)" type="button" value="Back">
                                        <input class="ContinueButton" onclick="changeTab(3)" type="button" value="Next" />
                                        </input>
                                        </input>
                                    </fieldset>
                                </div>
                                <script>
                                    // Run the code when the DOM content is loaded
                                    document.addEventListener('DOMContentLoaded', function() {
                                        // Get all parent checkboxes
                                        const parentCheckboxes = document.querySelectorAll('.countries-parent-checkbox');

                                        // Loop through each parent checkbox
                                        parentCheckboxes.forEach(function(parentCheckbox) {
                                            // Get child checkboxes associated with the current parent checkbox
                                            const childCheckboxes = parentCheckbox.closest('.main-geo').querySelectorAll('input[name="states[]"]');

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
                                <div class="SubscriptionSlides" id="SubscriptionSlide4" style="display: none;">
                                    <div class="TitleSlide">
                                        <h1 class="step1">
                                            Complete Your Subscription
                                        </h1>
                                        <div class="progressBar">
                                            <p class="basicInfo pastSlide" onclick="nextTab(0)">
                                                Basic Information
                                            </p>
                                            <p class="Interests pastSlide" onclick="nextTab(1)">
                                                Your Interests
                                            </p>
                                            <p class="geoInfo pastSlide" onclick="nextTab(2)">
                                                Geographical Information
                                            </p>
                                            <p class="currentSlide subLevel" onclick="nextTab(3)">
                                                Subscription Level
                                            </p>
                                        </div>
                                    </div>
                                    <fieldset>


                                        <div class="">
                                            <div class=" flex">
                                                <div>
                                                    <div class="flex">
                                                        <div>
                                                            <p class="text-5xl font-bold pt-20 pb-8">Thank you for being a {{$subscriptionType}} subscriber,
                                                                @if ($profile)
                                                                {{$profile->first_name}}
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="flex">
                                                            <div class="mt-4">
                                                                <p><strong>Subscription Level : </strong></p>
                                                            </div>
                                                            <div class="ml-4">
                                                                <span>TGP <strong>{{ $subscriptionType }}</strong> Grant Newsletter Subscriptions</span>
                                                            </div>
                                                        </div>
                                                        <div class="flex">
                                                            <div class="mt-4">
                                                                <p><strong>Renewal Date : </strong></p>
                                                            </div>
                                                            <div class="">
                                                                @if ($isPaidSubscriber && $expiredAt)
                                                                <span>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $expiredAt)->format('D, F j, Y') }}</span>
                                                                @else
                                                                <span class="ml-20"> Open</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="" style=" margin-left: auto;">
                                                    @if (!$isPaidSubscriber)
                                                    <br>
                                                    <div class="flex mt-5">
                                                        {{-- <div class="mt-0 md:mt-6">
                                                            <a href="{{route('pricing.plans')}}" style="border-width: 3px; width: 110px; background-color: rgb(224, 174, 103); border-color: rgb(224, 174, 103); color: black; text-transform: capitalize; font-weight: 400; height: 50px; font-size: 16px; border-radius: 1rem;" class="btn btn-outline mx-1 text-base" onmouseover="this.style.backgroundColor='white'; this.style.color='black';" onmouseout="this.style.backgroundColor='#e0ae67'; this.style.color='black';">Upgrade</a>
                                                    </div> --}}
                                                    <div class="mt-0 md:mt-6 ml-2">
                                                        <a href="{{ route('change.password.get') }}" class="btn btn-success text-2xl" style="width: 220px;">Change Password</a>
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="mt-5 ">
                                                    <div class="mt-0 md:mt-6">
                                                        <button>
                                                            <a style="border-width: 1px; width: 220px; background-color: #000000; border-color: #000000; color: white; text-transform:capitalize" class="btn btn-outline mx-1 text-2xl capitalize" onmouseover="this.style.backgroundColor='white'; this.style.color='black';" onmouseout="this.style.backgroundColor='#000000'; this.style.color='white';" href="{{$storeURL}}" target="_blank">Manage My Account</a>
                                                        </button>
                                                    </div>

                                                    <div class="mt-0 md:mt-6">
                                                        <form style="display: inline-block;" class="delete-form" action="{{route('profile.destroy', ['id' => auth()->id()])}}" method="POST">
                                                            @csrf
                                                            {{-- @method('DELETE') --}}
                                                            <button type="submit" style="border-width: 1px; width: 220px; background-color: #e00000; border-color: #e00000; color: white; text-transform:capitalize" class="btn btn-outline mx-1 text-2xl capitalize" onmouseover="this.style.backgroundColor='white'; this.style.color='black';" onmouseout="this.style.backgroundColor='#e00000'; this.style.color='white';" title="Delete" onclick="confirmDelete(event)">
                                                                Delete My Account
                                                            </button>
                                                        </form>
                                                    </div>
                                                    @if (!$isPaidSubscriber)
                                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                    <script>
                                                        function confirmDelete(event) {
                                                            event.preventDefault(); // Prevent form submission

                                                            Swal.fire({
                                                                title: 'Please re-confirm',
                                                                text: 'Please re-confirm that you want to delete your account. Deletion cannot be reversed',
                                                                icon: 'warning',
                                                                showCancelButton: true,
                                                                confirmButtonColor: '#d33',
                                                                cancelButtonColor: '#3085d6',
                                                                confirmButtonText: 'Yes, delete',
                                                                cancelButtonText: 'Cancel'
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    // Proceed with form submission
                                                                    event.target.closest('.delete-form').submit();
                                                                }
                                                            });
                                                        }
                                                    </script>
                                                    @else
                                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                    <script>
                                                        function confirmDelete(event) {
                                                            event.preventDefault(); // Prevent form submission

                                                            Swal.fire({
                                                                title: 'To delete, first cancel your subscription',
                                                                text: 'You currently have a paid recurring subscription. In order to delete your account, you must first cancel your paid subscription.',
                                                                icon: 'warning',
                                                                cancelButtonColor: '#3085d6',
                                                                cancelButtonText: 'Close'
                                                            })
                                                        }
                                                    </script>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                <br>
                                <div>
                                    <hr class="p-1"><br>
                                </div>

                                <section class="flex gap-8">
                                    <div class="bg-[#2D5237] text-[#fff]" style="min-height: 245px;min-width: 500px;">
                                        <h5 class="text-center pt-8">
                                            Paid Plans includes:
                                            <hr class="mx-8" style="border-block-color: white;">
                                        </h5>
                                        <ul class="list-disc list-inside py-4 ml-4">
                                            <li class="flex items-center">
                                                <span class="mr-2 text-green-500">&#10003;</span>
                                                Only Subscribers to Paid Plans See All Grant Details
                                            </li>
                                            <li class="flex items-center">
                                                <span class="mr-2 text-green-500">&#10003;</span>
                                                Full Access to Grant Details & Online Applications
                                            </li>
                                            <li class="flex items-center">
                                                <span class="mr-2 text-green-500">&#10003;</span>
                                                Unlimited Grant Searches
                                            </li>
                                            <li class="flex items-center">
                                                <span class="mr-2 text-green-500">&#10003;</span>
                                                Direct Access to Grant Providers
                                            </li>
                                            <li class="flex items-center">
                                                <span class="mr-2 text-green-500">&#10003;</span>
                                                Ability to Save Grants
                                            </li>
                                            <li class="flex items-center">
                                                <span class="mr-2 text-green-500">&#10003;</span>
                                                Get New Alerts Based on Your Interest
                                            </li>
                                            <li class="flex items-center">
                                                <span class="mr-2 text-green-500">&#10003;</span>
                                                Ability to View Expired Grants & Grant History
                                            </li>
                                        </ul>

                                    </div>

                                    <div style="height: 245px;" class="px-3 py-4 border border-gray-400 grid-cols-1 w-full">
                                        @if ($pricePlans->isNotEmpty())
                                        @foreach ($pricePlans as $pricePlan)
                                        @php
                                        $price= explode(".", $pricePlan->plan_price);
                                        @endphp
                                        <div style="height: 77px;">
                                            <div style="padding-top: 10px;">
                                                <div class="flex justify-around items-center content-center">
                                                    <div class="w-3/12 flex justify-end">
                                                        <p class="price" style="font-size: 30px">
                                                            ${{ $price[0] }}
                                                        </p>
                                                        <sup class="mb-2" style="vertical-align: super; line-height: 0.8; font-size: 20px;">
                                                            {{ $price[1] ?? '' }}
                                                        </sup>
                                                    </div>
                                                    <div class="ml-auto"><a style="margin-right: 20px" href="{{url('subscribe?sku=' . $pricePlan->sku)}}" class="text-4xl justify-start"><strong>{{ $pricePlan->plan_name }}</strong></a></div>
                                                    <div>
                                                        <p class=""><a style=" border-width: 3px; width: 110px; background-color: #e0ae67; border-color: #e0ae67; color: black;  text-transform:capitalize" class="btn btn-outline mx-1 text-2xl" onmouseover="this.style.backgroundColor='white'; this.style.color='black';" onmouseout="this.style.backgroundColor='#e0ae67'; this.style.color='black';" href="{{url('subscribe?sku=' . $pricePlan->sku)}}">Subscribe</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        @endforeach
                                        @endif
                                    </div>
                                </section>
                                <input class="SaveForLater" type="submit" value="Save">
                                <input class="BackButton" onclick="changeTab(2)" type="button" value="Back" />
                                </input>
                                </fieldset>
                            </div>
                            <p>
                                <input id="cmsForms_internalSubscribe" name="cmsForms_internalSubscribe" type="hidden" value="0" />
                            </p>
                            <section class="WkstDialog" id="WkstDialog_42">
                            </section>
                            <!--BeginNoIndex-->
                            <div class="defaultButtons" id="SubmitButtons_42" style="display: block;">
                                <input class="simple_button" id="formSubmit42" onclick="NWS.Block.DataEditor.Submit('88', '42', '0', '0', 'ajax');" type="button" value="Submit" />
                            </div>
                            <div class="defaultButtons" id="ConfirmButtons_42" style="display:none">
                                <input class="simple_button" onclick="NWS.Block.DataEditor.FinalFormSubmit('88', '42', 'ajax');" type="button" value="Send">
                                <input class="simple_button" onclick="NWS.Block.DataEditor.SFReturnToEdit('42');" type="button" value="Edit" />
                                </input>
                            </div>
                            <!--EndNoIndex-->

                            <!--BeginNoIndex-->
                            <div class="DatePicker" id="DP_PopupCalendarContainer" onmouseout="DP_MouseOut(event)" style="display:none">
                                <table blockid="" cellpadding="0" cellspacing="0" class="calendar" doinit="1" id="DP_PopupCalendar" onclick="DP_TableClick(this, event)">
                                    <thead>
                                        <tr class="caption">
                                            <th class="arrow" onclick='Cal_PrevMonth("DP_PopupCalendar", event)'>
                                                «
                                            </th>
                                            <th colspan="4" id="calTitle">
                                                month
                                            </th>
                                            <th class="arrow" onclick='Cal_NextMonth("DP_PopupCalendar", event)'>
                                                »
                                            </th>
                                            <th onclick="DP_HidePopup(event)">
                                                X
                                            </th>
                                        </tr>
                                        <tr>
                                            <th abbr="Sunday" scope="col" title="Sunday">
                                                Su
                                            </th>
                                            <th abbr="Monday" scope="col" title="Monday">
                                                Mo
                                            </th>
                                            <th abbr="Tuesday" scope="col" title="Tuesday">
                                                Tu
                                            </th>
                                            <th abbr="Wednesday" scope="col" title="Wednesday">
                                                We
                                            </th>
                                            <th abbr="Thursday" scope="col" title="Thursday">
                                                Th
                                            </th>
                                            <th abbr="Friday" scope="col" title="Friday">
                                                Fr
                                            </th>
                                            <th abbr="Saturday" scope="col" title="Saturday">
                                                Sa
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="RecurrenceEditor" id="RecurrenceEditor" style="display:none;">
                                <div class="errorText" id="RecurrenceErrors">
                                    Error message placeholder.
                                </div>
                                <div class="recurrenceInput">
                                    <span class="label">
                                        Recurrence Pattern
                                    </span>
                                    <div class="frequencyInput">
                                        <ul class="verticalradio">
                                            <li>
                                                <input cssvalue="daily" errormessage="Daily" id="freq_Daily" name="freq" onclick="RecurrenceEditor.FreqChanged(this)" oninvalid="this.setCustomValidity('Daily');" type="radio" value="1">
                                                <label for="freq_Daily">
                                                    Daily
                                                </label>
                                                </input>
                                            </li>
                                            <li>
                                                <input cssvalue="weekly" errormessage="Weekly" id="freq_Weekly" name="freq" onclick="RecurrenceEditor.FreqChanged(this)" oninvalid="this.setCustomValidity('Weekly');" type="radio" value="2">
                                                <label for="freq_Weekly">
                                                    Weekly
                                                </label>
                                                </input>
                                            </li>
                                            <li>
                                                <input cssvalue="monthly" errormessage="Monthly" id="freq_Monthly" name="freq" onclick="RecurrenceEditor.FreqChanged(this)" oninvalid="this.setCustomValidity('Monthly');" type="radio" value="3">
                                                <label for="freq_Monthly">
                                                    Monthly
                                                </label>
                                                </input>
                                            </li>
                                            <li>
                                                <input cssvalue="yearly" errormessage="Yearly" id="freq_Yearly" name="freq" onclick="RecurrenceEditor.FreqChanged(this)" oninvalid="this.setCustomValidity('Yearly');" type="radio" value="4">
                                                <label for="freq_Yearly">
                                                    Yearly
                                                </label>
                                                </input>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="frequency">
                                        <div class="daily">
                                            <ul class="verticalradio">
                                                <li>
                                                    <input errormessage="Every" id="dailyOpts_EveryNthDay" name="dailyOpts" oninvalid="this.setCustomValidity('Every');" type="radio" value="0">
                                                    <label for="dailyOpts_EveryNthDay">
                                                        Every
                                                    </label>
                                                    <input class="shortFixed" id="NthDay" max="999" maxlength="3" min="1" onclick="RecurrenceEditor.SetRadioForType(0)" type="text" value="1">
                                                    <label for="dailyOpts_EveryNthDay">
                                                        day(s)
                                                    </label>
                                                    </input>
                                                    </input>
                                                </li>
                                                <li>
                                                    <input errormessage="Every weekday" id="dailyOpts_EveryWeekday" name="dailyOpts" oninvalid="this.setCustomValidity('Every weekday');" type="radio" value="1">
                                                    <label for="dailyOpts_EveryWeekday">
                                                        Every weekday
                                                    </label>
                                                    </input>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="weekly">
                                            <span>
                                                Every
                                                <input class="shortFixed" id="NthWeek" max="99" maxlength="2" min="1" type="text" value="1">
                                                week(s) on:
                                                </input>
                                            </span>
                                            <span class="dow">
                                                <input day="0" errormessage="Sunday" id="dow0" name="DOWchk" oninvalid="this.setCustomValidity('Sunday');" type="checkbox" value="1">
                                                <label for="dow0">
                                                    Sunday
                                                </label>
                                                </input>
                                            </span>
                                            <span class="dow">
                                                <input day="1" errormessage="Monday" id="dow1" name="DOWchk" oninvalid="this.setCustomValidity('Monday');" type="checkbox" value="2">
                                                <label for="dow1">
                                                    Monday
                                                </label>
                                                </input>
                                            </span>
                                            <span class="dow">
                                                <input day="2" errormessage="Tuesday" id="dow2" name="DOWchk" oninvalid="this.setCustomValidity('Tuesday');" type="checkbox" value="4">
                                                <label for="dow2">
                                                    Tuesday
                                                </label>
                                                </input>
                                            </span>
                                            <span class="dow">
                                                <input day="3" errormessage="Wednesday" id="dow3" name="DOWchk" oninvalid="this.setCustomValidity('Wednesday');" type="checkbox" value="8">
                                                <label for="dow3">
                                                    Wednesday
                                                </label>
                                                </input>
                                            </span>
                                            <span class="dow">
                                                <input day="4" errormessage="Thursday" id="dow4" name="DOWchk" oninvalid="this.setCustomValidity('Thursday');" type="checkbox" value="16">
                                                <label for="dow4">
                                                    Thursday
                                                </label>
                                                </input>
                                            </span>
                                            <span class="dow">
                                                <input day="5" errormessage="Friday" id="dow5" name="DOWchk" oninvalid="this.setCustomValidity('Friday');" type="checkbox" value="32">
                                                <label for="dow5">
                                                    Friday
                                                </label>
                                                </input>
                                            </span>
                                            <span class="dow">
                                                <input day="6" errormessage="Saturday" id="dow6" name="DOWchk" oninvalid="this.setCustomValidity('Saturday');" type="checkbox" value="64">
                                                <label for="dow6">
                                                    Saturday
                                                </label>
                                                </input>
                                            </span>
                                        </div>
                                        <div class="monthly">
                                            <span>
                                                Every
                                                <input class="shortFixed" id="NthMonth" max="11" maxlength="2" min="1" type="text" value="1">
                                                month(s)
                                                </input>
                                            </span>
                                            <ul class="verticalradio">
                                                <li>
                                                    <input errormessage="On day" id="monthlyOpts_DayX" name="monthlyOpts" oninvalid="this.setCustomValidity('On day');" type="radio" value="2">
                                                    <label for="monthlyOpts_DayX">
                                                        On day
                                                    </label>
                                                    <input class="shortFixed" id="DayX" max="31" maxlength="2" min="1" onclick="RecurrenceEditor.SetRadioForType(2)" type="text" value="" />
                                                    </input>
                                                </li>
                                                <li>
                                                    <input errormessage="On the" id="monthlyOpts_XthDOW" name="monthlyOpts" oninvalid="this.setCustomValidity('On the');" type="radio" value="3">
                                                    <label for="monthlyOpts_XthDOW">
                                                        On the
                                                    </label>
                                                    <select id="DayXth" onclick="RecurrenceEditor.SetRadioForType(3)">
                                                        <option value="1">
                                                            First
                                                        </option>
                                                        <option value="2">
                                                            Second
                                                        </option>
                                                        <option value="3">
                                                            Third
                                                        </option>
                                                        <option value="4">
                                                            Fourth
                                                        </option>
                                                        <option value="5">
                                                            Last
                                                        </option>
                                                    </select>
                                                    <select id="DOW" onclick="RecurrenceEditor.SetRadioForType(3)">
                                                        <option day="0" value="1">
                                                            Sunday
                                                        </option>
                                                        <option day="1" value="2">
                                                            Monday
                                                        </option>
                                                        <option day="2" value="4">
                                                            Tuesday
                                                        </option>
                                                        <option day="3" value="8">
                                                            Wednesday
                                                        </option>
                                                        <option day="4" value="16">
                                                            Thursday
                                                        </option>
                                                        <option day="5" value="32">
                                                            Friday
                                                        </option>
                                                        <option day="6" value="64">
                                                            Saturday
                                                        </option>
                                                    </select>
                                                    </input>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="yearly">
                                            <span>
                                                Every
                                                <input class="shortFixed" disabled="" id="NthYear" max="1" maxlength="1" min="1" type="text" value="1">
                                                year(s)
                                                </input>
                                            </span>
                                            <ul class="verticalradio">
                                                <li>
                                                    <input errormessage="On" id="yearlyOpts_SpecificDay" name="yearlyOpts" oninvalid="this.setCustomValidity('On');" type="radio" value="2">
                                                    <label for="yearlyOpts_SpecificDay">
                                                        On
                                                    </label>
                                                    <select id="SpecificDay_Month" onclick="RecurrenceEditor.SetRadioForType(2)">
                                                        <option value="0">
                                                            Jan
                                                        </option>
                                                        <option value="1">
                                                            Feb
                                                        </option>
                                                        <option value="2">
                                                            Mar
                                                        </option>
                                                        <option value="3">
                                                            Apr
                                                        </option>
                                                        <option value="4">
                                                            May
                                                        </option>
                                                        <option value="5">
                                                            Jun
                                                        </option>
                                                        <option value="6">
                                                            Jul
                                                        </option>
                                                        <option value="7">
                                                            Aug
                                                        </option>
                                                        <option value="8">
                                                            Sep
                                                        </option>
                                                        <option value="9">
                                                            Oct
                                                        </option>
                                                        <option value="10">
                                                            Nov
                                                        </option>
                                                        <option value="11">
                                                            Dec
                                                        </option>
                                                    </select>
                                                    <input class="shortFixed" id="SpecificDay_Day" max="31" maxlength="2" min="1" onclick="RecurrenceEditor.SetRadioForType(2)" type="text" value="" />
                                                    </input>
                                                </li>
                                                <li>
                                                    <input errormessage="On the" id="yearlyOpts_SpecificDayXth" name="yearlyOpts" oninvalid="this.setCustomValidity('On the');" type="radio" value="3">
                                                    <label for="yearlyOpts_SpecificDayXth">
                                                        On the
                                                    </label>
                                                    <select id="SpecificDayXth" onclick="RecurrenceEditor.SetRadioForType(3)">
                                                        <option value="1">
                                                            First
                                                        </option>
                                                        <option value="2">
                                                            Second
                                                        </option>
                                                        <option value="3">
                                                            Third
                                                        </option>
                                                        <option value="4">
                                                            Fourth
                                                        </option>
                                                        <option value="5">
                                                            Last
                                                        </option>
                                                    </select>
                                                    <select id="SpecificDayXth_DOW" onclick="RecurrenceEditor.SetRadioForType(3)">
                                                        <option value="1">
                                                            Sunday
                                                        </option>
                                                        <option value="2">
                                                            Monday
                                                        </option>
                                                        <option value="4">
                                                            Tuesday
                                                        </option>
                                                        <option value="8">
                                                            Wednesday
                                                        </option>
                                                        <option value="16">
                                                            Thursday
                                                        </option>
                                                        <option value="32">
                                                            Friday
                                                        </option>
                                                        <option value="64">
                                                            Saturday
                                                        </option>
                                                    </select>
                                                    <label for="yearlyOpts_SpecificDayXth">
                                                        of
                                                    </label>
                                                    <select id="SpecificDayXth_Month" onclick="RecurrenceEditor.SetRadioForType(3)">
                                                        <option value="0">
                                                            Jan
                                                        </option>
                                                        <option value="1">
                                                            Feb
                                                        </option>
                                                        <option value="2">
                                                            Mar
                                                        </option>
                                                        <option value="3">
                                                            Apr
                                                        </option>
                                                        <option value="4">
                                                            May
                                                        </option>
                                                        <option value="5">
                                                            Jun
                                                        </option>
                                                        <option value="6">
                                                            Jul
                                                        </option>
                                                        <option value="7">
                                                            Aug
                                                        </option>
                                                        <option value="8">
                                                            Sep
                                                        </option>
                                                        <option value="9">
                                                            Oct
                                                        </option>
                                                        <option value="10">
                                                            Nov
                                                        </option>
                                                        <option value="11">
                                                            Dec
                                                        </option>
                                                    </select>
                                                    </input>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="recurrenceEnd">
                                    <span class="label">
                                        Recurrence Ends
                                    </span>
                                    <ul>
                                        <li>
                                            <input errormessage="No end" id="endOpts_NoEnd" name="endOpts" onclick="RecurrenceEditor.EndChanged(this)" oninvalid="this.setCustomValidity('No end');" type="radio" value="-1">
                                            <label for="endOpts_NoEnd">
                                                No end
                                            </label>
                                            </input>
                                        </li>
                                        <li>
                                            <input errormessage="End after" id="endOpts_AfterN" name="endOpts" onclick="RecurrenceEditor.EndChanged(this)" oninvalid="this.setCustomValidity('End after');" type="radio" value="1">
                                            <label for="endOpts_AfterN">
                                                End after
                                            </label>
                                            <input class="shortFixed" id="AfterN" max="99" maxlength="2" min="1" onclick="RecurrenceEditor.SetRadioForEnd(1)" type="text" value="">
                                            <label for="endOpts_AfterN">
                                                occurrences
                                            </label>
                                            </input>
                                            </input>
                                        </li>
                                        <li>
                                            <input errormessage="End by" id="endOpts_EndBy" name="endOpts" onclick="RecurrenceEditor.EndChanged(this)" oninvalid="this.setCustomValidity('End by');" type="radio" value="2">
                                            <label for="endOpts_EndBy">
                                                End by
                                            </label>
                                            <input class="short" id="EndDate" onchange="RecurrenceEditor.SetRadioForEnd(2)" onclick="RecurrenceEditor.SetRadioForEnd(2)" placeholder="mm/dd/yyyy" type="text" value="">
                                            <div class="calendarIcon" onclick="DP_EnableCalendar('EndDate', this, -110, 0, event)">
                                            </div>
                                            </input>
                                            </input>
                                        </li>
                                    </ul>
                                </div>
                                <div class="recurrenceExcludes" id="Excludes">
                                    <span class="label">
                                        Excluded Dates
                                    </span>
                                    <select class="radioOptions" id="excludeOptions" onchange="RecurrenceEditor.SelectOneExcludeOption(this)" size="3" style="width:200px;">
                                        <!--placeholder-->
                                    </select>
                                    <div class="radioOptionBuilder">
                                        <input class="short" defaultvalue="" id="excludeDate" onchange="RecurrenceEditor.CheckExcludeButtons()" onkeyup="RecurrenceEditor.CheckExcludeButtons()" placeholder="mm/dd/yyyy" type="text" value="">
                                        <div class="calendarIcon" onclick="DP_EnableCalendar('excludeDate', this, -110, 0, event)">
                                        </div>
                                        <div>
                                            <input disabled="" id="excludeInsert" onclick="RecurrenceEditor.InsertOption();" type="button" value="Insert">
                                            <input disabled="" id="excludeUpdate" onclick="RecurrenceEditor.UpdateOption();" type="button" value="Update">
                                            <input disabled="" id="excludeDelete" onclick="RecurrenceEditor.DeleteOption();" type="button" value="Delete" />
                                            </input>
                                            </input>
                                        </div>
                                        </input>
                                    </div>
                                    <span class="msgText" id="excludeMsg">
                                        <!--placeholder-->
                                    </span>
                                </div>
                                <div class="recurrenceButtons">
                                    <input class="titan_button" id="recurOK" onclick="RecurrenceEditor.OK()" type="button" value="OK">
                                    <input class="titan_button" id="recurCancel" onclick="RecurrenceEditor.Cancel()" type="button" value="Cancel" />
                                    </input>
                                </div>
                                <input id="EditorArgs" type="hidden" value="" />
                            </div>
                            <script type="text/javascript">
                                if (window[''])
                                    window[''](42);

                                document.getElementById("SubmitButtons_42").style.display = "block";
                            </script>
                            <!--EndNoIndex-->
                            </input>
                            </input>
                        </div>
                        <!--BeginNoIndex-->
                        <div id="ThankYouDiv_42" style="display:none;">
                            <h4 style="text-align:center">
                                Your information has been saved.
                            </h4>
                            <p style="text-align:center">
                                <span style="font-size:18px">
                                    Begin your journey.
                                </span>
                            </p>
                            <p style="text-align:center">
                                <span class="Button">
                                    <a href="https://www.thegrantportal.com/PublicSite/Search-Grants" linktype="2" target="_self">
                                        Search Grants
                                    </a>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </main>
        @include('website.partials.footer1')
        <a aria-label="Back to top of page" href="https://www.thegrantportal.com/thegrantportal/Sign-Up/Profile?DataID=23233&subscribe=0#" id="scrollTop">
            <span aria-hidden="true" class="fas fa-chevron-up arrow">
            </span>
        </a>
        <input class="" errormessage="0" id="internal_IsDirty" isrequired="false" type="hidden" value="0" />
    </form>
    <script type="text/javascript">
        //<![CDATA[
        if (!window.mvcClientValidationMetadata) {
            window.mvcClientValidationMetadata = [];
        }
        window.mvcClientValidationMetadata.push({
            "Fields": [],
            "FormId": null,
            "ReplaceValidationSummary": false
        });
        //]]>
    </script>
    <div class="betternet-wrapper">
    </div>
    <div class="zsiq_floatmain zsiq_theme1 siq_bR" data-id="zsalesiq" style="visibility: hidden; display: block;">
        <div class="zsiq_float " id="zsiq_float" style="font-family:inherit">
            <div class="zsiq_flt_rel">
                <em class="zsiq_user " id="zsiq_agtpic">
                    <img alt="Gravatar" src="assets/public" />
                </em>
                <div class="zsiq_cnt" id="titlediv">
                    <div class="zsiq_ellips" id="zsiq_maintitle" title="We're Online!">
                        We're Online!
                    </div>
                    <p class="zsiq_ellips" id="zsiq_byline" title="How may I help you today?">
                        How may I help you today?
                    </p>
                    <em class="siqico-close">
                    </em>
                </div>
                <em class="zsiq_unrdcnt" id="zsiq_unreadcnt" style="display: none;">
                </em>
                <em class="zsiqmin_unrdcnt zsiq_unrdcnt siqico-mincall" id="zsiq_avcall" style="display: none;">
                </em>
            </div>
        </div>
    </div>
    <style data-id="zsalesiq" id="zsiqcustomcss">
        .zsiq_flt_rel {
            background-color: #0066cc !important;
        }

        .zsiq_seasonal .st2 {
            fill: #0066cc !important;
        }
    </style>
    <div class="Wkst">
        <section class="WkstDialog" data-state="idle" id="WkstDialog">
            <div id="dialogSprite">
                <svg style="display: none;" xmlns="http://www.w3.org/2000/svg">
                    <symbol id="help-circle" viewbox="0 0 1792 1792">
                        <path d="M1024 1376v-192q0-14-9-23t-23-9h-192q-14 0-23 9t-9 23v192q0 14 9 23t23 9h192q14 0 23-9t9-23zm256-672q0-88-55.5-163t-138.5-116-170-41q-243 0-371 213-15 24 8 42l132 100q7 6 19 6 16 0 25-12 53-68 86-92 34-24 86-24 48 0 85.5 26t37.5 59q0 38-20 61t-68 45q-63 28-115.5 86.5t-52.5 125.5v36q0 14 9 23t23 9h192q14 0 23-9t9-23q0-19 21.5-49.5t54.5-49.5q32-18 49-28.5t46-35 44.5-48 28-60.5 12.5-81zm384 192q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                        </path>
                    </symbol>
                    <symbol id="FileFolderOpen" viewbox="0 0 1792 1792">
                        <path d="M1600 1312v-704q0-40-28-68t-68-28h-704q-40 0-68-28t-28-68v-64q0-40-28-68t-68-28h-320q-40 0-68 28t-28 68v960q0 40 28 68t68 28h1216q40 0 68-28t28-68zm128-704v704q0 92-66 158t-158 66h-1216q-92 0-158-66t-66-158v-960q0-92 66-158t158-66h320q92 0 158 66t66 158v32h672q92 0 158 66t66 158z">
                        </path>
                    </symbol>
                    <symbol id="upload" viewbox="0 0 1792 1792">
                        <path d="M1344 1472q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm256 0q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm128-224v320q0 40-28 68t-68 28h-1472q-40 0-68-28t-28-68v-320q0-40 28-68t68-28h427q21 56 70.5 92t110.5 36h256q61 0 110.5-36t70.5-92h427q40 0 68 28t28 68zm-325-648q-17 40-59 40h-256v448q0 26-19 45t-45 19h-256q-26 0-45-19t-19-45v-448h-256q-42 0-59-40-17-39 14-69l448-448q18-19 45-19t45 19l448 448q31 30 14 69z">
                        </path>
                    </symbol>
                    <symbol id="download" viewbox="0 0 1792 1792">
                        <path d="M1344 1472c0-17.3-6.3-32.3-19-45s-27.7-19-45-19-32.3 6.3-45 19-19 27.7-19 45 6.3 32.3 19 45 27.7 19 45 19 32.3-6.3 45-19 19-27.7 19-45zm256 0c0-17.3-6.3-32.3-19-45s-27.7-19-45-19-32.3 6.3-45 19-19 27.7-19 45 6.3 32.3 19 45 27.7 19 45 19 32.3-6.3 45-19 19-27.7 19-45zm128-224v320c0 26.7-9.3 49.3-28 68s-41.3 28-68 28H160c-26.7 0-49.3-9.3-68-28s-28-41.3-28-68v-320c0-26.7 9.3-49.3 28-68s41.3-28 68-28h465l135 136c38.7 37.3 84 56 136 56s97.3-18.7 136-56l136-136h464c26.7 0 49.3 9.3 68 28s28 41.3 28 68zm-325-569c11.3 27.3 6.7 50.7-14 70l-448 448c-12 12.7-27 19-45 19s-33-6.3-45-19L403 749c-20.7-19.3-25.3-42.7-14-70 11.3-26 31-39 59-39h256V192c0-17.3 6.3-32.3 19-45s27.7-19 45-19h256c17.3 0 32.3 6.3 45 19s19 27.7 19 45v448h256c28 0 47.7 13 59 39z">
                        </path>
                    </symbol>
                    <symbol id="preview" viewbox="0 0 1792 1792">
                        <path d="M1664 960q-152-236-381-353 61 104 61 225 0 185-131.5 316.5t-316.5 131.5-316.5-131.5-131.5-316.5q0-121 61-225-229 117-381 353 133 205 333.5 326.5t434.5 121.5 434.5-121.5 333.5-326.5zm-720-384q0-20-14-34t-34-14q-125 0-214.5 89.5t-89.5 214.5q0 20 14 34t34 14 34-14 14-34q0-86 61-147t147-61q20 0 34-14t14-34zm848 384q0 34-20 69-140 230-376.5 368.5t-499.5 138.5-499.5-139-376.5-368q-20-35-20-69t20-69q140-229 376.5-368t499.5-139 499.5 139 376.5 368q20 35 20 69z">
                        </path>
                    </symbol>
                    <symbol id="content" viewbox="0 0 1792 1792">
                        <path d="M888 1184l116-116-152-152-116 116v56h96v96h56zm440-720q-16-16-33 1l-350 350q-17 17-1 33t33-1l350-350q17-17 1-33zm80 594v190q0 119-84.5 203.5t-203.5 84.5h-832q-119 0-203.5-84.5t-84.5-203.5v-832q0-119 84.5-203.5t203.5-84.5h832q63 0 117 25 15 7 18 23 3 17-9 29l-49 49q-14 14-32 8-23-6-45-6h-832q-66 0-113 47t-47 113v832q0 66 47 113t113 47h832q66 0 113-47t47-113v-126q0-13 9-22l64-64q15-15 35-7t20 29zm-96-738l288 288-672 672h-288v-288zm444 132l-92 92-288-288 92-92q28-28 68-28t68 28l152 152q28 28 28 68t-28 68z">
                        </path>
                    </symbol>
                    <!-- tree -->
                    <defs>
                        <style>
                            .iconFill {
                                fill: #213D6B;
                            }

                            .typeFill {
                                fill: #a7a7a7;
                            }

                            text {
                                font-family: 'Open Sans', sans-serif;
                                font-size: 1100px;
                                font-weight: 700;
                            }

                            text.exclamation {
                                font-size: 1200px;
                            }

                            .yellow {
                                fill: #f8dd59;
                            }

                            .green {
                                fill: #527A3B;
                            }

                            .off {
                                display: none;
                            }
                        </style>
                    </defs>
                    <symbol id="dashboard" viewbox="0 0 1792 1792">
                        <path d="M384 1152q0-53-37.5-90.5t-90.5-37.5-90.5 37.5-37.5 90.5 37.5 90.5 90.5 37.5 90.5-37.5 37.5-90.5zm192-448q0-53-37.5-90.5t-90.5-37.5-90.5 37.5-37.5 90.5 37.5 90.5 90.5 37.5 90.5-37.5 37.5-90.5zm428 481l101-382q6-26-7.5-48.5t-38.5-29.5-48 6.5-30 39.5l-101 382q-60 5-107 43.5t-63 98.5q-20 77 20 146t117 89 146-20 89-117q16-60-6-117t-72-91zm660-33q0-53-37.5-90.5t-90.5-37.5-90.5 37.5-37.5 90.5 37.5 90.5 90.5 37.5 90.5-37.5 37.5-90.5zm-640-640q0-53-37.5-90.5t-90.5-37.5-90.5 37.5-37.5 90.5 37.5 90.5 90.5 37.5 90.5-37.5 37.5-90.5zm448 192q0-53-37.5-90.5t-90.5-37.5-90.5 37.5-37.5 90.5 37.5 90.5 90.5 37.5 90.5-37.5 37.5-90.5zm320 448q0 261-141 483-19 29-54 29h-1402q-35 0-54-29-141-221-141-483 0-182 71-348t191-286 286-191 348-71 348 71 286 191 191 286 71 348z">
                        </path>
                    </symbol>
                    <symbol id="RecycleBin" viewbox="0 0 1792 1792">
                        <path d="M836 1169l-15 368-2 22-420-29q-36-3-67-31.5t-47-65.5q-11-27-14.5-55t4-65 12-55 21.5-64 19-53q78 12 509 28zm-387-586l180 379-147-92q-63 72-111.5 144.5t-72.5 125-39.5 94.5-18.5 63l-4 21-190-357q-17-26-18-56t6-47l8-18q35-63 114-188l-140-86zm1231 517l-188 359q-12 29-36.5 46.5t-43.5 20.5l-18 4q-71 7-219 12l8 164-230-367 211-362 7 173q170 16 283 5t170-33zm-785-924q-47 63-265 435l-317-187-19-12 225-356q20-31 60-45t80-10q24 2 48.5 12t42 21 41.5 33 36 34.5 36 39.5 32 35zm655 307l212 363q18 37 12.5 76t-27.5 74q-13 20-33 37t-38 28-48.5 22-47 16-51.5 14-46 12q-34-72-265-436l313-195zm-143-226l142-83-220 373-419-20 151-86q-34-89-75-166t-75.5-123.5-64.5-80-47-46.5l-17-13 405 1q31-3 58 10.5t39 28.5l11 15q39 61 112 190z">
                        </path>
                    </symbol>
                    <symbol id="PageRoot" viewbox="0 0 1792 1792">
                        <path d="M896 128q209 0 385.5 103t279.5 279.5 103 385.5-103 385.5-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103zm274 521q-2 1-9.5 9.5t-13.5 9.5q2 0 4.5-5t5-11 3.5-7q6-7 22-15 14-6 52-12 34-8 51 11-2-2 9.5-13t14.5-12q3-2 15-4.5t15-7.5l2-22q-12 1-17.5-7t-6.5-21q0 2-6 8 0-7-4.5-8t-11.5 1-9 1q-10-3-15-7.5t-8-16.5-4-15q-2-5-9.5-11t-9.5-10q-1-2-2.5-5.5t-3-6.5-4-5.5-5.5-2.5-7 5-7.5 10-4.5 5q-3-2-6-1.5t-4.5 1-4.5 3-5 3.5q-3 2-8.5 3t-8.5 2q15-5-1-11-10-4-16-3 9-4 7.5-12t-8.5-14h5q-1-4-8.5-8.5t-17.5-8.5-13-6q-8-5-34-9.5t-33-.5q-5 6-4.5 10.5t4 14 3.5 12.5q1 6-5.5 13t-6.5 12q0 7 14 15.5t10 21.5q-3 8-16 16t-16 12q-5 8-1.5 18.5t10.5 16.5q2 2 1.5 4t-3.5 4.5-5.5 4-6.5 3.5l-3 2q-11 5-20.5-6t-13.5-26q-7-25-16-30-23-8-29 1-5-13-41-26-25-9-58-4 6-1 0-15-7-15-19-12 3-6 4-17.5t1-13.5q3-13 12-23 1-1 7-8.5t9.5-13.5.5-6q35 4 50-11 5-5 11.5-17t10.5-17q9-6 14-5.5t14.5 5.5 14.5 5q14 1 15.5-11t-7.5-20q12 1 3-17-4-7-8-9-12-4-27 5-8 4 2 8-1-1-9.5 10.5t-16.5 17.5-16-5q-1-1-5.5-13.5t-9.5-13.5q-8 0-16 15 3-8-11-15t-24-8q19-12-8-27-7-4-20.5-5t-19.5 4q-5 7-5.5 11.5t5 8 10.5 5.5 11.5 4 8.5 3q14 10 8 14-2 1-8.5 3.5t-11.5 4.5-6 4q-3 4 0 14t-2 14q-5-5-9-17.5t-7-16.5q7 9-25 6l-10-1q-4 0-16 2t-20.5 1-13.5-8q-4-8 0-20 1-4 4-2-4-3-11-9.5t-10-8.5q-46 15-94 41 6 1 12-1 5-2 13-6.5t10-5.5q34-14 42-7l5-5q14 16 20 25-7-4-30-1-20 6-22 12 7 12 5 18-4-3-11.5-10t-14.5-11-15-5q-16 0-22 1-146 80-235 222 7 7 12 8 4 1 5 9t2.5 11 11.5-3q9 8 3 19 1-1 44 27 19 17 21 21 3 11-10 18-1-2-9-9t-9-4q-3 5 .5 18.5t10.5 12.5q-7 0-9.5 16t-2.5 35.5-1 23.5l2 1q-3 12 5.5 34.5t21.5 19.5q-13 3 20 43 6 8 8 9 3 2 12 7.5t15 10 10 10.5q4 5 10 22.5t14 23.5q-2 6 9.5 20t10.5 23q-1 0-2.5 1t-2.5 1q3 7 15.5 14t15.5 13q1 3 2 10t3 11 8 2q2-20-24-62-15-25-17-29-3-5-5.5-15.5t-4.5-14.5q2 0 6 1.5t8.5 3.5 7.5 4 2 3q-3 7 2 17.5t12 18.5 17 19 12 13q6 6 14 19.5t0 13.5q9 0 20 10.5t17 19.5q5 8 8 26t5 24q2 7 8.5 13.5t12.5 9.5l16 8 13 7q5 2 18.5 10.5t21.5 11.5q10 4 16 4t14.5-2.5 13.5-3.5q15-2 29 15t21 21q36 19 55 11-2 1 .5 7.5t8 15.5 9 14.5 5.5 8.5q5 6 18 15t18 15q6-4 7-9-3 8 7 20t18 10q14-3 14-32-31 15-49-18 0-1-2.5-5.5t-4-8.5-2.5-8.5 0-7.5 5-3q9 0 10-3.5t-2-12.5-4-13q-1-8-11-20t-12-15q-5 9-16 8t-16-9q0 1-1.5 5.5t-1.5 6.5q-13 0-15-1 1-3 2.5-17.5t3.5-22.5q1-4 5.5-12t7.5-14.5 4-12.5-4.5-9.5-17.5-2.5q-19 1-26 20-1 3-3 10.5t-5 11.5-9 7q-7 3-24 2t-24-5q-13-8-22.5-29t-9.5-37q0-10 2.5-26.5t3-25-5.5-24.5q3-2 9-9.5t10-10.5q2-1 4.5-1.5t4.5 0 4-1.5 3-6q-1-1-4-3-3-3-4-3 7 3 28.5-1.5t27.5 1.5q15 11 22-2 0-1-2.5-9.5t-.5-13.5q5 27 29 9 3 3 15.5 5t17.5 5q3 2 7 5.5t5.5 4.5 5-.5 8.5-6.5q10 14 12 24 11 40 19 44 7 3 11 2t4.5-9.5 0-14-1.5-12.5l-1-8v-18l-1-8q-15-3-18.5-12t1.5-18.5 15-18.5q1-1 8-3.5t15.5-6.5 12.5-8q21-19 15-35 7 0 11-9-1 0-5-3t-7.5-5-4.5-2q9-5 2-16 5-3 7.5-11t7.5-10q9 12 21 2 8-8 1-16 5-7 20.5-10.5t18.5-9.5q7 2 8-2t1-12 3-12q4-5 15-9t13-5l17-11q3-4 0-4 18 2 31-11 10-11-6-20 3-6-3-9.5t-15-5.5q3-1 11.5-.5t10.5-1.5q15-10-7-16-17-5-43 12zm-163 877q206-36 351-189-3-3-12.5-4.5t-12.5-3.5q-18-7-24-8 1-7-2.5-13t-8-9-12.5-8-11-7q-2-2-7-6t-7-5.5-7.5-4.5-8.5-2-10 1l-3 1q-3 1-5.5 2.5t-5.5 3-4 3 0 2.5q-21-17-36-22-5-1-11-5.5t-10.5-7-10-1.5-11.5 7q-5 5-6 15t-2 13q-7-5 0-17.5t2-18.5q-3-6-10.5-4.5t-12 4.5-11.5 8.5-9 6.5-8.5 5.5-8.5 7.5q-3 4-6 12t-5 11q-2-4-11.5-6.5t-9.5-5.5q2 10 4 35t5 38q7 31-12 48-27 25-29 40-4 22 12 26 0 7-8 20.5t-7 21.5q0 6 2 16z">
                        </path>
                    </symbol>
                    <symbol id="Page" viewbox="0 0 1536 1792">
                        <path class="typeFill" d="M1267.4 414.6c16 18.3 29.8 43 41.2 74.3 11.4 31.3 17.1 60 17.1 86v1126.3c0 26.1-8.1 48.2-24.1 66.5-16 18.3-35.5 27.3-58.4 27.3H88.3c-22.9 0-42.4-9.1-58.4-27.3s-24.1-40.4-24.1-66.5V136.8c0-26.1 8.1-48.2 24.1-66.5S65.4 43 88.3 43h770.1c22.9 0 48.1 6.5 75.6 19.6s49.3 28.7 65.3 46.9l268.1 305.1zM885.8 176v367.6h323.1c-5.7-18.9-12-32.2-18.9-40.1L921.1 197.4c-6.9-7.7-18.6-15-35.3-21.4zm330 1493.8V668.7H858.4c-22.9 0-42.4-9.1-58.4-27.3-16-18.3-24.1-40.4-24.1-66.5V168.2h-660v1501.6h1099.9z">
                        </path>
                    </symbol>
                    <symbol id="PageSaved" viewbox="0 0 1536 1792">
                        <path class="typeFill" d="M1267.4 414.6c16 18.3 29.8 43 41.2 74.3 11.4 31.3 17.1 60 17.1 86v1126.3c0 26.1-8.1 48.2-24.1 66.5-16 18.3-35.5 27.3-58.4 27.3H88.3c-22.9 0-42.4-9.1-58.4-27.3s-24.1-40.4-24.1-66.5V136.8c0-26.1 8.1-48.2 24.1-66.5S65.4 43 88.3 43h770.1c22.9 0 48.1 6.5 75.6 19.6s49.3 28.7 65.3 46.9l268.1 305.1zM885.8 176v367.6h323.1c-5.7-18.9-12-32.2-18.9-40.1L921.1 197.4c-6.9-7.7-18.6-15-35.3-21.4zm330 1493.8V668.7H858.4c-22.9 0-42.4-9.1-58.4-27.3-16-18.3-24.1-40.4-24.1-66.5V168.2h-660v1501.6h1099.9z">
                        </path>
                        <circle class="yellow" cx="953" cy="1216" r="575">
                        </circle>
                        <text class="exclamation" transform="translate(789.6 1636.379)">
                            !
                        </text>
                    </symbol>
                    <symbol id="PageApproval1" viewbox="0 0 1536 1792">
                        <path class="typeFill" d="M1267.4 414.6c16 18.3 29.8 43 41.2 74.3 11.4 31.3 17.1 60 17.1 86v1126.3c0 26.1-8.1 48.2-24.1 66.5-16 18.3-35.5 27.3-58.4 27.3H88.3c-22.9 0-42.4-9.1-58.4-27.3s-24.1-40.4-24.1-66.5V136.8c0-26.1 8.1-48.2 24.1-66.5S65.4 43 88.3 43h770.1c22.9 0 48.1 6.5 75.6 19.6s49.3 28.7 65.3 46.9l268.1 305.1zM885.8 176v367.6h323.1c-5.7-18.9-12-32.2-18.9-40.1L921.1 197.4c-6.9-7.7-18.6-15-35.3-21.4zm330 1493.8V668.7H858.4c-22.9 0-42.4-9.1-58.4-27.3-16-18.3-24.1-40.4-24.1-66.5V168.2h-660v1501.6h1099.9z">
                        </path>
                        <circle class="yellow" cx="953" cy="1216" r="575">
                        </circle>
                        <text transform="translate(639.6 1636.379)">
                            1
                        </text>
                    </symbol>
                    <symbol id="PageApproval2" viewbox="0 0 1536 1792">
                        <path class="typeFill" d="M1267.4 414.6c16 18.3 29.8 43 41.2 74.3 11.4 31.3 17.1 60 17.1 86v1126.3c0 26.1-8.1 48.2-24.1 66.5-16 18.3-35.5 27.3-58.4 27.3H88.3c-22.9 0-42.4-9.1-58.4-27.3s-24.1-40.4-24.1-66.5V136.8c0-26.1 8.1-48.2 24.1-66.5S65.4 43 88.3 43h770.1c22.9 0 48.1 6.5 75.6 19.6s49.3 28.7 65.3 46.9l268.1 305.1zM885.8 176v367.6h323.1c-5.7-18.9-12-32.2-18.9-40.1L921.1 197.4c-6.9-7.7-18.6-15-35.3-21.4zm330 1493.8V668.7H858.4c-22.9 0-42.4-9.1-58.4-27.3-16-18.3-24.1-40.4-24.1-66.5V168.2h-660v1501.6h1099.9z">
                        </path>
                        <circle class="yellow" cx="953" cy="1216" r="575">
                        </circle>
                        <text transform="translate(664.6 1586.379)">
                            2
                        </text>
                    </symbol>
                    <symbol id="PagePublished" viewbox="0 0 1536 1792">
                        <path class="typeFill" d="M1267.4 414.6c16 18.3 29.8 43 41.2 74.3 11.4 31.3 17.1 60 17.1 86v1126.3c0 26.1-8.1 48.2-24.1 66.5-16 18.3-35.5 27.3-58.4 27.3H88.3c-22.9 0-42.4-9.1-58.4-27.3s-24.1-40.4-24.1-66.5V136.8c0-26.1 8.1-48.2 24.1-66.5S65.4 43 88.3 43h770.1c22.9 0 48.1 6.5 75.6 19.6s49.3 28.7 65.3 46.9l268.1 305.1zM885.8 176v367.6h323.1c-5.7-18.9-12-32.2-18.9-40.1L921.1 197.4c-6.9-7.7-18.6-15-35.3-21.4zm330 1493.8V668.7H858.4c-22.9 0-42.4-9.1-58.4-27.3-16-18.3-24.1-40.4-24.1-66.5V168.2h-660v1501.6h1099.9z">
                        </path>
                        <path class="iconFill" d="M953 641c104.3 0 200.5 25.7 288.6 77.1 88.1 51.4 157.9 121.2 209.3 209.3s77.1 184.3 77.1 288.6-25.7 200.5-77.1 288.6-121.2 157.9-209.3 209.3c-88.1 51.4-184.3 77.1-288.6 77.1s-200.5-25.7-288.6-77.1-157.9-121.2-209.3-209.3S378 1320.3 378 1216s25.7-200.5 77.1-288.6 121.2-157.9 209.3-209.3C752.5 666.7 848.7 641 953 641zm205.1 390.1c-1 .5-3.4 2.9-7.1 7.1-3.7 4.2-7.1 6.6-10.1 7.1 1 0 2.1-1.2 3.4-3.7 1.2-2.5 2.5-5.2 3.7-8.2s2.1-4.7 2.6-5.2c3-3.5 8.5-7.2 16.5-11.2 7-3 20-6 38.9-9 17-4 29.7-1.2 38.2 8.2-1-1 1.4-4.2 7.1-9.7s9.4-8.5 10.9-9c1.5-1 5.2-2.1 11.2-3.4 6-1.2 9.7-3.1 11.2-5.6l1.5-16.5c-6 .5-10.4-1.2-13.1-5.2s-4.4-9.2-4.9-15.7c0 1-1.5 3-4.5 6 0-3.5-1.1-5.5-3.4-6s-5.1-.2-8.6.7c-3.5 1-5.7 1.2-6.7.7-5-1.5-8.7-3.4-11.2-5.6s-4.5-6.4-6-12.4-2.5-9.7-3-11.2c-1-2.5-3.4-5.2-7.1-8.2s-6.1-5.5-7.1-7.5c-.5-1-1.1-2.4-1.9-4.1-.7-1.7-1.5-3.4-2.2-4.9s-1.7-2.9-3-4.1c-1.2-1.2-2.6-1.9-4.1-1.9s-3.2 1.2-5.2 3.7-3.9 5-5.6 7.5-2.9 3.7-3.4 3.7c-1.5-1-3-1.4-4.5-1.1-1.5.2-2.6.5-3.4.7-.7.2-1.9 1-3.4 2.2s-2.7 2.1-3.7 2.6c-1.5 1-3.6 1.7-6.4 2.2-2.7.5-4.9 1-6.4 1.5 7.5-2.5 7.2-5.2-.7-8.2-5-2-9-2.7-12-2.2 4.5-2 6.4-5 5.6-9-.7-4-2.9-7.5-6.4-10.5h3.7c-.5-2-2.6-4.1-6.4-6.4-3.7-2.2-8.1-4.4-13.1-6.4s-8.2-3.5-9.7-4.5c-4-2.5-12.5-4.9-25.5-7.1-13-2.2-21.2-2.4-24.7-.4-2.5 3-3.6 5.6-3.4 7.9.2 2.2 1.2 5.7 3 10.5 1.7 4.7 2.6 7.9 2.6 9.4.5 3-.9 6.2-4.1 9.7s-4.9 6.5-4.9 9c0 3.5 3.5 7.4 10.5 11.6s9.5 9.6 7.5 16.1c-1.5 4-5.5 8-12 12s-10.5 7-12 9c-2.5 4-2.9 8.6-1.1 13.9 1.7 5.2 4.4 9.4 7.9 12.4 1 1 1.4 2 1.1 3-.2 1-1.1 2.1-2.6 3.4-1.5 1.2-2.9 2.2-4.1 3-1.2.7-2.9 1.6-4.9 2.6l-2.2 1.5c-5.5 2.5-10.6 1-15.3-4.5-4.7-5.5-8.1-12-10.1-19.5-3.5-12.5-7.5-20-12-22.5-11.5-4-18.7-3.7-21.7.7-2.5-6.5-12.7-13-30.7-19.5-12.5-4.5-27-5.5-43.4-3 3-.5 3-4.2 0-11.2-3.5-7.5-8.2-10.5-14.2-9 1.5-3 2.5-7.4 3-13.1.5-5.7.7-9.1.7-10.1 1.5-6.5 4.5-12.2 9-17.2.5-.5 2.2-2.6 5.2-6.4 3-3.7 5.4-7.1 7.1-10.1 1.7-3 1.9-4.5.4-4.5 17.5 2 29.9-.7 37.4-8.2 2.5-2.5 5.4-6.7 8.6-12.7 3.2-6 5.9-10.2 7.9-12.7 4.5-3 8-4.4 10.5-4.1 2.5.2 6.1 1.6 10.9 4.1 4.7 2.5 8.4 3.7 10.9 3.7 7 .5 10.9-2.2 11.6-8.2s-1.1-11-5.6-15c6 .5 6.7-3.7 2.2-12.7-2-3.5-4-5.7-6-6.7-6-2-12.7-.7-20.2 3.7-4 2-3.5 4 1.5 6-.5-.5-2.9 2.1-7.1 7.9-4.2 5.7-8.4 10.1-12.4 13.1s-8 1.7-12-3.7c-.5-.5-1.9-3.9-4.1-10.1s-4.6-9.6-7.1-10.1c-4 0-8 3.7-12 11.2 1.5-4-1.2-7.7-8.2-11.2s-13-5.5-18-6c9.5-6 7.5-12.7-6-20.2-3.5-2-8.6-3.2-15.3-3.7s-11.6.5-14.6 3c-2.5 3.5-3.9 6.4-4.1 8.6-.2 2.2 1 4.2 3.7 6s5.4 3.1 7.9 4.1 5.4 2 8.6 3c3.2 1 5.4 1.7 6.4 2.2 7 5 9 8.5 6 10.5-1 .5-3.1 1.4-6.4 2.6s-6.1 2.4-8.6 3.4-4 2-4.5 3c-1.5 2-1.5 5.5 0 10.5s1 8.5-1.5 10.5c-2.5-2.5-4.7-6.9-6.7-13.1-2-6.2-3.7-10.4-5.2-12.4 3.5 4.5-2.7 6-18.7 4.5l-7.5-.7c-2 0-6 .5-12 1.5s-11.1 1.2-15.3.7-7.6-2.5-10.1-6c-2-4-2-9 0-15 .5-2 1.5-2.5 3-1.5-2-1.5-4.7-3.9-8.2-7.1-3.5-3.2-6-5.4-7.5-6.4-23 7.5-46.4 17.7-70.4 30.7 3 .5 6 .2 9-.7 2.5-1 5.7-2.6 9.7-4.9s6.5-3.6 7.5-4.1c17-7 27.5-8.7 31.4-5.2l3.7-3.7c7 8 12 14.2 15 18.7-3.5-2-11-2.2-22.5-.7-10 3-15.5 6-16.5 9 3.5 6 4.7 10.5 3.7 13.5-2-1.5-4.9-4-8.6-7.5-3.7-3.5-7.4-6.2-10.9-8.2s-7.2-3.2-11.2-3.7c-8 0-13.5.2-16.5.7-72.9 39.9-131.5 95.3-175.9 166.2 3.5 3.5 6.5 5.5 9 6 2 .5 3.2 2.7 3.7 6.7s1.1 6.7 1.9 8.2c.7 1.5 3.6.7 8.6-2.2 4.5 4 5.2 8.7 2.2 14.2.5-.5 11.5 6.2 32.9 20.2 9.5 8.5 14.7 13.7 15.7 15.7 1.5 5.5-1 10-7.5 13.5-.5-1-2.7-3.2-6.7-6.7s-6.2-4.5-6.7-3c-1.5 2.5-1.4 7.1.4 13.9 1.7 6.7 4.4 9.9 7.9 9.4-3.5 0-5.9 4-7.1 12s-1.9 16.8-1.9 26.6c0 9.7-.2 15.6-.7 17.6l1.5.7c-1.5 6-.1 14.6 4.1 25.8s9.6 16.1 16.1 14.6c-6.5 1.5-1.5 12.2 15 32.2 3 4 5 6.2 6 6.7 1.5 1 4.5 2.9 9 5.6s8.2 5.2 11.2 7.5c3 2.2 5.5 4.9 7.5 7.9 2 2.5 4.5 8.1 7.5 16.8 3 8.7 6.5 14.6 10.5 17.6-1 3 1.4 8 7.1 15 5.7 7 8.4 12.7 7.9 17.2-.5 0-1.1.2-1.9.7s-1.4.7-1.9.7c1.5 3.5 5.4 7 11.6 10.5 6.2 3.5 10.1 6.7 11.6 9.7.5 1.5 1 4 1.5 7.5s1.2 6.2 2.2 8.2 3 2.5 6 1.5c1-10-5-25.5-18-46.4-7.5-12.5-11.7-19.7-12.7-21.7-1.5-2.5-2.9-6.4-4.1-11.6-1.2-5.2-2.4-8.9-3.4-10.9 1 0 2.5.4 4.5 1.1s4.1 1.6 6.4 2.6 4.1 2 5.6 3 2 1.7 1.5 2.2c-1.5 3.5-1 7.9 1.5 13.1s5.5 9.9 9 13.9 7.7 8.7 12.7 14.2 8 8.7 9 9.7c3 3 6.5 7.9 10.5 14.6s4 10.1 0 10.1c4.5 0 9.5 2.6 15 7.9s9.7 10.1 12.7 14.6c2.5 4 4.5 10.5 6 19.5s2.7 15 3.7 18c1 3.5 3.1 6.9 6.4 10.1 3.2 3.2 6.4 5.6 9.4 7.1l12 6 9.7 5.2c2.5 1 7.1 3.6 13.9 7.9 6.7 4.2 12.1 7.1 16.1 8.6 5 2 9 3 12 3s6.6-.6 10.9-1.9c4.2-1.2 7.6-2.1 10.1-2.6 7.5-1 14.7 2.7 21.7 11.2s12.2 13.7 15.7 15.7c18 9.5 31.7 12.2 41.2 8.2-1 .5-.9 2.4.4 5.6 1.2 3.2 3.2 7.1 6 11.6s5 8.1 6.7 10.9c1.7 2.7 3.1 4.9 4.1 6.4 2.5 3 7 6.7 13.5 11.2s11 8.2 13.5 11.2c3-2 4.7-4.2 5.2-6.7-1.5 4 .2 9 5.2 15s9.5 8.5 13.5 7.5c7-1.5 10.5-9.5 10.5-24-15.5 7.5-27.7 3-36.7-13.5 0-.5-.6-1.9-1.9-4.1s-2.2-4.4-3-6.4c-.7-2-1.4-4.1-1.9-6.4s-.5-4.1 0-5.6 1.7-2.2 3.7-2.2c4.5 0 7-.9 7.5-2.6s0-4.9-1.5-9.4-2.5-7.7-3-9.7c-.5-4-3.2-9-8.2-15s-8-9.7-9-11.2c-2.5 4.5-6.5 6.5-12 6s-9.5-2.7-12-6.7c0 .5-.4 1.9-1.1 4.1s-1.1 3.9-1.1 4.9c-6.5 0-10.2-.2-11.2-.7.5-1.5 1.1-5.9 1.9-13.1.7-7.2 1.6-12.9 2.6-16.8.5-2 1.9-5 4.1-9s4.1-7.6 5.6-10.9c1.5-3.2 2.5-6.4 3-9.4s-.6-5.4-3.4-7.1c-2.7-1.7-7.1-2.4-13.1-1.9-9.5.5-16 5.5-19.5 15-.5 1.5-1.2 4.1-2.2 7.9-1 3.7-2.2 6.6-3.7 8.6s-3.7 3.7-6.7 5.2c-3.5 1.5-9.5 2-18 1.5s-14.5-1.7-18-3.7c-6.5-4-12.1-11.2-16.8-21.7s-7.1-19.7-7.1-27.7c0-5 .6-11.6 1.9-19.8 1.2-8.2 2-14.5 2.2-18.7s-1.1-10.4-4.1-18.3c1.5-1 3.7-3.4 6.7-7.1s5.5-6.4 7.5-7.9c1-.5 2.1-.9 3.4-1.1 1.2-.2 2.4-.2 3.4 0s2-.1 3-1.1 1.7-2.5 2.2-4.5c-.5-.5-1.5-1.2-3-2.2-1.5-1.5-2.5-2.2-3-2.2 3.5 1.5 10.6 1.1 21.3-1.1s17.6-1.9 20.6 1.1c7.5 5.5 13 5 16.5-1.5 0-.5-.6-2.9-1.9-7.1s-1.4-7.6-.4-10.1c2.5 13.5 9.7 15.7 21.7 6.7 1.5 1.5 5.4 2.7 11.6 3.7 6.2 1 10.6 2.2 13.1 3.7 1.5 1 3.2 2.4 5.2 4.1s3.4 2.9 4.1 3.4c.7.5 2 .4 3.7-.4s3.9-2.4 6.4-4.9c5 7 8 13 9 18 5.5 20 10.2 30.9 14.2 32.9 3.5 1.5 6.2 2 8.2 1.5s3.1-2.9 3.4-7.1c.2-4.2.2-7.7 0-10.5-.2-2.7-.6-5.9-1.1-9.4l-.7-6V1261l-.7-6c-7.5-1.5-12.1-4.5-13.9-9s-1.4-9.1 1.1-13.9c2.5-4.7 6.2-9.4 11.2-13.9.5-.5 2.5-1.4 6-2.6s7.4-2.9 11.6-4.9 7.4-4 9.4-6c10.5-9.5 14.2-18.2 11.2-26.2 3.5 0 6.2-2.2 8.2-6.7-.5 0-1.7-.7-3.7-2.2s-3.9-2.7-5.6-3.7-2.9-1.5-3.4-1.5c4.5-2.5 5-6.5 1.5-12 2.5-1.5 4.4-4.2 5.6-8.2s3.1-6.5 5.6-7.5c4.5 6 9.7 6.5 15.7 1.5 4-4 4.2-8 .7-12 2.5-3.5 7.6-6.1 15.3-7.9s12.4-4.1 13.9-7.1c3.5 1 5.5.5 6-1.5s.7-5 .7-9 .7-7 2.2-9c2-2.5 5.7-4.7 11.2-6.7s8.7-3.2 9.7-3.7l12.7-8.2c1.5-2 1.5-3 0-3 9 1 16.7-1.7 23.2-8.2 5-5.5 3.5-10.5-4.5-15 1.5-3 .7-5.4-2.2-7.1-3-1.7-6.7-3.1-11.2-4.1 1.5-.5 4.4-.6 8.6-.4s6.9-.1 7.9-1.1c7.5-5 5.7-9-5.2-12-8.2-2.6-19 .4-32 8.9zm-122 656.6c102.8-18 190.4-65.1 262.8-141.5-1.5-1.5-4.6-2.6-9.4-3.4-4.7-.7-7.9-1.6-9.4-2.6-9-3.5-15-5.5-18-6 .5-3.5-.1-6.7-1.9-9.7-1.7-3-3.7-5.2-6-6.7-2.2-1.5-5.4-3.5-9.4-6s-6.7-4.2-8.2-5.2c-1-1-2.7-2.5-5.2-4.5s-4.2-3.4-5.2-4.1-2.9-1.9-5.6-3.4-4.9-2-6.4-1.5-4 .7-7.5.7l-2.2.7c-1.5.5-2.9 1.1-4.1 1.9-1.2.7-2.6 1.5-4.1 2.2s-2.5 1.5-3 2.2-.5 1.4 0 1.9c-10.5-8.5-19.5-14-27-16.5-2.5-.5-5.2-1.9-8.2-4.1s-5.6-4-7.9-5.2-4.7-1.6-7.5-1.1c-2.7.5-5.6 2.2-8.6 5.2-2.5 2.5-4 6.2-4.5 11.2s-1 8.2-1.5 9.7c-3.5-2.5-3.5-6.9 0-13.1s4-10.9 1.5-13.9c-1.5-3-4.1-4.1-7.9-3.4-3.7.7-6.7 1.9-9 3.4-2.2 1.5-5.1 3.6-8.6 6.4-3.5 2.7-5.7 4.4-6.7 4.9s-3.1 1.9-6.4 4.1-5.4 4.1-6.4 5.6c-1.5 2-3 5-4.5 9s-2.7 6.7-3.7 8.2c-1-2-3.9-3.6-8.6-4.9-4.7-1.2-7.1-2.6-7.1-4.1 1 5 2 13.7 3 26.2s2.2 22 3.7 28.5c3.5 15.5.5 27.5-9 35.9-13.5 12.5-20.7 22.5-21.7 29.9-2 11 1 17.5 9 19.5 0 3.5-2 8.6-6 15.3s-5.7 12.1-5.2 16.1c.1 3.2.6 7.2 1.6 12.2z">
                        </path>
                    </symbol>
                    <symbol id="PageReadOnly" viewbox="0 0 1536 1792">
                        <path class="typeFill" d="M1267.4 414.6c16 18.3 29.8 43 41.2 74.3 11.4 31.3 17.1 60 17.1 86v1126.3c0 26.1-8.1 48.2-24.1 66.5-16 18.3-35.5 27.3-58.4 27.3H88.3c-22.9 0-42.4-9.1-58.4-27.3s-24.1-40.4-24.1-66.5V136.8c0-26.1 8.1-48.2 24.1-66.5S65.4 43 88.3 43h770.1c22.9 0 48.1 6.5 75.6 19.6s49.3 28.7 65.3 46.9l268.1 305.1zM885.8 176v367.6h323.1c-5.7-18.9-12-32.2-18.9-40.1L921.1 197.4c-6.9-7.7-18.6-15-35.3-21.4zm330 1493.8V668.7H858.4c-22.9 0-42.4-9.1-58.4-27.3-16-18.3-24.1-40.4-24.1-66.5V168.2h-660v1501.6h1099.9z">
                        </path>
                        <path class="iconFill" d="M841.9 1157.7h422.2V999.3c0-58.3-20.6-108-61.8-149.3-41.2-41.2-91-61.8-149.3-61.8-58.3 0-108 20.6-149.3 61.8-41.2 41.2-61.8 91-61.8 149.3v158.4zm686.1 79.1v475c0 22-7.7 40.7-23.1 56.1s-34.1 23.1-56.1 23.1H657.2c-22 0-40.7-7.7-56.1-23.1-15.4-15.4-23.1-34.1-23.1-56.1v-475c0-22 7.7-40.7 23.1-56.1s34.1-23.1 56.1-23.1h26.4V999.3c0-101.2 36.3-188 108.9-260.6s159.4-108.9 260.6-108.9 188 36.3 260.6 108.9 108.9 159.4 108.9 260.6v158.3h26.4c22 0 40.7 7.7 56.1 23.1 15.2 15.5 22.9 34.1 22.9 56.1z">
                        </path>
                    </symbol>
                    <symbol id="LinkInternal" viewbox="0 0 1536 1792">
                        <path class="typeFill" d="M1430 242.5l-6.1-6.1c-141.3-140.6-372.3-140.6-513.5 0l-327.1 326c-141.2 140.6-141.2 370.8 0 511.4l6 6c11.7 11.7 24.3 22.3 37.1 32.1l119.7-119.3c-14-8.2-27.2-18-39.2-30l-6.1-6.1c-76.6-76.3-76.6-200.6 0-277L1028 353.6c76.7-76.4 201.4-76.4 278.1 0l6.1 6c76.6 76.4 76.6 200.6 0 277l-148 147.4c25.7 63.2 37.9 130.6 36.8 197.8l228.9-228c141.4-140.5 141.4-370.6.1-511.3zM946.5 712.1c-11.7-11.7-24.3-22.3-37.1-32L789.7 799.4c14 8.2 27.2 18 39.2 30l6.1 6.1c76.7 76.4 76.7 200.6 0 277l-327.2 325.9c-76.7 76.3-201.4 76.3-278.1 0l-6.1-6.1c-76.6-76.4-76.6-200.6 0-277l147.9-147.4c-25.7-63.2-37.9-130.6-36.8-197.8l-228.9 228c-141.2 140.6-141.2 370.8 0 511.5l6 6.1c141.3 140.6 372.3 140.6 513.5 0l327.2-325.9c141.2-140.6 141.2-370.8 0-511.5l-6-6.2z">
                        </path>
                    </symbol>
                    <symbol id="LinkExternal" viewbox="0 0 1536 1792">
                        <path class="typeFill" d="M1226.2 835.1v256.1c0 63.5-22.5 117.8-67.6 162.8-45.1 45.1-99.4 67.6-162.8 67.6H330c-63.5 0-117.8-22.5-162.8-67.6-45.1-45.1-67.6-99.4-67.6-162.8V425.4c0-63.5 22.5-117.8 67.6-162.8s99.3-67.7 162.8-67.7h563.4c7.5 0 13.6 2.4 18.4 7.2 4.8 4.8 7.2 10.9 7.2 18.4v51.2c0 7.5-2.4 13.6-7.2 18.4s-10.9 7.2-18.4 7.2H330c-35.2 0-65.4 12.5-90.4 37.6-25.1 25.1-37.6 55.2-37.6 90.4v665.8c0 35.2 12.5 65.4 37.6 90.4 25.1 25.1 55.2 37.6 90.4 37.6h665.8c35.2 0 65.4-12.5 90.4-37.6 25.1-25.1 37.6-55.2 37.6-90.4V835c0-7.5 2.4-13.6 7.2-18.4 4.8-4.8 10.9-7.2 18.4-7.2h51.2c7.5 0 13.6 2.4 18.4 7.2 4.8 4.9 7.2 11 7.2 18.5zm307.3-691.4v409.7c0 13.9-5.1 25.9-15.2 36s-22.1 15.2-36 15.2-25.9-5.1-36-15.2l-140.8-140.8-521.7 521.7c-5.3 5.3-11.5 8-18.4 8s-13.1-2.7-18.4-8l-91.2-91.2c-5.3-5.3-8-11.5-8-18.4s2.7-13.1 8-18.4l521.7-521.7-140.9-140.9c-10.1-10.1-15.2-22.1-15.2-36s5.1-25.9 15.2-36 22.1-15.2 36-15.2h409.7c13.9 0 25.9 5.1 36 15.2s15.2 22.1 15.2 36z">
                        </path>
                        <path class="iconFill" d="M83.9 719.7l-4.5 4.5c-105.7 105.7-105.7 278.7 0 384.4l244.9 244.9c105.7 105.7 278.7 105.7 384.4 0l4.5-4.5c8.8-8.8 16.8-18.1 24.1-27.8l-89.7-89.7c-6.2 10.4-13.6 20.4-22.5 29.3l-4.5 4.5c-57.4 57.4-150.8 57.4-208.2 0l-244.9-245c-57.4-57.4-57.4-150.8 0-208.2l4.5-4.5c57.4-57.4 150.8-57.4 208.2 0L491 918.4c47.5-19.2 98.1-28.4 148.7-27.6L468.3 719.4C362.6 614 189.6 614 83.9 719.7zm352.9 362c-8.8 8.8-16.8 18.1-24.1 27.8l89.6 89.7c6.2-10.4 13.6-20.4 22.5-29.3l4.5-4.5c57.4-57.4 150.8-57.4 208.2 0l245 245c57.4 57.4 57.4 150.8 0 208.2l-4.5 4.5c-57.4 57.4-150.8 57.4-208.2 0L659 1512.3c-47.5 19.2-98.1 28.4-148.7 27.6l171.4 171.4c105.7 105.7 278.7 105.7 384.4 0l4.5-4.5c105.7-105.7 105.7-278.7 0-384.4l-244.9-244.9c-105.7-105.7-278.7-105.7-384.4 0l-4.5 4.2z">
                        </path>
                    </symbol>
                    <symbol id="LinkMailTo" viewbox="0 0 1536 1792">
                        <path class="typeFill" d="M1358.3 366H274c-96.9 0-175.5 78.6-175.5 175.4v741.1c0 96.8 78.6 175.5 175.5 175.5h1084c96.8 0 175.5-78.6 175.5-175.5V541.7c.3-96.8-78.3-175.7-175.2-175.7zm95.4 916.5c0 52.6-42.8 95.3-95.3 95.3H274c-52.6 0-95.3-42.8-95.3-95.3V541.7c0-52.6 42.8-95.3 95.3-95.3h1084c52.6 0 95.3 42.8 95.3 95.3v740.8h.4zm-450.2-379.7l351-314.8c16.3-14.9 17.8-40.1 3-56.8-14.9-16.3-40.1-17.8-56.8-3l-484 434.5-94.4-84.3c-.3-.3-.6-.6-.6-.9-2.1-2.1-4.2-3.9-6.5-5.6L330.9 528.1c-16.6-14.9-41.9-13.4-56.8 3.3-14.9 16.7-13.4 41.9 3.3 56.8l355.2 317.4L279 1236.7c-16 15.2-16.9 40.4-1.8 56.8 8 8.3 18.7 12.8 29.4 12.8 9.8 0 19.6-3.6 27.3-10.7l358.9-335.8 97.4 87c7.7 6.8 17.2 10.1 26.7 10.1s19.3-3.6 26.7-10.4l100.1-89.8 356.9 339.1c7.7 7.4 17.8 11 27.6 11 10.7 0 21.1-4.2 29.1-12.5 15.2-16 14.6-41.6-1.5-56.8l-352.3-334.7z">
                        </path>
                        <path class="iconFill" d="M83.9 719.7l-4.5 4.5c-105.7 105.7-105.7 278.7 0 384.4l244.9 244.9c105.7 105.7 278.7 105.7 384.4 0l4.5-4.5c8.8-8.8 16.8-18.1 24.1-27.8l-89.7-89.7c-6.2 10.4-13.6 20.4-22.5 29.3l-4.5 4.5c-57.4 57.4-150.8 57.4-208.2 0l-244.9-245c-57.4-57.4-57.4-150.8 0-208.2l4.5-4.5c57.4-57.4 150.8-57.4 208.2 0L491 918.4c47.5-19.2 98.1-28.4 148.7-27.6L468.3 719.4C362.6 614 189.6 614 83.9 719.7zm352.9 362c-8.8 8.8-16.8 18.1-24.1 27.8l89.6 89.7c6.2-10.4 13.6-20.4 22.5-29.3l4.5-4.5c57.4-57.4 150.8-57.4 208.2 0l245 245c57.4 57.4 57.4 150.8 0 208.2l-4.5 4.5c-57.4 57.4-150.8 57.4-208.2 0L659 1512.3c-47.5 19.2-98.1 28.4-148.7 27.6l171.4 171.4c105.7 105.7 278.7 105.7 384.4 0l4.5-4.5c105.7-105.7 105.7-278.7 0-384.4l-244.9-244.9c-105.7-105.7-278.7-105.7-384.4 0l-4.5 4.2z">
                        </path>
                    </symbol>
                    <symbol id="LinkTel" viewbox="0 0 1536 1792">
                        <path class="typeFill" d="M1533.5 1327.5c0 18.3-3.4 42.3-10.2 71.8s-13.9 52.8-21.4 69.8c-14.3 34-55.7 70-124.2 107.9-63.9 34.7-127 52-189.5 52-18.3 0-36.4-1.2-54-3.6-17.7-2.4-37.2-6.6-58.6-12.7s-37.4-11-47.9-14.8c-10.5-3.7-29.4-10.7-56.6-20.9-27.2-10.2-43.8-16.3-49.9-18.3-66.6-23.8-125.9-52-178.3-84.5-86.2-53.7-175.9-127-268.9-219.9s-166-182.7-219.7-268.9c-32.6-52.3-60.8-111.7-84.5-178.3-2-6.1-8.2-22.8-18.3-49.9-10.2-27.2-17.2-46-20.9-56.6-3.7-10.6-8.7-26.5-14.8-47.9-6.1-21.4-10.4-40.8-12.7-58.5-2.4-17.7-3.6-35.7-3.6-54 0-62.5 17.3-125.6 52-189.5 38-68.6 74-110 107.9-124.2 17-7.5 40.3-14.6 69.8-21.4s53.5-10.2 71.8-10.2c9.5 0 16.6 1 21.4 3.1 12.2 4.1 30.2 29.9 54 77.4 7.5 12.9 17.7 31.3 30.6 55 12.9 23.8 24.8 45.4 35.7 64.7 10.9 19.4 21.4 37.5 31.6 54.5 2 2.7 8 11.2 17.8 25.5s17.2 26.3 21.9 36.2c4.8 9.9 7.1 19.5 7.1 29 0 13.6-9.7 30.6-29 51-19.4 20.4-40.4 39.1-63.2 56.1-22.8 17-43.8 35-63.2 54-19.4 19-29 34.7-29 46.9 0 6.1 1.7 13.8 5.1 22.9 3.4 9.2 6.3 16.1 8.7 20.9 2.4 4.8 7.1 12.9 14.3 24.5 7.1 11.6 11 18 11.7 19.4 51.6 93 110.7 172.8 177.2 239.3 66.6 66.6 146.3 125.6 239.3 177.2 1.4.7 7.8 4.6 19.4 11.7 11.6 7.1 19.7 11.9 24.5 14.3s11.7 5.3 20.9 8.7c9.2 3.4 16.8 5.1 22.9 5.1 12.2 0 27.9-9.7 46.9-29 19-19.4 37-40.4 54-63.2 17-22.8 35.7-43.8 56.1-63.2 20.4-19.4 37.4-29 51-29 9.5 0 19.2 2.4 29 7.1 9.9 4.8 21.9 12.1 36.2 21.9 14.3 9.9 22.8 15.8 25.5 17.8 17 10.2 35.2 20.7 54.5 31.6s40.9 22.8 64.7 35.7c23.8 12.9 42.1 23.1 55 30.6 47.6 23.8 73.3 41.8 77.4 54 1.5 4.3 2.5 11.4 2.5 20.9z">
                        </path>
                        <path class="iconFill" d="M83.9 719.7l-4.5 4.5c-105.7 105.7-105.7 278.7 0 384.4l244.9 244.9c105.7 105.7 278.7 105.7 384.4 0l4.5-4.5c8.8-8.8 16.8-18.1 24.1-27.8l-89.7-89.7c-6.2 10.4-13.6 20.4-22.5 29.3l-4.5 4.5c-57.4 57.4-150.8 57.4-208.2 0l-244.9-245c-57.4-57.4-57.4-150.8 0-208.2l4.5-4.5c57.4-57.4 150.8-57.4 208.2 0L491 918.4c47.5-19.2 98.1-28.4 148.7-27.6L468.3 719.4C362.6 614 189.6 614 83.9 719.7zm352.9 362c-8.8 8.8-16.8 18.1-24.1 27.8l89.6 89.7c6.2-10.4 13.6-20.4 22.5-29.3l4.5-4.5c57.4-57.4 150.8-57.4 208.2 0l245 245c57.4 57.4 57.4 150.8 0 208.2l-4.5 4.5c-57.4 57.4-150.8 57.4-208.2 0L659 1512.3c-47.5 19.2-98.1 28.4-148.7 27.6l171.4 171.4c105.7 105.7 278.7 105.7 384.4 0l4.5-4.5c105.7-105.7 105.7-278.7 0-384.4l-244.9-244.9c-105.7-105.7-278.7-105.7-384.4 0l-4.5 4.2z">
                        </path>
                    </symbol>
                    <symbol id="LinkFile" viewbox="0 0 1536 1792">
                        <path class="typeFill" d="M1471.1 417.8c18.1 20.8 26.1 40.2 44.2 70.2 9.1 29.9 18.1 61.1 18.1 80.5v1119.4c0 29.9-9.1 50.7-26.1 70.2-18.1 20.8-35.1 29.9-61.3 29.9H300.9c-26.1 0-44.2-10.4-61.3-29.9-18.2-20.8-26.1-40.2-26.1-70.2V136c0-29.9 9.1-50.7 26.1-70.2C257.7 45 274.8 36 300.9 36h757.6c26.1 0 44.2 10.4 70.3 20.8 26.1 10.4 53.4 29.9 61.3 50.7l281 310.3zm-378.7-241.5v363.6H1410c-9.1-20.8-9.1-29.9-18.1-40.2l-264.3-302.5c0-1.4-18.2-10.5-35.2-20.9zM1427 1658.1V659.5h-352.7c-26.1 0-44.2-10.4-61.3-29.9-18.1-20.8-26.1-29.9-26.1-61.1V164.6h-652v1492.1H1427v1.4zM554.9 821.8c0-10.4 0-20.8 9.1-20.8s9.1-10.4 18.1-10.4h598.7c9.1 0 18.1 0 18.1 10.4s9.1 10.4 9.1 20.8v61.1c0 10.4 0 20.8-9.1 20.8s-9.1 10.4-18.1 10.4H582.1c-9.1 0-18.1 0-18.1-10.4s-9.1-10.4-9.1-20.8v-61.1zm624.9 221.9c9.1 0 18.1 0 18.1 10.4s9.1 10.4 9.1 20.8v61.1c0 10.4 0 20.8-9.1 20.8s-9.1 10.4-18.1 10.4H581c-9.1 0-18.1 0-18.1-10.4s-9.1-10.4-9.1-20.8v-61.1c0-10.4 0-20.8 9.1-20.8s9.1-10.4 18.1-10.4h598.8zm0 241.7c9.1 0 18.1 0 18.1 10.4s9.1 10.4 9.1 20.8v61.1c0 10.4 0 20.8-9.1 20.8s-9.1 10.4-18.1 10.4H581c-9.1 0-18.1 0-18.1-10.4s-9.1-10.4-9.1-20.8v-61.1c0-10.4 0-20.8 9.1-20.8s9.1-10.4 18.1-10.4h598.8z">
                        </path>
                        <path class="iconFill" d="M83.9 719.7l-4.5 4.5c-105.7 105.7-105.7 278.7 0 384.4l244.9 244.9c105.7 105.7 278.7 105.7 384.4 0l4.5-4.5c8.8-8.8 16.8-18.1 24.1-27.8l-89.7-89.7c-6.2 10.4-13.6 20.4-22.5 29.3l-4.5 4.5c-57.4 57.4-150.8 57.4-208.2 0l-244.9-245c-57.4-57.4-57.4-150.8 0-208.2l4.5-4.5c57.4-57.4 150.8-57.4 208.2 0L491 918.4c47.5-19.2 98.1-28.4 148.7-27.6L468.3 719.4C362.6 614 189.6 614 83.9 719.7zm352.9 362c-8.8 8.8-16.8 18.1-24.1 27.8l89.6 89.7c6.2-10.4 13.6-20.4 22.5-29.3l4.5-4.5c57.4-57.4 150.8-57.4 208.2 0l245 245c57.4 57.4 57.4 150.8 0 208.2l-4.5 4.5c-57.4 57.4-150.8 57.4-208.2 0L659 1512.3c-47.5 19.2-98.1 28.4-148.7 27.6l171.4 171.4c105.7 105.7 278.7 105.7 384.4 0l4.5-4.5c105.7-105.7 105.7-278.7 0-384.4l-244.9-244.9c-105.7-105.7-278.7-105.7-384.4 0l-4.5 4.2z">
                        </path>
                    </symbol>
                    <symbol id="LinkDataItem" viewbox="0 0 1536 1792">
                        <path class="typeFill" d="M816.5 92.5c-345.4 0-717 104.1-717 332.9v973.1c0 228.6 371.6 332.9 717 332.9s717-104.2 717-332.9V425.3c0-228.7-371.7-332.8-717-332.8zm614.6 1306c0 127.2-275.2 230.4-614.6 230.4-339.5 0-614.6-103.2-614.6-230.4v-191.4c105.8 109 361 165.7 614.6 165.7s508.7-56.7 614.6-165.7v191.4zm0-307.3h-.2c0 .5.2 1.1.2 1.6 0 126.4-275.2 228.8-614.6 228.8s-614.6-102.4-614.6-228.8c0-.5.2-1.1.2-1.6h-.2V899.8c105.8 109 361 165.7 614.6 165.7s508.7-56.7 614.6-165.7v191.4zm0-307.3h-.2c0 .5.2 1.1.2 1.6 0 126.4-275.2 228.8-614.6 228.8S201.9 911.9 201.9 785.5c0-.5.2-1.1.2-1.6h-.2v-176c134.2 102.2 380.2 150.4 614.6 150.4s480.4-48.1 614.6-150.4v176zM816.5 655.8c-339.5 0-614.6-103.2-614.6-230.5S477 194.9 816.5 194.9c339.4 0 614.6 103.1 614.6 230.4s-275.2 230.5-614.6 230.5z">
                        </path>
                        <path class="iconFill" d="M83.9 719.7l-4.5 4.5c-105.7 105.7-105.7 278.7 0 384.4l244.9 244.9c105.7 105.7 278.7 105.7 384.4 0l4.5-4.5c8.8-8.8 16.8-18.1 24.1-27.8l-89.7-89.7c-6.2 10.4-13.6 20.4-22.5 29.3l-4.5 4.5c-57.4 57.4-150.8 57.4-208.2 0l-244.9-245c-57.4-57.4-57.4-150.8 0-208.2l4.5-4.5c57.4-57.4 150.8-57.4 208.2 0L491 918.4c47.5-19.2 98.1-28.4 148.7-27.6L468.3 719.4C362.6 614 189.6 614 83.9 719.7zm352.9 362c-8.8 8.8-16.8 18.1-24.1 27.8l89.6 89.7c6.2-10.4 13.6-20.4 22.5-29.3l4.5-4.5c57.4-57.4 150.8-57.4 208.2 0l245 245c57.4 57.4 57.4 150.8 0 208.2l-4.5 4.5c-57.4 57.4-150.8 57.4-208.2 0L659 1512.3c-47.5 19.2-98.1 28.4-148.7 27.6l171.4 171.4c105.7 105.7 278.7 105.7 384.4 0l4.5-4.5c105.7-105.7 105.7-278.7 0-384.4l-244.9-244.9c-105.7-105.7-278.7-105.7-384.4 0l-4.5 4.2z">
                        </path>
                    </symbol>
                    <symbol id="LinkSaved" viewbox="0 0 1536 1792">
                        <path class="typeFill" d="M1234.9 139.2l-5.2-5.2c-121.4-121.3-319.9-121.3-441.3 0L507.3 415.2C386 536.5 386 735 507.3 856.3l5.2 5.2c10.1 10.1 20.8 19.2 31.9 27.7l102.9-102.9c-12-7.1-23.3-15.5-33.7-25.9l-5.2-5.2c-65.9-65.9-65.9-173.1 0-238.9l281.2-281.2c65.9-65.9 173.1-65.9 238.9 0l5.2 5.2c65.9 65.9 65.9 173.1 0 238.9l-127.2 127.2c22.1 54.5 32.6 112.7 31.6 170.7l196.7-196.7c121.5-121.3 121.5-319.8.1-441.2zM819.4 544.3c-10.1-10.1-20.8-19.2-31.9-27.6L684.6 619.5c12 7.1 23.3 15.5 33.7 25.9l5.2 5.2c65.9 65.9 65.9 173.1 0 238.9l-281.1 281.2c-65.9 65.9-173.1 65.9-238.9 0l-5.2-5.2c-65.9-65.9-65.9-173.1 0-238.9l127.1-127.1c-22.2-54.6-32.6-112.8-31.7-170.8L97 825.5c-121.3 121.3-121.3 319.9 0 441.3l5.2 5.2c121.4 121.3 319.9 121.3 441.3 0l281.2-281.2c121.3-121.3 121.3-319.9 0-441.3l-5.3-5.2z">
                        </path>
                        <circle class="yellow" cx="953" cy="1216" r="575">
                        </circle>
                        <text class="exclamation" transform="translate(789.6 1636.379)">
                            !
                        </text>
                    </symbol>
                    <symbol id="LinkApproval1" viewbox="0 0 1536 1792">
                        <path class="typeFill" d="M1234.9 139.2l-5.2-5.2c-121.4-121.3-319.9-121.3-441.3 0L507.3 415.2C386 536.5 386 735 507.3 856.3l5.2 5.2c10.1 10.1 20.8 19.2 31.9 27.7l102.9-102.9c-12-7.1-23.3-15.5-33.7-25.9l-5.2-5.2c-65.9-65.9-65.9-173.1 0-238.9l281.2-281.2c65.9-65.9 173.1-65.9 238.9 0l5.2 5.2c65.9 65.9 65.9 173.1 0 238.9l-127.2 127.2c22.1 54.5 32.6 112.7 31.6 170.7l196.7-196.7c121.5-121.3 121.5-319.8.1-441.2zM819.4 544.3c-10.1-10.1-20.8-19.2-31.9-27.6L684.6 619.5c12 7.1 23.3 15.5 33.7 25.9l5.2 5.2c65.9 65.9 65.9 173.1 0 238.9l-281.1 281.2c-65.9 65.9-173.1 65.9-238.9 0l-5.2-5.2c-65.9-65.9-65.9-173.1 0-238.9l127.1-127.1c-22.2-54.6-32.6-112.8-31.7-170.8L97 825.5c-121.3 121.3-121.3 319.9 0 441.3l5.2 5.2c121.4 121.3 319.9 121.3 441.3 0l281.2-281.2c121.3-121.3 121.3-319.9 0-441.3l-5.3-5.2z">
                        </path>
                        <circle class="yellow" cx="953" cy="1216" r="575">
                        </circle>
                        <text transform="translate(639.6 1636.379)">
                            1
                        </text>
                    </symbol>
                    <symbol id="LinkApproval2" viewbox="0 0 1536 1792">
                        <path class="typeFill" d="M1234.9 139.2l-5.2-5.2c-121.4-121.3-319.9-121.3-441.3 0L507.3 415.2C386 536.5 386 735 507.3 856.3l5.2 5.2c10.1 10.1 20.8 19.2 31.9 27.7l102.9-102.9c-12-7.1-23.3-15.5-33.7-25.9l-5.2-5.2c-65.9-65.9-65.9-173.1 0-238.9l281.2-281.2c65.9-65.9 173.1-65.9 238.9 0l5.2 5.2c65.9 65.9 65.9 173.1 0 238.9l-127.2 127.2c22.1 54.5 32.6 112.7 31.6 170.7l196.7-196.7c121.5-121.3 121.5-319.8.1-441.2zM819.4 544.3c-10.1-10.1-20.8-19.2-31.9-27.6L684.6 619.5c12 7.1 23.3 15.5 33.7 25.9l5.2 5.2c65.9 65.9 65.9 173.1 0 238.9l-281.1 281.2c-65.9 65.9-173.1 65.9-238.9 0l-5.2-5.2c-65.9-65.9-65.9-173.1 0-238.9l127.1-127.1c-22.2-54.6-32.6-112.8-31.7-170.8L97 825.5c-121.3 121.3-121.3 319.9 0 441.3l5.2 5.2c121.4 121.3 319.9 121.3 441.3 0l281.2-281.2c121.3-121.3 121.3-319.9 0-441.3l-5.3-5.2z">
                        </path>
                        <circle class="yellow" cx="953" cy="1216" r="575">
                        </circle>
                        <text transform="translate(664.6 1586.379)">
                            2
                        </text>
                    </symbol>
                    <symbol id="LinkPublished" viewbox="0 0 1536 1792">
                        <path class="typeFill" d="M1234.9 139.2l-5.2-5.2c-121.4-121.3-319.9-121.3-441.3 0L507.3 415.2C386 536.5 386 735 507.3 856.3l5.2 5.2c10.1 10.1 20.8 19.2 31.9 27.7l102.9-102.9c-12-7.1-23.3-15.5-33.7-25.9l-5.2-5.2c-65.9-65.9-65.9-173.1 0-238.9l281.2-281.2c65.9-65.9 173.1-65.9 238.9 0l5.2 5.2c65.9 65.9 65.9 173.1 0 238.9l-127.2 127.2c22.1 54.5 32.6 112.7 31.6 170.7l196.7-196.7c121.5-121.3 121.5-319.8.1-441.2zM819.4 544.3c-10.1-10.1-20.8-19.2-31.9-27.6L684.6 619.5c12 7.1 23.3 15.5 33.7 25.9l5.2 5.2c65.9 65.9 65.9 173.1 0 238.9l-281.1 281.2c-65.9 65.9-173.1 65.9-238.9 0l-5.2-5.2c-65.9-65.9-65.9-173.1 0-238.9l127.1-127.1c-22.2-54.6-32.6-112.8-31.7-170.8L97 825.5c-121.3 121.3-121.3 319.9 0 441.3l5.2 5.2c121.4 121.3 319.9 121.3 441.3 0l281.2-281.2c121.3-121.3 121.3-319.9 0-441.3l-5.3-5.2z">
                        </path>
                        <path class="iconFill" d="M953 641c104.3 0 200.5 25.7 288.6 77.1 88.1 51.4 157.9 121.2 209.3 209.3s77.1 184.3 77.1 288.6-25.7 200.5-77.1 288.6-121.2 157.9-209.3 209.3c-88.1 51.4-184.3 77.1-288.6 77.1s-200.5-25.7-288.6-77.1-157.9-121.2-209.3-209.3S378 1320.3 378 1216s25.7-200.5 77.1-288.6 121.2-157.9 209.3-209.3C752.5 666.7 848.7 641 953 641zm205.1 390.1c-1 .5-3.4 2.9-7.1 7.1-3.7 4.2-7.1 6.6-10.1 7.1 1 0 2.1-1.2 3.4-3.7 1.2-2.5 2.5-5.2 3.7-8.2s2.1-4.7 2.6-5.2c3-3.5 8.5-7.2 16.5-11.2 7-3 20-6 38.9-9 17-4 29.7-1.2 38.2 8.2-1-1 1.4-4.2 7.1-9.7s9.4-8.5 10.9-9c1.5-1 5.2-2.1 11.2-3.4 6-1.2 9.7-3.1 11.2-5.6l1.5-16.5c-6 .5-10.4-1.2-13.1-5.2s-4.4-9.2-4.9-15.7c0 1-1.5 3-4.5 6 0-3.5-1.1-5.5-3.4-6s-5.1-.2-8.6.7c-3.5 1-5.7 1.2-6.7.7-5-1.5-8.7-3.4-11.2-5.6s-4.5-6.4-6-12.4-2.5-9.7-3-11.2c-1-2.5-3.4-5.2-7.1-8.2s-6.1-5.5-7.1-7.5c-.5-1-1.1-2.4-1.9-4.1-.7-1.7-1.5-3.4-2.2-4.9s-1.7-2.9-3-4.1c-1.2-1.2-2.6-1.9-4.1-1.9s-3.2 1.2-5.2 3.7-3.9 5-5.6 7.5-2.9 3.7-3.4 3.7c-1.5-1-3-1.4-4.5-1.1-1.5.2-2.6.5-3.4.7-.7.2-1.9 1-3.4 2.2s-2.7 2.1-3.7 2.6c-1.5 1-3.6 1.7-6.4 2.2-2.7.5-4.9 1-6.4 1.5 7.5-2.5 7.2-5.2-.7-8.2-5-2-9-2.7-12-2.2 4.5-2 6.4-5 5.6-9-.7-4-2.9-7.5-6.4-10.5h3.7c-.5-2-2.6-4.1-6.4-6.4-3.7-2.2-8.1-4.4-13.1-6.4s-8.2-3.5-9.7-4.5c-4-2.5-12.5-4.9-25.5-7.1-13-2.2-21.2-2.4-24.7-.4-2.5 3-3.6 5.6-3.4 7.9.2 2.2 1.2 5.7 3 10.5 1.7 4.7 2.6 7.9 2.6 9.4.5 3-.9 6.2-4.1 9.7s-4.9 6.5-4.9 9c0 3.5 3.5 7.4 10.5 11.6s9.5 9.6 7.5 16.1c-1.5 4-5.5 8-12 12s-10.5 7-12 9c-2.5 4-2.9 8.6-1.1 13.9 1.7 5.2 4.4 9.4 7.9 12.4 1 1 1.4 2 1.1 3-.2 1-1.1 2.1-2.6 3.4-1.5 1.2-2.9 2.2-4.1 3-1.2.7-2.9 1.6-4.9 2.6l-2.2 1.5c-5.5 2.5-10.6 1-15.3-4.5-4.7-5.5-8.1-12-10.1-19.5-3.5-12.5-7.5-20-12-22.5-11.5-4-18.7-3.7-21.7.7-2.5-6.5-12.7-13-30.7-19.5-12.5-4.5-27-5.5-43.4-3 3-.5 3-4.2 0-11.2-3.5-7.5-8.2-10.5-14.2-9 1.5-3 2.5-7.4 3-13.1.5-5.7.7-9.1.7-10.1 1.5-6.5 4.5-12.2 9-17.2.5-.5 2.2-2.6 5.2-6.4 3-3.7 5.4-7.1 7.1-10.1 1.7-3 1.9-4.5.4-4.5 17.5 2 29.9-.7 37.4-8.2 2.5-2.5 5.4-6.7 8.6-12.7 3.2-6 5.9-10.2 7.9-12.7 4.5-3 8-4.4 10.5-4.1 2.5.2 6.1 1.6 10.9 4.1 4.7 2.5 8.4 3.7 10.9 3.7 7 .5 10.9-2.2 11.6-8.2s-1.1-11-5.6-15c6 .5 6.7-3.7 2.2-12.7-2-3.5-4-5.7-6-6.7-6-2-12.7-.7-20.2 3.7-4 2-3.5 4 1.5 6-.5-.5-2.9 2.1-7.1 7.9-4.2 5.7-8.4 10.1-12.4 13.1s-8 1.7-12-3.7c-.5-.5-1.9-3.9-4.1-10.1s-4.6-9.6-7.1-10.1c-4 0-8 3.7-12 11.2 1.5-4-1.2-7.7-8.2-11.2s-13-5.5-18-6c9.5-6 7.5-12.7-6-20.2-3.5-2-8.6-3.2-15.3-3.7s-11.6.5-14.6 3c-2.5 3.5-3.9 6.4-4.1 8.6-.2 2.2 1 4.2 3.7 6s5.4 3.1 7.9 4.1 5.4 2 8.6 3c3.2 1 5.4 1.7 6.4 2.2 7 5 9 8.5 6 10.5-1 .5-3.1 1.4-6.4 2.6s-6.1 2.4-8.6 3.4-4 2-4.5 3c-1.5 2-1.5 5.5 0 10.5s1 8.5-1.5 10.5c-2.5-2.5-4.7-6.9-6.7-13.1-2-6.2-3.7-10.4-5.2-12.4 3.5 4.5-2.7 6-18.7 4.5l-7.5-.7c-2 0-6 .5-12 1.5s-11.1 1.2-15.3.7-7.6-2.5-10.1-6c-2-4-2-9 0-15 .5-2 1.5-2.5 3-1.5-2-1.5-4.7-3.9-8.2-7.1-3.5-3.2-6-5.4-7.5-6.4-23 7.5-46.4 17.7-70.4 30.7 3 .5 6 .2 9-.7 2.5-1 5.7-2.6 9.7-4.9s6.5-3.6 7.5-4.1c17-7 27.5-8.7 31.4-5.2l3.7-3.7c7 8 12 14.2 15 18.7-3.5-2-11-2.2-22.5-.7-10 3-15.5 6-16.5 9 3.5 6 4.7 10.5 3.7 13.5-2-1.5-4.9-4-8.6-7.5-3.7-3.5-7.4-6.2-10.9-8.2s-7.2-3.2-11.2-3.7c-8 0-13.5.2-16.5.7-72.9 39.9-131.5 95.3-175.9 166.2 3.5 3.5 6.5 5.5 9 6 2 .5 3.2 2.7 3.7 6.7s1.1 6.7 1.9 8.2c.7 1.5 3.6.7 8.6-2.2 4.5 4 5.2 8.7 2.2 14.2.5-.5 11.5 6.2 32.9 20.2 9.5 8.5 14.7 13.7 15.7 15.7 1.5 5.5-1 10-7.5 13.5-.5-1-2.7-3.2-6.7-6.7s-6.2-4.5-6.7-3c-1.5 2.5-1.4 7.1.4 13.9 1.7 6.7 4.4 9.9 7.9 9.4-3.5 0-5.9 4-7.1 12s-1.9 16.8-1.9 26.6c0 9.7-.2 15.6-.7 17.6l1.5.7c-1.5 6-.1 14.6 4.1 25.8s9.6 16.1 16.1 14.6c-6.5 1.5-1.5 12.2 15 32.2 3 4 5 6.2 6 6.7 1.5 1 4.5 2.9 9 5.6s8.2 5.2 11.2 7.5c3 2.2 5.5 4.9 7.5 7.9 2 2.5 4.5 8.1 7.5 16.8 3 8.7 6.5 14.6 10.5 17.6-1 3 1.4 8 7.1 15 5.7 7 8.4 12.7 7.9 17.2-.5 0-1.1.2-1.9.7s-1.4.7-1.9.7c1.5 3.5 5.4 7 11.6 10.5 6.2 3.5 10.1 6.7 11.6 9.7.5 1.5 1 4 1.5 7.5s1.2 6.2 2.2 8.2 3 2.5 6 1.5c1-10-5-25.5-18-46.4-7.5-12.5-11.7-19.7-12.7-21.7-1.5-2.5-2.9-6.4-4.1-11.6-1.2-5.2-2.4-8.9-3.4-10.9 1 0 2.5.4 4.5 1.1s4.1 1.6 6.4 2.6 4.1 2 5.6 3 2 1.7 1.5 2.2c-1.5 3.5-1 7.9 1.5 13.1s5.5 9.9 9 13.9 7.7 8.7 12.7 14.2 8 8.7 9 9.7c3 3 6.5 7.9 10.5 14.6s4 10.1 0 10.1c4.5 0 9.5 2.6 15 7.9s9.7 10.1 12.7 14.6c2.5 4 4.5 10.5 6 19.5s2.7 15 3.7 18c1 3.5 3.1 6.9 6.4 10.1 3.2 3.2 6.4 5.6 9.4 7.1l12 6 9.7 5.2c2.5 1 7.1 3.6 13.9 7.9 6.7 4.2 12.1 7.1 16.1 8.6 5 2 9 3 12 3s6.6-.6 10.9-1.9c4.2-1.2 7.6-2.1 10.1-2.6 7.5-1 14.7 2.7 21.7 11.2s12.2 13.7 15.7 15.7c18 9.5 31.7 12.2 41.2 8.2-1 .5-.9 2.4.4 5.6 1.2 3.2 3.2 7.1 6 11.6s5 8.1 6.7 10.9c1.7 2.7 3.1 4.9 4.1 6.4 2.5 3 7 6.7 13.5 11.2s11 8.2 13.5 11.2c3-2 4.7-4.2 5.2-6.7-1.5 4 .2 9 5.2 15s9.5 8.5 13.5 7.5c7-1.5 10.5-9.5 10.5-24-15.5 7.5-27.7 3-36.7-13.5 0-.5-.6-1.9-1.9-4.1s-2.2-4.4-3-6.4c-.7-2-1.4-4.1-1.9-6.4s-.5-4.1 0-5.6 1.7-2.2 3.7-2.2c4.5 0 7-.9 7.5-2.6s0-4.9-1.5-9.4-2.5-7.7-3-9.7c-.5-4-3.2-9-8.2-15s-8-9.7-9-11.2c-2.5 4.5-6.5 6.5-12 6s-9.5-2.7-12-6.7c0 .5-.4 1.9-1.1 4.1s-1.1 3.9-1.1 4.9c-6.5 0-10.2-.2-11.2-.7.5-1.5 1.1-5.9 1.9-13.1.7-7.2 1.6-12.9 2.6-16.8.5-2 1.9-5 4.1-9s4.1-7.6 5.6-10.9c1.5-3.2 2.5-6.4 3-9.4s-.6-5.4-3.4-7.1c-2.7-1.7-7.1-2.4-13.1-1.9-9.5.5-16 5.5-19.5 15-.5 1.5-1.2 4.1-2.2 7.9-1 3.7-2.2 6.6-3.7 8.6s-3.7 3.7-6.7 5.2c-3.5 1.5-9.5 2-18 1.5s-14.5-1.7-18-3.7c-6.5-4-12.1-11.2-16.8-21.7s-7.1-19.7-7.1-27.7c0-5 .6-11.6 1.9-19.8 1.2-8.2 2-14.5 2.2-18.7s-1.1-10.4-4.1-18.3c1.5-1 3.7-3.4 6.7-7.1s5.5-6.4 7.5-7.9c1-.5 2.1-.9 3.4-1.1 1.2-.2 2.4-.2 3.4 0s2-.1 3-1.1 1.7-2.5 2.2-4.5c-.5-.5-1.5-1.2-3-2.2-1.5-1.5-2.5-2.2-3-2.2 3.5 1.5 10.6 1.1 21.3-1.1s17.6-1.9 20.6 1.1c7.5 5.5 13 5 16.5-1.5 0-.5-.6-2.9-1.9-7.1s-1.4-7.6-.4-10.1c2.5 13.5 9.7 15.7 21.7 6.7 1.5 1.5 5.4 2.7 11.6 3.7 6.2 1 10.6 2.2 13.1 3.7 1.5 1 3.2 2.4 5.2 4.1s3.4 2.9 4.1 3.4c.7.5 2 .4 3.7-.4s3.9-2.4 6.4-4.9c5 7 8 13 9 18 5.5 20 10.2 30.9 14.2 32.9 3.5 1.5 6.2 2 8.2 1.5s3.1-2.9 3.4-7.1c.2-4.2.2-7.7 0-10.5-.2-2.7-.6-5.9-1.1-9.4l-.7-6V1261l-.7-6c-7.5-1.5-12.1-4.5-13.9-9s-1.4-9.1 1.1-13.9c2.5-4.7 6.2-9.4 11.2-13.9.5-.5 2.5-1.4 6-2.6s7.4-2.9 11.6-4.9 7.4-4 9.4-6c10.5-9.5 14.2-18.2 11.2-26.2 3.5 0 6.2-2.2 8.2-6.7-.5 0-1.7-.7-3.7-2.2s-3.9-2.7-5.6-3.7-2.9-1.5-3.4-1.5c4.5-2.5 5-6.5 1.5-12 2.5-1.5 4.4-4.2 5.6-8.2s3.1-6.5 5.6-7.5c4.5 6 9.7 6.5 15.7 1.5 4-4 4.2-8 .7-12 2.5-3.5 7.6-6.1 15.3-7.9s12.4-4.1 13.9-7.1c3.5 1 5.5.5 6-1.5s.7-5 .7-9 .7-7 2.2-9c2-2.5 5.7-4.7 11.2-6.7s8.7-3.2 9.7-3.7l12.7-8.2c1.5-2 1.5-3 0-3 9 1 16.7-1.7 23.2-8.2 5-5.5 3.5-10.5-4.5-15 1.5-3 .7-5.4-2.2-7.1-3-1.7-6.7-3.1-11.2-4.1 1.5-.5 4.4-.6 8.6-.4s6.9-.1 7.9-1.1c7.5-5 5.7-9-5.2-12-8.2-2.6-19 .4-32 8.9zm-122 656.6c102.8-18 190.4-65.1 262.8-141.5-1.5-1.5-4.6-2.6-9.4-3.4-4.7-.7-7.9-1.6-9.4-2.6-9-3.5-15-5.5-18-6 .5-3.5-.1-6.7-1.9-9.7-1.7-3-3.7-5.2-6-6.7-2.2-1.5-5.4-3.5-9.4-6s-6.7-4.2-8.2-5.2c-1-1-2.7-2.5-5.2-4.5s-4.2-3.4-5.2-4.1-2.9-1.9-5.6-3.4-4.9-2-6.4-1.5-4 .7-7.5.7l-2.2.7c-1.5.5-2.9 1.1-4.1 1.9-1.2.7-2.6 1.5-4.1 2.2s-2.5 1.5-3 2.2-.5 1.4 0 1.9c-10.5-8.5-19.5-14-27-16.5-2.5-.5-5.2-1.9-8.2-4.1s-5.6-4-7.9-5.2-4.7-1.6-7.5-1.1c-2.7.5-5.6 2.2-8.6 5.2-2.5 2.5-4 6.2-4.5 11.2s-1 8.2-1.5 9.7c-3.5-2.5-3.5-6.9 0-13.1s4-10.9 1.5-13.9c-1.5-3-4.1-4.1-7.9-3.4-3.7.7-6.7 1.9-9 3.4-2.2 1.5-5.1 3.6-8.6 6.4-3.5 2.7-5.7 4.4-6.7 4.9s-3.1 1.9-6.4 4.1-5.4 4.1-6.4 5.6c-1.5 2-3 5-4.5 9s-2.7 6.7-3.7 8.2c-1-2-3.9-3.6-8.6-4.9-4.7-1.2-7.1-2.6-7.1-4.1 1 5 2 13.7 3 26.2s2.2 22 3.7 28.5c3.5 15.5.5 27.5-9 35.9-13.5 12.5-20.7 22.5-21.7 29.9-2 11 1 17.5 9 19.5 0 3.5-2 8.6-6 15.3s-5.7 12.1-5.2 16.1c.1 3.2.6 7.2 1.6 12.2z">
                        </path>
                    </symbol>
                    <symbol id="LinkReadOnly" viewbox="0 0 1536 1792">
                        <path class="typeFill" d="M1234.9 139.2l-5.2-5.2c-121.4-121.3-319.9-121.3-441.3 0L507.3 415.2C386 536.5 386 735 507.3 856.3l5.2 5.2c10.1 10.1 20.8 19.2 31.9 27.7l102.9-102.9c-12-7.1-23.3-15.5-33.7-25.9l-5.2-5.2c-65.9-65.9-65.9-173.1 0-238.9l281.2-281.2c65.9-65.9 173.1-65.9 238.9 0l5.2 5.2c65.9 65.9 65.9 173.1 0 238.9l-127.2 127.2c22.1 54.5 32.6 112.7 31.6 170.7l196.7-196.7c121.5-121.3 121.5-319.8.1-441.2zM819.4 544.3c-10.1-10.1-20.8-19.2-31.9-27.6L684.6 619.5c12 7.1 23.3 15.5 33.7 25.9l5.2 5.2c65.9 65.9 65.9 173.1 0 238.9l-281.1 281.2c-65.9 65.9-173.1 65.9-238.9 0l-5.2-5.2c-65.9-65.9-65.9-173.1 0-238.9l127.1-127.1c-22.2-54.6-32.6-112.8-31.7-170.8L97 825.5c-121.3 121.3-121.3 319.9 0 441.3l5.2 5.2c121.4 121.3 319.9 121.3 441.3 0l281.2-281.2c121.3-121.3 121.3-319.9 0-441.3l-5.3-5.2z">
                        </path>
                        <path class="iconFill" d="M841.9 1157.7h422.2V999.3c0-58.3-20.6-108-61.8-149.3-41.2-41.2-91-61.8-149.3-61.8-58.3 0-108 20.6-149.3 61.8-41.2 41.2-61.8 91-61.8 149.3v158.4zm686.1 79.1v475c0 22-7.7 40.7-23.1 56.1s-34.1 23.1-56.1 23.1H657.2c-22 0-40.7-7.7-56.1-23.1-15.4-15.4-23.1-34.1-23.1-56.1v-475c0-22 7.7-40.7 23.1-56.1s34.1-23.1 56.1-23.1h26.4V999.3c0-101.2 36.3-188 108.9-260.6s159.4-108.9 260.6-108.9 188 36.3 260.6 108.9 108.9 159.4 108.9 260.6v158.3h26.4c22 0 40.7 7.7 56.1 23.1 15.2 15.5 22.9 34.1 22.9 56.1z">
                        </path>
                    </symbol>
                    <symbol id="FileFolder" viewbox="0 0 1792 1792">
                        <path d="M1728 608v704q0 92-66 158t-158 66h-1216q-92 0-158-66t-66-158v-960q0-92 66-158t158-66h320q92 0 158 66t66 158v32h672q92 0 158 66t66 158z">
                        </path>
                    </symbol>
                    <symbol id="FileFolderOpen" viewbox="0 0 1792 1792">
                        <path d="M1600 1312v-704q0-40-28-68t-68-28h-704q-40 0-68-28t-28-68v-64q0-40-28-68t-68-28h-320q-40 0-68 28t-28 68v960q0 40 28 68t68 28h1216q40 0 68-28t28-68zm128-704v704q0 92-66 158t-158 66h-1216q-92 0-158-66t-66-158v-960q0-92 66-158t158-66h320q92 0 158 66t66 158v32h672q92 0 158 66t66 158z">
                        </path>
                    </symbol>
                    <symbol id="DataFolder" viewbox="0 0 1536 1792">
                        <path d="M768 768c158 0 305.7-14.3 443-43s245.7-71 325-127v170c0 46-34.3 88.7-103 128s-162 70.5-280 93.5-246.3 34.5-385 34.5-267-11.5-385-34.5-211.3-54.2-280-93.5S0 814 0 768V598c79.3 56 187.7 98.3 325 127s285 43 443 43zm0 768c158 0 305.7-14.3 443-43s245.7-71 325-127v170c0 46-34.3 88.7-103 128s-162 70.5-280 93.5-246.3 34.5-385 34.5-267-11.5-385-34.5-211.3-54.2-280-93.5S0 1582 0 1536v-170c79.3 56 187.7 98.3 325 127s285 43 443 43zm0-384c158 0 305.7-14.3 443-43s245.7-71 325-127v170c0 46-34.3 88.7-103 128s-162 70.5-280 93.5-246.3 34.5-385 34.5-267-11.5-385-34.5-211.3-54.2-280-93.5S0 1198 0 1152V982c79.3 56 187.7 98.3 325 127s285 43 443 43zM768 0c138.7 0 267 11.5 385 34.5s211.3 54.2 280 93.5 103 82 103 128v128c0 46-34.3 88.7-103 128s-162 70.5-280 93.5S906.7 640 768 640s-267-11.5-385-34.5-211.3-54.2-280-93.5S0 430 0 384V256c0-46 34.3-88.7 103-128s162-70.5 280-93.5S629.3 0 768 0z">
                        </path>
                    </symbol>
                    <symbol id="DataItem" viewbox="0 0 1536 1792">
                        <path class="typeFill" d="M717.6-.9C372-.9.1 103.3.1 332.2V1306c0 228.8 371.9 333.1 717.5 333.1s717.5-104.3 717.5-333.1V332.2c0-228.9-372-333.1-717.5-333.1zm615 1306.9c0 127.3-275.4 230.6-615 230.6-339.7 0-615-103.3-615-230.6v-191.5c105.9 109.1 361.3 165.8 615 165.8s509.1-56.7 615-165.8V1306zm0-307.5h-.2c0 .5.2 1.1.2 1.6 0 126.5-275.4 229-615 229s-615-102.5-615-229c0-.5.2-1.1.2-1.6h-.2V807c105.9 109.1 361.3 165.8 615 165.8s509.1-56.7 615-165.8v191.5zm0-307.5h-.2c0 .5.2 1.1.2 1.6 0 126.5-275.4 229-615 229s-615-102.5-615-229c0-.5.2-1.1.2-1.6h-.2V514.9c134.3 102.3 380.5 150.5 615 150.5s480.7-48.1 615-150.5V691zm-615-128.2c-339.7 0-615-103.3-615-230.6 0-127.4 275.3-230.6 615-230.6 339.6 0 615 103.2 615 230.6 0 127.3-275.4 230.6-615 230.6z">
                        </path>
                    </symbol>
                    <symbol id="DataItemSaved" viewbox="0 0 1536 1792">
                        <path class="typeFill" d="M717.6-.9C372-.9.1 103.3.1 332.2V1306c0 228.8 371.9 333.1 717.5 333.1s717.5-104.3 717.5-333.1V332.2c0-228.9-372-333.1-717.5-333.1zm615 1306.9c0 127.3-275.4 230.6-615 230.6-339.7 0-615-103.3-615-230.6v-191.5c105.9 109.1 361.3 165.8 615 165.8s509.1-56.7 615-165.8V1306zm0-307.5h-.2c0 .5.2 1.1.2 1.6 0 126.5-275.4 229-615 229s-615-102.5-615-229c0-.5.2-1.1.2-1.6h-.2V807c105.9 109.1 361.3 165.8 615 165.8s509.1-56.7 615-165.8v191.5zm0-307.5h-.2c0 .5.2 1.1.2 1.6 0 126.5-275.4 229-615 229s-615-102.5-615-229c0-.5.2-1.1.2-1.6h-.2V514.9c134.3 102.3 380.5 150.5 615 150.5s480.7-48.1 615-150.5V691zm-615-128.2c-339.7 0-615-103.3-615-230.6 0-127.4 275.3-230.6 615-230.6 339.6 0 615 103.2 615 230.6 0 127.3-275.4 230.6-615 230.6z">
                        </path>
                        <circle class="yellow" cx="953" cy="1216" r="575">
                        </circle>
                        <text class="exclamation" transform="translate(789.6 1636.379)">
                            !
                        </text>
                    </symbol>
                    <symbol id="DataItemApproval1" viewbox="0 0 1536 1792">
                        <path class="typeFill" d="M717.6-.9C372-.9.1 103.3.1 332.2V1306c0 228.8 371.9 333.1 717.5 333.1s717.5-104.3 717.5-333.1V332.2c0-228.9-372-333.1-717.5-333.1zm615 1306.9c0 127.3-275.4 230.6-615 230.6-339.7 0-615-103.3-615-230.6v-191.5c105.9 109.1 361.3 165.8 615 165.8s509.1-56.7 615-165.8V1306zm0-307.5h-.2c0 .5.2 1.1.2 1.6 0 126.5-275.4 229-615 229s-615-102.5-615-229c0-.5.2-1.1.2-1.6h-.2V807c105.9 109.1 361.3 165.8 615 165.8s509.1-56.7 615-165.8v191.5zm0-307.5h-.2c0 .5.2 1.1.2 1.6 0 126.5-275.4 229-615 229s-615-102.5-615-229c0-.5.2-1.1.2-1.6h-.2V514.9c134.3 102.3 380.5 150.5 615 150.5s480.7-48.1 615-150.5V691zm-615-128.2c-339.7 0-615-103.3-615-230.6 0-127.4 275.3-230.6 615-230.6 339.6 0 615 103.2 615 230.6 0 127.3-275.4 230.6-615 230.6z">
                        </path>
                        <circle class="yellow" cx="953" cy="1216" r="575">
                        </circle>
                        <text transform="translate(639.6 1636.379)">
                            1
                        </text>
                    </symbol>
                    <symbol id="DataItemApproval2" viewbox="0 0 1536 1792">
                        <path class="typeFill" d="M717.6-.9C372-.9.1 103.3.1 332.2V1306c0 228.8 371.9 333.1 717.5 333.1s717.5-104.3 717.5-333.1V332.2c0-228.9-372-333.1-717.5-333.1zm615 1306.9c0 127.3-275.4 230.6-615 230.6-339.7 0-615-103.3-615-230.6v-191.5c105.9 109.1 361.3 165.8 615 165.8s509.1-56.7 615-165.8V1306zm0-307.5h-.2c0 .5.2 1.1.2 1.6 0 126.5-275.4 229-615 229s-615-102.5-615-229c0-.5.2-1.1.2-1.6h-.2V807c105.9 109.1 361.3 165.8 615 165.8s509.1-56.7 615-165.8v191.5zm0-307.5h-.2c0 .5.2 1.1.2 1.6 0 126.5-275.4 229-615 229s-615-102.5-615-229c0-.5.2-1.1.2-1.6h-.2V514.9c134.3 102.3 380.5 150.5 615 150.5s480.7-48.1 615-150.5V691zm-615-128.2c-339.7 0-615-103.3-615-230.6 0-127.4 275.3-230.6 615-230.6 339.6 0 615 103.2 615 230.6 0 127.3-275.4 230.6-615 230.6z">
                        </path>
                        <circle class="yellow" cx="953" cy="1216" r="575">
                        </circle>
                        <text transform="translate(664.6 1586.379)">
                            2
                        </text>
                    </symbol>
                    <symbol id="DataItemPublished" viewbox="0 0 1536 1792">
                        <path class="typeFill" d="M717.6-.9C372-.9.1 103.3.1 332.2V1306c0 228.8 371.9 333.1 717.5 333.1s717.5-104.3 717.5-333.1V332.2c0-228.9-372-333.1-717.5-333.1zm615 1306.9c0 127.3-275.4 230.6-615 230.6-339.7 0-615-103.3-615-230.6v-191.5c105.9 109.1 361.3 165.8 615 165.8s509.1-56.7 615-165.8V1306zm0-307.5h-.2c0 .5.2 1.1.2 1.6 0 126.5-275.4 229-615 229s-615-102.5-615-229c0-.5.2-1.1.2-1.6h-.2V807c105.9 109.1 361.3 165.8 615 165.8s509.1-56.7 615-165.8v191.5zm0-307.5h-.2c0 .5.2 1.1.2 1.6 0 126.5-275.4 229-615 229s-615-102.5-615-229c0-.5.2-1.1.2-1.6h-.2V514.9c134.3 102.3 380.5 150.5 615 150.5s480.7-48.1 615-150.5V691zm-615-128.2c-339.7 0-615-103.3-615-230.6 0-127.4 275.3-230.6 615-230.6 339.6 0 615 103.2 615 230.6 0 127.3-275.4 230.6-615 230.6z">
                        </path>
                        <path class="iconFill" d="M953 641c104.3 0 200.5 25.7 288.6 77.1 88.1 51.4 157.9 121.2 209.3 209.3s77.1 184.3 77.1 288.6-25.7 200.5-77.1 288.6-121.2 157.9-209.3 209.3c-88.1 51.4-184.3 77.1-288.6 77.1s-200.5-25.7-288.6-77.1-157.9-121.2-209.3-209.3S378 1320.3 378 1216s25.7-200.5 77.1-288.6 121.2-157.9 209.3-209.3C752.5 666.7 848.7 641 953 641zm205.1 390.1c-1 .5-3.4 2.9-7.1 7.1-3.7 4.2-7.1 6.6-10.1 7.1 1 0 2.1-1.2 3.4-3.7 1.2-2.5 2.5-5.2 3.7-8.2s2.1-4.7 2.6-5.2c3-3.5 8.5-7.2 16.5-11.2 7-3 20-6 38.9-9 17-4 29.7-1.2 38.2 8.2-1-1 1.4-4.2 7.1-9.7s9.4-8.5 10.9-9c1.5-1 5.2-2.1 11.2-3.4 6-1.2 9.7-3.1 11.2-5.6l1.5-16.5c-6 .5-10.4-1.2-13.1-5.2s-4.4-9.2-4.9-15.7c0 1-1.5 3-4.5 6 0-3.5-1.1-5.5-3.4-6s-5.1-.2-8.6.7c-3.5 1-5.7 1.2-6.7.7-5-1.5-8.7-3.4-11.2-5.6s-4.5-6.4-6-12.4-2.5-9.7-3-11.2c-1-2.5-3.4-5.2-7.1-8.2s-6.1-5.5-7.1-7.5c-.5-1-1.1-2.4-1.9-4.1-.7-1.7-1.5-3.4-2.2-4.9s-1.7-2.9-3-4.1c-1.2-1.2-2.6-1.9-4.1-1.9s-3.2 1.2-5.2 3.7-3.9 5-5.6 7.5-2.9 3.7-3.4 3.7c-1.5-1-3-1.4-4.5-1.1-1.5.2-2.6.5-3.4.7-.7.2-1.9 1-3.4 2.2s-2.7 2.1-3.7 2.6c-1.5 1-3.6 1.7-6.4 2.2-2.7.5-4.9 1-6.4 1.5 7.5-2.5 7.2-5.2-.7-8.2-5-2-9-2.7-12-2.2 4.5-2 6.4-5 5.6-9-.7-4-2.9-7.5-6.4-10.5h3.7c-.5-2-2.6-4.1-6.4-6.4-3.7-2.2-8.1-4.4-13.1-6.4s-8.2-3.5-9.7-4.5c-4-2.5-12.5-4.9-25.5-7.1-13-2.2-21.2-2.4-24.7-.4-2.5 3-3.6 5.6-3.4 7.9.2 2.2 1.2 5.7 3 10.5 1.7 4.7 2.6 7.9 2.6 9.4.5 3-.9 6.2-4.1 9.7s-4.9 6.5-4.9 9c0 3.5 3.5 7.4 10.5 11.6s9.5 9.6 7.5 16.1c-1.5 4-5.5 8-12 12s-10.5 7-12 9c-2.5 4-2.9 8.6-1.1 13.9 1.7 5.2 4.4 9.4 7.9 12.4 1 1 1.4 2 1.1 3-.2 1-1.1 2.1-2.6 3.4-1.5 1.2-2.9 2.2-4.1 3-1.2.7-2.9 1.6-4.9 2.6l-2.2 1.5c-5.5 2.5-10.6 1-15.3-4.5-4.7-5.5-8.1-12-10.1-19.5-3.5-12.5-7.5-20-12-22.5-11.5-4-18.7-3.7-21.7.7-2.5-6.5-12.7-13-30.7-19.5-12.5-4.5-27-5.5-43.4-3 3-.5 3-4.2 0-11.2-3.5-7.5-8.2-10.5-14.2-9 1.5-3 2.5-7.4 3-13.1.5-5.7.7-9.1.7-10.1 1.5-6.5 4.5-12.2 9-17.2.5-.5 2.2-2.6 5.2-6.4 3-3.7 5.4-7.1 7.1-10.1 1.7-3 1.9-4.5.4-4.5 17.5 2 29.9-.7 37.4-8.2 2.5-2.5 5.4-6.7 8.6-12.7 3.2-6 5.9-10.2 7.9-12.7 4.5-3 8-4.4 10.5-4.1 2.5.2 6.1 1.6 10.9 4.1 4.7 2.5 8.4 3.7 10.9 3.7 7 .5 10.9-2.2 11.6-8.2s-1.1-11-5.6-15c6 .5 6.7-3.7 2.2-12.7-2-3.5-4-5.7-6-6.7-6-2-12.7-.7-20.2 3.7-4 2-3.5 4 1.5 6-.5-.5-2.9 2.1-7.1 7.9-4.2 5.7-8.4 10.1-12.4 13.1s-8 1.7-12-3.7c-.5-.5-1.9-3.9-4.1-10.1s-4.6-9.6-7.1-10.1c-4 0-8 3.7-12 11.2 1.5-4-1.2-7.7-8.2-11.2s-13-5.5-18-6c9.5-6 7.5-12.7-6-20.2-3.5-2-8.6-3.2-15.3-3.7s-11.6.5-14.6 3c-2.5 3.5-3.9 6.4-4.1 8.6-.2 2.2 1 4.2 3.7 6s5.4 3.1 7.9 4.1 5.4 2 8.6 3c3.2 1 5.4 1.7 6.4 2.2 7 5 9 8.5 6 10.5-1 .5-3.1 1.4-6.4 2.6s-6.1 2.4-8.6 3.4-4 2-4.5 3c-1.5 2-1.5 5.5 0 10.5s1 8.5-1.5 10.5c-2.5-2.5-4.7-6.9-6.7-13.1-2-6.2-3.7-10.4-5.2-12.4 3.5 4.5-2.7 6-18.7 4.5l-7.5-.7c-2 0-6 .5-12 1.5s-11.1 1.2-15.3.7-7.6-2.5-10.1-6c-2-4-2-9 0-15 .5-2 1.5-2.5 3-1.5-2-1.5-4.7-3.9-8.2-7.1-3.5-3.2-6-5.4-7.5-6.4-23 7.5-46.4 17.7-70.4 30.7 3 .5 6 .2 9-.7 2.5-1 5.7-2.6 9.7-4.9s6.5-3.6 7.5-4.1c17-7 27.5-8.7 31.4-5.2l3.7-3.7c7 8 12 14.2 15 18.7-3.5-2-11-2.2-22.5-.7-10 3-15.5 6-16.5 9 3.5 6 4.7 10.5 3.7 13.5-2-1.5-4.9-4-8.6-7.5-3.7-3.5-7.4-6.2-10.9-8.2s-7.2-3.2-11.2-3.7c-8 0-13.5.2-16.5.7-72.9 39.9-131.5 95.3-175.9 166.2 3.5 3.5 6.5 5.5 9 6 2 .5 3.2 2.7 3.7 6.7s1.1 6.7 1.9 8.2c.7 1.5 3.6.7 8.6-2.2 4.5 4 5.2 8.7 2.2 14.2.5-.5 11.5 6.2 32.9 20.2 9.5 8.5 14.7 13.7 15.7 15.7 1.5 5.5-1 10-7.5 13.5-.5-1-2.7-3.2-6.7-6.7s-6.2-4.5-6.7-3c-1.5 2.5-1.4 7.1.4 13.9 1.7 6.7 4.4 9.9 7.9 9.4-3.5 0-5.9 4-7.1 12s-1.9 16.8-1.9 26.6c0 9.7-.2 15.6-.7 17.6l1.5.7c-1.5 6-.1 14.6 4.1 25.8s9.6 16.1 16.1 14.6c-6.5 1.5-1.5 12.2 15 32.2 3 4 5 6.2 6 6.7 1.5 1 4.5 2.9 9 5.6s8.2 5.2 11.2 7.5c3 2.2 5.5 4.9 7.5 7.9 2 2.5 4.5 8.1 7.5 16.8 3 8.7 6.5 14.6 10.5 17.6-1 3 1.4 8 7.1 15 5.7 7 8.4 12.7 7.9 17.2-.5 0-1.1.2-1.9.7s-1.4.7-1.9.7c1.5 3.5 5.4 7 11.6 10.5 6.2 3.5 10.1 6.7 11.6 9.7.5 1.5 1 4 1.5 7.5s1.2 6.2 2.2 8.2 3 2.5 6 1.5c1-10-5-25.5-18-46.4-7.5-12.5-11.7-19.7-12.7-21.7-1.5-2.5-2.9-6.4-4.1-11.6-1.2-5.2-2.4-8.9-3.4-10.9 1 0 2.5.4 4.5 1.1s4.1 1.6 6.4 2.6 4.1 2 5.6 3 2 1.7 1.5 2.2c-1.5 3.5-1 7.9 1.5 13.1s5.5 9.9 9 13.9 7.7 8.7 12.7 14.2 8 8.7 9 9.7c3 3 6.5 7.9 10.5 14.6s4 10.1 0 10.1c4.5 0 9.5 2.6 15 7.9s9.7 10.1 12.7 14.6c2.5 4 4.5 10.5 6 19.5s2.7 15 3.7 18c1 3.5 3.1 6.9 6.4 10.1 3.2 3.2 6.4 5.6 9.4 7.1l12 6 9.7 5.2c2.5 1 7.1 3.6 13.9 7.9 6.7 4.2 12.1 7.1 16.1 8.6 5 2 9 3 12 3s6.6-.6 10.9-1.9c4.2-1.2 7.6-2.1 10.1-2.6 7.5-1 14.7 2.7 21.7 11.2s12.2 13.7 15.7 15.7c18 9.5 31.7 12.2 41.2 8.2-1 .5-.9 2.4.4 5.6 1.2 3.2 3.2 7.1 6 11.6s5 8.1 6.7 10.9c1.7 2.7 3.1 4.9 4.1 6.4 2.5 3 7 6.7 13.5 11.2s11 8.2 13.5 11.2c3-2 4.7-4.2 5.2-6.7-1.5 4 .2 9 5.2 15s9.5 8.5 13.5 7.5c7-1.5 10.5-9.5 10.5-24-15.5 7.5-27.7 3-36.7-13.5 0-.5-.6-1.9-1.9-4.1s-2.2-4.4-3-6.4c-.7-2-1.4-4.1-1.9-6.4s-.5-4.1 0-5.6 1.7-2.2 3.7-2.2c4.5 0 7-.9 7.5-2.6s0-4.9-1.5-9.4-2.5-7.7-3-9.7c-.5-4-3.2-9-8.2-15s-8-9.7-9-11.2c-2.5 4.5-6.5 6.5-12 6s-9.5-2.7-12-6.7c0 .5-.4 1.9-1.1 4.1s-1.1 3.9-1.1 4.9c-6.5 0-10.2-.2-11.2-.7.5-1.5 1.1-5.9 1.9-13.1.7-7.2 1.6-12.9 2.6-16.8.5-2 1.9-5 4.1-9s4.1-7.6 5.6-10.9c1.5-3.2 2.5-6.4 3-9.4s-.6-5.4-3.4-7.1c-2.7-1.7-7.1-2.4-13.1-1.9-9.5.5-16 5.5-19.5 15-.5 1.5-1.2 4.1-2.2 7.9-1 3.7-2.2 6.6-3.7 8.6s-3.7 3.7-6.7 5.2c-3.5 1.5-9.5 2-18 1.5s-14.5-1.7-18-3.7c-6.5-4-12.1-11.2-16.8-21.7s-7.1-19.7-7.1-27.7c0-5 .6-11.6 1.9-19.8 1.2-8.2 2-14.5 2.2-18.7s-1.1-10.4-4.1-18.3c1.5-1 3.7-3.4 6.7-7.1s5.5-6.4 7.5-7.9c1-.5 2.1-.9 3.4-1.1 1.2-.2 2.4-.2 3.4 0s2-.1 3-1.1 1.7-2.5 2.2-4.5c-.5-.5-1.5-1.2-3-2.2-1.5-1.5-2.5-2.2-3-2.2 3.5 1.5 10.6 1.1 21.3-1.1s17.6-1.9 20.6 1.1c7.5 5.5 13 5 16.5-1.5 0-.5-.6-2.9-1.9-7.1s-1.4-7.6-.4-10.1c2.5 13.5 9.7 15.7 21.7 6.7 1.5 1.5 5.4 2.7 11.6 3.7 6.2 1 10.6 2.2 13.1 3.7 1.5 1 3.2 2.4 5.2 4.1s3.4 2.9 4.1 3.4c.7.5 2 .4 3.7-.4s3.9-2.4 6.4-4.9c5 7 8 13 9 18 5.5 20 10.2 30.9 14.2 32.9 3.5 1.5 6.2 2 8.2 1.5s3.1-2.9 3.4-7.1c.2-4.2.2-7.7 0-10.5-.2-2.7-.6-5.9-1.1-9.4l-.7-6V1261l-.7-6c-7.5-1.5-12.1-4.5-13.9-9s-1.4-9.1 1.1-13.9c2.5-4.7 6.2-9.4 11.2-13.9.5-.5 2.5-1.4 6-2.6s7.4-2.9 11.6-4.9 7.4-4 9.4-6c10.5-9.5 14.2-18.2 11.2-26.2 3.5 0 6.2-2.2 8.2-6.7-.5 0-1.7-.7-3.7-2.2s-3.9-2.7-5.6-3.7-2.9-1.5-3.4-1.5c4.5-2.5 5-6.5 1.5-12 2.5-1.5 4.4-4.2 5.6-8.2s3.1-6.5 5.6-7.5c4.5 6 9.7 6.5 15.7 1.5 4-4 4.2-8 .7-12 2.5-3.5 7.6-6.1 15.3-7.9s12.4-4.1 13.9-7.1c3.5 1 5.5.5 6-1.5s.7-5 .7-9 .7-7 2.2-9c2-2.5 5.7-4.7 11.2-6.7s8.7-3.2 9.7-3.7l12.7-8.2c1.5-2 1.5-3 0-3 9 1 16.7-1.7 23.2-8.2 5-5.5 3.5-10.5-4.5-15 1.5-3 .7-5.4-2.2-7.1-3-1.7-6.7-3.1-11.2-4.1 1.5-.5 4.4-.6 8.6-.4s6.9-.1 7.9-1.1c7.5-5 5.7-9-5.2-12-8.2-2.6-19 .4-32 8.9zm-122 656.6c102.8-18 190.4-65.1 262.8-141.5-1.5-1.5-4.6-2.6-9.4-3.4-4.7-.7-7.9-1.6-9.4-2.6-9-3.5-15-5.5-18-6 .5-3.5-.1-6.7-1.9-9.7-1.7-3-3.7-5.2-6-6.7-2.2-1.5-5.4-3.5-9.4-6s-6.7-4.2-8.2-5.2c-1-1-2.7-2.5-5.2-4.5s-4.2-3.4-5.2-4.1-2.9-1.9-5.6-3.4-4.9-2-6.4-1.5-4 .7-7.5.7l-2.2.7c-1.5.5-2.9 1.1-4.1 1.9-1.2.7-2.6 1.5-4.1 2.2s-2.5 1.5-3 2.2-.5 1.4 0 1.9c-10.5-8.5-19.5-14-27-16.5-2.5-.5-5.2-1.9-8.2-4.1s-5.6-4-7.9-5.2-4.7-1.6-7.5-1.1c-2.7.5-5.6 2.2-8.6 5.2-2.5 2.5-4 6.2-4.5 11.2s-1 8.2-1.5 9.7c-3.5-2.5-3.5-6.9 0-13.1s4-10.9 1.5-13.9c-1.5-3-4.1-4.1-7.9-3.4-3.7.7-6.7 1.9-9 3.4-2.2 1.5-5.1 3.6-8.6 6.4-3.5 2.7-5.7 4.4-6.7 4.9s-3.1 1.9-6.4 4.1-5.4 4.1-6.4 5.6c-1.5 2-3 5-4.5 9s-2.7 6.7-3.7 8.2c-1-2-3.9-3.6-8.6-4.9-4.7-1.2-7.1-2.6-7.1-4.1 1 5 2 13.7 3 26.2s2.2 22 3.7 28.5c3.5 15.5.5 27.5-9 35.9-13.5 12.5-20.7 22.5-21.7 29.9-2 11 1 17.5 9 19.5 0 3.5-2 8.6-6 15.3s-5.7 12.1-5.2 16.1c.1 3.2.6 7.2 1.6 12.2z">
                        </path>
                    </symbol>
                    <symbol id="DataItemReadOnly" viewbox="0 0 1536 1792">
                        <path class="typeFill" d="M717.6-.9C372-.9.1 103.3.1 332.2V1306c0 228.8 371.9 333.1 717.5 333.1s717.5-104.3 717.5-333.1V332.2c0-228.9-372-333.1-717.5-333.1zm615 1306.9c0 127.3-275.4 230.6-615 230.6-339.7 0-615-103.3-615-230.6v-191.5c105.9 109.1 361.3 165.8 615 165.8s509.1-56.7 615-165.8V1306zm0-307.5h-.2c0 .5.2 1.1.2 1.6 0 126.5-275.4 229-615 229s-615-102.5-615-229c0-.5.2-1.1.2-1.6h-.2V807c105.9 109.1 361.3 165.8 615 165.8s509.1-56.7 615-165.8v191.5zm0-307.5h-.2c0 .5.2 1.1.2 1.6 0 126.5-275.4 229-615 229s-615-102.5-615-229c0-.5.2-1.1.2-1.6h-.2V514.9c134.3 102.3 380.5 150.5 615 150.5s480.7-48.1 615-150.5V691zm-615-128.2c-339.7 0-615-103.3-615-230.6 0-127.4 275.3-230.6 615-230.6 339.6 0 615 103.2 615 230.6 0 127.3-275.4 230.6-615 230.6z">
                        </path>
                        <path class="iconFill" d="M841.9 1157.7h422.2V999.3c0-58.3-20.6-108-61.8-149.3-41.2-41.2-91-61.8-149.3-61.8-58.3 0-108 20.6-149.3 61.8-41.2 41.2-61.8 91-61.8 149.3v158.4zm686.1 79.1v475c0 22-7.7 40.7-23.1 56.1s-34.1 23.1-56.1 23.1H657.2c-22 0-40.7-7.7-56.1-23.1-15.4-15.4-23.1-34.1-23.1-56.1v-475c0-22 7.7-40.7 23.1-56.1s34.1-23.1 56.1-23.1h26.4V999.3c0-101.2 36.3-188 108.9-260.6s159.4-108.9 260.6-108.9 188 36.3 260.6 108.9 108.9 159.4 108.9 260.6v158.3h26.4c22 0 40.7 7.7 56.1 23.1 15.2 15.5 22.9 34.1 22.9 56.1z">
                        </path>
                    </symbol>
                    <!-- File Upload -->
                    <symbol id="plus-circle" viewbox="0 0 1792 1792">
                        <path d="M1344 960v-128q0-26-19-45t-45-19h-256v-256q0-26-19-45t-45-19h-128q-26 0-45 19t-19 45v256h-256q-26 0-45 19t-19 45v128q0 26 19 45t45 19h256v256q0 26 19 45t45 19h128q26 0 45-19t19-45v-256h256q26 0 45-19t19-45zm320-64q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                        </path>
                    </symbol>
                    <symbol id="delete" viewbox="0 0 1792 1792">
                        <path d="M704 736v576q0 14-9 23t-23 9h-64q-14 0-23-9t-9-23v-576q0-14 9-23t23-9h64q14 0 23 9t9 23zm256 0v576q0 14-9 23t-23 9h-64q-14 0-23-9t-9-23v-576q0-14 9-23t23-9h64q14 0 23 9t9 23zm256 0v576q0 14-9 23t-23 9h-64q-14 0-23-9t-9-23v-576q0-14 9-23t23-9h64q14 0 23 9t9 23zm128 724v-948h-896v948q0 22 7 40.5t14.5 27 10.5 8.5h832q3 0 10.5-8.5t14.5-27 7-40.5zm-672-1076h448l-48-117q-7-9-17-11h-317q-10 2-17 11zm928 32v64q0 14-9 23t-23 9h-96v948q0 83-47 143.5t-113 60.5h-832q-66 0-113-58.5t-47-141.5v-952h-96q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h309l70-167q15-37 54-63t79-26h320q40 0 79 26t54 63l70 167h309q14 0 23 9t9 23z">
                        </path>
                    </symbol>
                    <!-- image editor -->
                    <symbol id="security" viewbox="0 0 1792 1792">
                        <path d="M640 768h512v-192q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28h-960q-40 0-68-28t-28-68v-576q0-40 28-68t68-28h32v-192q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z">
                        </path>
                    </symbol>
                    <symbol id="search-minus" viewbox="0 0 1792 1792">
                        <path d="M1088 800v64q0 13-9.5 22.5t-22.5 9.5h-576q-13 0-22.5-9.5t-9.5-22.5v-64q0-13 9.5-22.5t22.5-9.5h576q13 0 22.5 9.5t9.5 22.5zm128 32q0-185-131.5-316.5t-316.5-131.5-316.5 131.5-131.5 316.5 131.5 316.5 316.5 131.5 316.5-131.5 131.5-316.5zm512 832q0 53-37.5 90.5t-90.5 37.5q-54 0-90-38l-343-342q-179 124-399 124-143 0-273.5-55.5t-225-150-150-225-55.5-273.5 55.5-273.5 150-225 225-150 273.5-55.5 273.5 55.5 225 150 150 225 55.5 273.5q0 220-124 399l343 343q37 37 37 90z">
                        </path>
                    </symbol>
                    <symbol id="search-plus" viewbox="0 0 1792 1792">
                        <path d="M1088 800v64q0 13-9.5 22.5t-22.5 9.5h-224v224q0 13-9.5 22.5t-22.5 9.5h-64q-13 0-22.5-9.5t-9.5-22.5v-224h-224q-13 0-22.5-9.5t-9.5-22.5v-64q0-13 9.5-22.5t22.5-9.5h224v-224q0-13 9.5-22.5t22.5-9.5h64q13 0 22.5 9.5t9.5 22.5v224h224q13 0 22.5 9.5t9.5 22.5zm128 32q0-185-131.5-316.5t-316.5-131.5-316.5 131.5-131.5 316.5 131.5 316.5 316.5 131.5 316.5-131.5 131.5-316.5zm512 832q0 53-37.5 90.5t-90.5 37.5q-54 0-90-38l-343-342q-179 124-399 124-143 0-273.5-55.5t-225-150-150-225-55.5-273.5 55.5-273.5 150-225 225-150 273.5-55.5 273.5 55.5 225 150 150 225 55.5 273.5q0 220-124 399l343 343q37 37 37 90z">
                        </path>
                    </symbol>
                    <symbol id="expand" viewbox="0 0 1792 1792">
                        <path d="M130.9 94l450.9 42.6s60-1.6 26.6 31.8c-33.7 33.6-115 115-115 115s19.8 19.8 50 50.2l308.9 308.9s22.2 13-4.4 39.4C821.3 708.7 705.1 825 686.1 843.8c-18.7 19-33.1 3.7-33.1 3.7C590.5 785.3 427.1 622 343.4 538c-27.3-27.2-45-45-45-45S233.2 558.3 192 599.3c-40.9 40.9-40.6-20.8-40.6-20.8s-57-403.9-57-452.2C94.3 91 130.9 94 130.9 94zm1544.7 1614.8l-450.7-42.6s-60.2 1.7-26.7-31.7c33.6-33.6 115.1-115.4 115.1-115.4s-19.7-19.4-50.2-49.9c-86.9-86.8-244.6-244.6-309-309.1 0 0-22-12.6 4.4-39 26.6-26.7 143-143.3 162.2-162.2 18.7-18.7 32.8-3.8 32.8-3.8 62.4 62.6 225.9 225.7 309.7 309.6 27.1 27.1 44.6 44.8 44.6 44.8s65.3-65 106.6-106c40.9-41 40.9 20.7 40.9 20.7s56.6 404.2 56.6 452.3c.2 35.2-36.3 32.3-36.3 32.3zM70 1673.8l42.5-451s-1.7-60.3 31.8-26.6c33.7 33.8 115.2 115.1 115.2 115.1s19.8-19.8 49.8-50.2c86.9-86.9 245-244.6 309.3-309.1 0 0 12.8-21.7 39.4 4.7 26.5 26.4 142.7 143.1 161.9 161.6 19 18.9 3.8 33.3 3.8 33.3-62.4 62.2-225.6 225.7-309.6 309.6-27.3 27.1-45 44.9-45 44.9s65.1 65.3 106.3 106c41.2 41.2-20.5 40.9-20.5 40.9s-404.2 56.8-452.7 56.8c-35.1.2-32.2-36-32.2-36zM1695.1 118.5l-42.5 451.2s1.6 59.9-31.8 26.5c-33.7-33.7-115.1-115.2-115.1-115.2s-19.8 19.8-50.4 50.2c-86.8 86.9-244.5 244.6-308.9 308.9 0 0-12.8 22.1-39.4-4.6-26.6-26.3-142.9-142.7-161.8-161.5-19.1-19-3.9-33.3-3.9-33.3 62.3-62.4 225.7-225.7 309.5-309.6 27.4-27 45.3-44.8 45.3-44.8s-65.4-65.1-106.5-106.2c-40.9-41.3 20.5-40.9 20.5-40.9s404.2-56.9 452.7-56.9c35.2-.3 32.3 36.2 32.3 36.2z">
                        </path>
                    </symbol>
                    <symbol id="contract" viewbox="0 0 1792 1792">
                        <path d="M734.4 763.2l-450.9-42.6s-60 1.6-26.6-31.8c33.7-33.6 114.9-114.9 114.9-114.9s-19.8-19.8-50-50.2C235.1 436.8 77.3 279 13 214.8c0 0-22.2-13 4.4-39.4C44.1 148.5 160.3 32.2 179.3 13.5c18.7-19 33.1-3.7 33.1-3.7C274.8 72 438.2 235.3 522 319.2c27.3 27.2 45 45 45 45s65.1-65.3 106.3-106.3c40.9-40.9 40.6 20.8 40.6 20.8S771 682.7 771 731c0 35.2-36.6 32.2-36.6 32.2zm327.4 266.3l450.7 42.6s60.2-1.7 26.7 31.7c-33.6 33.6-115.1 115.4-115.1 115.4s19.7 19.4 50.2 49.9c86.9 86.8 244.6 244.6 309 309.1 0 0 22 12.6-4.4 39-26.6 26.7-143 143.3-162.2 162.2-18.7 18.7-32.8 3.8-32.8 3.8-62.4-62.6-225.9-225.7-309.7-309.6-27.1-27.1-44.6-44.8-44.6-44.8s-65.3 65-106.6 106c-40.9 41-40.9-20.7-40.9-20.7s-56.6-404.2-56.6-452.3c-.2-35.1 36.3-32.3 36.3-32.3zm-302.4 30l-42.5 451s1.7 60.3-31.8 26.6c-33.7-33.8-115.2-115.1-115.2-115.1s-19.8 19.8-49.8 50.2c-86.9 86.9-245 244.6-309.3 309.1 0 0-12.8 21.7-39.4-4.7S28.7 1633.6 9.5 1615c-19-18.9-3.8-33.3-3.8-33.3 62.4-62.2 225.6-225.7 309.6-309.6 27.3-27.1 45-44.9 45-44.9s-65.1-65.3-106.3-106c-41.2-41.2 20.5-40.9 20.5-40.9s404.2-56.8 452.7-56.8c35.2-.2 32.2 36 32.2 36zm266.3-327.2l42.5-451.2s-1.6-59.9 31.8-26.5c33.7 33.7 115.1 115.2 115.1 115.2s19.8-19.8 50.4-50.2C1352.3 232.7 1510 75 1574.4 10.7c0 0 12.8-22.1 39.4 4.6 26.6 26.3 142.9 142.7 161.8 161.5 19.1 19 3.9 33.3 3.9 33.3-62.3 62.4-225.7 225.7-309.5 309.6-27.4 27-45.3 44.8-45.3 44.8s65.4 65.1 106.5 106.2c40.9 41.3-20.5 40.9-20.5 40.9s-404.2 56.9-452.7 56.9c-35.1.3-32.3-36.2-32.3-36.2z">
                        </path>
                    </symbol>
                    <symbol id="flip-horizontal" viewbox="0 0 1792 1792">
                        <path d="M827.2,608.9c10.5,10.5,19.4,24.7,26.9,42.6c7.5,17.9,11.2,34.4,11.2,49.3v645.6c0,14.9-5.2,27.6-15.7,38.1   s-23.2,15.7-38.1,15.7H58.3c-14.9,0-27.6-5.2-38.1-15.7s-15.7-23.2-15.7-38.1V449.8c0-14.9,5.2-27.6,15.7-38.1S43.4,396,58.3,396   h502.1c14.9,0,31.4,3.7,49.3,11.2s32.1,16.4,42.6,26.9L827.2,608.9z M578.4,472.2v210.7h210.7c-3.7-10.8-7.8-18.5-12.3-23   L601.4,484.5C596.9,480,589.2,475.9,578.4,472.2L578.4,472.2z M793.6,1328.5V754.6H560.5c-14.9,0-27.6-5.2-38.1-15.7   s-15.7-23.2-15.7-38.1V467.7H76.2v860.8L793.6,1328.5L793.6,1328.5z M721.8,1077.4v179.3H148v-107.6l107.6-107.6l71.7,71.7   l215.2-215.1L721.8,1077.4L721.8,1077.4z M255.6,969.8c-29.9,0-55.3-10.5-76.2-31.4S148,892.1,148,862.2s10.5-55.3,31.4-76.2   s46.3-31.4,76.2-31.4s55.3,10.5,76.2,31.4s31.4,46.3,31.4,76.2s-10.5,55.3-31.4,76.2S285.5,969.8,255.6,969.8z">
                        </path>
                        <path class="future" d="M1141,430.9c10.5-10.5,24.7-19.4,42.6-26.9s34.4-11.2,49.3-11.2H1735c14.9,0,27.6,5.2,38.1,15.7   s15.7,23.2,15.7,38.1v896.6c0,14.9-5.2,27.6-15.7,38.1s-23.2,15.7-38.1,15.7H981.8c-14.9,0-27.6-5.2-38.1-15.7   s-15.7-23.2-15.7-38.1V697.6c0-14.9,3.7-31.4,11.2-49.3c7.5-17.9,16.4-32.1,26.9-42.6L1141,430.9z M1214.9,469   c-10.8,3.7-18.5,7.8-23,12.3l-175.4,175.4c-4.5,4.5-8.6,12.2-12.3,23h210.7L1214.9,469L1214.9,469z M999.7,1325.3h717.4V464.5   h-430.5v233.1c0,14.9-5.2,27.6-15.7,38.1s-23.2,15.7-38.1,15.7H999.7V1325.3L999.7,1325.3z M1071.5,1074.2l179.3-179.3L1466,1110   l71.7-71.7l107.6,107.6v107.6h-573.8L1071.5,1074.2L1071.5,1074.2z M1461.5,935.2c-20.9-20.9-31.4-46.3-31.4-76.2   s10.5-55.3,31.4-76.2s46.3-31.4,76.2-31.4s55.3,10.5,76.2,31.4s31.4,46.3,31.4,76.2s-10.5,55.3-31.4,76.2s-46.3,31.4-76.2,31.4   S1482.4,956.1,1461.5,935.2z">
                        </path>
                        <path d="M808.1,1020.3c119.2,43.6,249.7-5.9,312-111.4l48.2,17.6l-34-112.7l-98.7,64.2l39.3,14.4c-52.5,81.2-156,118.4-250.6,83.7   c-59.8-21.9-103.8-67.9-125-123.1l-9.3-0.9l-45.1-16.5C663.9,917.8,722.8,989.1,808.1,1020.3z">
                        </path>
                    </symbol>
                    <symbol id="flip-vertical" viewbox="0 0 1792 1792">
                        <path d="M827.2,608.9c10.5,10.5,19.4,24.7,26.9,42.6c7.5,17.9,11.2,34.4,11.2,49.3v645.6c0,14.9-5.2,27.6-15.7,38.1   s-23.2,15.7-38.1,15.7H58.3c-14.9,0-27.6-5.2-38.1-15.7s-15.7-23.2-15.7-38.1V449.8c0-14.9,5.2-27.6,15.7-38.1S43.4,396,58.3,396   h502.1c14.9,0,31.4,3.7,49.3,11.2s32.1,16.4,42.6,26.9L827.2,608.9z M578.4,472.2v210.7h210.7c-3.7-10.8-7.8-18.5-12.3-23   L601.4,484.5C596.9,480,589.2,475.9,578.4,472.2L578.4,472.2z M793.6,1328.5V754.6H560.5c-14.9,0-27.6-5.2-38.1-15.7   s-15.7-23.2-15.7-38.1V467.7H76.2v860.8L793.6,1328.5L793.6,1328.5z M721.8,1077.4v179.3H148v-107.6l107.6-107.6l71.7,71.7   l215.2-215.1L721.8,1077.4L721.8,1077.4z M255.6,969.8c-29.9,0-55.3-10.5-76.2-31.4S148,892.1,148,862.2s10.5-55.3,31.4-76.2   s46.3-31.4,76.2-31.4s55.3,10.5,76.2,31.4s31.4,46.3,31.4,76.2s-10.5,55.3-31.4,76.2S285.5,969.8,255.6,969.8z">
                        </path>
                        <path class="future" d="M1575.8,1358.9c-10.5,10.5-24.7,19.4-42.6,26.9s-34.4,11.2-49.3,11.2H981.8c-14.9,0-27.6-5.2-38.1-15.7   s-15.7-23.2-15.7-38.1V446.6c0-14.9,5.2-27.6,15.7-38.1s23.2-15.7,38.1-15.7H1735c14.9,0,27.6,5.2,38.1,15.7s15.7,23.2,15.7,38.1   v645.6c0,14.9-3.7,31.4-11.2,49.3c-7.5,17.9-16.4,32.1-26.9,42.6L1575.8,1358.9z M1501.9,1320.8c10.8-3.7,18.5-7.8,23-12.3   l175.4-175.4c4.5-4.5,8.6-12.2,12.3-23h-210.7L1501.9,1320.8L1501.9,1320.8z M1717.1,464.5H999.7v860.8h430.5v-233.1   c0-14.9,5.2-27.6,15.7-38.1s23.2-15.7,38.1-15.7h233.1V464.5L1717.1,464.5z M1645.3,715.6L1466,894.9l-215.2-215.1l-71.7,71.7   l-107.6-107.6V536.3h573.8L1645.3,715.6L1645.3,715.6z M1255.3,854.6c20.9,20.9,31.4,46.3,31.4,76.2s-10.5,55.3-31.4,76.2   s-46.3,31.4-76.2,31.4s-55.3-10.5-76.2-31.4s-31.4-46.3-31.4-76.2s10.5-55.3,31.4-76.2s46.3-31.4,76.2-31.4   S1234.4,833.7,1255.3,854.6z">
                        </path>
                        <path d="M644.8,964.4l45.1-16.5l9.3-0.9c21.2-55.1,65.2-101.2,125-123.1c94.7-34.6,198.1,2.5,250.6,83.7l-39.3,14.4l98.7,64.2   l34-112.7L1120,891c-62.2-105.6-192.8-155-312-111.4C722.8,810.8,663.9,882.1,644.8,964.4z">
                        </path>
                    </symbol>
                    <symbol id="rotate-counterclockwise-90" viewbox="0 0 1792 1792">
                        <path d="M1288.3 606.8c10.5 10.5 19.4 24.7 26.9 42.6 7.5 17.9 11.2 34.4 11.2 49.3v645.6c0 14.9-5.2 27.6-15.7 38.1s-23.2 15.7-38.1 15.7H519.4c-14.9 0-27.6-5.2-38.1-15.7s-15.7-23.2-15.7-38.1V447.7c0-14.9 5.2-27.6 15.7-38.1s23.2-15.7 38.1-15.7h502.1c14.9 0 31.4 3.7 49.3 11.2 17.9 7.5 32.1 16.4 42.6 26.9l174.9 174.8zm-248.8-136.7v210.7h210.7c-3.7-10.8-7.8-18.5-12.3-23l-175.4-175.4c-4.5-4.5-12.2-8.6-23-12.3zm215.2 856.3V752.5h-233.1c-14.9 0-27.6-5.2-38.1-15.7s-15.7-23.2-15.7-38.1V465.6H537.3v860.8h717.4zm-71.8-251.1v179.3H609.1V1147l107.6-107.6 71.7 71.7L1003.6 896l179.3 179.3zM716.7 967.7c-29.9 0-55.3-10.5-76.2-31.4-20.9-20.9-31.4-46.3-31.4-76.2s10.5-55.3 31.4-76.2c20.9-20.9 46.3-31.4 76.2-31.4 29.9 0 55.3 10.5 76.2 31.4s31.4 46.3 31.4 76.2-10.5 55.3-31.4 76.2-46.3 31.4-76.2 31.4z">
                        </path>
                        <path d="M203.4 775.3l119.9-166.8c8.8-12.4 4.4-29-10.1-37s-33.4-4.6-42.4 7.8l-76.1 105.8c-7-102.5 25.4-207.8 25.8-209.1C299.2 188.1 582.1 4.2 851.4 65.2c16.6 3.7 33.1-4.8 37-19.1.4-1.4.6-2.8.7-4.1 1.1-12.9-8.7-25.2-23.6-28.5C563.2-55.1 247.1 146 160.9 461.6c-1.5 4.8-32.9 106.8-28.1 213.7l-78.9-79.8c-11.2-11.4-30.7-12.9-43.4-3.4-12.8 9.5-14 26.4-2.8 37.7l146.3 148c.3.3.8.4 1.1.8 2.4 2.2 5 4 8 5.5.3.1.5.4.8.5 2.7 1.2 5.7 2.1 8.8 2.6.5.1 1 0 1.5 0 1 .1 2 0 3 0 2.7.1 5.3-.2 7.9-.7 1-.2 2-.4 3-.7 3.3-1 6.5-2.4 9.3-4.4.1 0 .1 0 .1-.1 2.2-1.8 4.2-3.7 5.9-6z">
                        </path>
                    </symbol>
                    <symbol id="rotate-clockwise-180" viewbox="0 0 1792 1792">
                        <path d="M1288.3 606.8c10.5 10.5 19.4 24.7 26.9 42.6 7.5 17.9 11.2 34.4 11.2 49.3v645.6c0 14.9-5.2 27.6-15.7 38.1s-23.2 15.7-38.1 15.7H519.4c-14.9 0-27.6-5.2-38.1-15.7s-15.7-23.2-15.7-38.1V447.7c0-14.9 5.2-27.6 15.7-38.1s23.2-15.7 38.1-15.7h502.1c14.9 0 31.4 3.7 49.3 11.2 17.9 7.5 32.1 16.4 42.6 26.9l174.9 174.8zm-248.8-136.7v210.7h210.7c-3.7-10.8-7.8-18.5-12.3-23l-175.4-175.4c-4.5-4.5-12.2-8.6-23-12.3zm215.2 856.3V752.5h-233.1c-14.9 0-27.6-5.2-38.1-15.7s-15.7-23.2-15.7-38.1V465.6H537.3v860.8h717.4zm-71.8-251.1v179.3H609.1V1147l107.6-107.6 71.7 71.7L1003.6 896l179.3 179.3zM716.7 967.7c-29.9 0-55.3-10.5-76.2-31.4-20.9-20.9-31.4-46.3-31.4-76.2s10.5-55.3 31.4-76.2c20.9-20.9 46.3-31.4 76.2-31.4 29.9 0 55.3 10.5 76.2 31.4s31.4 46.3 31.4 76.2-10.5 55.3-31.4 76.2-46.3 31.4-76.2 31.4z">
                        </path>
                        <path d="M781.2 197.5c0-.1.1-.1.1-.2 2-2.7 3.4-5.9 4.4-9.3.3-1 .5-2 .7-3 .5-2.6.8-5.2.7-7.9 0-1 .1-1.9 0-3v-1.5c-.5-3.1-1.3-6-2.6-8.8-.1-.3-.3-.5-.5-.8-1.4-3-3.3-5.6-5.5-8-.3-.3-.4-.8-.8-1.1L629.8 7.7c-11.3-11.2-28.2-10-37.7 2.8-9.5 12.8-8 32.2 3.4 43.4l79.8 78.9c-106.9-4.8-208.9 26.6-213.7 28.1C146 247.1-55.1 563.2 13.4 865.5c3.4 15 15.6 24.8 28.5 23.6 1.4-.1 2.7-.4 4.1-.7 14.3-3.9 22.8-20.5 19.1-37C4.2 582.1 188.1 299.2 476 220.6c1.3-.4 106.6-32.9 209.1-25.8l-105.8 76.1c-12.4 8.9-15.9 27.9-7.8 42.4 8 14.5 24.6 18.9 37 10.1l166.8-119.9c2.3-1.8 4.2-3.8 5.9-6zM1010.8 1594.5c0 .1-.1.1-.1.2-2 2.7-3.4 5.9-4.4 9.3-.3 1-.5 2-.7 3-.5 2.6-.8 5.2-.7 7.9 0 1-.1 1.9 0 3v1.5c.5 3.1 1.3 6 2.6 8.8.1.3.3.5.5.8 1.4 3 3.3 5.6 5.5 8 .3.3.4.8.8 1.1l148 146.3c11.3 11.2 28.2 10 37.7-2.8 9.5-12.8 8-32.2-3.4-43.4l-79.8-78.9c106.9 4.8 208.9-26.6 213.7-28.1 315.7-86.2 516.7-402.3 448.2-704.6-3.4-15-15.6-24.8-28.5-23.6-1.4.1-2.7.4-4.1.7-14.3 3.9-22.8 20.5-19.1 37 61 269.3-122.9 552.1-410.9 630.8-1.3.4-106.6 32.9-209.1 25.8l105.8-76.1c12.4-8.9 15.9-27.9 7.8-42.4-8-14.5-24.6-18.9-37-10.1l-166.8 119.9c-2.4 1.7-4.3 3.7-6 5.9z">
                        </path>
                    </symbol>
                    <symbol id="rotate-clockwise-90" viewbox="0 0 1792 1792">
                        <path d="M1288.3 606.8c10.5 10.5 19.4 24.7 26.9 42.6 7.5 17.9 11.2 34.4 11.2 49.3v645.6c0 14.9-5.2 27.6-15.7 38.1s-23.2 15.7-38.1 15.7H519.4c-14.9 0-27.6-5.2-38.1-15.7s-15.7-23.2-15.7-38.1V447.7c0-14.9 5.2-27.6 15.7-38.1s23.2-15.7 38.1-15.7h502.1c14.9 0 31.4 3.7 49.3 11.2 17.9 7.5 32.1 16.4 42.6 26.9l174.9 174.8zm-248.8-136.7v210.7h210.7c-3.7-10.8-7.8-18.5-12.3-23l-175.4-175.4c-4.5-4.5-12.2-8.6-23-12.3zm215.2 856.3V752.5h-233.1c-14.9 0-27.6-5.2-38.1-15.7s-15.7-23.2-15.7-38.1V465.6H537.3v860.8h717.4zm-71.8-251.1v179.3H609.1V1147l107.6-107.6 71.7 71.7L1003.6 896l179.3 179.3zM716.7 967.7c-29.9 0-55.3-10.5-76.2-31.4-20.9-20.9-31.4-46.3-31.4-76.2s10.5-55.3 31.4-76.2c20.9-20.9 46.3-31.4 76.2-31.4 29.9 0 55.3 10.5 76.2 31.4s31.4 46.3 31.4 76.2-10.5 55.3-31.4 76.2-46.3 31.4-76.2 31.4z">
                        </path>
                        <path d="M781.2 197.5c0-.1.1-.1.1-.2 2-2.7 3.4-5.9 4.4-9.3.3-1 .5-2 .7-3 .5-2.6.8-5.2.7-7.9 0-1 .1-1.9 0-3v-1.5c-.5-3.1-1.3-6-2.6-8.8-.1-.3-.3-.5-.5-.8-1.4-3-3.3-5.6-5.5-8-.3-.3-.4-.8-.8-1.1L629.8 7.7c-11.3-11.2-28.2-10-37.7 2.8-9.5 12.8-8 32.2 3.4 43.4l79.8 78.9c-106.9-4.8-208.9 26.6-213.7 28.1C146 247.1-55.1 563.2 13.4 865.5c3.4 15 15.6 24.8 28.5 23.6 1.4-.1 2.7-.4 4.1-.7 14.3-3.9 22.8-20.5 19.1-37C4.2 582.1 188.1 299.2 476 220.6c1.3-.4 106.6-32.9 209.1-25.8l-105.8 76.1c-12.4 8.9-15.9 27.9-7.8 42.4 8 14.5 24.6 18.9 37 10.1l166.8-119.9c2.3-1.8 4.2-3.8 5.9-6z">
                        </path>
                    </symbol>
                    <!-- file types -->
                    <symbol id="file-archive-o" viewbox="0 0 1792 1792">
                        <path d="M768 384v-128h-128v128h128zm128 128v-128h-128v128h128zm-128 128v-128h-128v128h128zm128 128v-128h-128v128h128zm700-388q28 28 48 76t20 88v1152q0 40-28 68t-68 28h-1344q-40 0-68-28t-28-68v-1600q0-40 28-68t68-28h896q40 0 88 20t76 48zm-444-244v376h376q-10-29-22-41l-313-313q-12-12-41-22zm384 1528v-1024h-416q-40 0-68-28t-28-68v-416h-128v128h-128v-128h-512v1536h1280zm-627-721l107 349q8 27 8 52 0 83-72.5 137.5t-183.5 54.5-183.5-54.5-72.5-137.5q0-25 8-52 21-63 120-396v-128h128v128h79q22 0 39 13t23 34zm-141 465q53 0 90.5-19t37.5-45-37.5-45-90.5-19-90.5 19-37.5 45 37.5 45 90.5 19z">
                        </path>
                    </symbol>
                    <symbol id="file-audio-o" viewbox="0 0 1792 1792">
                        <path d="M1596 380q28 28 48 76t20 88v1152q0 40-28 68t-68 28h-1344q-40 0-68-28t-28-68v-1600q0-40 28-68t68-28h896q40 0 88 20t76 48zm-444-244v376h376q-10-29-22-41l-313-313q-12-12-41-22zm384 1528v-1024h-416q-40 0-68-28t-28-68v-416h-768v1536h1280zm-788-814q20 8 20 30v544q0 22-20 30-8 2-12 2-12 0-23-9l-166-167h-131q-14 0-23-9t-9-23v-192q0-14 9-23t23-9h131l166-167q16-15 35-7zm417 689q31 0 50-24 129-159 129-363t-129-363q-16-21-43-24t-47 14q-21 17-23.5 43.5t14.5 47.5q100 123 100 282t-100 282q-17 21-14.5 47.5t23.5 42.5q18 15 40 15zm-211-148q27 0 47-20 87-93 87-219t-87-219q-18-19-45-20t-46 17-20 44.5 18 46.5q52 57 52 131t-52 131q-19 20-18 46.5t20 44.5q20 17 44 17z">
                        </path>
                    </symbol>
                    <symbol id="file-code-o" viewbox="0 0 1792 1792">
                        <path d="M1596 380q28 28 48 76t20 88v1152q0 40-28 68t-68 28h-1344q-40 0-68-28t-28-68v-1600q0-40 28-68t68-28h896q40 0 88 20t76 48zm-444-244v376h376q-10-29-22-41l-313-313q-12-12-41-22zm384 1528v-1024h-416q-40 0-68-28t-28-68v-416h-768v1536h1280zm-928-896q8-11 21-12.5t24 6.5l51 38q11 8 12.5 21t-6.5 24l-182 243 182 243q8 11 6.5 24t-12.5 21l-51 38q-11 8-24 6.5t-21-12.5l-226-301q-14-19 0-38zm802 301q14 19 0 38l-226 301q-8 11-21 12.5t-24-6.5l-51-38q-11-8-12.5-21t6.5-24l182-243-182-243q-8-11-6.5-24t12.5-21l51-38q11-8 24-6.5t21 12.5zm-620 461q-13-2-20.5-13t-5.5-24l138-831q2-13 13-20.5t24-5.5l63 10q13 2 20.5 13t5.5 24l-138 831q-2 13-13 20.5t-24 5.5z">
                        </path>
                    </symbol>
                    <symbol id="file-excel-o" viewbox="0 0 1792 1792">
                        <path d="M1596 380q28 28 48 76t20 88v1152q0 40-28 68t-68 28h-1344q-40 0-68-28t-28-68v-1600q0-40 28-68t68-28h896q40 0 88 20t76 48zm-444-244v376h376q-10-29-22-41l-313-313q-12-12-41-22zm384 1528v-1024h-416q-40 0-68-28t-28-68v-416h-768v1536h1280zm-979-234v106h281v-106h-75l103-161q5-7 10-16.5t7.5-13.5 3.5-4h2q1 4 5 10 2 4 4.5 7.5t6 8 6.5 8.5l107 161h-76v106h291v-106h-68l-192-273 195-282h67v-107h-279v107h74l-103 159q-4 7-10 16.5t-9 13.5l-2 3h-2q-1-4-5-10-6-11-17-23l-106-159h76v-107h-290v107h68l189 272-194 283h-68z">
                        </path>
                    </symbol>
                    <symbol id="file-image-o" viewbox="0 0 1792 1792">
                        <path d="M1596 380q28 28 48 76t20 88v1152q0 40-28 68t-68 28h-1344q-40 0-68-28t-28-68v-1600q0-40 28-68t68-28h896q40 0 88 20t76 48zm-444-244v376h376q-10-29-22-41l-313-313q-12-12-41-22zm384 1528v-1024h-416q-40 0-68-28t-28-68v-416h-768v1536h1280zm-128-448v320h-1024v-192l192-192 128 128 384-384zm-832-192q-80 0-136-56t-56-136 56-136 136-56 136 56 56 136-56 136-136 56z">
                        </path>
                    </symbol>
                    <symbol id="file-o" viewbox="0 0 1792 1792">
                        <path d="M1596 380q28 28 48 76t20 88v1152q0 40-28 68t-68 28h-1344q-40 0-68-28t-28-68v-1600q0-40 28-68t68-28h896q40 0 88 20t76 48zm-444-244v376h376q-10-29-22-41l-313-313q-12-12-41-22zm384 1528v-1024h-416q-40 0-68-28t-28-68v-416h-768v1536h1280z">
                        </path>
                    </symbol>
                    <symbol id="file-pdf-o" viewbox="0 0 1792 1792">
                        <path d="M1596 380q28 28 48 76t20 88v1152q0 40-28 68t-68 28h-1344q-40 0-68-28t-28-68v-1600q0-40 28-68t68-28h896q40 0 88 20t76 48zm-444-244v376h376q-10-29-22-41l-313-313q-12-12-41-22zm384 1528v-1024h-416q-40 0-68-28t-28-68v-416h-768v1536h1280zm-514-593q33 26 84 56 59-7 117-7 147 0 177 49 16 22 2 52 0 1-1 2l-2 2v1q-6 38-71 38-48 0-115-20t-130-53q-221 24-392 83-153 262-242 262-15 0-28-7l-24-12q-1-1-6-5-10-10-6-36 9-40 56-91.5t132-96.5q14-9 23 6 2 2 2 4 52-85 107-197 68-136 104-262-24-82-30.5-159.5t6.5-127.5q11-40 42-40h22q23 0 35 15 18 21 9 68-2 6-4 8 1 3 1 8v30q-2 123-14 192 55 164 146 238zm-576 411q52-24 137-158-51 40-87.5 84t-49.5 74zm398-920q-15 42-2 132 1-7 7-44 0-3 7-43 1-4 4-8-1-1-1-2-1-2-1-3-1-22-13-36 0 1-1 2v2zm-124 661q135-54 284-81-2-1-13-9.5t-16-13.5q-76-67-127-176-27 86-83 197-30 56-45 83zm646-16q-24-24-140-24 76 28 124 28 14 0 18-1 0-1-2-3z">
                        </path>
                    </symbol>
                    <symbol id="file-powerpoint-o" viewbox="0 0 1792 1792">
                        <path d="M1596 380q28 28 48 76t20 88v1152q0 40-28 68t-68 28h-1344q-40 0-68-28t-28-68v-1600q0-40 28-68t68-28h896q40 0 88 20t76 48zm-444-244v376h376q-10-29-22-41l-313-313q-12-12-41-22zm384 1528v-1024h-416q-40 0-68-28t-28-68v-416h-768v1536h1280zm-992-234v106h327v-106h-93v-167h137q76 0 118-15 67-23 106.5-87t39.5-146q0-81-37-141t-100-87q-48-19-130-19h-368v107h92v555h-92zm353-280h-119v-268h120q52 0 83 18 56 33 56 115 0 89-62 120-31 15-78 15z">
                        </path>
                    </symbol>
                    <symbol id="file-text-o" viewbox="0 0 1792 1792">
                        <path d="M1596 380q28 28 48 76t20 88v1152q0 40-28 68t-68 28h-1344q-40 0-68-28t-28-68v-1600q0-40 28-68t68-28h896q40 0 88 20t76 48zm-444-244v376h376q-10-29-22-41l-313-313q-12-12-41-22zm384 1528v-1024h-416q-40 0-68-28t-28-68v-416h-768v1536h1280zm-1024-864q0-14 9-23t23-9h704q14 0 23 9t9 23v64q0 14-9 23t-23 9h-704q-14 0-23-9t-9-23v-64zm736 224q14 0 23 9t9 23v64q0 14-9 23t-23 9h-704q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h704zm0 256q14 0 23 9t9 23v64q0 14-9 23t-23 9h-704q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h704z">
                        </path>
                    </symbol>
                    <symbol id="file-video-o" viewbox="0 0 1792 1792">
                        <path d="M1596 380q28 28 48 76t20 88v1152q0 40-28 68t-68 28h-1344q-40 0-68-28t-28-68v-1600q0-40 28-68t68-28h896q40 0 88 20t76 48zm-444-244v376h376q-10-29-22-41l-313-313q-12-12-41-22zm384 1528v-1024h-416q-40 0-68-28t-28-68v-416h-768v1536h1280zm-640-896q52 0 90 38t38 90v384q0 52-38 90t-90 38h-384q-52 0-90-38t-38-90v-384q0-52 38-90t90-38h384zm492 2q20 8 20 30v576q0 22-20 30-8 2-12 2-14 0-23-9l-265-266v-90l265-266q9-9 23-9 4 0 12 2z">
                        </path>
                    </symbol>
                    <symbol id="file-word-o" viewbox="0 0 1792 1792">
                        <path d="M1596 380q28 28 48 76t20 88v1152q0 40-28 68t-68 28h-1344q-40 0-68-28t-28-68v-1600q0-40 28-68t68-28h896q40 0 88 20t76 48zm-444-244v376h376q-10-29-22-41l-313-313q-12-12-41-22zm384 1528v-1024h-416q-40 0-68-28t-28-68v-416h-768v1536h1280zm-1175-896v107h70l164 661h159l128-485q7-20 10-46 2-16 2-24h4l3 24q1 3 3.5 20t5.5 26l128 485h159l164-661h70v-107h-300v107h90l-99 438q-5 20-7 46l-2 21h-4q0-3-.5-6.5t-1.5-8-1-6.5q-1-5-4-21t-5-25l-144-545h-114l-144 545q-2 9-4.5 24.5t-3.5 21.5l-4 21h-4l-2-21q-2-26-7-46l-99-438h90v-107h-300z">
                        </path>
                    </symbol>
                    <!-- content explorer -->
                    <symbol id="search" viewbox="0 0 1792 1792">
                        <path d="M1216 832q0-185-131.5-316.5t-316.5-131.5-316.5 131.5-131.5 316.5 131.5 316.5 316.5 131.5 316.5-131.5 131.5-316.5zm512 832q0 52-38 90t-90 38q-54 0-90-38l-343-342q-179 124-399 124-143 0-273.5-55.5t-225-150-150-225-55.5-273.5 55.5-273.5 150-225 225-150 273.5-55.5 273.5 55.5 225 150 150 225 55.5 273.5q0 220-124 399l343 343q37 37 37 90z">
                        </path>
                    </symbol>
                    <symbol id="chevron-right" viewbox="0 0 1792 1792">
                        <path d="M1363 877l-742 742q-19 19-45 19t-45-19l-166-166q-19-19-19-45t19-45l531-531-531-531q-19-19-19-45t19-45l166-166q19-19 45-19t45 19l742 742q19 19 19 45t-19 45z">
                        </path>
                    </symbol>
                    <symbol id="spinner" viewbox="0 0 1792 1792">
                        <path d="M526 1394q0 53-37.5 90.5t-90.5 37.5q-52 0-90-38t-38-90q0-53 37.5-90.5t90.5-37.5 90.5 37.5 37.5 90.5zm498 206q0 53-37.5 90.5t-90.5 37.5-90.5-37.5-37.5-90.5 37.5-90.5 90.5-37.5 90.5 37.5 37.5 90.5zm-704-704q0 53-37.5 90.5t-90.5 37.5-90.5-37.5-37.5-90.5 37.5-90.5 90.5-37.5 90.5 37.5 37.5 90.5zm1202 498q0 52-38 90t-90 38q-53 0-90.5-37.5t-37.5-90.5 37.5-90.5 90.5-37.5 90.5 37.5 37.5 90.5zm-964-996q0 66-47 113t-113 47-113-47-47-113 47-113 113-47 113 47 47 113zm1170 498q0 53-37.5 90.5t-90.5 37.5-90.5-37.5-37.5-90.5 37.5-90.5 90.5-37.5 90.5 37.5 37.5 90.5zm-640-704q0 80-56 136t-136 56-136-56-56-136 56-136 136-56 136 56 56 136zm530 206q0 93-66 158.5t-158 65.5q-93 0-158.5-65.5t-65.5-158.5q0-92 65.5-158t158.5-66q92 0 158 66t66 158z">
                        </path>
                    </symbol>
                    <symbol id="filter" viewbox="0 0 1792 1792">
                        <path d="M1595 295q17 41-14 70l-493 493v742q0 42-39 59-13 5-25 5-27 0-45-19l-256-256q-19-19-19-45v-486l-493-493q-31-29-14-70 17-39 59-39h1280q42 0 59 39z">
                        </path>
                    </symbol>
                    <symbol id="listView" viewbox="0 0 1792 1792">
                        <path d="M512 1248v192q0 40-28 68t-68 28h-320q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h320q40 0 68 28t28 68zm0-512v192q0 40-28 68t-68 28h-320q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h320q40 0 68 28t28 68zm1280 512v192q0 40-28 68t-68 28h-960q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h960q40 0 68 28t28 68zm-1280-1024v192q0 40-28 68t-68 28h-320q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h320q40 0 68 28t28 68zm1280 512v192q0 40-28 68t-68 28h-960q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h960q40 0 68 28t28 68zm0-512v192q0 40-28 68t-68 28h-960q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h960q40 0 68 28t28 68z">
                        </path>
                    </symbol>
                    <symbol id="thumbView" viewbox="0 0 1792 1792">
                        <path d="M832 1024v384q0 52-38 90t-90 38h-512q-52 0-90-38t-38-90v-384q0-52 38-90t90-38h512q52 0 90 38t38 90zm0-768v384q0 52-38 90t-90 38h-512q-52 0-90-38t-38-90v-384q0-52 38-90t90-38h512q52 0 90 38t38 90zm896 768v384q0 52-38 90t-90 38h-512q-52 0-90-38t-38-90v-384q0-52 38-90t90-38h512q52 0 90 38t38 90zm0-768v384q0 52-38 90t-90 38h-512q-52 0-90-38t-38-90v-384q0-52 38-90t90-38h512q52 0 90 38t38 90z">
                        </path>
                    </symbol>
                    <!-- links editor -->
                    <symbol id="DocTypeLink" viewbox="0 0 1536 1792">
                        <path d="M1430 242.5l-6.1-6.1c-141.3-140.6-372.3-140.6-513.5 0l-327.1 326c-141.2 140.6-141.2 370.8 0 511.4l6 6c11.7 11.7 24.3 22.3 37.1 32.1l119.7-119.3c-14-8.2-27.2-18-39.2-30l-6.1-6.1c-76.6-76.3-76.6-200.6 0-277L1028 353.6c76.7-76.4 201.4-76.4 278.1 0l6.1 6c76.6 76.4 76.6 200.6 0 277l-148 147.4c25.7 63.2 37.9 130.6 36.8 197.8l228.9-228c141.4-140.5 141.4-370.6.1-511.3zM946.5 712.1c-11.7-11.7-24.3-22.3-37.1-32L789.7 799.4c14 8.2 27.2 18 39.2 30l6.1 6.1c76.7 76.4 76.7 200.6 0 277l-327.2 325.9c-76.7 76.3-201.4 76.3-278.1 0l-6.1-6.1c-76.6-76.4-76.6-200.6 0-277l147.9-147.4c-25.7-63.2-37.9-130.6-36.8-197.8l-228.9 228c-141.2 140.6-141.2 370.8 0 511.5l6 6.1c141.3 140.6 372.3 140.6 513.5 0l327.2-325.9c141.2-140.6 141.2-370.8 0-511.5l-6-6.2z">
                        </path>
                    </symbol>
                    <symbol id="external-link" viewbox="0 0 1792 1792">
                        <path d="M1408 928v320q0 119-84.5 203.5t-203.5 84.5h-832q-119 0-203.5-84.5t-84.5-203.5v-832q0-119 84.5-203.5t203.5-84.5h704q14 0 23 9t9 23v64q0 14-9 23t-23 9h-704q-66 0-113 47t-47 113v832q0 66 47 113t113 47h832q66 0 113-47t47-113v-320q0-14 9-23t23-9h64q14 0 23 9t9 23zm384-864v512q0 26-19 45t-45 19-45-19l-176-176-652 652q-10 10-23 10t-23-10l-114-114q-10-10-10-23t10-23l652-652-176-176q-19-19-19-45t19-45 45-19h512q26 0 45 19t19 45z">
                        </path>
                    </symbol>
                    <symbol id="clock" viewbox="0 0 1792 1792">
                        <path d="M1024 544v448q0 14-9 23t-23 9h-320q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h224v-352q0-14 9-23t23-9h64q14 0 23 9t9 23zm416 352q0-148-73-273t-198-198-273-73-273 73-198 198-73 273 73 273 198 198 273 73 273-73 198-198 73-273zm224 0q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                        </path>
                    </symbol>
                    <symbol id="envelope" viewbox="0 0 1792 1792">
                        <path d="M1664 1504v-768q-32 36-69 66-268 206-426 338-51 43-83 67t-86.5 48.5-102.5 24.5h-2q-48 0-102.5-24.5t-86.5-48.5-83-67q-158-132-426-338-37-30-69-66v768q0 13 9.5 22.5t22.5 9.5h1472q13 0 22.5-9.5t9.5-22.5zm0-1051v-24.5l-.5-13-3-12.5-5.5-9-9-7.5-14-2.5h-1472q-13 0-22.5 9.5t-9.5 22.5q0 168 147 284 193 152 401 317 6 5 35 29.5t46 37.5 44.5 31.5 50.5 27.5 43 9h2q20 0 43-9t50.5-27.5 44.5-31.5 46-37.5 35-29.5q208-165 401-317 54-43 100.5-115.5t46.5-131.5zm128-37v1088q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-1088q0-66 47-113t113-47h1472q66 0 113 47t47 113z">
                        </path>
                    </symbol>
                    <symbol id="phone" viewbox="0 0 1792 1792">
                        <path d="M1600 1240q0 27-10 70.5t-21 68.5q-21 50-122 106-94 51-186 51-27 0-53-3.5t-57.5-12.5-47-14.5-55.5-20.5-49-18q-98-35-175-83-127-79-264-216t-216-264q-48-77-83-175-3-9-18-49t-20.5-55.5-14.5-47-12.5-57.5-3.5-53q0-92 51-186 56-101 106-122 25-11 68.5-21t70.5-10q14 0 21 3 18 6 53 76 11 19 30 54t35 63.5 31 53.5q3 4 17.5 25t21.5 35.5 7 28.5q0 20-28.5 50t-62 55-62 53-28.5 46q0 9 5 22.5t8.5 20.5 14 24 11.5 19q76 137 174 235t235 174q2 1 19 11.5t24 14 20.5 8.5 22.5 5q18 0 46-28.5t53-62 55-62 50-28.5q14 0 28.5 7t35.5 21.5 25 17.5q25 15 53.5 31t63.5 35 54 30q70 35 76 53 3 7 3 21z">
                        </path>
                    </symbol>
                    <symbol id="anchor" viewbox="0 0 1814.3 1802.2">
                        <path d="M1797.1 1112L1638 846.3c-6.6-11-18.2-18.1-31-19-12.8-.9-25.2 4.6-33.3 14.6L1380 1083.5c-11.3 14.2-11.5 34.2-.4 48.5 11.1 14.3 30.5 19.2 47.1 11.8l94.7-42.6c-46.9 158.9-167.8 261.6-323.2 333.7l-300.7-817 80-29.5c16.4 4.9 34.5 4.9 51.8-1.5 42.9-15.8 64.8-63.3 49.1-106.2-15.8-42.9-63.3-64.8-106.2-49.1-17.4 6.4-31 18.1-40.4 32.5l-80 29.4-41.3-112.2c34.4-47 45.5-109.8 23.9-168.5-34.3-93.1-137.9-141-231-106.7s-141 137.9-106.7 231c21.6 58.6 70.7 99.2 127.4 112.7L665.4 562l-80 29.4c-16.4-4.9-34.5-4.9-51.8 1.5-42.9 15.8-64.8 63.3-49.1 106.2 15.8 42.9 63.3 64.8 106.2 49 17.3-6.4 31-18.1 40.4-32.4l80-29.5 300.7 817c-165.1 45.9-323.7 46.1-462.4-44.5l99.7-29c17.4-5.1 29.1-21.4 28.2-39.5-.8-18.1-14-33.3-31.8-36.7l-304.1-58.4c-12.6-2.4-25.6 1.5-34.8 10.5-9.2 9-13.4 21.9-11.3 34.5l51.1 305.5c3 17.9 17.8 31.4 35.9 32.6 18.1 1.3 34.7-10 40.2-27.3l30.5-96.3c181.2 142.1 416.4 230.3 637 194.5l106.6 49.2c19.7 9.1 43 .5 52-19.1l49.2-106.6c191.2-115.7 313.1-335.4 359-561l85.6 53.5c15.4 9.6 35.3 7.5 48.3-5.3 13.1-12.3 15.7-32.2 6.4-47.8zM649.2 230.5c24.6-9.1 52 3.6 61 28.2s-3.6 52-28.2 61c-24.6 9.1-52-3.6-61-28.2-9.1-24.6 3.6-51.9 28.2-61z">
                        </path>
                    </symbol>
                </svg>
            </div>
            <div class="loading hide">
                <img alt="Please Wait" src="data:image/gif;base64,R0lGODlhggA8ANUvAP///8/Pz5mZmfn5+bS0tOTk5Pb29u7u7f39/fLy8erq6qCgoPj4+Ovr6/Hx8a2traenp9bW1ru7u93d3d32hdb2bMnJyc/2Ucj1OPP62OL4mO37wfD7y/r98MP1Jrz1D+r5t/b75Of5qOLyqP3++MD2HeTxuO/z4MLCwvb37ebuyejt2Ovyz+rr5fT17////wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh+QQFAAAvACwAAAAAggA8AAAG/8CXUAgoGo/IpHLJbDqf0Kh0SH1Jr9isdqutcr/gsNg5HJvP6CwxzW67Ada3fE6v2+/4vN4eIIwFBQB9e4RLg2KAAA4NhY1Hh0gNAQEORgwRk5VFDpMMiYuKDZwBDEYFAREMgY5ukEYoAgQPAhEADA8LBBAClQ0LEA+zgYMBEBAEv0URAg8QCwKsrX5HDQITRRYLABMLpQAPAQASEkUBicQCjNWBC+Hi0NFsroIPlokABRHZ4dZFnsN+IAEqIMDbBHjx0MxzBcgXMwkQ+K0CcC7gNIoFCJpCmNDMvAjdihB0MM5IRAAnAawTZNEIIAfpynHsKCbAg4wZHTDIVWDCMf9xDyZMkCAgXIAFESYIY8m0SCJZE0DCE1WEKj5vNKOYE8C1qEoCAhagKNUA7AILFuoJWoC0YlOMtohCsACPgDu7TidmpSlBUwQIewM70RVgn+DDShj0IVALsePHkCNLnky5suXLmDOjQTCgc4oQGThwyKCZEOfOAz6H3gBChAjSpe+cRp3iBIcNJkRo0EBBROw6swcgQHCERAYRFChU2PBbzmziTDZUmB6iuRvUA56IqHChgnU2s6NwxwD7u5kBBgxAf7IBAwYKAKqbF5PegJQO7kuUkD//C4L02UEhwgUYeFACfP2B8Z8BAULBQQUleNBBggoCeAUJt1FYYXpXJMCLoIZgeGifFAcocACIXxiQQALrOWFAiSeiuMUAK474RIkK2CgjFgismECDTBigwJA7ckHjAR62eESPQypQZIoHRPljEi82mcCTXwwQ5ZYJIBllkzliCYaWW5oI5pA6irnFf1+eqZ6aZgQHJJx01mnnnXjm+UUceoaxRp9glAEoF14MqkYVfxpKBhVBAAAh+QQFAAAvACw/ABsADwASAAAGbcCBcGAYIADIJFJoaBpcqaMSQGxCT5lMaqpEpDIcjqnDVZIyJtCIVE6SOCPNqO0WaSghOpJDoYj0SBQVFIAAghcDgBQXFxmKFxgcdBkIFRgYjm0akJdkdJAeoZllGR4lFJ5lRSB5bQguCgqJSUEAIfkEBQAALwAsQwAcAAsAFQAABnDA18tgEBqFxOTgKEQYEs8lEzFwJRIIpjB1Orm0QpZYqlVtTuCXaWRKi0ajNIiiCYFHFEqGCQBoKhQpfB0VhQBaIhcXI31CeySKFyeHQhUhFBgYFVlGFRgeoHZGCBQloBRMBhQfrCKpG3l5HUcHaS9BACH5BAUAAC8ALD8AHwAOABQAAAZ0QIBwCBgkjgiiEmA4JpZEhHMAHRqP1eFhmxWeTgdq9rQ6iaus9BlqMqk6WcSo3c2M5tmBhqLJZEUUgUlDfgAIGhWJhUIdFwAcFRcXFSNDCYcYFxiZFyJEBx0eopsXG0oGIiUfJR4UIUsIAxseH69dABogVUEAIfkEBQAALwAsOgAjABMAEAAABnjAl3BILCaKyGTikGwKl0wn0nWISomn1mFwHQJWq1Z3GFKtrFeSSaVyjV+b0Rq52QgBQ9NInnoaOhUYIS8AeBkaFBojK0MDHB4lJRgYFxcvFRUUFBlECBklHyUek5WYIydJFB8fHqOVFCAkTR0lHFwDuHhSIkWFTUEAIfkEBQAALwAsNgAmABYADQAABnfAl3BILBITxqQycVA6hwdF02B4Fg3RFyKz2XA4oScgqqhSPh9PpfNMtRQK4TmtEQIARdJp9R4IN2glGBUZd0N6Kip8SH8YF4KOFSMmICYjk4pVQxtsGhiOFxUUo5cmKi5OJBoVoaIUkykIVnchICBfKVZEeLovQQAh+QQFAAAvACw0ACQAFQAOAAAGesDXayAsGo9IzguBbBozH4ym43RWPh8PBlQ9grClS6h7FG0wJYySfNRgMBUSAMAWdt4XzbyKMCiKIBcXFRQkTggJCn9CABqDFRprRQApB4qLL3MbFYQaIyYsLCcrLZdGexwaFCOfJiqklwZOAxysrq+lsmwdKR0Dv0dBACH5BAUAAC8ALDQAHwATABMAAAZ7wJfwhRgaj8hMEcl8bUqfTvO4wXyulSn1Uyp5QNrh04PhgMMvDjmLFnIwrwqgTcRc5PMwAFC5vEhtexoVbHQchBR5aAgaFBRnU4ohFBoaG3QvGSObICFLQwZMmiYmKiwnJweqCk0pLCoqKystCrVaCC4nLbS1rIsDA0hBACH5BAUAAC8ALDQAHAAOABUAAAZ4wJdwQyR2hEhkB/NpbpLQSvPzhApBnpLHo7EKLx4MhdK1gjCXSqdTRQIAlMulbSXJK2/vK1SpaPJ6YyB6Q2N0VhkaGodQJCKPAIQvIJQhkiEqJhwIkicsLJaEAyekKZx6BgeqCQORXgOqsQkHCVawsQoHhKkHCkJBACH5BAUAAC8ALDUAGQAPABQAAAZ4QIBwKOwQj8cQhoM8biqfT6UzGBw5F4+n9ClRDUTQ5YLBaCkIA1iIHVdAGowRgBCGKnhRUYPUUCp6TWx+fIJCcBohhgAkICIgiwAdICAZkR0cG5aLKRksioskJxmgiwkhJ5EABgkudYsDCQlrhgiyCVawCQezr0dBACH5BAUAAC8ALDUAGQAUABEAAAZ5wJdwKAQQhaGj8gVoDjuXJbGzoVgrlUtJJCWBrtkLBlPCdJQdkUZDwV7EGE9pgzA8QSD1JuQkYS4ZCEQkGRsgHCRMRi8cGolHKRkcGUuPRwiRGZZSRAMpJ2ecRwAGBimboi91BgOpl6WtrkOrsbKqpXa2Q6W6RAm9QQAh+QQFAAAvACw3ABkAFQALAAAGZECAcEgsGo/IpJCU2Yg0FIpmE0oiUhmOUxStXC6UKqAzRBhCWdCz68VgRKKNEDEYoDPkIUdzcXs+cnR1HXlGHRUYJR8gAHV1JEoZHn8UjXUIkRReFyIZBgaYSmV0nwaiRQkHB0EAOw==" />
            </div>
        </section>
    </div>
    <script>
        const basicInfo = document.getElementById("SubscriptionSlide1");
        const interest = document.getElementById("SubscriptionSlide2");
        const geoInfo = document.getElementById("SubscriptionSlide3");
        const subsLevel = document.getElementById("SubscriptionSlide4");

        const firstNameErrorDiv = document.getElementById("first_name_err");
        const lastNameErrorDiv = document.getElementById("last_name_err");
        const countryIdErrorDiv = document.getElementById("country_err");
        const stateIdErrorDiv = document.getElementById("state_err");
        const addressLine1ErrorDiv = document.getElementById("address_line_1_err");
        const postalCodeErrorDiv = document.getElementById("postal_code_err");
        const cityErrorDiv = document.getElementById("city_err");


        function saveProfileData() {
            const routerForm = document.getElementById("routerForm");

            var formData = new FormData(routerForm);
            var serializedData = {};

            for (var pair of formData.entries()) {
                serializedData[pair[0]] = pair[1];
            }

            var interests = formData.getAll('interests[]');
            var states = formData.getAll('states[]');

            // Store the values in the serializedData object
            serializedData['interests'] = interests;
            serializedData['states'] = states;

            var csrfToken = `{{ csrf_token() }}`;

            firstNameErrorDiv.innerHTML = "";
            lastNameErrorDiv.innerHTML = "";
            countryIdErrorDiv.innerHTML = "";
            stateIdErrorDiv.innerHTML = "";
            addressLine1ErrorDiv.innerHTML = "";
            postalCodeErrorDiv.innerHTML = "";
            cityErrorDiv.innerHTML = "";

            return fetch('/update-profile-api', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify(serializedData)
                })
                .then(response => response.json())
                .then(data => {
                    // Handle the API response
                    if (data.errors) {
                        firstNameErrorDiv.innerHTML = data.errors.first_name ? data.errors.first_name[0] : "";
                        lastNameErrorDiv.innerHTML = data.errors.last_name ? data.errors.last_name[0] : "";
                        countryIdErrorDiv.innerHTML = data.errors.country ? data.errors.country[0] : "";
                        stateIdErrorDiv.innerHTML = data.errors.state ? data.errors.state[0] : "";
                        addressLine1ErrorDiv.innerHTML = data.errors.address_line_1 ? data.errors.address_line_1[0] : "";
                        postalCodeErrorDiv.innerHTML = data.errors.postal_code ? data.errors.postal_code[0] : "";
                        cityErrorDiv.innerHTML = data.errors.city ? data.errors.city[0] : "";
                        return true; // Return true inside the .then() callback
                    }
                    return false;
                })
                .catch(error => {
                    // Handle any errors
                    console.error('Error:', error);
                    return true; // Return true in case of an error
                });
        }

        function changeTab(tabId) {
            saveProfileData().then(result => {
                if (result === true) {
                    // Handle the case when the result is true
                    console.log("Result is true");
                    console.log(tabId);
                } else {
                    nextTab(tabId);
                    console.log(tabId);
                }
            });
        }

        function nextTab(tabId) {
            switch (tabId) {
                case 0:
                    basicInfo.style = "display: block;"
                    interest.style = "display: none;"
                    geoInfo.style = "display: none;"
                    subsLevel.style = "display: none;"
                    break;
                case 1:
                    basicInfo.style = "display: none;"
                    interest.style = "display: block;"
                    geoInfo.style = "display: none;"
                    subsLevel.style = "display: none;"
                    break;
                case 2:
                    basicInfo.style = "display: none;"
                    interest.style = "display: none;"
                    geoInfo.style = "display: block;"
                    subsLevel.style = "display: none;"
                    break;
                case 3:
                    basicInfo.style = "display: none;"
                    interest.style = "display: none;"
                    geoInfo.style = "display: none;"
                    subsLevel.style = "display: block;"
                    break;
                default:
                    //
            }
        }

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
    </script>
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
            ;
        }

        #main-wrap {
            column-count: 2;
            column-gap: 10px;
        }

        .sub-elm {
            margin-left: 30px;
        }

        .InternalForms.SubscribeForm .SubscriptionSlides .geographical .inputs,
        #grantGeographyModal .inputs {
            display: flow-root;
            grid-template-columns: 1fr !important;
        }
    </style>
</body>

</html>