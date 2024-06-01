NWS.initNamespace('NWS.Display.LazyImages', function() {
    var _ = {
        loadImage: function(entry, callback) {
            var lazyImage = entry.target;
            var selectorClass = _.params.selectorClass || "lazy";
            var fadeInClass = _.params.fadeInClass || "lazy-fadeIn";
            var loadCallback = function() {
                lazyImage.classList.add(fadeInClass);
                if (typeof callback === "function") callback()
            };
            if (lazyImage.complete && lazyImage.naturalHeight !== 0) loadCallback();
            else {
                lazyImage.addEventListener('load', loadCallback)
            }
            if (lazyImage.getAttribute("data-src")) {
                lazyImage.src = lazyImage.getAttribute("data-src")
            }
            if (lazyImage.getAttribute("data-srcset")) {
                lazyImage.srcset = lazyImage.getAttribute("data-srcset")
            }
            if (lazyImage.getAttribute("data-alt")) {
                lazyImage.alt = lazyImage.getAttribute("data-alt")
            }
            lazyImage.classList.remove(selectorClass)
        },
        addSelectorClass: function(selector) {
            var selectorClass = _.params.selectorClass || "lazy";
            var lazyImages = document.querySelectorAll(selector);
            for (var i = 0; i < lazyImages.length; i++) {
                if (!lazyImages[i].classList.contains(selectorClass)) lazyImages[i].classList.add(selectorClass)
            }
        }
    };
    return {
        init: function(params) {
            _.params = params || {};
            var domLoaded = function() {
                _.addSelectorClass("img[loading='lazy']");
                var ajaxBlocks = [NWS.Block.Aggregation, NWS.Block.DataList, NWS.Block.SegmentedSearch].filter(function(blockNS) {
                    return typeof blockNS !== "undefined"
                });
                ajaxBlocks.forEach(function(blockNS) {
                    blockNS.OnAjaxComplete("LazyLoadImages", NWS.Display.LazyImages.LazyLoad)
                });
                NWS.Display.LazyImages.LazyLoad()
            };
            if (!NWS.Display || !NWS.Display.DOMObserver) {
                NWS.Modules.Register(["/CommonScripts/NWS/Modules.CommonScripts/NWS.Display.DOMObserver.js"], function() {
                    if (document.readyState === "complete" || document.readyState === "loaded" || document.readyState === "interactive") domLoaded();
                    else window.addEventListener("DOMContentLoaded", domLoaded)
                })
            } else {
                if (document.readyState === "complete" || document.readyState === "loaded" || document.readyState === "interactive") domLoaded();
                else window.addEventListener("DOMContentLoaded", domLoaded)
            }
        },
        LazyLoad: function() {
            var selectorClass = _.params.selectorClass || "lazy";
            NWS.Display.DOMObserver.AddIntersectionObserver("img." + selectorClass, function(entry) {
                _.loadImage(entry, _.params.callback)
            }, null, null, null, true)
        }
    }
});
if (window.NodeList && !NodeList.prototype.forEach) {
    NodeList.prototype.forEach = Array.prototype.forEach
}
/*!
 * FitVids 1.1
 *
 * Copyright 2013, Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
 * Credit to Thierry Koblentz - http://www.alistapart.com/articles/creating-intrinsic-ratios-for-video/
 * Released under the WTFPL license - http://sam.zoy.org/wtfpl/
 *
 */
(function($) {
    "use strict";
    $.fn.fitVids = function(options) {
        var settings = {
            customSelector: null,
            ignore: null
        };
        if (!document.getElementById('fit-vids-style')) {
            var head = document.head || document.getElementsByTagName('head')[0];
            var css = '.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}';
            var div = document.createElement('div');
            div.innerHTML = '<p>x</p><style id="fit-vids-style">' + css + '</style>';
            head.appendChild(div.childNodes[1])
        }
        if (options) {
            $.extend(settings, options)
        }
        return this.each(function() {
            var selectors = ["iframe[src*='player.vimeo.com']", "iframe[src*='youtube.com']", "iframe[src*='youtube-nocookie.com']", "iframe[src*='kickstarter.com'][src*='video.html']", "object", "embed"];
            if (settings.customSelector) {
                selectors.push(settings.customSelector)
            }
            var ignoreList = '.fitvidsignore';
            if (settings.ignore) {
                ignoreList = ignoreList + ', ' + settings.ignore
            }
            var $allVideos = $(this).find(selectors.join(','));
            $allVideos = $allVideos.not("object object");
            $allVideos = $allVideos.not(ignoreList);
            $allVideos.each(function() {
                var $this = $(this);
                if ($this.parents(ignoreList).length > 0) {
                    return
                }
                if (this.tagName.toLowerCase() === 'embed' && $this.parent('object').length || $this.parent('.fluid-width-video-wrapper').length) {
                    return
                }
                if ((!$this.css('height') && !$this.css('width')) && (isNaN($this.attr('height')) || isNaN($this.attr('width')))) {
                    $this.attr('height', 9);
                    $this.attr('width', 16)
                }
                var height = (this.tagName.toLowerCase() === 'object' || ($this.attr('height') && !isNaN(parseInt($this.attr('height'), 10)))) ? parseInt($this.attr('height'), 10) : $this.height(),
                    width = !isNaN(parseInt($this.attr('width'), 10)) ? parseInt($this.attr('width'), 10) : $this.width(),
                    aspectRatio = height / width;
                if (!$this.attr('id')) {
                    var videoID = 'fitvid' + Math.floor(Math.random() * 999999);
                    $this.attr('id', videoID)
                }
                $this.wrap('<div class="fluid-width-video-wrapper"></div>').parent('.fluid-width-video-wrapper').css('padding-top', (aspectRatio * 100) + "%");
                $this.removeAttr('height').removeAttr('width')
            })
        })
    }
})(window.jQuery || window.Zepto);
NWS.initNamespace('NWS.Display.SmoothAnchors', function() {
    var _params;

    function setClickHandler() {
        $('a[href*="#"]').on('click', function(e) {
            if ($(this).attr('href') == '#') return;
            if (location.pathname.replace(/^\//, '') != this.pathname.replace(/^\//, '') && location.hostname != this.hostname) return;
            animatedScrollToTarget(getHashTarget(this.hash), "html,body", {
                scrollOffset: getPageTopDifference()
            }, function(targetSelector, scrollContainerSelector, options) {
                adjustForHeaderChange(targetSelector, scrollContainerSelector, options)
            })
        })
    }

    function scrollOnPageLoad() {
        setTimeout(function() {
            animatedScrollToTarget(getHashTarget(location.hash), "html,body", {
                scrollOffset: getPageTopDifference()
            }, function(targetSelector, scrollContainerSelector, options) {
                adjustForHeaderChange(targetSelector, scrollContainerSelector, options)
            })
        }, 500)
    }

    function adjustForHeaderChange(targetSelector, scrollContainerSelector, options) {
        _params.pageTopVariableHeight = $(_params.fixedHeader).outerHeight();
        if (options.scrollOffset != getPageTopDifference()) animatedScrollToTarget(targetSelector, scrollContainerSelector, {
            scrollOffset: getPageTopDifference(),
            scrollSpeed: 0
        })
    }

    function getHashTarget(hash) {
        if (hash == '') return;
        if ($('a[name=' + hash.slice(1) + ']').length) return 'a[name=' + hash.slice(1) + ']';
        else return '[id=' + hash.slice(1) + ']'
    }

    function getPageTopDifference() {
        if ($(_params.fixedHeader).css('position') != 'fixed') return _params.pixelDifference;
        else if (typeof(_params.pageTopHeight) === 'undefined') return _params.pageTopVariableHeight + _params.pixelDifference;
        else return _params.pageTopHeight + _params.pixelDifference
    }

    function animatedScrollToTarget(targetSelector, scrollContainerSelector, options, callback) {
        let scrollOffset = 0,
            scrollSpeed = _params.scrollSpeed;
        let target = $(targetSelector);
        if (target.length == 0) return;
        if (typeof(options) !== "undefined") {
            if (typeof(options.scrollOffset) !== "undefined") scrollOffset = options.scrollOffset;
            if (typeof(options.scrollSpeed) !== "undefined") scrollSpeed = options.scrollSpeed
        }
        if (typeof(scrollContainerSelector) !== "undefined") scrollContainerSelector = "html,body";
        $(scrollContainerSelector).animate({
            scrollTop: target.offset().top - scrollOffset
        }, scrollSpeed, function() {
            if (typeof(callback) === "function") callback(targetSelector, scrollContainerSelector, options)
        })
    }
    return {
        init: function(params) {
            _params = params;
            if (typeof(_params.fixedHeader) === 'undefined') _params.fixedHeader = '#headerArea';
            if (typeof(_params.scrollSpeed) === 'undefined') _params.scrollSpeed = 500;
            if (typeof(_params.pageTopHeight) === 'undefined') params.pageTopVariableHeight = $(params.fixedHeader).outerHeight();
            if (typeof(_params.pixelDifference) === 'undefined') _params.pixelDifference = 15;
            if (typeof(_params.getHashTarget) === 'undefined') _params.getHashTarget = getHashTarget;
            setClickHandler();
            scrollOnPageLoad()
        }
    }
});
NWS.initNamespace('NWS.Display.ScrollContainer', function() {
    var _params;

    function addScrollText($wrappers) {
        $wrappers.each(function() {
            if (hasHorizontalScrollBar($(this))) {
                $(this).prev('.' + _params.scrollTextClass).show()
            } else {
                $(this).prev('.' + _params.scrollTextClass).hide()
            }
        })
    }

    function hasHorizontalScrollBar(el) {
        return el.get(0).scrollWidth > el.innerWidth() + 1
    }
    return {
        init: function(params) {
            _params = params;
            if (typeof(_params.element) === 'undefined') throw 'params.element must be defined';
            if (!(_params.element instanceof jQuery)) _params.element = $(_params.element);
            if (typeof(_params.scrollText) === 'undefined') _params.scrollText = 'Scroll table to view all';
            if (typeof(_params.scrollTextClass) === 'undefined') _params.scrollTextClass = 'scrollText';
            if (typeof(_params.containerClass) === 'undefined') _params.containerClass = 'scrollTable';
            _params.element.wrap('<div class="' + _params.containerClass + '"/>');
            var $wrappers = $('.' + _params.containerClass);
            $('<div class="' + _params.scrollTextClass + '">' + _params.scrollText + '</div>').insertBefore($wrappers);
            addScrollText($wrappers);
            $(window).resize(function() {
                addScrollText($wrappers)
            })
        }
    }
});
NWS.initNamespace("NWS.Display.Banner", function() {
    var _ = {
        registeredCalls: [],
        params: null,
        isSafePath: function(path) {
            return !(/["<>#%{}|^~\[\]`\\]/g.test(path))
        },
        getCookieName: function(params) {
            var cookieName = params.sourceContentPath || "inline-content";
            return "NWSDisplayBannerClosed" + cookieName.replace(/[()<>@,;:\\"\[\]?={}\/]/g, "-")
        },
        readBannerSuccess: function(data, status, jqXHR) {
            var startBody = /<body/g.exec(data).index;
            var endBody = /<\/body>/g.exec(data).index + 7;
            data = data.substring(startBody, endBody);
            var $content = $(data).find(this.state.params.sourceContentSelector);
            if (!$content.length) {
                console.warn("No Site Message Content Found. Check sourceContentPath property.");
                return
            }
            _.displayBanner($content, this.state.params)
        },
        displayBanner: function($content, params) {
            var cookieName = _.getCookieName(params);
            var closeButtonContent = params.closeButtonContent || "<button class='close'><span class='screenReaderOnly'>Close Message</span></button>";
            params['cookieName'] = cookieName;
            if (typeof params.wrapper !== "undefined") $content = $(params.wrapper).last().append($content);
            var $closeButton = $(closeButtonContent).on('click', params, function(e) {
                NWS.Display.Banner.closeModal(e)
            });
            $content = $("<div class='NWSDisplayBannerMessage'></div>").append($closeButton).append($content);
            var $openPanelButton = $("<span class='Button openPanel'><a href='#'><span>" + params.openPanelName + "</span></a></span>").on('click', params, function(e) {
                NWS.Display.Banner.openPanel(e)
            });
            switch (params.insertLocation) {
                case "lastChild":
                    $(params.bannerContainerSelector).append($content);
                    break;
                case "firstChild":
                    $(params.bannerContainerSelector).prepend($content);
                    break;
                case "afterContainer":
                    $(params.bannerContainerSelector).after($content);
                    break;
                case "beforeContainer":
                    $(params.bannerContainerSelector).before($content);
                    break;
                case "animate":
                    $("body").append($("<div class='NWSDisplayBannerPanel animated'></div>").append($content));
                    if (typeof params.triggerLocationSelectorAfter !== "undefined") {
                        $(params.triggerLocationSelectorAfter).after($openPanelButton)
                    } else {
                        $('.NWSDisplayBannerPanel').before($openPanelButton)
                    }
                    $(document).on('keydown', params, function(e) {
                        if ((e.keyCode ? e.keyCode : e.which) == '27') {
                            NWS.Display.Banner.closeModal(e)
                        }
                    });
                    break;
                default:
                    $("body").append($("<div class='NWSDisplayBannerModal'></div>").append($content));
                    $(".NWSDisplayBannerModal a").on('click', params, function(e) {
                        NWS.Display.Banner.closeModal(e)
                    });
                    $(".NWSDisplayBannerModal .NWSDisplayBannerMessage .close").focus();
                    $(document).on('keydown', params, function(e) {
                        if ((e.keyCode ? e.keyCode : e.which) == '27') {
                            NWS.Display.Banner.closeModal(e)
                        }
                    });
                    break
            }
        },
        beforeReadBanner: function(jqXHR, data) {},
        readBannerComplete: function(jqXHR, status) {},
        readBannerError: function(jqXHR, status, errorThrown) {
            console.warn("Error returned from source content page.  Check sourceContentPath.  Error Code: " + jqXHR.status)
        }
    };
    return {
        init: function(params) {
            params['insertLocation'] = params.insertLocation || "modal";
            if (!params || (typeof params.sourceContentPath === "undefined" && typeof params.sourceContent === "undefined") || (params.sourceContent === "undefined" && (params.sourceContentPath.charAt(0) !== "/" || typeof params.sourceContentSelector === "undefined")) || (typeof params.bannerContainerSelector === "undefined" && params.insertLocation != "modal") || (typeof params.animation === "undefined" && params.insertLocation == "animate")) {
                console.log("Correct parameters missing. Library loaded, nothing to display.");
                return
            }
            if (typeof params.sourceContent === "undefined" && !_.isSafePath(params.sourceContentPath)) {
                console.error("Unsafe source content path.  Do not use \" < > # % { } | \ ^ ~ [ ] `");
                return
            }
            var cookieCheck = _.getCookieName(params) + "=1";
            var isModal = params.insertLocation === "modal";
            var rememberClose = (typeof params.rememberClose !== "undefined") ? params.rememberClose : isModal;
            if (rememberClose && document.cookie && document.cookie.indexOf(cookieCheck) > -1) return;
            if (_.registeredCalls.filter(function(call) {
                    return call == _.getCookieName(params)
                }).length) {
                console.log("Banner is already added to page");
                return
            }
            _.registeredCalls.push(_.getCookieName(params));
            if (typeof params.sourceContent === "undefined") {
                $.ajaxSetup({
                    cache: false
                });
                $.ajax({
                    url: params.sourceContentPath,
                    type: 'GET',
                    data: null,
                    dataType: 'html',
                    error: params.readBannerError || _.readBannerError,
                    state: {
                        params: params
                    },
                    beforeSend: params.beforeReadBanner || _.beforeReadBanner,
                    success: params.readBannerSuccess || _.readBannerSuccess,
                    complete: params.readBannerComplete || _.readBannerComplete
                })
            } else {
                _.displayBanner($(params.sourceContent), params)
            }
        },
        closeModal: function(e) {
            if (typeof e.data.animation !== "undefined" && $('div.NWSDisplayBannerPanel').hasClass(e.data.animation.animateInClass)) {
                $('div.NWSDisplayBannerPanel').addClass(e.data.animation.animateOutClass).removeClass(e.data.animation.animateInClass)
            } else {
                $("div.NWSDisplayBannerModal").hide()
            }
            document.cookie = e.data.cookieName + "=1;path=/";
            if ($('.openPanel a').length) {
                $('.openPanel a').focus()
            }
        },
        openPanel: function(e) {
            e.preventDefault();
            if (typeof e.data.animation !== "undefined") {
                $('div.NWSDisplayBannerPanel').addClass(e.data.animation.animateInClass).removeClass(e.data.animation.animateOutClass)
            }
            $('div.NWSDisplayBannerPanel').show();
            if (typeof e.data.focusElement !== "undefined") {
                $(e.data.focusElement).focus()
            } else {
                $('div.NWSDisplayBannerPanel .NWSDisplayBannerMessage .close').focus()
            }
        }
    }
});
NWS.initNamespace('NWS.Display.CollapseContent', function() {
    var _params;

    function setClickHandler(elementClicked) {
        if (elementClicked.hasClass('open')) {
            elementClicked.attr('aria-expanded', 'false').removeClass('open').next('.' + _params.wrapperClass).slideUp()
        } else {
            if (_params.collapseOthers) {
                elementClicked.closest('.TitanStripe').find('.' + _params.wrapperClass).slideUp();
                elementClicked.closest('.TitanStripe').find(_params.triggerClass).attr('aria-expanded', 'false').removeClass('open')
            }
            elementClicked.attr('aria-expanded', 'true').addClass('open');
            elementClicked.next('.' + _params.wrapperClass).slideDown()
        }
        if (typeof _params.callback === "function") {
            _params.callback()
        };
    }
    return {
        init: function(params) {
            _params = params;
            if (typeof(_params.triggerClass) === 'undefined') throw 'params.element must be defined';
            if (typeof(_params.contentClass) === 'undefined') throw 'params.element must be defined';
            if (typeof(_params.wrapperClass) === 'undefined') _params.wrapperClass = 'CollapseInnerWrapper';
            NWS.CommonScripts.ModuleManager.OnPageShow(function() {
                $(_params.triggerClass).each(function() {
                    $(this).nextUntil(_params.triggerClass).wrapAll('<div class="' + _params.wrapperClass + '" />')
                });
                $(_params.triggerClass).attr('role', 'button').attr('aria-expanded', 'false').attr('tabindex', '0');
                $('.' + _params.wrapperClass).slideUp();
                $(_params.triggerClass).on('click', function(e) {
                    e.preventDefault();
                    setClickHandler($(this))
                });
                $(_params.triggerClass).on('keyup', function(e) {
                    var keyCode = e.which;
                    if (keyCode == 13) {
                        e.preventDefault();
                        setClickHandler($(this))
                    }
                })
            })
        }
    }
});
NWS.initNamespace("NWS.Modules.Accessibility.Support", function() {
    var _ = {
        defaultScripts: [{
            key: "AccessibilityCSS",
            path: "/ClientCSS/NWS/Modules.Accessibility.Support/Accessibility.css"
        }, {
            key: "TopNavJS",
            path: "/CommonScripts/NWS/Modules.Accessibility.Support/TopNav.js"
        }, {
            key: "TopNavCSS",
            path: "/ClientCSS/NWS/Modules.Accessibility.Support/TopNav.css"
        }, {
            key: "BaseOverridesJS",
            path: "/CommonScripts/NWS/Modules.Accessibility.Support/BaseOverrides.js"
        }, {
            key: "TabsJS",
            path: "/CommonScripts/NWS/Modules.Accessibility.Support/Tabs.js"
        }, {
            key: "MegaMenuJS",
            path: "/CommonScripts/NWS/Modules.Accessibility.Support/MegaMenu.js"
        }, {
            key: "MegaMenuCSS",
            path: "/ClientCSS/NWS/Modules.Accessibility.Support/MegaMenu.css"
        }],
        getScriptByKey: function(key) {
            var scriptOverrides = _.params.scriptOverrides || [];
            return NWS.CommonScripts.ModuleManager.GetScriptByKey(key, _.defaultScripts, scriptOverrides)
        },
        params: null,
        preloadScripts: null,
        requiredScripts: null,
        deferredScripts: null,
        initScripts: function() {
            var preloadScripts = _.params.preloadScripts || [];
            var requiredScripts = _.params.requiredScripts || [];
            var deferredScripts = _.params.deferredScripts || [];
            requiredScripts.push(_.getScriptByKey("BaseOverridesJS"));
            requiredScripts.push(_.getScriptByKey("TabsJS"));
            requiredScripts.push(_.getScriptByKey("AccessibilityCSS"));
            if (typeof(_.params.topNavOptions) !== "undefined") {
                requiredScripts.push(_.getScriptByKey("TopNavJS"));
                requiredScripts.push(_.getScriptByKey("TopNavCSS"))
            }
            if (typeof(_.params.megaMenuOptions) !== "undefined") {
                requiredScripts.push(_.getScriptByKey("MegaMenuJS"));
                requiredScripts.push(_.getScriptByKey("MegaMenuCSS"))
            }
            _.requiredScripts = requiredScripts;
            _.preloadScripts = preloadScripts;
            _.deferredScripts = deferredScripts
        },
        moduleLoadComplete: function() {
            var baseConfig = (typeof _.params.baseConfig === "undefined") ? {} : _.params.baseConfig;
            var tabsConfig = (typeof _.params.tabsConfig === "undefined") ? {} : _.params.tabsConfig;
            var topNavOptions = (typeof _.params.topNavOptions === "undefined") ? {} : _.params.topNavOptions;
            var megaMenuOptions = (typeof _.params.megaMenuOptions === "undefined") ? {} : _.params.megaMenuOptions;
            NWS.Modules.InitModule("NWS.Modules.Accessibility.BaseOverrides", baseConfig);
            NWS.Modules.InitModule("NWS.Modules.Accessibility.Tabs", tabsConfig);
            NWS.Modules.InitModule("NWS.Modules.Accessibility.TopNav", topNavOptions);
            NWS.Modules.InitModule("NWS.Modules.Accessibility.MegaMenu", megaMenuOptions)
        }
    };
    return {
        init: function(params) {
            _.params = params;
            _.initScripts();
            window.addEventListener("load", function() {
                NWS.Modules.Register(_.deferredScripts, null)
            });
            NWS.Modules.Register(_.requiredScripts, null, "preload");
            NWS.Modules.Register(_.preloadScripts, null, "preload");
            NWS.Modules.Register(_.requiredScripts, _.moduleLoadComplete)
        }
    }
})