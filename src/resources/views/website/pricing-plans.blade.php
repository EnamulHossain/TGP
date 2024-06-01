<!DOCTYPE html>
<html class="titanDisplay Chrome Chrome109 SliderActive" id="htmlTag" lang="en">
@include('website.copypastescript')

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <!-- Stylesheet Link (Site-level) -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="assets/css" rel="stylesheet" type="text/css">
    <style>
        .TitanStripe {
            margin-top: 45px;
        }

        .siteBounds {
            margin: 0px 45px;
        }
    </style>
    <!-- Promero Themes.ReFlex.Grants Pre-Titan Metatag/Code Snippet (Site-level) -->
    <meta content="initial-scale=1,maximum-scale=1.0,minimum-scale=1.0,user-scalable=yes,width=device-width"
        name="viewport">
    <!-- Raw Snippet (Site-level) -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" crossorigin="anonymous"
        integrity="sha384-jffSm4FBmQyLvL1V8BXFUBdZCFkPLi8N+X9NGYs2YKU4uUiYzy53t/3mlwj1fdwI" src="assets/recaptcha__en.js"
        type="text/javascript"></script>
    <script defer="" id="zsiqscript" src="assets/widget" type="text/javascript"></script>
    <script async="" src="assets/js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-BY5S553SX5');
    </script>
    <script language="javascript" src="assets/titanscripts.required.js" type="text/javascript"></script>
    <link href="assets/site.css" rel="stylesheet" type="text/css">
    <meta content="Titan CMS 7.3.6.0" name="generator">
    <title>
        Pricing & Plans
    </title>
    <meta content="40" name="DocID">
    <meta content="Pricing & Plans" name="Title">
    <meta content="Pricing & Plans for Grant Subscriptions" name="Keywords">
    <meta content="Grant Subscriptions Price & Plans from $9.99 per Week" name="Description">
    <meta content="Grant Subscriptions Price & Plans from $9.99 per Week" name="Abstract">
    <link href="https://www.thegrantportal.com/display/WhatsNew.rss" rel="alternate+rss" title="RSS"
        type="application/rss+xml">
    <script async="" language="javascript" src="assets/titanscripts.js" type="text/javascript"></script>
    <script async="" defer="" src="assets/api.js" type="text/javascript"></script>
    <!-- NWS Module Manager (Site-level) -->
    <script language="javascript" src="assets/modulemanager.js"></script>
    <!-- Promero Themes.ReFlex.Grants Post-Titan Metatag/Code Snippet (Site-level) -->
    <script language="javascript" src="assets/site.js"></script>
    <script language="javascript" src="assets/_bundle.js" type="text/javascript"></script>
    <!-- Raw Snippet (Site-level) -->
    <link href="https://www.thegrantportal.com/Files/Logos/TGP-favicon.png?Thumbnail" rel="shortcut icon"
        type="image/png">
    <link href="https://www.thegrantportal.com/Files/Logos/TGP-favicon.png?Thumbnail" rel="icon" type="image/png">
    <link href="assets/floatbutton1_0a0487d44caae64694bf3bb4438090c0_.css" rel="stylesheet">
    <script src="assets/floatbutton1_4de76f844a178c2aeda8ef842446317d_.js"></script>
    <link as="script" href="assets/_bundle(6).js" rel="preload">
    <link as="style" href="assets/_bundle(7).css" rel="preload">
    <script language="javascript" src="assets/_bundle(1).js" type="text/javascript"></script>
    <script language="javascript" src="assets/jquery-3.5.1.min.js" type="text/javascript"></script>
    <link href="assets/_bundle.css" rel="stylesheet" type="text/css">
    <script language="javascript" src="assets/_bundle(2).js" type="text/javascript"></script>
    <script language="javascript" src="assets/jquery.fancybox.min.js" type="text/javascript"></script>
    <link href="assets/_bundle(3).css" rel="stylesheet" type="text/css">
    <link href="assets/jquery.fancybox.min.css" rel="stylesheet" type="text/css">
    <link as="script" href="assets/_bundle(4).js" rel="preload">
    <link as="style" href="assets/_bundle(5).css" rel="preload">
    <script language="javascript" src="assets/_bundle(4).js" type="text/javascript"></script>
    <link href="assets/_bundle(5).css" rel="stylesheet" type="text/css">
    <script language="javascript" src="assets/_bundle(6).js" type="text/javascript"></script>
    <link href="assets/_bundle(7).css" rel="stylesheet" type="text/css" />

    <script language="javascript">
        window.onscroll = function() {
            var top = window.pageYOffset || document.documentElement.scrollTop;
            var distanceFromBottom = document.body.scrollHeight - window.innerHeight - window.scrollY
            let htmlTag = document.getElementById("htmlTag");
            let headerArea = document.getElementById("headerArea");
            console.log("top", top, "bottom", distanceFromBottom);
            var spinner = document.getElementsByClassName('loading');
            if (top > 200) {
                htmlTag.classList.add('scrollTopPadding')
                headerArea.classList.add('sticky')
            }
            if (top < 200) {
                htmlTag.classList.remove('scrollTopPadding')
                headerArea.classList.remove('sticky')
            }
            if (top < 400 && distanceFromBottom > 200) {
                spinner[0].classList.add("moveSpinner");
            } else if (distanceFromBottom < 200) {
                spinner[0].classList.add("moveSpinnerUp");
            } else {
                spinner[0].classList.remove("moveSpinner");
                spinner[0].classList.remove("moveSpinnerUp");
            }
        }
    </script>
</head>

<body class="titanBody" data-gr-ext-installed="" data-new-gr-c-s-check-loaded="14.1102.0" id="titanBody">
    <!-- Copy Paste Prevention Body (Site-level) -->
    <script>
        window.addEventListener("load", function() {
            $('body').bind('cut copy', function(e) {
                e.preventDefault();
            });
        });
    </script>
    <form action="https://www.thegrantportal.com/thegrantportal/Pricing--Plans?" enctype="multipart/form-data"
        id="routerForm" method="Post" siq_id="autopick_2247">
        <a class="skipNav" href="https://www.thegrantportal.com/thegrantportal/Pricing--Plans#SkipNav">
            Skip to Content
        </a>
        @include('website.partials.header1')
        <main class="layoutContainer" id="contentArea">
            <a class="skipNav" id="SkipNav" name="SkipNav">
                Main Content
            </a>
            <div id="centerZone">
                <div class="TitanStripe StripeInteriorHero">
                    <div style="margin: 0px 45px;" class="siteBounds">
                        <div class="Freeform MobileView New100 CenterZone TitanBlock">
                            <p>
                                <img alt="" class="animate-in lazy" loading="lazy"
                                    src="assets/pexels-amina-filkins-5410069.jpg" />
                            </p>
                        </div>
                        <div class="Freeform InteriorHero InteriorHeader New100 CenterZone TitanBlock">
                            <h1>
                                <span style="font-size:18px">
                                </span>
                                Plans
                            </h1>
                            <ul class="list-disc ml-8">
                                <li>
                                    <strong>
                                        <span style="font-size:24px">
                                            Sign-up for Free Grant Alert Newsletter
                                        </span>
                                    </strong>
                                    <ul style="list-style-type: circle; margin-left: 3em;">
                                        <li>
                                            <span style="font-size:20px">
                                                Receive Alerts of Available Grants
                                            </span>
                                        </li>

                                    </ul>
                                </li>
                                <li>
                                    <strong>
                                        <span style="font-size:24px">
                                            Paid Subscriptions
                                        </span>
                                    </strong>
                                    <ul style="list-style-type: circle; margin-left: 3em;">
                                        <li>
                                            <span style="font-size:20px">
                                                Gain Full Access to Grant Offerings
                                            </span>
                                        </li>

                                    </ul>
                                </li>

                            </ul>
                            <p>
                            </p>
                        </div>
                        <div
                            class="Freeform InteriorHero InteriorImage LargeMediumScreens New100 CenterZone TitanBlock">
                            <p>
                                <img alt="" class="animate-in lazy-fadeIn" loading="lazy"
                                    src="images/ss.png" />
                            </p>
                        </div>
                    </div>
                </div>
                <div class="TitanStripe StripeFlex">
                    <div class="siteBounds">

                        @if ($pricePlans->isNotEmpty())
                            @foreach ($pricePlans as $index => $pricePlan)
                                @php
                                    $price = explode('.', $pricePlan->plan_price);
                                @endphp

                                @if ($isPaidSubscriber && $index === 0)
                                    {{-- Skip the first item if the user is not a paid subscriber --}}
                                    @continue
                                @endif

                                <div class="Freeform PaymentPlans Flex20 New100 CenterZone TitanBlock">
                                    <div style="cursor:pointer">
                                        <h2><a
                                                href="{{ url('subscribe?sku=' . $pricePlan->sku) }}">{{ $pricePlan->plan_name }}</a>
                                        </h2>
                                        @if ($pricePlan->is_free == 1)
                                            <p class="price">Grant Alert Newsletter</p>
                                        @else
                                            <p class="price">
                                                <span style="font-size:48px">${{ $price[0] }}</span>
                                                <sup><span style="font-size:24px">{{ $price[1] ?? '' }}</span></sup>
                                            </p>
                                        @endif
                                        <p class="benefits">
                                            <strong><span
                                                    style="font-size:22px">{{ $pricePlan->plan_description }}</span></strong>
                                        </p>
                                        @if ($pricePlan->is_free == 1)
                                            <p>Get daily alerts of new grants based on your preferences. <br> No credit
                                                card required.</p>
                                        @endif
                                        <p class="subscribe">
                                            <a href="{{ url('subscribe?sku=' . $pricePlan->sku) }}">Subscribe</a>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>


            </div>
            <div class="TitanStripe StripeMedium">
                <div style="margin: 0px 45px;" class="siteBounds">
                    <div class="Freeform New100 CenterZone TitanBlock">
                        <h3 style="text-align:center">
                            <u>
                                Plan Benefits
                            </u>
                        </h3>
                        <p>
                        </p>
                    </div>
                    <div class="Freeform Float50 CheckBullet New100 CenterZone TitanBlock">
                        <h4>
                            Free Grant Alerts include:
                        </h4>
                        <ul>
                            <li>
                                Summary Overview of Grant Information
                            </li>
                            <li>
                                Limited Grant Searches
                            </li>
                            <li>
                                Create Your Profile and Grant Selections
                            </li>
                            <li>
                                Receive Grant Alerts Daily
                            </li>
                        </ul>
                    </div>
                    <div class="Freeform Float50 CheckBullet New50 CenterZone TitanBlock">
                        <h4>
                            Paid Plans include:
                        </h4>
                        <ul>
                            <li>
                                Only Subscribers to Paid Plans See All Grant Details
                            </li>
                            <li>
                                Full Access to Grant Details & Online Applications
                            </li>
                            <li>
                                Unlimited Grant Searches
                            </li>
                            <li>
                                Direct Access to Grant Providers
                            </li>
                            <li>
                                Ability to Save Grants
                            </li>
                            <li>
                                Get New Alerts Based on Your Interests
                            </li>
                            <li>
                                Ability to View Expired Grants & Grant History
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="TitanStripe StripeFlex">
                <div style="margin: 0px 45px;" class="siteBounds">
                    <div class="Freeform Flex50 New100 CenterZone TitanBlock">
                        <p>
                            <img alt="" class="lazy" loading="lazy" style="height:500px; width:auto;"
                                src="images/PG BLACK - ASIAN WOMEN.png" />
                        </p>
                    </div>
                    <div class="Freeform Flex50 New100 CenterZone TitanBlock">
                        <h3>
                            Adding New Grants Daily
                        </h3>
                        <p>
                            <span style="font-size:24px">
                                Here at The Grant Portal, we are adding and updating grants on a daily basis so you
                                always get the most up to date information.
                            </span>
                        </p>
                        <p>
                            <span style="font-size:24px">
                            </span>
                        </p>
                        <p>
                            <span style="font-size:24px">
                                Have a Question?
                            </span>
                        </p>
                        <p>
                            <span class="Button">
                                <a href="{{ route('contact_us') }}" linktype="2" target="_self">
                                    Contact Us
                                </a>
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            </div>
        </main>
        @include('website.partials.footer1')
        <a aria-label="Back to top of page" href="https://www.thegrantportal.com/thegrantportal/Pricing--Plans#"
            id="scrollTop">
            <span aria-hidden="true" class="fas fa-chevron-up arrow">
            </span>
        </a>
    </form>
</body>

</html>
