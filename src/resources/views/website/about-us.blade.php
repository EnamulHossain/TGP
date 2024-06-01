<!DOCTYPE html>
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
                    <!-- Raw Snippet (Site-level) -->
                    <!-- Global site tag (gtag.js) - Google Analytics -->
                    <script async="" crossorigin="anonymous" integrity="sha384-jffSm4FBmQyLvL1V8BXFUBdZCFkPLi8N+X9NGYs2YKU4uUiYzy53t/3mlwj1fdwI" src="assets/recaptcha__en.js" type="text/javascript">
                    </script>
                    <script defer="" id="zsiqscript" src="assets/widget" type="text/javascript">
                    </script>
                    <script async="" src="assets/js">
                    </script>
                    <script>
                        window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-BY5S553SX5');
                    </script>
                    <script language="javascript" src="assets/titanscripts.required.js" type="text/javascript">
                    </script>
                    <link href="assets/site.css" rel="stylesheet" type="text/css">
                        <meta content="Titan CMS 7.3.6.0" name="generator">
                            <title>
                                About Us
                            </title>
                            <meta content="13305" name="DocID">
                                <meta content="About Us" name="Title">
                                    <meta content="About Us" name="Keywords">
                                        <meta content="About The Grant Portal, Subscription Plans, Grant Alerts" name="Description">
                                            <meta content="About The Grant Portal, Subscription Plans, Grant Alerts" name="Abstract">
                                                <link href="https://www.thegrantportal.com/display/WhatsNew.rss" rel="alternate+rss" title="RSS" type="application/rss+xml">
                                                    <script async="" language="javascript" src="assets/titanscripts.js" type="text/javascript">
                                                    </script>
                                                    <script async="" defer="" src="assets/api.js" type="text/javascript">
                                                    </script>
                                                    <!-- NWS Module Manager (Site-level) -->
                                                    <script language="javascript" src="assets/modulemanager.js">
                                                    </script>
                                                    <!-- Promero Themes.ReFlex.Grants Post-Titan Metatag/Code Snippet (Site-level) -->
                                                    <script language="javascript" src="assets/site.js">
                                                    </script>
                                                    <script language="javascript" src="assets/_bundle.js" type="text/javascript">
                                                    </script>
                                                    <!-- Raw Snippet (Site-level) -->
                                                    <link href="https://www.thegrantportal.com/Files/Logos/TGP-favicon.png?Thumbnail" rel="shortcut icon" type="image/png">
                                                        <link href="https://www.thegrantportal.com/Files/Logos/TGP-favicon.png?Thumbnail" rel="icon" type="image/png">
                                                            <link href="assets/floatbutton1_0a0487d44caae64694bf3bb4438090c0_.css" rel="stylesheet">
                                                                <script src="assets/floatbutton1_4de76f844a178c2aeda8ef842446317d_.js">
                                                                </script>
                                                                <link as="script" href="assets/_bundle(6).js" rel="preload">
                                                                    <link as="style" href="assets/_bundle(7).css" rel="preload">
                                                                        <script language="javascript" src="assets/_bundle(1).js" type="text/javascript">
                                                                        </script>
                                                                        <script language="javascript" src="assets/jquery-3.5.1.min.js" type="text/javascript">
                                                                        </script>
                                                                        <link href="assets/_bundle.css" rel="stylesheet" type="text/css">
                                                                            <script language="javascript" src="assets/_bundle(2).js" type="text/javascript">
                                                                            </script>
                                                                            <script language="javascript" src="assets/jquery.fancybox.min.js" type="text/javascript">
                                                                            </script>
                                                                            <link href="assets/_bundle(3).css" rel="stylesheet" type="text/css">
                                                                                <link href="assets/jquery.fancybox.min.css" rel="stylesheet" type="text/css">
                                                                                    <link as="script" href="assets/_bundle(4).js" rel="preload">
                                                                                        <link as="style" href="assets/_bundle(5).css" rel="preload">
                                                                                            <script language="javascript" src="assets/_bundle(4).js" type="text/javascript">
                                                                                            </script>
                                                                                            <link href="assets/_bundle(5).css" rel="stylesheet" type="text/css">
                                                                                                <script language="javascript" src="assets/_bundle(6).js" type="text/javascript">
                                                                                                </script>
                                                                                                <link href="assets/_bundle(7).css" rel="stylesheet" type="text/css"/>
                                                                                            </link>
                                                                                        </link>
                                                                                    </link>
                                                                                </link>
                                                                            </link>
                                                                        </link>
                                                                    </link>
                                                                </link>
                                                            </link>
                                                        </link>
                                                    </link>
                                                </link>
                                            </meta>
                                        </meta>
                                    </meta>
                                </meta>
                            </meta>
                        </meta>
                    </link>
                </meta>
            </link>
        </meta>
        <script language="javascript">
            window.onscroll = function () {
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
                }
                else if (distanceFromBottom < 200) {
                    spinner[0].classList.add("moveSpinnerUp");
                }
                else {
                    spinner[0].classList.remove("moveSpinner");
                    spinner[0].classList.remove("moveSpinnerUp");
                }
            }
        </script>
    </head>
    <body class="titanBody" data-gr-ext-installed="" data-new-gr-c-s-check-loaded="14.1102.0" id="titanBody">
        <!-- Copy Paste Prevention Body (Site-level) -->
        <script>
            window.addEventListener("load", function(){ 
      $('body').bind('cut copy', function(e) {
      e.preventDefault();
        });
    });
        </script>
        <form action="https://www.thegrantportal.com/thegrantportal/About-Us?" enctype="multipart/form-data" id="routerForm" method="Post" siq_id="autopick_4094">
            <a class="skipNav" >
                Skip to Content
            </a>
            @include('website.partials.header1')

            <main class="layoutContainer" id="contentArea">
                <a class="skipNav" id="SkipNav" name="SkipNav">
                    Main Content
                </a>
                <div id="centerZone">
                    <div class="TitanStripe StripeTopBorder">
                        <div class="siteBounds">
                            <div class="Freeform New100 CenterZone TitanBlock">
                                <p>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="TitanStripe StripeDefault">
                        <div style="margin: 0px 50px;" class="siteBounds">
                            <div class="Freeform New100 CenterZone TitanBlock">
                                <h1>
                                    <span class="Button">
                                    </span>
                                    About Us
                                </h1>
                            </div>
                            <div class="Freeform New100 CenterZone TitanBlock">
                                <p style="margin-bottom:13px">
                                    <strong class="text-3xl">
                                        The Grant Portal
                                    </strong>
                                    <br>
                                    <span style="font-family:Arial,Helvetica,sans-serif">
                                        <span style="font-size:18px">
                                            <span style="line-height:115%">
                                                Our goal is to provide access to the largest online catalog of grants for nonprofits, small businesses and individuals that are currently accepting applications. And to offer subscription prices that are the lowest in the industry. 
                                            </span>
                                        </span>
                                    </span>
                                </p>
                                <p style="margin-bottom:13px">
                                    <span style="font-family:Arial,Helvetica,sans-serif">
                                        <span style="font-size:18px">
                                            <strong class="text-3xl">
                                                History
                                            </strong>
                                            <br>
                                            <span style="line-height:115%">
                                                The Grant Portal was created by our dedicated team of IT professionals who devoted their careers to software development and application hosting services since 2001. <br> <br>
When COVID-19 hit in 2020, it negatively impacted our customers and our IT business. More than 130,000 businesses permanently closed during the first year of the pandemic. This unprecedented economic downturn was the motivation for our company to create The Grant Portal. <br> <br>
We spent weeks combing the internet for government loans, funds or grants. The effort was extraordinarily tedious and time consuming. We eventually discovered that there were 100,000s of funding sources and billions of dollars of free money grants, but the information was fragmented and difficult to compile. <br> <br>
We realized how useful a single source of grants would have been if one existed. That's when the ‘light bulb went off’.  We had the resources to build such a portal... and that is what we did. We named it  <strong>The Grant Portal</strong> .  We are pleased that we had the opportunity to build and host The Grant Portal. Since its launch in 2022, The Grant Portal has databased more than 24,000 grants and lists more than 14,000 grants currently accepting grant applications.  Please note that the Grant Portal does not provide funds or grants.  It provides access to grant providers who are actively accepting grant applications.
                                            </span>
                                        </span>
                                    </span>
                                </p>
                                <p style="margin-bottom:13px">
                                    <span style="font-family:Arial,Helvetica,sans-serif">
                                        <strong class="text-3xl">
                                            Sign Up for Free Grant Alert Newsletter
                                        </strong>
                                        <br>
                                        
                                        <span style="font-size:18px">
                                            <span style="line-height:115%">
Sign up for the Free Grant Alerts and receive summary overviews of the latest grants. Paid subscribers have unlimited access to the grant requirements, grant applications, links to grant provider websites, application links, webinars, contact emails and more.Once you see a grant that interests you, you can subscribe to a low-cost subscription to view the grant provider's details and submit a grant application. I believe the time savings is worth it.

                                            </span>
                                        </span>
                                    </span>
                                </p>
                                <p style="margin-bottom:13px">
                                    <span style="font-family:Arial,Helvetica,sans-serif">
                                        <strong class="text-3xl">
                                            View Grant Details
                                        </strong>
                                        <br>
                                        
                                        <span style="font-size:18px">
                                            <span style="line-height:115%">
                                                To view grant details, you must have a paid subscription. The Grant Portal will save time and money for any organization or individual who is interested in finding grants. 
                                                <br> <br> The portal lists 6 different types of grants:
                                                <ul style="list-style-type: circle;" class="ml-12">
                                                    <li class="circle">federal government</li>
                                                    <li>state and local government</li>
                                                    <li>corporate foundations</li>
                                                    <li>corporate award programs</li>
                                                    <li>private/family foundations</li>
                                                    <li>community/public foundations</li>
                                                </ul>
                                            </span>
                                        </span>
                                    </span>
                                </p>
                                <p style="margin-bottom:13px">
                                    <span style="font-size:18px">
                                        <strong>
                                            <span style="font-family:Arial,Helvetica,sans-serif">
                                                The Grant Portal supports Underserved Communities
                                            </span>
                                        </strong>
                                    </span>
                                    <br>
                                        <span style="font-size:18px">
                                            <span style="font-family:Arial,Helvetica,sans-serif">
                                                The Grant Portal employs more than a dozen team members from underserved communities to conduct research and input grants into The Grant Portal.  Your paid subscriptions allow us to pay it forward.
                                                <em>
                                                    Thank you for your support!
                                                </em>
                                            </span>
                                        </span>
                                    </br>
                                </p>
                                <p style="margin-bottom:13px">
                                    <span style="font-size:18px">
                                        <span style="font-family:Arial,Helvetica,sans-serif">
                                            <strong>
                                                The Grant Portal supports
                                                <a href="https://www.feedingamerica.org/" linktype="3" target="_blank" title="Opens in a new window" style="color: blue">
                                                    Feeding America
                                                </a>
                                            </strong>
                                            <br>
                                                For every paid subscription to The Grant Portal, we donate funds to Feeding America that equates to at least 10 meals to children and adults facing hunger in every community across the country.
                                            </br>
                                        </span>
                                    </span>
                                    <span style="font-size:18px">
                                        <span style="font-family:Arial,Helvetica,sans-serif">
                                        </span>
                                    </span>
                                </p>
                                
                                
                                <p style="margin-bottom:13px">
                                    <span style="font-family:Arial,Helvetica,sans-serif">
                                        <span style="font-size:18px">
                                            <span style="line-height:115%">
                                                All the best,
                                            </span>
                                        </span>
                                    </span>
                                </p>
                                <p style="margin-bottom:13px">
                                    <span style="font-family:Arial,Helvetica,sans-serif">
                                        <span style="font-size:18px">
                                            <span style="line-height:115%">
                                                Gregg Troyanowski
                                                <br>
                                                    President
                                            </span>
                                        </span>
                                    </span>
                                    <br>
                                        <span style="font-size:18px">
                                            <span style="font-family:Arial,Helvetica,sans-serif">
                                                The Grant Portal
                                            </span>
                                        </span>
                                    </br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            @include('website.partials.footer1')
            @include('website.copypastescript')
            <a aria-label="Back to top of page" class="" href="https://www.thegrantportal.com/thegrantportal/About-Us#" id="scrollTop">
                <span aria-hidden="true" class="fas fa-chevron-up arrow">
                </span>
            </a>
        </form>
    </body>
</html>