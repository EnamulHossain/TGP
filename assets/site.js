var siteModules=[{moduleName:"NWS.Modules.CommonScripts.ModuleLoader",moduleLoaderScript:"/CommonScripts/NWS/Modules.CommonScripts/moduleloader.js",options:{scrollTopOptions:{scrollerID:"scrollTop",headerID:"headerArea"},scrollContainerOptions:{element:"#contentArea table:not(.calendar):not(.datepicker-grid)"},headerAnimationOptions:{headerID:"headerArea",animateClass:"sticky"},smoothAnchorsOptions:{},fancyBoxOptions:{selector:"a.fancybox"},fitVidOptions:{selector:'iframe[src*="youtube"]'},slickSliderOptions:{selector:'.StripeSlider > div'},accessibilityOptions:{baseConfig:{},tabsConfig:{tabsWrapper:".tabbedContent"},topNavOptions:{element:"#navArea .menu > li > a.hasChild",navArea:"#navArea"}},bannerOptions:{init:false},socialMediaOptions:{},lazyLoadOptions:{init:true},collapseContentOptions:{triggerClass:".CollapseTrigger",contentClass:".CollapseContent",collapseOthers:false},jqueryCallbacks:{scriptLoaded:function(){},onReady:function(){if($('.SearchFilter').length){NWS.Promero.GrantSearch.site.AnchorJump()}if($('.SubscriptionSlides').length!==0){NWS.Promero.Themes.ReFlex.Grants.Site.slideShow()}}}}}];NWS.CommonScripts.ModuleManager.RegisterModules(siteModules);var slickSliderOptions=siteModules.filter(function(el){return el.moduleName==="NWS.Modules.CommonScripts.ModuleLoader"})[0].options.slickSliderOptions;if(slickSliderOptions){var globalClass=document.querySelector(".titanDisplay").getAttribute("class");globalClass+=" SliderActive";document.querySelector(".titanDisplay").setAttribute("class",globalClass)}NWS.Modules.InitModule("NWS.DataModules.Calendar.DataList");NWS.Modules.InitModule("NWS.DataModules.Calendar.DataDetail");NWS.Modules.InitModule("NWS.DataModules.Calendar.WallCalendar");NWS.Modules.InitModule("NWS.DataModules.Blog.DataList");NWS.Modules.InitModule("NWS.DataModules.Blog.DataDetail");NWS.Modules.InitModule("NWS.DataModules.Blog.DataEditor");NWS.initNamespace("Promero.Themes.ReFlex.Grants.Site",function(){return{closeModal:function(){var lookUpModal=document.getElementsByClassName("lookupModal");for(i=0;i<lookUpModal.length;i++){if(lookUpModal[i].classList.contains('active')){lookUpModal[i].classList.remove('active');lookUpModal[i].style.display="none";lookUpModal[i].closest('.FeatureOverlayDark30').style.display="none"}}},slideShow:function(){var slideIndex=1;showDivs(slideIndex);window.plusSlide=function(n){showDivs(slideIndex+=n)};function showDivs(n){var i;var x=document.getElementsByClassName("SubscriptionSlides");if(n>x.length){slideIndex=1}if(n<1){slideIndex=x.length};for(i=0;i<x.length;i++){x[i].style.display="none"}x[slideIndex-1].style.display="block"};},inputViewed:function(obj,field){obj.placeholder=field+" Added - Click to Add More"}}});NWS.initNamespace("Promero.GrantSearch.site",function(){return{AnchorJump:function(){if((window.pageYOffset||document.documentElement.scrollTop)<200){$('#htmlTag')[0].classList.add('scrollTopPadding')}window.onscroll=function(){if((window.pageYOffset||document.documentElement.scrollTop)>200){$('#htmlTag')[0].classList.remove('scrollTopPadding')}if((window.pageYOffset||document.documentElement.scrollTop)<200){$('#htmlTag')[0].classList.add('scrollTopPadding')}}}};;})