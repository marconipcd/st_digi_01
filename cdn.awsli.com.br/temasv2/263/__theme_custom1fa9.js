// slick
!function (a) { "use strict"; "function" == typeof define && define.amd ? define(["jquery"], a) : "undefined" != typeof exports ? module.exports = a(require("jquery")) : a(jQuery) }(function (a) {
    "use strict"; var b = window.Slick || {}; b = function () { function c(c, d) { var f, e = this; e.defaults = { accessibility: !0, adaptiveHeight: !1, appendArrows: a(c), appendDots: a(c), arrows: !0, asNavFor: null, prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button">Previous</button>', nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button">Next</button>', autoplay: !1, autoplaySpeed: 3e3, centerMode: !1, centerPadding: "50px", cssEase: "ease", customPaging: function (a, b) { return '<button type="button" data-role="none" role="button" aria-required="false" tabindex="0">' + (b + 1) + "</button>" }, dots: !1, dotsClass: "slick-dots", draggable: !0, easing: "linear", edgeFriction: .35, fade: !1, focusOnSelect: !1, infinite: !0, initialSlide: 0, lazyLoad: "ondemand", mobileFirst: !1, pauseOnHover: !0, pauseOnDotsHover: !1, respondTo: "window", responsive: null, rows: 1, rtl: !1, slide: "", slidesPerRow: 1, slidesToShow: 1, slidesToScroll: 1, speed: 500, swipe: !0, swipeToSlide: !1, touchMove: !0, touchThreshold: 5, useCSS: !0, useTransform: !1, variableWidth: !1, vertical: !1, verticalSwiping: !1, waitForAnimate: !0, zIndex: 1e3 }, e.initials = { animating: !1, dragging: !1, autoPlayTimer: null, currentDirection: 0, currentLeft: null, currentSlide: 0, direction: 1, $dots: null, listWidth: null, listHeight: null, loadIndex: 0, $nextArrow: null, $prevArrow: null, slideCount: null, slideWidth: null, $slideTrack: null, $slides: null, sliding: !1, slideOffset: 0, swipeLeft: null, $list: null, touchObject: {}, transformsEnabled: !1, unslicked: !1 }, a.extend(e, e.initials), e.activeBreakpoint = null, e.animType = null, e.animProp = null, e.breakpoints = [], e.breakpointSettings = [], e.cssTransitions = !1, e.hidden = "hidden", e.paused = !1, e.positionProp = null, e.respondTo = null, e.rowCount = 1, e.shouldClick = !0, e.$slider = a(c), e.$slidesCache = null, e.transformType = null, e.transitionType = null, e.visibilityChange = "visibilitychange", e.windowWidth = 0, e.windowTimer = null, f = a(c).data("slick") || {}, e.options = a.extend({}, e.defaults, f, d), e.currentSlide = e.options.initialSlide, e.originalSettings = e.options, "undefined" != typeof document.mozHidden ? (e.hidden = "mozHidden", e.visibilityChange = "mozvisibilitychange") : "undefined" != typeof document.webkitHidden && (e.hidden = "webkitHidden", e.visibilityChange = "webkitvisibilitychange"), e.autoPlay = a.proxy(e.autoPlay, e), e.autoPlayClear = a.proxy(e.autoPlayClear, e), e.changeSlide = a.proxy(e.changeSlide, e), e.clickHandler = a.proxy(e.clickHandler, e), e.selectHandler = a.proxy(e.selectHandler, e), e.setPosition = a.proxy(e.setPosition, e), e.swipeHandler = a.proxy(e.swipeHandler, e), e.dragHandler = a.proxy(e.dragHandler, e), e.keyHandler = a.proxy(e.keyHandler, e), e.autoPlayIterator = a.proxy(e.autoPlayIterator, e), e.instanceUid = b++ , e.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/, e.registerBreakpoints(), e.init(!0), e.checkResponsive(!0) } var b = 0; return c }(), b.prototype.addSlide = b.prototype.slickAdd = function (b, c, d) { var e = this; if ("boolean" == typeof c) d = c, c = null; else if (0 > c || c >= e.slideCount) return !1; e.unload(), "number" == typeof c ? 0 === c && 0 === e.$slides.length ? a(b).appendTo(e.$slideTrack) : d ? a(b).insertBefore(e.$slides.eq(c)) : a(b).insertAfter(e.$slides.eq(c)) : d === !0 ? a(b).prependTo(e.$slideTrack) : a(b).appendTo(e.$slideTrack), e.$slides = e.$slideTrack.children(this.options.slide), e.$slideTrack.children(this.options.slide).detach(), e.$slideTrack.append(e.$slides), e.$slides.each(function (b, c) { a(c).attr("data-slick-index", b) }), e.$slidesCache = e.$slides, e.reinit() }, b.prototype.animateHeight = function () { var a = this; if (1 === a.options.slidesToShow && a.options.adaptiveHeight === !0 && a.options.vertical === !1) { var b = a.$slides.eq(a.currentSlide).outerHeight(!0); a.$list.animate({ height: b }, a.options.speed) } }, b.prototype.animateSlide = function (b, c) { var d = {}, e = this; e.animateHeight(), e.options.rtl === !0 && e.options.vertical === !1 && (b = -b), e.transformsEnabled === !1 ? e.options.vertical === !1 ? e.$slideTrack.animate({ left: b }, e.options.speed, e.options.easing, c) : e.$slideTrack.animate({ top: b }, e.options.speed, e.options.easing, c) : e.cssTransitions === !1 ? (e.options.rtl === !0 && (e.currentLeft = -e.currentLeft), a({ animStart: e.currentLeft }).animate({ animStart: b }, { duration: e.options.speed, easing: e.options.easing, step: function (a) { a = Math.ceil(a), e.options.vertical === !1 ? (d[e.animType] = "translate(" + a + "px, 0px)", e.$slideTrack.css(d)) : (d[e.animType] = "translate(0px," + a + "px)", e.$slideTrack.css(d)) }, complete: function () { c && c.call() } })) : (e.applyTransition(), b = Math.ceil(b), e.options.vertical === !1 ? d[e.animType] = "translate3d(" + b + "px, 0px, 0px)" : d[e.animType] = "translate3d(0px," + b + "px, 0px)", e.$slideTrack.css(d), c && setTimeout(function () { e.disableTransition(), c.call() }, e.options.speed)) }, b.prototype.asNavFor = function (b) { var c = this, d = c.options.asNavFor; d && null !== d && (d = a(d).not(c.$slider)), null !== d && "object" == typeof d && d.each(function () { var c = a(this).slick("getSlick"); c.unslicked || c.slideHandler(b, !0) }) }, b.prototype.applyTransition = function (a) { var b = this, c = {}; b.options.fade === !1 ? c[b.transitionType] = b.transformType + " " + b.options.speed + "ms " + b.options.cssEase : c[b.transitionType] = "opacity " + b.options.speed + "ms " + b.options.cssEase, b.options.fade === !1 ? b.$slideTrack.css(c) : b.$slides.eq(a).css(c) }, b.prototype.autoPlay = function () { var a = this; a.autoPlayTimer && clearInterval(a.autoPlayTimer), a.slideCount > a.options.slidesToShow && a.paused !== !0 && (a.autoPlayTimer = setInterval(a.autoPlayIterator, a.options.autoplaySpeed)) }, b.prototype.autoPlayClear = function () { var a = this; a.autoPlayTimer && clearInterval(a.autoPlayTimer) }, b.prototype.autoPlayIterator = function () { var a = this; a.options.infinite === !1 ? 1 === a.direction ? (a.currentSlide + 1 === a.slideCount - 1 && (a.direction = 0), a.slideHandler(a.currentSlide + a.options.slidesToScroll)) : (a.currentSlide - 1 === 0 && (a.direction = 1), a.slideHandler(a.currentSlide - a.options.slidesToScroll)) : a.slideHandler(a.currentSlide + a.options.slidesToScroll) }, b.prototype.buildArrows = function () { var b = this; b.options.arrows === !0 && (b.$prevArrow = a(b.options.prevArrow).addClass("slick-arrow"), b.$nextArrow = a(b.options.nextArrow).addClass("slick-arrow"), b.slideCount > b.options.slidesToShow ? (b.$prevArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), b.$nextArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), b.htmlExpr.test(b.options.prevArrow) && b.$prevArrow.prependTo(b.options.appendArrows), b.htmlExpr.test(b.options.nextArrow) && b.$nextArrow.appendTo(b.options.appendArrows), b.options.infinite !== !0 && b.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true")) : b.$prevArrow.add(b.$nextArrow).addClass("slick-hidden").attr({ "aria-disabled": "true", tabindex: "-1" })) }, b.prototype.buildDots = function () { var c, d, b = this; if (b.options.dots === !0 && b.slideCount > b.options.slidesToShow) { for (d = '<ul class="' + b.options.dotsClass + '">', c = 0; c <= b.getDotCount(); c += 1)d += "<li>" + b.options.customPaging.call(this, b, c) + "</li>"; d += "</ul>", b.$dots = a(d).appendTo(b.options.appendDots), b.$dots.find("li").first().addClass("slick-active").attr("aria-hidden", "false") } }, b.prototype.buildOut = function () { var b = this; b.$slides = b.$slider.children(b.options.slide + ":not(.slick-cloned)").addClass("slick-slide"), b.slideCount = b.$slides.length, b.$slides.each(function (b, c) { a(c).attr("data-slick-index", b).data("originalStyling", a(c).attr("style") || "") }), b.$slider.addClass("slick-slider"), b.$slideTrack = 0 === b.slideCount ? a('<div class="slick-track"/>').appendTo(b.$slider) : b.$slides.wrapAll('<div class="slick-track"/>').parent(), b.$list = b.$slideTrack.wrap('<div aria-live="polite" class="slick-list"/>').parent(), b.$slideTrack.css("opacity", 0), (b.options.centerMode === !0 || b.options.swipeToSlide === !0) && (b.options.slidesToScroll = 1), a("img[data-lazy]", b.$slider).not("[src]").addClass("slick-loading"), b.setupInfinite(), b.buildArrows(), b.buildDots(), b.updateDots(), b.setSlideClasses("number" == typeof b.currentSlide ? b.currentSlide : 0), b.options.draggable === !0 && b.$list.addClass("draggable") }, b.prototype.buildRows = function () { var b, c, d, e, f, g, h, a = this; if (e = document.createDocumentFragment(), g = a.$slider.children(), a.options.rows > 1) { for (h = a.options.slidesPerRow * a.options.rows, f = Math.ceil(g.length / h), b = 0; f > b; b++) { var i = document.createElement("div"); for (c = 0; c < a.options.rows; c++) { var j = document.createElement("div"); for (d = 0; d < a.options.slidesPerRow; d++) { var k = b * h + (c * a.options.slidesPerRow + d); g.get(k) && j.appendChild(g.get(k)) } i.appendChild(j) } e.appendChild(i) } a.$slider.html(e), a.$slider.children().children().children().css({ width: 100 / a.options.slidesPerRow + "%", display: "inline-block" }) } }, b.prototype.checkResponsive = function (b, c) { var e, f, g, d = this, h = !1, i = d.$slider.width(), j = window.innerWidth || a(window).width(); if ("window" === d.respondTo ? g = j : "slider" === d.respondTo ? g = i : "min" === d.respondTo && (g = Math.min(j, i)), d.options.responsive && d.options.responsive.length && null !== d.options.responsive) { f = null; for (e in d.breakpoints) d.breakpoints.hasOwnProperty(e) && (d.originalSettings.mobileFirst === !1 ? g < d.breakpoints[e] && (f = d.breakpoints[e]) : g > d.breakpoints[e] && (f = d.breakpoints[e])); null !== f ? null !== d.activeBreakpoint ? (f !== d.activeBreakpoint || c) && (d.activeBreakpoint = f, "unslick" === d.breakpointSettings[f] ? d.unslick(f) : (d.options = a.extend({}, d.originalSettings, d.breakpointSettings[f]), b === !0 && (d.currentSlide = d.options.initialSlide), d.refresh(b)), h = f) : (d.activeBreakpoint = f, "unslick" === d.breakpointSettings[f] ? d.unslick(f) : (d.options = a.extend({}, d.originalSettings, d.breakpointSettings[f]), b === !0 && (d.currentSlide = d.options.initialSlide), d.refresh(b)), h = f) : null !== d.activeBreakpoint && (d.activeBreakpoint = null, d.options = d.originalSettings, b === !0 && (d.currentSlide = d.options.initialSlide), d.refresh(b), h = f), b || h === !1 || d.$slider.trigger("breakpoint", [d, h]) } }, b.prototype.changeSlide = function (b, c) { var f, g, h, d = this, e = a(b.target); switch (e.is("a") && b.preventDefault(), e.is("li") || (e = e.closest("li")), h = d.slideCount % d.options.slidesToScroll !== 0, f = h ? 0 : (d.slideCount - d.currentSlide) % d.options.slidesToScroll, b.data.message) { case "previous": g = 0 === f ? d.options.slidesToScroll : d.options.slidesToShow - f, d.slideCount > d.options.slidesToShow && d.slideHandler(d.currentSlide - g, !1, c); break; case "next": g = 0 === f ? d.options.slidesToScroll : f, d.slideCount > d.options.slidesToShow && d.slideHandler(d.currentSlide + g, !1, c); break; case "index": var i = 0 === b.data.index ? 0 : b.data.index || e.index() * d.options.slidesToScroll; d.slideHandler(d.checkNavigable(i), !1, c), e.children().trigger("focus"); break; default: return } }, b.prototype.checkNavigable = function (a) { var c, d, b = this; if (c = b.getNavigableIndexes(), d = 0, a > c[c.length - 1]) a = c[c.length - 1]; else for (var e in c) { if (a < c[e]) { a = d; break } d = c[e] } return a }, b.prototype.cleanUpEvents = function () { var b = this; b.options.dots && null !== b.$dots && (a("li", b.$dots).off("click.slick", b.changeSlide), b.options.pauseOnDotsHover === !0 && b.options.autoplay === !0 && a("li", b.$dots).off("mouseenter.slick", a.proxy(b.setPaused, b, !0)).off("mouseleave.slick", a.proxy(b.setPaused, b, !1))), b.options.arrows === !0 && b.slideCount > b.options.slidesToShow && (b.$prevArrow && b.$prevArrow.off("click.slick", b.changeSlide), b.$nextArrow && b.$nextArrow.off("click.slick", b.changeSlide)), b.$list.off("touchstart.slick mousedown.slick", b.swipeHandler), b.$list.off("touchmove.slick mousemove.slick", b.swipeHandler), b.$list.off("touchend.slick mouseup.slick", b.swipeHandler), b.$list.off("touchcancel.slick mouseleave.slick", b.swipeHandler), b.$list.off("click.slick", b.clickHandler), a(document).off(b.visibilityChange, b.visibility), b.$list.off("mouseenter.slick", a.proxy(b.setPaused, b, !0)), b.$list.off("mouseleave.slick", a.proxy(b.setPaused, b, !1)), b.options.accessibility === !0 && b.$list.off("keydown.slick", b.keyHandler), b.options.focusOnSelect === !0 && a(b.$slideTrack).children().off("click.slick", b.selectHandler), a(window).off("orientationchange.slick.slick-" + b.instanceUid, b.orientationChange), a(window).off("resize.slick.slick-" + b.instanceUid, b.resize), a("[draggable!=true]", b.$slideTrack).off("dragstart", b.preventDefault), a(window).off("load.slick.slick-" + b.instanceUid, b.setPosition), a(document).off("ready.slick.slick-" + b.instanceUid, b.setPosition) }, b.prototype.cleanUpRows = function () { var b, a = this; a.options.rows > 1 && (b = a.$slides.children().children(), b.removeAttr("style"), a.$slider.html(b)) }, b.prototype.clickHandler = function (a) { var b = this; b.shouldClick === !1 && (a.stopImmediatePropagation(), a.stopPropagation(), a.preventDefault()) }, b.prototype.destroy = function (b) { var c = this; c.autoPlayClear(), c.touchObject = {}, c.cleanUpEvents(), a(".slick-cloned", c.$slider).detach(), c.$dots && c.$dots.remove(), c.$prevArrow && c.$prevArrow.length && (c.$prevArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), c.htmlExpr.test(c.options.prevArrow) && c.$prevArrow.remove()), c.$nextArrow && c.$nextArrow.length && (c.$nextArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), c.htmlExpr.test(c.options.nextArrow) && c.$nextArrow.remove()), c.$slides && (c.$slides.removeClass("slick-slide slick-active slick-center slick-visible slick-current").removeAttr("aria-hidden").removeAttr("data-slick-index").each(function () { a(this).attr("style", a(this).data("originalStyling")) }), c.$slideTrack.children(this.options.slide).detach(), c.$slideTrack.detach(), c.$list.detach(), c.$slider.append(c.$slides)), c.cleanUpRows(), c.$slider.removeClass("slick-slider"), c.$slider.removeClass("slick-initialized"), c.unslicked = !0, b || c.$slider.trigger("destroy", [c]) }, b.prototype.disableTransition = function (a) { var b = this, c = {}; c[b.transitionType] = "", b.options.fade === !1 ? b.$slideTrack.css(c) : b.$slides.eq(a).css(c) }, b.prototype.fadeSlide = function (a, b) { var c = this; c.cssTransitions === !1 ? (c.$slides.eq(a).css({ zIndex: c.options.zIndex }), c.$slides.eq(a).animate({ opacity: 1 }, c.options.speed, c.options.easing, b)) : (c.applyTransition(a), c.$slides.eq(a).css({ opacity: 1, zIndex: c.options.zIndex }), b && setTimeout(function () { c.disableTransition(a), b.call() }, c.options.speed)) }, b.prototype.fadeSlideOut = function (a) { var b = this; b.cssTransitions === !1 ? b.$slides.eq(a).animate({ opacity: 0, zIndex: b.options.zIndex - 2 }, b.options.speed, b.options.easing) : (b.applyTransition(a), b.$slides.eq(a).css({ opacity: 0, zIndex: b.options.zIndex - 2 })) }, b.prototype.filterSlides = b.prototype.slickFilter = function (a) { var b = this; null !== a && (b.$slidesCache = b.$slides, b.unload(), b.$slideTrack.children(this.options.slide).detach(), b.$slidesCache.filter(a).appendTo(b.$slideTrack), b.reinit()) }, b.prototype.getCurrent = b.prototype.slickCurrentSlide = function () { var a = this; return a.currentSlide }, b.prototype.getDotCount = function () { var a = this, b = 0, c = 0, d = 0; if (a.options.infinite === !0) for (; b < a.slideCount;)++d, b = c + a.options.slidesToScroll, c += a.options.slidesToScroll <= a.options.slidesToShow ? a.options.slidesToScroll : a.options.slidesToShow; else if (a.options.centerMode === !0) d = a.slideCount; else for (; b < a.slideCount;)++d, b = c + a.options.slidesToScroll, c += a.options.slidesToScroll <= a.options.slidesToShow ? a.options.slidesToScroll : a.options.slidesToShow; return d - 1 }, b.prototype.getLeft = function (a) { var c, d, f, b = this, e = 0; return b.slideOffset = 0, d = b.$slides.first().outerHeight(!0), b.options.infinite === !0 ? (b.slideCount > b.options.slidesToShow && (b.slideOffset = b.slideWidth * b.options.slidesToShow * -1, e = d * b.options.slidesToShow * -1), b.slideCount % b.options.slidesToScroll !== 0 && a + b.options.slidesToScroll > b.slideCount && b.slideCount > b.options.slidesToShow && (a > b.slideCount ? (b.slideOffset = (b.options.slidesToShow - (a - b.slideCount)) * b.slideWidth * -1, e = (b.options.slidesToShow - (a - b.slideCount)) * d * -1) : (b.slideOffset = b.slideCount % b.options.slidesToScroll * b.slideWidth * -1, e = b.slideCount % b.options.slidesToScroll * d * -1))) : a + b.options.slidesToShow > b.slideCount && (b.slideOffset = (a + b.options.slidesToShow - b.slideCount) * b.slideWidth, e = (a + b.options.slidesToShow - b.slideCount) * d), b.slideCount <= b.options.slidesToShow && (b.slideOffset = 0, e = 0), b.options.centerMode === !0 && b.options.infinite === !0 ? b.slideOffset += b.slideWidth * Math.floor(b.options.slidesToShow / 2) - b.slideWidth : b.options.centerMode === !0 && (b.slideOffset = 0, b.slideOffset += b.slideWidth * Math.floor(b.options.slidesToShow / 2)), c = b.options.vertical === !1 ? a * b.slideWidth * -1 + b.slideOffset : a * d * -1 + e, b.options.variableWidth === !0 && (f = b.slideCount <= b.options.slidesToShow || b.options.infinite === !1 ? b.$slideTrack.children(".slick-slide").eq(a) : b.$slideTrack.children(".slick-slide").eq(a + b.options.slidesToShow), c = b.options.rtl === !0 ? f[0] ? -1 * (b.$slideTrack.width() - f[0].offsetLeft - f.width()) : 0 : f[0] ? -1 * f[0].offsetLeft : 0, b.options.centerMode === !0 && (f = b.slideCount <= b.options.slidesToShow || b.options.infinite === !1 ? b.$slideTrack.children(".slick-slide").eq(a) : b.$slideTrack.children(".slick-slide").eq(a + b.options.slidesToShow + 1), c = b.options.rtl === !0 ? f[0] ? -1 * (b.$slideTrack.width() - f[0].offsetLeft - f.width()) : 0 : f[0] ? -1 * f[0].offsetLeft : 0, c += (b.$list.width() - f.outerWidth()) / 2)), c }, b.prototype.getOption = b.prototype.slickGetOption = function (a) { var b = this; return b.options[a] }, b.prototype.getNavigableIndexes = function () { var e, a = this, b = 0, c = 0, d = []; for (a.options.infinite === !1 ? e = a.slideCount : (b = -1 * a.options.slidesToScroll, c = -1 * a.options.slidesToScroll, e = 2 * a.slideCount); e > b;)d.push(b), b = c + a.options.slidesToScroll, c += a.options.slidesToScroll <= a.options.slidesToShow ? a.options.slidesToScroll : a.options.slidesToShow; return d }, b.prototype.getSlick = function () { return this }, b.prototype.getSlideCount = function () { var c, d, e, b = this; return e = b.options.centerMode === !0 ? b.slideWidth * Math.floor(b.options.slidesToShow / 2) : 0, b.options.swipeToSlide === !0 ? (b.$slideTrack.find(".slick-slide").each(function (c, f) { return f.offsetLeft - e + a(f).outerWidth() / 2 > -1 * b.swipeLeft ? (d = f, !1) : void 0 }), c = Math.abs(a(d).attr("data-slick-index") - b.currentSlide) || 1) : b.options.slidesToScroll }, b.prototype.goTo = b.prototype.slickGoTo = function (a, b) { var c = this; c.changeSlide({ data: { message: "index", index: parseInt(a) } }, b) }, b.prototype.init = function (b) { var c = this; a(c.$slider).hasClass("slick-initialized") || (a(c.$slider).addClass("slick-initialized"), c.buildRows(), c.buildOut(), c.setProps(), c.startLoad(), c.loadSlider(), c.initializeEvents(), c.updateArrows(), c.updateDots()), b && c.$slider.trigger("init", [c]), c.options.accessibility === !0 && c.initADA() }, b.prototype.initArrowEvents = function () { var a = this; a.options.arrows === !0 && a.slideCount > a.options.slidesToShow && (a.$prevArrow.on("click.slick", { message: "previous" }, a.changeSlide), a.$nextArrow.on("click.slick", { message: "next" }, a.changeSlide)) }, b.prototype.initDotEvents = function () { var b = this; b.options.dots === !0 && b.slideCount > b.options.slidesToShow && a("li", b.$dots).on("click.slick", { message: "index" }, b.changeSlide), b.options.dots === !0 && b.options.pauseOnDotsHover === !0 && b.options.autoplay === !0 && a("li", b.$dots).on("mouseenter.slick", a.proxy(b.setPaused, b, !0)).on("mouseleave.slick", a.proxy(b.setPaused, b, !1)) }, b.prototype.initializeEvents = function () { var b = this; b.initArrowEvents(), b.initDotEvents(), b.$list.on("touchstart.slick mousedown.slick", { action: "start" }, b.swipeHandler), b.$list.on("touchmove.slick mousemove.slick", { action: "move" }, b.swipeHandler), b.$list.on("touchend.slick mouseup.slick", { action: "end" }, b.swipeHandler), b.$list.on("touchcancel.slick mouseleave.slick", { action: "end" }, b.swipeHandler), b.$list.on("click.slick", b.clickHandler), a(document).on(b.visibilityChange, a.proxy(b.visibility, b)), b.$list.on("mouseenter.slick", a.proxy(b.setPaused, b, !0)), b.$list.on("mouseleave.slick", a.proxy(b.setPaused, b, !1)), b.options.accessibility === !0 && b.$list.on("keydown.slick", b.keyHandler), b.options.focusOnSelect === !0 && a(b.$slideTrack).children().on("click.slick", b.selectHandler), a(window).on("orientationchange.slick.slick-" + b.instanceUid, a.proxy(b.orientationChange, b)), a(window).on("resize.slick.slick-" + b.instanceUid, a.proxy(b.resize, b)), a("[draggable!=true]", b.$slideTrack).on("dragstart", b.preventDefault), a(window).on("load.slick.slick-" + b.instanceUid, b.setPosition), a(document).on("ready.slick.slick-" + b.instanceUid, b.setPosition) }, b.prototype.initUI = function () { var a = this; a.options.arrows === !0 && a.slideCount > a.options.slidesToShow && (a.$prevArrow.show(), a.$nextArrow.show()), a.options.dots === !0 && a.slideCount > a.options.slidesToShow && a.$dots.show(), a.options.autoplay === !0 && a.autoPlay() }, b.prototype.keyHandler = function (a) { var b = this; a.target.tagName.match("TEXTAREA|INPUT|SELECT") || (37 === a.keyCode && b.options.accessibility === !0 ? b.changeSlide({ data: { message: "previous" } }) : 39 === a.keyCode && b.options.accessibility === !0 && b.changeSlide({ data: { message: "next" } })) }, b.prototype.lazyLoad = function () { function g(b) { a("img[data-lazy]", b).each(function () { var b = a(this), c = a(this).attr("data-lazy"), d = document.createElement("img"); d.onload = function () { b.animate({ opacity: 0 }, 100, function () { b.attr("src", c).animate({ opacity: 1 }, 200, function () { b.removeAttr("data-lazy").removeClass("slick-loading") }) }) }, d.src = c }) } var c, d, e, f, b = this; b.options.centerMode === !0 ? b.options.infinite === !0 ? (e = b.currentSlide + (b.options.slidesToShow / 2 + 1), f = e + b.options.slidesToShow + 2) : (e = Math.max(0, b.currentSlide - (b.options.slidesToShow / 2 + 1)), f = 2 + (b.options.slidesToShow / 2 + 1) + b.currentSlide) : (e = b.options.infinite ? b.options.slidesToShow + b.currentSlide : b.currentSlide, f = e + b.options.slidesToShow, b.options.fade === !0 && (e > 0 && e-- , f <= b.slideCount && f++)), c = b.$slider.find(".slick-slide").slice(e, f), g(c), b.slideCount <= b.options.slidesToShow ? (d = b.$slider.find(".slick-slide"), g(d)) : b.currentSlide >= b.slideCount - b.options.slidesToShow ? (d = b.$slider.find(".slick-cloned").slice(0, b.options.slidesToShow), g(d)) : 0 === b.currentSlide && (d = b.$slider.find(".slick-cloned").slice(-1 * b.options.slidesToShow), g(d)) }, b.prototype.loadSlider = function () { var a = this; a.setPosition(), a.$slideTrack.css({ opacity: 1 }), a.$slider.removeClass("slick-loading"), a.initUI(), "progressive" === a.options.lazyLoad && a.progressiveLazyLoad() }, b.prototype.next = b.prototype.slickNext = function () { var a = this; a.changeSlide({ data: { message: "next" } }) }, b.prototype.orientationChange = function () { var a = this; a.checkResponsive(), a.setPosition() }, b.prototype.pause = b.prototype.slickPause = function () { var a = this; a.autoPlayClear(), a.paused = !0 }, b.prototype.play = b.prototype.slickPlay = function () { var a = this; a.paused = !1, a.autoPlay() }, b.prototype.postSlide = function (a) { var b = this; b.$slider.trigger("afterChange", [b, a]), b.animating = !1, b.setPosition(), b.swipeLeft = null, b.options.autoplay === !0 && b.paused === !1 && b.autoPlay(), b.options.accessibility === !0 && b.initADA() }, b.prototype.prev = b.prototype.slickPrev = function () { var a = this; a.changeSlide({ data: { message: "previous" } }) }, b.prototype.preventDefault = function (a) { a.preventDefault() }, b.prototype.progressiveLazyLoad = function () { var c, d, b = this; c = a("img[data-lazy]", b.$slider).length, c > 0 && (d = a("img[data-lazy]", b.$slider).first(), d.attr("src", null), d.attr("src", d.attr("data-lazy")).removeClass("slick-loading").load(function () { d.removeAttr("data-lazy"), b.progressiveLazyLoad(), b.options.adaptiveHeight === !0 && b.setPosition() }).error(function () { d.removeAttr("data-lazy"), b.progressiveLazyLoad() })) }, b.prototype.refresh = function (b) { var d, e, c = this; e = c.slideCount - c.options.slidesToShow, c.options.infinite || (c.slideCount <= c.options.slidesToShow ? c.currentSlide = 0 : c.currentSlide > e && (c.currentSlide = e)), d = c.currentSlide, c.destroy(!0), a.extend(c, c.initials, { currentSlide: d }), c.init(), b || c.changeSlide({ data: { message: "index", index: d } }, !1) }, b.prototype.registerBreakpoints = function () { var c, d, e, b = this, f = b.options.responsive || null; if ("array" === a.type(f) && f.length) { b.respondTo = b.options.respondTo || "window"; for (c in f) if (e = b.breakpoints.length - 1, d = f[c].breakpoint, f.hasOwnProperty(c)) { for (; e >= 0;)b.breakpoints[e] && b.breakpoints[e] === d && b.breakpoints.splice(e, 1), e--; b.breakpoints.push(d), b.breakpointSettings[d] = f[c].settings } b.breakpoints.sort(function (a, c) { return b.options.mobileFirst ? a - c : c - a }) } }, b.prototype.reinit = function () { var b = this; b.$slides = b.$slideTrack.children(b.options.slide).addClass("slick-slide"), b.slideCount = b.$slides.length, b.currentSlide >= b.slideCount && 0 !== b.currentSlide && (b.currentSlide = b.currentSlide - b.options.slidesToScroll), b.slideCount <= b.options.slidesToShow && (b.currentSlide = 0), b.registerBreakpoints(), b.setProps(), b.setupInfinite(), b.buildArrows(), b.updateArrows(), b.initArrowEvents(), b.buildDots(), b.updateDots(), b.initDotEvents(), b.checkResponsive(!1, !0), b.options.focusOnSelect === !0 && a(b.$slideTrack).children().on("click.slick", b.selectHandler), b.setSlideClasses(0), b.setPosition(), b.$slider.trigger("reInit", [b]), b.options.autoplay === !0 && b.focusHandler() }, b.prototype.resize = function () { var b = this; a(window).width() !== b.windowWidth && (clearTimeout(b.windowDelay), b.windowDelay = window.setTimeout(function () { b.windowWidth = a(window).width(), b.checkResponsive(), b.unslicked || b.setPosition() }, 50)) }, b.prototype.removeSlide = b.prototype.slickRemove = function (a, b, c) { var d = this; return "boolean" == typeof a ? (b = a, a = b === !0 ? 0 : d.slideCount - 1) : a = b === !0 ? --a : a, d.slideCount < 1 || 0 > a || a > d.slideCount - 1 ? !1 : (d.unload(), c === !0 ? d.$slideTrack.children().remove() : d.$slideTrack.children(this.options.slide).eq(a).remove(), d.$slides = d.$slideTrack.children(this.options.slide), d.$slideTrack.children(this.options.slide).detach(), d.$slideTrack.append(d.$slides), d.$slidesCache = d.$slides, void d.reinit()) }, b.prototype.setCSS = function (a) { var d, e, b = this, c = {}; b.options.rtl === !0 && (a = -a), d = "left" == b.positionProp ? Math.ceil(a) + "px" : "0px", e = "top" == b.positionProp ? Math.ceil(a) + "px" : "0px", c[b.positionProp] = a, b.transformsEnabled === !1 ? b.$slideTrack.css(c) : (c = {}, b.cssTransitions === !1 ? (c[b.animType] = "translate(" + d + ", " + e + ")", b.$slideTrack.css(c)) : (c[b.animType] = "translate3d(" + d + ", " + e + ", 0px)", b.$slideTrack.css(c))) }, b.prototype.setDimensions = function () { var a = this; a.options.vertical === !1 ? a.options.centerMode === !0 && a.$list.css({ padding: "0px " + a.options.centerPadding }) : (a.$list.height(a.$slides.first().outerHeight(!0) * a.options.slidesToShow), a.options.centerMode === !0 && a.$list.css({ padding: a.options.centerPadding + " 0px" })), a.listWidth = a.$list.width(), a.listHeight = a.$list.height(), a.options.vertical === !1 && a.options.variableWidth === !1 ? (a.slideWidth = Math.ceil(a.listWidth / a.options.slidesToShow), a.$slideTrack.width(Math.ceil(a.slideWidth * a.$slideTrack.children(".slick-slide").length))) : a.options.variableWidth === !0 ? a.$slideTrack.width(5e3 * a.slideCount) : (a.slideWidth = Math.ceil(a.listWidth), a.$slideTrack.height(Math.ceil(a.$slides.first().outerHeight(!0) * a.$slideTrack.children(".slick-slide").length))); var b = a.$slides.first().outerWidth(!0) - a.$slides.first().width(); a.options.variableWidth === !1 && a.$slideTrack.children(".slick-slide").width(a.slideWidth - b) }, b.prototype.setFade = function () { var c, b = this; b.$slides.each(function (d, e) { c = b.slideWidth * d * -1, b.options.rtl === !0 ? a(e).css({ position: "relative", right: c, top: 0, zIndex: b.options.zIndex - 2, opacity: 0 }) : a(e).css({ position: "relative", left: c, top: 0, zIndex: b.options.zIndex - 2, opacity: 0 }) }), b.$slides.eq(b.currentSlide).css({ zIndex: b.options.zIndex - 1, opacity: 1 }) }, b.prototype.setHeight = function () { var a = this; if (1 === a.options.slidesToShow && a.options.adaptiveHeight === !0 && a.options.vertical === !1) { var b = a.$slides.eq(a.currentSlide).outerHeight(!0); a.$list.css("height", b) } }, b.prototype.setOption = b.prototype.slickSetOption = function (b, c, d) { var f, g, e = this; if ("responsive" === b && "array" === a.type(c)) for (g in c) if ("array" !== a.type(e.options.responsive)) e.options.responsive = [c[g]]; else { for (f = e.options.responsive.length - 1; f >= 0;)e.options.responsive[f].breakpoint === c[g].breakpoint && e.options.responsive.splice(f, 1), f--; e.options.responsive.push(c[g]) } else e.options[b] = c; d === !0 && (e.unload(), e.reinit()) }, b.prototype.setPosition = function () { var a = this; a.setDimensions(), a.setHeight(), a.options.fade === !1 ? a.setCSS(a.getLeft(a.currentSlide)) : a.setFade(), a.$slider.trigger("setPosition", [a]) }, b.prototype.setProps = function () { var a = this, b = document.body.style; a.positionProp = a.options.vertical === !0 ? "top" : "left", "top" === a.positionProp ? a.$slider.addClass("slick-vertical") : a.$slider.removeClass("slick-vertical"), (void 0 !== b.WebkitTransition || void 0 !== b.MozTransition || void 0 !== b.msTransition) && a.options.useCSS === !0 && (a.cssTransitions = !0), a.options.fade && ("number" == typeof a.options.zIndex ? a.options.zIndex < 3 && (a.options.zIndex = 3) : a.options.zIndex = a.defaults.zIndex), void 0 !== b.OTransform && (a.animType = "OTransform", a.transformType = "-o-transform", a.transitionType = "OTransition", void 0 === b.perspectiveProperty && void 0 === b.webkitPerspective && (a.animType = !1)), void 0 !== b.MozTransform && (a.animType = "MozTransform", a.transformType = "-moz-transform", a.transitionType = "MozTransition", void 0 === b.perspectiveProperty && void 0 === b.MozPerspective && (a.animType = !1)), void 0 !== b.webkitTransform && (a.animType = "webkitTransform", a.transformType = "-webkit-transform", a.transitionType = "webkitTransition", void 0 === b.perspectiveProperty && void 0 === b.webkitPerspective && (a.animType = !1)), void 0 !== b.msTransform && (a.animType = "msTransform", a.transformType = "-ms-transform", a.transitionType = "msTransition", void 0 === b.msTransform && (a.animType = !1)), void 0 !== b.transform && a.animType !== !1 && (a.animType = "transform", a.transformType = "transform", a.transitionType = "transition"), a.transformsEnabled = a.options.useTransform && null !== a.animType && a.animType !== !1 }, b.prototype.setSlideClasses = function (a) { var c, d, e, f, b = this; d = b.$slider.find(".slick-slide").removeClass("slick-active slick-center slick-current").attr("aria-hidden", "true"), b.$slides.eq(a).addClass("slick-current"), b.options.centerMode === !0 ? (c = Math.floor(b.options.slidesToShow / 2), b.options.infinite === !0 && (a >= c && a <= b.slideCount - 1 - c ? b.$slides.slice(a - c, a + c + 1).addClass("slick-active").attr("aria-hidden", "false") : (e = b.options.slidesToShow + a, d.slice(e - c + 1, e + c + 2).addClass("slick-active").attr("aria-hidden", "false")), 0 === a ? d.eq(d.length - 1 - b.options.slidesToShow).addClass("slick-center") : a === b.slideCount - 1 && d.eq(b.options.slidesToShow).addClass("slick-center")), b.$slides.eq(a).addClass("slick-center")) : a >= 0 && a <= b.slideCount - b.options.slidesToShow ? b.$slides.slice(a, a + b.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false") : d.length <= b.options.slidesToShow ? d.addClass("slick-active").attr("aria-hidden", "false") : (f = b.slideCount % b.options.slidesToShow, e = b.options.infinite === !0 ? b.options.slidesToShow + a : a, b.options.slidesToShow == b.options.slidesToScroll && b.slideCount - a < b.options.slidesToShow ? d.slice(e - (b.options.slidesToShow - f), e + f).addClass("slick-active").attr("aria-hidden", "false") : d.slice(e, e + b.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false")), "ondemand" === b.options.lazyLoad && b.lazyLoad() }, b.prototype.setupInfinite = function () { var c, d, e, b = this; if (b.options.fade === !0 && (b.options.centerMode = !1), b.options.infinite === !0 && b.options.fade === !1 && (d = null, b.slideCount > b.options.slidesToShow)) { for (e = b.options.centerMode === !0 ? b.options.slidesToShow + 1 : b.options.slidesToShow, c = b.slideCount; c > b.slideCount - e; c -= 1)d = c - 1, a(b.$slides[d]).clone(!0).attr("id", "").attr("data-slick-index", d - b.slideCount).prependTo(b.$slideTrack).addClass("slick-cloned"); for (c = 0; e > c; c += 1)d = c, a(b.$slides[d]).clone(!0).attr("id", "").attr("data-slick-index", d + b.slideCount).appendTo(b.$slideTrack).addClass("slick-cloned"); b.$slideTrack.find(".slick-cloned").find("[id]").each(function () { a(this).attr("id", "") }) } }, b.prototype.setPaused = function (a) { var b = this; b.options.autoplay === !0 && b.options.pauseOnHover === !0 && (b.paused = a, a ? b.autoPlayClear() : b.autoPlay()) }, b.prototype.selectHandler = function (b) { var c = this, d = a(b.target).is(".slick-slide") ? a(b.target) : a(b.target).parents(".slick-slide"), e = parseInt(d.attr("data-slick-index")); return e || (e = 0), c.slideCount <= c.options.slidesToShow ? (c.setSlideClasses(e), void c.asNavFor(e)) : void c.slideHandler(e) }, b.prototype.slideHandler = function (a, b, c) {
        var d, e, f, g, h = null, i = this; return b = b || !1, i.animating === !0 && i.options.waitForAnimate === !0 || i.options.fade === !0 && i.currentSlide === a || i.slideCount <= i.options.slidesToShow ? void 0 : (b === !1 && i.asNavFor(a), d = a, h = i.getLeft(d), g = i.getLeft(i.currentSlide), i.currentLeft = null === i.swipeLeft ? g : i.swipeLeft, i.options.infinite === !1 && i.options.centerMode === !1 && (0 > a || a > i.getDotCount() * i.options.slidesToScroll) ? void (i.options.fade === !1 && (d = i.currentSlide, c !== !0 ? i.animateSlide(g, function () {
            i.postSlide(d);
        }) : i.postSlide(d))) : i.options.infinite === !1 && i.options.centerMode === !0 && (0 > a || a > i.slideCount - i.options.slidesToScroll) ? void (i.options.fade === !1 && (d = i.currentSlide, c !== !0 ? i.animateSlide(g, function () { i.postSlide(d) }) : i.postSlide(d))) : (i.options.autoplay === !0 && clearInterval(i.autoPlayTimer), e = 0 > d ? i.slideCount % i.options.slidesToScroll !== 0 ? i.slideCount - i.slideCount % i.options.slidesToScroll : i.slideCount + d : d >= i.slideCount ? i.slideCount % i.options.slidesToScroll !== 0 ? 0 : d - i.slideCount : d, i.animating = !0, i.$slider.trigger("beforeChange", [i, i.currentSlide, e]), f = i.currentSlide, i.currentSlide = e, i.setSlideClasses(i.currentSlide), i.updateDots(), i.updateArrows(), i.options.fade === !0 ? (c !== !0 ? (i.fadeSlideOut(f), i.fadeSlide(e, function () { i.postSlide(e) })) : i.postSlide(e), void i.animateHeight()) : void (c !== !0 ? i.animateSlide(h, function () { i.postSlide(e) }) : i.postSlide(e))))
    }, b.prototype.startLoad = function () { var a = this; a.options.arrows === !0 && a.slideCount > a.options.slidesToShow && (a.$prevArrow.hide(), a.$nextArrow.hide()), a.options.dots === !0 && a.slideCount > a.options.slidesToShow && a.$dots.hide(), a.$slider.addClass("slick-loading") }, b.prototype.swipeDirection = function () { var a, b, c, d, e = this; return a = e.touchObject.startX - e.touchObject.curX, b = e.touchObject.startY - e.touchObject.curY, c = Math.atan2(b, a), d = Math.round(180 * c / Math.PI), 0 > d && (d = 360 - Math.abs(d)), 45 >= d && d >= 0 ? e.options.rtl === !1 ? "left" : "right" : 360 >= d && d >= 315 ? e.options.rtl === !1 ? "left" : "right" : d >= 135 && 225 >= d ? e.options.rtl === !1 ? "right" : "left" : e.options.verticalSwiping === !0 ? d >= 35 && 135 >= d ? "left" : "right" : "vertical" }, b.prototype.swipeEnd = function (a) { var c, b = this; if (b.dragging = !1, b.shouldClick = b.touchObject.swipeLength > 10 ? !1 : !0, void 0 === b.touchObject.curX) return !1; if (b.touchObject.edgeHit === !0 && b.$slider.trigger("edge", [b, b.swipeDirection()]), b.touchObject.swipeLength >= b.touchObject.minSwipe) switch (b.swipeDirection()) { case "left": c = b.options.swipeToSlide ? b.checkNavigable(b.currentSlide + b.getSlideCount()) : b.currentSlide + b.getSlideCount(), b.slideHandler(c), b.currentDirection = 0, b.touchObject = {}, b.$slider.trigger("swipe", [b, "left"]); break; case "right": c = b.options.swipeToSlide ? b.checkNavigable(b.currentSlide - b.getSlideCount()) : b.currentSlide - b.getSlideCount(), b.slideHandler(c), b.currentDirection = 1, b.touchObject = {}, b.$slider.trigger("swipe", [b, "right"]) } else b.touchObject.startX !== b.touchObject.curX && (b.slideHandler(b.currentSlide), b.touchObject = {}) }, b.prototype.swipeHandler = function (a) { var b = this; if (!(b.options.swipe === !1 || "ontouchend" in document && b.options.swipe === !1 || b.options.draggable === !1 && -1 !== a.type.indexOf("mouse"))) switch (b.touchObject.fingerCount = a.originalEvent && void 0 !== a.originalEvent.touches ? a.originalEvent.touches.length : 1, b.touchObject.minSwipe = b.listWidth / b.options.touchThreshold, b.options.verticalSwiping === !0 && (b.touchObject.minSwipe = b.listHeight / b.options.touchThreshold), a.data.action) { case "start": b.swipeStart(a); break; case "move": b.swipeMove(a); break; case "end": b.swipeEnd(a) } }, b.prototype.swipeMove = function (a) { var d, e, f, g, h, b = this; return h = void 0 !== a.originalEvent ? a.originalEvent.touches : null, !b.dragging || h && 1 !== h.length ? !1 : (d = b.getLeft(b.currentSlide), b.touchObject.curX = void 0 !== h ? h[0].pageX : a.clientX, b.touchObject.curY = void 0 !== h ? h[0].pageY : a.clientY, b.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(b.touchObject.curX - b.touchObject.startX, 2))), b.options.verticalSwiping === !0 && (b.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(b.touchObject.curY - b.touchObject.startY, 2)))), e = b.swipeDirection(), "vertical" !== e ? (void 0 !== a.originalEvent && b.touchObject.swipeLength > 4 && a.preventDefault(), g = (b.options.rtl === !1 ? 1 : -1) * (b.touchObject.curX > b.touchObject.startX ? 1 : -1), b.options.verticalSwiping === !0 && (g = b.touchObject.curY > b.touchObject.startY ? 1 : -1), f = b.touchObject.swipeLength, b.touchObject.edgeHit = !1, b.options.infinite === !1 && (0 === b.currentSlide && "right" === e || b.currentSlide >= b.getDotCount() && "left" === e) && (f = b.touchObject.swipeLength * b.options.edgeFriction, b.touchObject.edgeHit = !0), b.options.vertical === !1 ? b.swipeLeft = d + f * g : b.swipeLeft = d + f * (b.$list.height() / b.listWidth) * g, b.options.verticalSwiping === !0 && (b.swipeLeft = d + f * g), b.options.fade === !0 || b.options.touchMove === !1 ? !1 : b.animating === !0 ? (b.swipeLeft = null, !1) : void b.setCSS(b.swipeLeft)) : void 0) }, b.prototype.swipeStart = function (a) { var c, b = this; return 1 !== b.touchObject.fingerCount || b.slideCount <= b.options.slidesToShow ? (b.touchObject = {}, !1) : (void 0 !== a.originalEvent && void 0 !== a.originalEvent.touches && (c = a.originalEvent.touches[0]), b.touchObject.startX = b.touchObject.curX = void 0 !== c ? c.pageX : a.clientX, b.touchObject.startY = b.touchObject.curY = void 0 !== c ? c.pageY : a.clientY, void (b.dragging = !0)) }, b.prototype.unfilterSlides = b.prototype.slickUnfilter = function () { var a = this; null !== a.$slidesCache && (a.unload(), a.$slideTrack.children(this.options.slide).detach(), a.$slidesCache.appendTo(a.$slideTrack), a.reinit()) }, b.prototype.unload = function () { var b = this; a(".slick-cloned", b.$slider).remove(), b.$dots && b.$dots.remove(), b.$prevArrow && b.htmlExpr.test(b.options.prevArrow) && b.$prevArrow.remove(), b.$nextArrow && b.htmlExpr.test(b.options.nextArrow) && b.$nextArrow.remove(), b.$slides.removeClass("slick-slide slick-active slick-visible slick-current").attr("aria-hidden", "true").css("width", "") }, b.prototype.unslick = function (a) { var b = this; b.$slider.trigger("unslick", [b, a]), b.destroy() }, b.prototype.updateArrows = function () { var b, a = this; b = Math.floor(a.options.slidesToShow / 2), a.options.arrows === !0 && a.slideCount > a.options.slidesToShow && !a.options.infinite && (a.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), a.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), 0 === a.currentSlide ? (a.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true"), a.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) : a.currentSlide >= a.slideCount - a.options.slidesToShow && a.options.centerMode === !1 ? (a.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), a.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) : a.currentSlide >= a.slideCount - 1 && a.options.centerMode === !0 && (a.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), a.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false"))) }, b.prototype.updateDots = function () { var a = this; null !== a.$dots && (a.$dots.find("li").removeClass("slick-active").attr("aria-hidden", "true"), a.$dots.find("li").eq(Math.floor(a.currentSlide / a.options.slidesToScroll)).addClass("slick-active").attr("aria-hidden", "false")) }, b.prototype.visibility = function () { var a = this; document[a.hidden] ? (a.paused = !0, a.autoPlayClear()) : a.options.autoplay === !0 && (a.paused = !1, a.autoPlay()) }, b.prototype.initADA = function () { var b = this; b.$slides.add(b.$slideTrack.find(".slick-cloned")).attr({ "aria-hidden": "true", tabindex: "-1" }).find("a, input, button, select").attr({ tabindex: "-1" }), b.$slideTrack.attr("role", "listbox"), b.$slides.not(b.$slideTrack.find(".slick-cloned")).each(function (c) { a(this).attr({ role: "option", "aria-describedby": "slick-slide" + b.instanceUid + c }) }), null !== b.$dots && b.$dots.attr("role", "tablist").find("li").each(function (c) { a(this).attr({ role: "presentation", "aria-selected": "false", "aria-controls": "navigation" + b.instanceUid + c, id: "slick-slide" + b.instanceUid + c }) }).first().attr("aria-selected", "true").end().find("button").attr("role", "button").end().closest("div").attr("role", "toolbar"), b.activateADA() }, b.prototype.activateADA = function () { var a = this; a.$slideTrack.find(".slick-active").attr({ "aria-hidden": "false" }).find("a, input, button, select").attr({ tabindex: "0" }) }, b.prototype.focusHandler = function () { var b = this; b.$slider.on("focus.slick blur.slick", "*", function (c) { c.stopImmediatePropagation(); var d = a(this); setTimeout(function () { b.isPlay && (d.is(":focus") ? (b.autoPlayClear(), b.paused = !0) : (b.paused = !1, b.autoPlay())) }, 0) }) }, a.fn.slick = function () { var f, g, a = this, c = arguments[0], d = Array.prototype.slice.call(arguments, 1), e = a.length; for (f = 0; e > f; f++)if ("object" == typeof c || "undefined" == typeof c ? a[f].slick = new b(a[f], c) : g = a[f].slick[c].apply(a[f].slick, d), "undefined" != typeof g) return g; return a }
});

// instafeed
(function(){var e;e=function(){function e(e,t){var n,r;this.options={target:"instafeed",get:"popular",resolution:"thumbnail",sortBy:"none",links:!0,mock:!1,useHttp:!1};if(typeof e=="object")for(n in e)r=e[n],this.options[n]=r;this.context=t!=null?t:this,this.unique=this._genKey()}return e.prototype.hasNext=function(){return typeof this.context.nextUrl=="string"&&this.context.nextUrl.length>0},e.prototype.next=function(){return this.hasNext()?this.run(this.context.nextUrl):!1},e.prototype.run=function(t){var n,r,i;if(typeof this.options.clientId!="string"&&typeof this.options.accessToken!="string")throw new Error("Missing clientId or accessToken.");if(typeof this.options.accessToken!="string"&&typeof this.options.clientId!="string")throw new Error("Missing clientId or accessToken.");return this.options.before!=null&&typeof this.options.before=="function"&&this.options.before.call(this),typeof document!="undefined"&&document!==null&&(i=document.createElement("script"),i.id="instafeed-fetcher",i.src=t||this._buildUrl(),n=document.getElementsByTagName("head"),n[0].appendChild(i),r="instafeedCache"+this.unique,window[r]=new e(this.options,this),window[r].unique=this.unique),!0},e.prototype.parse=function(e){var t,n,r,i,s,o,u,a,f,l,c,h,p,d,v,m,g,y,b,w,E,S,x,T,N,C,k,L,A,O,M,_,D;if(typeof e!="object"){if(this.options.error!=null&&typeof this.options.error=="function")return this.options.error.call(this,"Invalid JSON data"),!1;throw new Error("Invalid JSON response")}if(e.meta.code!==200){if(this.options.error!=null&&typeof this.options.error=="function")return this.options.error.call(this,e.meta.error_message),!1;throw new Error("Error from Instagram: "+e.meta.error_message)}if(e.data.length===0){if(this.options.error!=null&&typeof this.options.error=="function")return this.options.error.call(this,"No images were returned from Instagram"),!1;throw new Error("No images were returned from Instagram")}this.options.success!=null&&typeof this.options.success=="function"&&this.options.success.call(this,e),this.context.nextUrl="",e.pagination!=null&&(this.context.nextUrl=e.pagination.next_url);if(this.options.sortBy!=="none"){this.options.sortBy==="random"?M=["","random"]:M=this.options.sortBy.split("-"),O=M[0]==="least"?!0:!1;switch(M[1]){case"random":e.data.sort(function(){return.5-Math.random()});break;case"recent":e.data=this._sortBy(e.data,"created_time",O);break;case"liked":e.data=this._sortBy(e.data,"likes.count",O);break;case"commented":e.data=this._sortBy(e.data,"comments.count",O);break;default:throw new Error("Invalid option for sortBy: '"+this.options.sortBy+"'.")}}if(typeof document!="undefined"&&document!==null&&this.options.mock===!1){m=e.data,A=parseInt(this.options.limit,10),this.options.limit!=null&&m.length>A&&(m=m.slice(0,A)),u=document.createDocumentFragment(),this.options.filter!=null&&typeof this.options.filter=="function"&&(m=this._filter(m,this.options.filter));if(this.options.template!=null&&typeof this.options.template=="string"){f="",d="",w="",D=document.createElement("div");for(c=0,N=m.length;c<N;c++){h=m[c],p=h.images[this.options.resolution];if(typeof p!="object")throw o="No image found for resolution: "+this.options.resolution+".",new Error(o);E=p.width,y=p.height,b="square",E>y&&(b="landscape"),E<y&&(b="portrait"),v=p.url,l=window.location.protocol.indexOf("http")>=0,l&&!this.options.useHttp&&(v=v.replace(/https?:\/\//,"//")),d=this._makeTemplate(this.options.template,{model:h,id:h.id,link:h.link,type:h.type,image:v,width:E,height:y,orientation:b,caption:this._getObjectProperty(h,"caption.text"),likes:h.likes.count,comments:h.comments.count,location:this._getObjectProperty(h,"location.name")}),f+=d}D.innerHTML=f,i=[],r=0,n=D.childNodes.length;while(r<n)i.push(D.childNodes[r]),r+=1;for(x=0,C=i.length;x<C;x++)L=i[x],u.appendChild(L)}else for(T=0,k=m.length;T<k;T++){h=m[T],g=document.createElement("img"),p=h.images[this.options.resolution];if(typeof p!="object")throw o="No image found for resolution: "+this.options.resolution+".",new Error(o);v=p.url,l=window.location.protocol.indexOf("http")>=0,l&&!this.options.useHttp&&(v=v.replace(/https?:\/\//,"//")),g.src=v,this.options.links===!0?(t=document.createElement("a"),t.href=h.link,t.appendChild(g),u.appendChild(t)):u.appendChild(g)}_=this.options.target,typeof _=="string"&&(_=document.getElementById(_));if(_==null)throw o='No element with id="'+this.options.target+'" on page.',new Error(o);_.appendChild(u),a=document.getElementsByTagName("head")[0],a.removeChild(document.getElementById("instafeed-fetcher")),S="instafeedCache"+this.unique,window[S]=void 0;try{delete window[S]}catch(P){s=P}}return this.options.after!=null&&typeof this.options.after=="function"&&this.options.after.call(this),!0},e.prototype._buildUrl=function(){var e,t,n;e="https://api.instagram.com/v1";switch(this.options.get){case"popular":t="media/popular";break;case"tagged":if(!this.options.tagName)throw new Error("No tag name specified. Use the 'tagName' option.");t="tags/"+this.options.tagName+"/media/recent";break;case"location":if(!this.options.locationId)throw new Error("No location specified. Use the 'locationId' option.");t="locations/"+this.options.locationId+"/media/recent";break;case"user":if(!this.options.userId)throw new Error("No user specified. Use the 'userId' option.");t="users/"+this.options.userId+"/media/recent";break;default:throw new Error("Invalid option for get: '"+this.options.get+"'.")}return n=e+"/"+t,this.options.accessToken!=null?n+="?access_token="+this.options.accessToken:n+="?client_id="+this.options.clientId,this.options.limit!=null&&(n+="&count="+this.options.limit),n+="&callback=instafeedCache"+this.unique+".parse",n},e.prototype._genKey=function(){var e;return e=function(){return((1+Math.random())*65536|0).toString(16).substring(1)},""+e()+e()+e()+e()},e.prototype._makeTemplate=function(e,t){var n,r,i,s,o;r=/(?:\{{2})([\w\[\]\.]+)(?:\}{2})/,n=e;while(r.test(n))s=n.match(r)[1],o=(i=this._getObjectProperty(t,s))!=null?i:"",n=n.replace(r,function(){return""+o});return n},e.prototype._getObjectProperty=function(e,t){var n,r;t=t.replace(/\[(\w+)\]/g,".$1"),r=t.split(".");while(r.length){n=r.shift();if(!(e!=null&&n in e))return null;e=e[n]}return e},e.prototype._sortBy=function(e,t,n){var r;return r=function(e,r){var i,s;return i=this._getObjectProperty(e,t),s=this._getObjectProperty(r,t),n?i>s?1:-1:i<s?1:-1},e.sort(r.bind(this)),e},e.prototype._filter=function(e,t){var n,r,i,s,o;n=[],r=function(e){if(t(e))return n.push(e)};for(i=0,o=e.length;i<o;i++)s=e[i],r(s);return n},e}(),function(e,t){return typeof define=="function"&&define.amd?define([],t):typeof module=="object"&&module.exports?module.exports=t():e.Instafeed=t()}(this,function(){return e})}).call(this);

var infoLoja = {
    social: [{}],
    telefone: "",
    whatsapp: "",
    skype: "",
    email: ""
}

function headerFixed() {
    if ($(window).scrollTop() > 1 && !$("body").hasClass("carrinho-checkout")) {
        $("#cabecalho").addClass("fixed");
    }

    else {
        $("#cabecalho").removeClass("fixed");
        // if ($(window).width() > 767) {
        //     $(".logo .menu-open, .menu.superior, #cabecalho").removeClass("active");
        // }
    }
}

// image slick

function haszoom() {
    $(".slick-product .has-zoom").each(function () {
        var urlIMage = $(this).find(".imagem-principal").attr("data-imagem-caminho");
        $(this).append('<img class="imagem-zoom" src="' + urlIMage + '" alt="zoom">');
    });
}

function galleryTop() {
    var selector = $(".secao-banners .flexslider");

    if (selector.hasClass("flexslider")){

        var html = selector.find("ul.slides li");

        var listArray = [];

        var loop = 0;

        while (loop < html.length) {

            listArray[loop] = {
                link: html.eq(loop).find("a").attr("href"),
                image: html.eq(loop).find("img").attr("src").replace("3000", "1660")
            }

            loop++;
        }     
        selector.after('<div class="slide-nav"></div>');
        selector.after('<div class="slide-full"></div>');
        
        selector.remove();

        listArray.forEach(function(item, indice) {
            var valueLoop = item.link !== undefined ? '<div class="item"><a href="'+item.link+'"><img src="'+item.image+'" alt="banner" /></a></div>' :'<div class="item"><a><img src="'+item.image+'" alt="banner" /></a></div>';            

            $(".secao-banners").find(".slide-full").append(valueLoop);
            
        });
        
        $(".slide-full").slick({
            slidesToShow: 1,
            dots: true,
            arrows: false,
            speed: 200,
            autoplay: true,
            autoplaySpeed: 4000,
            useTransform: true,
        });

        listArray.forEach(function (item, indice){
            var dots = '<div class="box-img"><img src="'+item.image+'" alt="banner" /></div>';
            $(".slide-full").find(".slick-dots li").eq(indice).html(dots);
        });
        
        // fim top

        // mini

        var bannerList = [{
            link: "",
            image: "",
        }];

        if ($(".banner.mini-banner").hasClass("mini-banner")){
            var selectMini = $(".banner.mini-banner .modulo");
            bannerList[0] = {
                link: selectMini.eq(0).find("a").attr("href"),
                image: selectMini.eq(0).find("img").attr("src").replace("400", 1200)
            } 
            bannerList[1] = {
                link: selectMini.eq(1).find("a").attr("href"),
                image: selectMini.eq(1).find("img").attr("src").replace("400", 1200)
            } 
            bannerList[2] = {
                link: selectMini.eq(2).find("a").attr("href"),
                image: selectMini.eq(2).find("img").attr("src").replace("400", 1200)
            } 

            $(".banner.mini-banner").remove();


            bannerList[0] = bannerList[0].image == null ? "" : '<div class="banner-line"><a href="' + bannerList[0].link+'"><img src="'+bannerList[0].image+'" alt="image"></a></div>';

            $("#listagemProdutos .titulo-categoria:first").next().after(bannerList[0]);

            var cols = (bannerList[1].image == null && bannerList[2].image == null) ? "" : '<div class="banner-cols"><div class="item"><a href="' + bannerList[1].link + '"><img src="' + bannerList[1].image + '" alt="image"></a></div><div class="item"><a href="' + bannerList[2].link + '"><img src="' + bannerList[2].image + '" alt="image"></a></div></div>';

            

            $(".banner-line").next().next().after(cols);

        }

    }    
}

function marcas() {
    if ($(".marcas .carousel").hasClass("carousel")) {
        var html = $(".marcas .carousel ul.slides li")
        var loop = 0;
        var listArray = [];

        while (loop < html.length) {
            listArray[loop] = {
                link: html.eq(loop).find("a").attr("href"),
                image: html.eq(loop).find("img").attr("src"),
                title: html.eq(loop).find("img").attr("alt"),
            }

            loop++;
        }

        $(".secao-principal .conteudo").append('<div class="box-marcas"><div class="slick-marcas"></div></div>');
        listArray.forEach(function (value, indice) {
            $(".slick-marcas").append('<div class="item"><a href="'+ value.link +'"><img src="' + value.image + '" alt="' + value.title + '"></a></div>');
        });

        $(".row-fluid .marcas").remove();

        $(".slick-marcas").slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            speed: 200,
            useTransform: true,
            prevArrow: '<div class="slick-prev"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve"><path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225   c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"></path></svg></div>',
            nextArrow: '<div class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve"><path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5   c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z"></path></svg></div>',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                }
            ]
        });
    }

}

function slideProduct(){
    $(".listagem-linha").each(function () {
        if ($(this).hasClass("flexslider")) {
            var html = $(this).find("ul").html();
            $(this).find(".flex-viewport").remove();
            $(this).find(".flex-direction-nav").remove();
            $(this).append("<ul class='slick-product'>" + html + "</ul>");
        }

        else {
            $(this).find("li").unwrap().unwrap();
        }
    });

    // $(".flex-direction-nav .flex-prev").html('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve"><path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225   c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"></path></svg>');

    // $(".flex-direction-nav .flex-next").html('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve"><path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5   c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z"></path></svg>');

    $(".pagina-inicial .listagem-linha .slick-product").slick({
        dots: true,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        speed: 250,
        dots: false,
        useTransform: true,
        afterChange: haszoom(),
        prevArrow: '<div class="slick-prev"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve"><path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225   c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"></path></svg></div>',
        nextArrow: '<div class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve"><path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5   c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z"></path></svg></div>',

        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                }
            }
        ]
    });
}

function nameBlock() {

    $(".listagem .titulo-categoria strong").each(function () {
        if ($(this).text() === "Mais Vendidos") {
            $(this).text("Campeões de vendas");
        }
        else if ($(this).text() === "Destaques"){
            $(this).text("ofertas imperdíveis!");
        }
    });

    
}

function validaCodigoSro() {
    element = document.getElementById("objetos");
    if (element.value == "") {
        alert(mensagemDeVazio);
        element.focus();
        return false;
    } else {
        objetos = element.value.replace(new RegExp(';', 'g'), '');
        objetos = objetos.replace(/(\r\n|\n|\r)/gm, "");
        //objetos = objetos.replace(',','');
        objetos = objetos.replace(new RegExp(',', 'g'), '');
        //objetos = objetos.replace(' ','');
        objetos = objetos.replace(new RegExp(' ', 'g'), '');

        if (objetos.length > 650) {
            alert(mensagemDeMax50);
            element.focus();
            return false;

        }
        if (!(objetos.length = 27 && objetos.substring(13, 14) == '-')) {
            if (objetos.length % 13) {
                alert(mensagemDeInvalido);
                element.focus();
                return false;
            }
        }

    }
}

function newsFooter(){
    //$("#rodape .institucional").prepend('<div class="conteiner"><div class="news"><div class="msg"><div class="icon"></div><span class="first">cadastre-se e seja o primeiro</span><span class="last">a receber ofertas exclusivas</span></div><div id="formNews"> <div class="interno-conteudo"> <div class="newsletter-cadastro input-conteiner control-group error"> <label class="emailNews"> <input type="text" name="email" placeholder="Digite seu email"> </label> <button class="botao botao-input fundo-principal newsletter-assinar" data-action="newsletter/assinar/index.html">Cadastrar <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="306px" height="306px" viewBox="0 0 306 306" style="enable-background:new 0 0 306 306;" xml:space="preserve"><polygon points="94.35,0 58.65,35.7 175.95,153 58.65,270.3 94.35,306 247.35,153 "></polygon></svg></button> </div><div class="newsletter-confirmacao hide"> <i class="icon-ok icon-3x"></i> <span>Obrigado por se inscrever! Aguarde novidades da nossa loja em breve.</span> </div></div></div></div></div>');
}

function socialRodape(){
    $("#rodape div[style] .conteiner > .row-fluid > .span9 > p").after('<div class="copy">by<address><a target="_blank" title="Especialista em soluções para E-commerce" href="https://www.netzee.com.br/"><svg class="netzee" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 913.778 314.876" style="enable-background:new 0 0 913.778 314.876;" xml:space="preserve"><path id="XMLID_60_" style="fill:#424143;" d="M6.443,116.909c4.289-9.935,10.183-18.657,17.672-26.145     c7.498-7.489,16.26-13.382,26.329-17.682c10.054-4.289,20.737-6.443,32.034-6.443c11.54,0,22.282,2.154,32.223,6.443     c9.945,4.299,18.707,10.193,26.329,17.682c7.618,7.488,13.56,16.21,17.86,26.145c4.289,9.94,6.443,20.673,6.443,32.213v82.849     h-32.772v-82.849c0-6.859-1.288-13.303-3.863-19.33c-2.58-6.017-6.142-11.298-10.688-15.834     c-4.537-4.537-9.875-8.103-16.007-10.678c-6.151-2.57-12.654-3.853-19.524-3.853c-6.884,0-13.318,1.283-19.326,3.853     c-6.027,2.575-11.292,6.142-15.839,10.678c-4.537,4.537-8.098,9.817-10.678,15.834c-2.58,6.028-3.863,12.471-3.863,19.33v82.849     H0v-82.849C0,137.582,2.144,126.85,6.443,116.909z"/><path id="XMLID_57_" style="fill:#424143;" d="M305.991,173.421l23.204,23.214l-11.426,11.411     c-7.86,7.865-16.809,13.872-26.868,18.043c-10.079,4.175-20.623,6.26-31.673,6.26c-11.045,0-21.609-2.085-31.663-6.26     c-10.069-4.17-19.038-10.178-26.884-18.043c-8.098-8.098-14.125-17.246-18.043-27.428c-3.922-10.203-5.894-20.569-5.894-31.124     c0-10.554,1.971-20.861,5.894-30.93c3.918-10.054,9.945-19.137,18.043-27.25c8.093-8.113,17.236-14.17,27.428-18.231     c10.183-4.037,20.564-6.067,31.118-6.067c10.554,0,20.92,2.031,31.113,6.067c10.193,4.061,19.326,10.119,27.428,18.231     l11.426,11.416l-91.69,91.686c9.321,4.67,19.192,6.206,29.632,4.611c10.431-1.595,19.579-6.329,27.439-14.18L305.991,173.421z      M223.875,114.141c-9.822,9.822-14.73,21.609-14.73,35.353c0,7.613,1.718,14.854,5.146,21.718     c2.952-2.937,7.429-7.414,13.447-13.422c6.017-6.017,12.397-12.407,19.142-19.162c6.76-6.751,13.268-13.184,19.524-19.326     c6.266-6.132,11.114-10.931,14.552-14.358c-9.341-4.661-19.212-6.255-29.652-4.795     C240.872,101.63,231.735,106.301,223.875,114.141z"/><path id="XMLID_55_" style="fill:#424143;" d="M439.285,198.838v32.772h-16.211c-11.277,0-21.965-2.144-32.024-6.443     c-10.069-4.299-18.905-10.242-26.507-17.855c-7.613-7.612-13.566-16.448-17.855-26.517c-4.299-10.069-6.454-20.747-6.454-32.049     V0h32.772v66.525h66.278v32.772h-66.278v49.448c0,6.889,1.293,13.382,3.873,19.529c2.58,6.141,6.132,11.476,10.668,16.012     c4.537,4.556,9.881,8.107,16.022,10.688c6.121,2.58,12.639,3.863,19.504,3.863H439.285z"/><path id="XMLID_6_" style="fill:#36A2DF;" d="M824.337,95.573c-8.885,1.263-16.676,5.23-23.343,11.911      c-8.38,8.355-12.555,18.395-12.555,30.088c0,6.493,1.471,12.654,4.393,18.498c2.506-2.506,6.325-6.31,11.441-11.436      c5.121-5.116,10.549-10.564,16.295-16.304c5.76-5.735,11.292-11.228,16.617-16.458c5.334-5.22,9.455-9.301,12.386-12.219      C841.617,95.687,833.217,94.33,824.337,95.573z"/><path id="XMLID_5_" style="fill:#36A2DF;" d="M687.863,95.573c-8.875,1.263-16.666,5.23-23.347,11.911      c-8.37,8.355-12.541,18.395-12.541,30.088c0,6.493,1.456,12.654,4.388,18.498c2.506-2.506,6.32-6.31,11.446-11.436      c5.106-5.116,10.544-10.564,16.295-16.304c5.75-5.735,11.287-11.228,16.612-16.458c5.334-5.22,9.449-9.301,12.391-12.219      C705.148,95.687,696.739,94.33,687.863,95.573z"/><path id="XMLID_48_" style="fill:#36A2DF;" d="M881.957,19.098H496.598c-17.577,0-31.821,14.244-31.821,31.821v166.314      c0,17.577,14.244,31.821,31.821,31.821h26.017l-26.017,39.399l62.147-39.399h323.212c17.577,0,31.821-14.244,31.821-31.821      V50.919C913.778,33.342,899.534,19.098,881.957,19.098z M629.609,207.797H491.368c11.495-15.878,22.466-31.148,32.926-45.768      c4.378-6.28,8.925-12.59,13.63-18.969c4.69-6.369,9.133-12.53,13.323-18.489c4.17-5.954,8.147-11.495,11.906-16.612      c3.764-5.116,6.899-9.45,9.396-13.011h-83.692V67.045h137.939c-11.719,15.888-22.684,31.148-32.921,45.773      c-4.388,6.265-8.885,12.595-13.486,18.964c-4.596,6.379-8.979,12.53-13.164,18.489c-4.181,5.953-8.137,11.505-11.912,16.612      c-3.759,5.131-6.884,9.46-9.405,13.02h83.701V207.797z M701.34,179.75c8.885-1.357,16.666-5.399,23.357-12.08l9.727-9.722      l19.742,19.752l-9.717,9.722c-6.701,6.691-14.314,11.812-22.882,15.353c-8.573,3.561-17.557,5.334-26.958,5.334      c-9.405,0-18.4-1.774-26.963-5.334c-8.568-3.541-16.2-8.662-22.882-15.353c-6.889-6.894-12.025-14.675-15.358-23.352      c-3.348-8.672-5.017-17.508-5.017-26.497c0-8.98,1.669-17.756,5.017-26.329c3.333-8.558,8.469-16.294,15.358-23.194      c6.899-6.899,14.69-12.065,23.347-15.517c8.678-3.447,17.513-5.165,26.498-5.165c8.979,0,17.815,1.718,26.482,5.165      c8.672,3.452,16.458,8.618,23.357,15.517l9.717,9.717l-78.05,78.055C684.05,179.79,692.464,181.097,701.34,179.75z       M837.813,179.75c8.885-1.357,16.666-5.399,23.357-12.08l9.718-9.722l19.741,19.752l-9.727,9.722      c-6.681,6.691-14.294,11.812-22.872,15.353c-8.563,3.561-17.552,5.334-26.948,5.334c-9.415,0-18.394-1.774-26.972-5.334      c-8.554-3.541-16.191-8.662-22.882-15.353c-6.889-6.894-12.016-14.675-15.359-23.352c-3.338-8.672-5.002-17.508-5.002-26.497      c0-8.98,1.664-17.756,5.002-26.329c3.343-8.558,8.47-16.294,15.359-23.194c6.899-6.899,14.689-12.065,23.357-15.517      c8.682-3.447,17.498-5.165,26.497-5.165c8.97,0,17.815,1.718,26.473,5.165c8.672,3.452,16.458,8.618,23.347,15.517l9.727,9.717      l-78.045,78.055C820.518,179.79,828.927,181.097,837.813,179.75z"/></svg></a></address></div>');
}

function instagram(text,key,tag) {
    $(".pagina-inicial .secao-principal .conteudo").append('<div class="box-instagram"><div class="title-insta">Siga nosso instagram <span>@'+text+'</span></div><div id="instafeed"></div></div>')
    
    var idUser = key.split(".");

    var feed;

    
    if ($(".pagina-inicial").hasClass("pagina-inicial")){
        if(!tag == ""){
            feed = new Instafeed({
                get: 'tagged',
                tagName: tag,
                userId: idUser[0],
                limit: 4,
                accessToken: key,
                resolution: 'standard_resolution',
                template: '<div><a href="{{link}}" target="_blank"><img src="{{image}}" /></a></div>',
                after: function () {
                    $("#instafeed img").each(function (params) {
                        ($(this).outerWidth() >= $(this).outerHeight()) ? $(this).css("maxHeight", "100%") : $(this).css("maxWidth", "100%");
                    });
                }
            });
        }

        else{
            feed = new Instafeed({
                get: 'user',
                userId: idUser[0],
                limit: 4,
                accessToken: key,
                resolution: 'standard_resolution',
                template: '<div><a href="{{link}}" target="_blank"><img src="{{image}}" /></a></div>',
                after: function() {
                    $("#instafeed img").each(function (params) {
                        ($(this).outerWidth() >= $(this).outerHeight()) ? $(this).css("maxHeight", "100%") : $(this).css("maxWidth", "100%");
                    });
                }
            });
            
        }
        feed.run();
    }
}

function bannerPromocao(image, date, link) {
    if (image !== undefined && date !== undefined && $(".pagina-inicial").hasClass("pagina-inicial")){

        if(typeof(date) !== "object"){
            date = date.split("index.html");
            date = new Date(date.reverse());
            date = date.setDate(date.getDate() + 1);
            
        }

        else{
            date = date.setDate(date.getDate() + 4);
        }
     
        if(date > new Date()){

            link = link == undefined ? "" : '<a href="'+link+'">Comprar agora <i class="fa fa-angle-right" aria-hidden="true"></i></a>';
            

            $("#cabecalho").after('<div class="conteiner box-banner-pro"><div class="banner-promocao"><img src="' + image + '" alt="Promocão" /><div class="box-info"><div class="cronometro"><div class="item zee-dia" data-value="00"><span class="description">dias</span></div><div class="item zee-hora" data-value="00"><span class="description">horas</span></div><div class="item zee-minuto" data-value="00"><span class="description">min</span></div><div class="item zee-segundo" data-value="00"><span class="description">seg</span></div></div>' + link +'</div></div>');

            cronometro(date);
        }
    }

}

function cronometro(data) {
    //    var target_date = new Date("january 15, 2018").getTime();
    var target_date = new Date(data).getTime();
    var dias, horas, minutos, segundos;
    var regressiva = document.getElementById("regressiva");

    setInterval(function () {

        var current_date = new Date().getTime();
        var segundos_f = (target_date - current_date) / 1000;

        dias = parseInt(segundos_f / 86400);
        segundos_f = segundos_f % 86400;

        horas = parseInt(segundos_f / 3600);
        segundos_f = segundos_f % 3600;

        minutos = parseInt(segundos_f / 60);
        segundos = parseInt(segundos_f % 60);

        if (target_date >= current_date) {
            $('.zee-dia').attr("data-value", dias < 10 ? "0" + dias : dias);
            $('.zee-hora').attr("data-value", horas < 10 ? "0" + horas : horas);
            $('.zee-minuto').attr("data-value", minutos < 10 ? "0" + minutos : minutos);
            $('.zee-segundo').attr("data-value", segundos < 10 ? "0" + segundos : segundos);
        }

        if (dias == 0 && horas == 0 && minutos == 0 && segundos == 00 ){
            $(".box-banner-pro").addClass("acabou");
        }

    }, 1000);
}

function navSubs() {
    $(".menu .nivel-dois >li.com-filho > ul").each(function () {
        var numberList = $(this).find("li").length;

        if (numberList >= 1 && numberList <= 6){
            $(this).addClass("col1");
        }
        else if (numberList >= 7 && numberList <= 12){
            $(this).addClass("col2");
        }
        else if(numberList >= 13 && numberList <= 18){
            $(this).addClass("col3");
        }
        else if(numberList >= 19 && numberList <= 24){
            $(this).addClass("col4");
        }
        else if(numberList >= 25 && numberList <= 30){
            $(this).addClass("col5");
        }
        else if(numberList >= 31 && numberList <= 45){
            $(this).addClass("col6");
        }
    });

    $(".menu .nivel-dois").each(function () {
        $(this).prepend('<div class="column"></div>');

        var ulParent = $(this);

        $(this).find("> li:not(.nivel-tres)").each(function(){
            
            if (!$(this).hasClass("com-filho")){
                var html = $(this).clone();
                ulParent.find(".column").append(html);
                $(this).remove();   
            }
        });

        var numberList = ulParent.find(".column li").length;

        if (numberList >= 1 && numberList <= 6) {
            ulParent.find(".column").addClass("col1");
        }
        else if (numberList >= 7 && numberList <= 12) {
            ulParent.find(".column").addClass("col2");
        }
        else if (numberList >= 13 && numberList <= 18) {
            ulParent.find(".column").addClass("col3");
        }
        else if (numberList >= 19 && numberList <= 24) {
            ulParent.find(".column").addClass("col4");
        }
        else if (numberList >= 25 && numberList <= 30) {
            ulParent.find(".column").addClass("col5");
        }
        else if (numberList >= 31 && numberList <= 45) {
            ulParent.find(".column").addClass("col6");
        }   
    });
}

function limita(str, size){
	var nova = str;
	if(str.length >= size+3){
		nova = str.substring(0, size).concat(' ...');
	}
	return nova;
}  

$(document).ready(function () {
    // e-mail
    infoLoja.email = $("#rodape li a[href*=mailto]").text() === undefined ? "" : $("#rodape li a[href*=mailto]").text().replace("E-mail: ","").replace(/ /g, "");
    infoLoja.social = $(".lista-redes").html() == undefined ? "" : $(".lista-redes").html();
	infoLoja.telefone = $(".canais-contato ul li .icon-phone").closest('span').text().replace("Telefone:", "");
    infoLoja.whatsapp = $(".canais-contato ul li.tel-whatsapp").find("span").text().replace("Whatsapp:", "");
    infoLoja.skype = $(".canais-contato ul li.tel-skype").text().replace("Skype: ", "").replace(/ /g, "");    

    $("#rodape .titulo").click(function () {
        $(this).next().toggleClass("active");
    });
    
    headerFixed();

    $(window).scroll(function() {
        headerFixed();
    });
    
    slideProduct();
    nameBlock();
    marcas();
    navSubs();
    //instagram('agencianetzee', '6772975806.1677ed0.d43169c35018458c9646522c99558bd4');
    //bannerPromocao("https://cdn.awsli.com.br/584/584562/arquivos/banner-contador.png", new Date(), "#");

    $("#barraTopo").remove();

    // menu

    $("#cabecalho .row-fluid .span3").append('<div class="menu-mob"><span class="bar"></span><span class="bar"></span><span class="bar"></span></div>')

    $(".menu-mob").click(function(){
        $("#cabecalho").toggleClass("active");
    });

    $(".busca input").attr("placeholder", "O QUE VOCÊ ESTÁ BUSCANDO?");

    $(".busca .botao-busca").html('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"><path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/></svg>');

    var socialList = infoLoja.social == "" ? "" : infoLoja.social;
    // TELEFONE: (18) 3529 - 2066  WhatsApp: (00)0 0000 - 0000  E - mail de Contato: integrafitness.com.br  Rastrar encomenda 

    var phoneList = infoLoja.telefone == "" ? "" : '<div class="item fone"><span class="title-item">TELEFONE:</span> <span class="text-item">' + infoLoja.telefone+'</span></div>';
    var whatsList = infoLoja.whatsapp == "" ? "" : '<div class="item whats"><span class="title-item">WhatsApp:</span> <span class="text-item">' + infoLoja.whatsapp+'</span></div>';
    var emailList = infoLoja.email == "" ? "" : '<div class="item contato"><span class="title-item">E-mail de Contato:</span> <span class="text-item">' + infoLoja.email+'</span></div>'; 
    
    var rastreio = '<div class="item rastreio"><span>Rastrear encomenda</span><div class="box-rastreio"><form id="rastreio"><legend>Digite o código de rastreio para acompanhar seu pedido:</legend><input type="text" spellcheck="false" name="Objetos" required class="objeto" placeholder="código"><button type="submit" class="submit">Rastrear pedido <i class="fa fa-angle-right" aria-hidden="true"></i></button></form></div></div>';



    $("#cabecalho .conteudo-topo .superior").before('<div class="box-info"><div class="options">' + phoneList + whatsList + emailList +'</div>' +socialList+'</div>');

    var nameUser = $(".conteudo-topo a.botao.secundario.pequeno").text();

    if (nameUser.indexOf("Olá,") == -1) {
        $("#cabecalho .conteudo-topo .inferior .span4").prepend('<div class="user-login"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="-456 258.5 45.5 45.5" style="enable-background:new -456 258.5 45.5 45.5;" xml:space="preserve"><path class="st0" d="M-433.2,258.5c-12.6,0-22.8,10.2-22.8,22.8s10.2,22.8,22.8,22.8c12.6,0,22.8-10.2,22.8-22.8   S-420.7,258.5-433.2,258.5z M-433.2,265.3c4.2,0,7.5,3.4,7.5,7.5c0,4.2-3.4,7.5-7.5,7.5c-4.2,0-7.5-3.4-7.5-7.5   C-440.8,268.6-437.4,265.3-433.2,265.3z M-433.2,298c-4.1,0-7.9-1.5-10.9-4c-0.7-0.6-1.1-1.5-1.1-2.4c0-4.2,3.4-7.6,7.6-7.6h8.8   c4.2,0,7.6,3.4,7.6,7.6c0,0.9-0.4,1.8-1.1,2.4C-425.3,296.5-429.1,298-433.2,298z"/></svg><div class="box-login"><span>Minha Conta</span><div class="list"><div class="item"><a href="/conta/login">Entrar</a></div><div class="item"><a href="/conta/login" class="out">Cadastre-se</a></div></div></div></div>');
    }
    else{
        $("#cabecalho .conteudo-topo .inferior .span4").prepend('<div class="user-login"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="-456 258.5 45.5 45.5" style="enable-background:new -456 258.5 45.5 45.5;" xml:space="preserve"><path class="st0" d="M-433.2,258.5c-12.6,0-22.8,10.2-22.8,22.8s10.2,22.8,22.8,22.8c12.6,0,22.8-10.2,22.8-22.8   S-420.7,258.5-433.2,258.5z M-433.2,265.3c4.2,0,7.5,3.4,7.5,7.5c0,4.2-3.4,7.5-7.5,7.5c-4.2,0-7.5-3.4-7.5-7.5   C-440.8,268.6-437.4,265.3-433.2,265.3z M-433.2,298c-4.1,0-7.9-1.5-10.9-4c-0.7-0.6-1.1-1.5-1.1-2.4c0-4.2,3.4-7.6,7.6-7.6h8.8   c4.2,0,7.6,3.4,7.6,7.6c0,0.9-0.4,1.8-1.1,2.4C-425.3,296.5-429.1,298-433.2,298z"/></svg><div class="box-login"><span>Minha Conta</span><div class="list"><div class="item"><a href="/conta/pedido/listar">Meus Pedidos</a></div><div class="item"><a href="/conta/logout" class="out">Sair</a></div></div></div></div>');
    }

    $("#cabecalho").prepend('<div class="header-mob"><div class="menu"><span class="bar"></span><span class="bar"></span><span class="bar"></span></div><div class="box-item cart"><a href="/carrinho/index"></a></div></div>');

    $(".carrinho>a i, .header-mob .cart a").html('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Camada_1" x="0px" y="0px" viewBox="-332 134 294 294" style="enable-background:new -332 134 294 294;" xml:space="preserve"><path class="st0" d="M-42.5,220.4C-46,215.2-54.7,210-61.6,210l-224.5-15.7l-8.7-27.8c0-1.7-1.7-5.2-5.2-5.2l-20.9-7   c-3.5-1.7-8.7,0-10.4,5.2c-1.7,3.5,0,8.7,5.2,10.4l17.4,5.2l8.7,29.6l34.8,120.1c2.5,9.1,7.8,16.5,14.6,21.9   c-7.8,6.4-12.9,16-12.9,26.8c0,19.1,15.7,34.8,34.8,34.8s34.8-15.7,34.8-34.8c0-6.4-1.8-12.3-4.9-17.4h67.2   c-3,5.2-4.9,11.1-4.9,17.4c0,19.1,15.7,34.8,34.8,34.8c19.2,0,34.8-15.7,34.8-34.8c0-9.4-3.8-17.9-9.9-24.2   c8.5-5.4,14.9-13.9,16.9-24.6L-39,243C-37.3,234.3-37.3,227.4-42.5,220.4L-42.5,220.4z M-228.7,390.9c-10.4,0-17.4-7-17.4-17.4   s7-17.4,17.4-17.4c8.7,0,17.4,7,17.4,17.4S-218.3,390.9-228.7,390.9z M-101.7,390.9c-10.4,0-17.4-7-17.4-17.4s7-17.4,17.4-17.4   c10.5,0,17.4,7,17.4,17.4S-91.2,390.9-101.7,390.9z M-75.6,321.3c-1.5,8.8-9.2,16-18.9,18.2c-2.3-0.5-4.7-0.8-7.2-0.8   c-3.6,0-7,0.7-10.3,1.7h-106.5c-3.3-1-6.7-1.7-10.3-1.7c-0.8,0-1.6,0.2-2.4,0.2c-7.6-2.9-14.1-9.8-16.8-17.6l-31.3-107.9   l215.8,15.7c3.5,0,5.2,1.7,7,3.5s1.7,5.2,1.7,7L-75.6,321.3L-75.6,321.3z"/></svg>');

    $(".header-mob .menu").click(function() {
        if($(this).hasClass("active")){
            $(this).removeClass("active");
            $(".menu.superior").removeClass("active");
        } 
        else{
            $(this).addClass("active");
            $(".menu.superior").addClass("active");
        }
    });

    $(".menu.superior").after('<div class="shadow"></div>')

    // menu mobile
    if (nameUser.indexOf("Olá,") == -1) {
        $(".menu.superior").prepend('<div class="box-links"><svg class="prev" version="1.1" viewBox="0 0 31.494 31.494" x="0px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" y="0px"><path d="M10.273,5.009c0.444-0.444,1.143-0.444,1.587,0c0.429,0.429,0.429,1.143,0,1.571l-8.047,8.047h26.554  c0.619,0,1.127,0.492,1.127,1.111c0,0.619-0.508,1.127-1.127,1.127H3.813l8.047,8.032c0.429,0.444,0.429,1.159,0,1.587  c-0.444,0.444-1.143,0.444-1.587,0l-9.952-9.952c-0.429-0.429-0.429-1.143,0-1.571L10.273,5.009z"></path></svg><svg class="icon" style="enable-background:new 0 0 513.32 513.32;" version="1.1" viewBox="0 0 513.32 513.32" x="0px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" y="0px"><path d="M346.491,316.547c49.193-29.944,81.275-83.414,81.275-145.44C427.767,76.998,350.768,0,256.66,0    S85.553,76.998,85.553,171.107c0,62.026,32.082,115.497,81.275,145.44C81.275,348.63,17.11,423.489,0,513.32h42.777    c21.388-98.386,109.081-171.107,213.883-171.107s192.495,72.72,213.883,171.107h42.777    C496.21,421.35,432.045,346.491,346.491,316.547z M128.33,171.107c0-70.581,57.749-128.33,128.33-128.33    s128.33,57.749,128.33,128.33s-57.749,128.33-128.33,128.33S128.33,241.688,128.33,171.107z"></path></svg><a href="/conta/login">Entrar</a><a href="/conta/login">Cadastre-se</a></div>');
    }

    else{
        $(".menu.superior").prepend('<div class="box-links"><svg class="prev" version="1.1" viewBox="0 0 31.494 31.494" x="0px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" y="0px"><path d="M10.273,5.009c0.444-0.444,1.143-0.444,1.587,0c0.429,0.429,0.429,1.143,0,1.571l-8.047,8.047h26.554  c0.619,0,1.127,0.492,1.127,1.111c0,0.619-0.508,1.127-1.127,1.127H3.813l8.047,8.032c0.429,0.444,0.429,1.159,0,1.587  c-0.444,0.444-1.143,0.444-1.587,0l-9.952-9.952c-0.429-0.429-0.429-1.143,0-1.571L10.273,5.009z"></path></svg><svg class="icon" style="enable-background:new 0 0 513.32 513.32;" version="1.1" viewBox="0 0 513.32 513.32" x="0px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" y="0px"><path d="M346.491,316.547c49.193-29.944,81.275-83.414,81.275-145.44C427.767,76.998,350.768,0,256.66,0    S85.553,76.998,85.553,171.107c0,62.026,32.082,115.497,81.275,145.44C81.275,348.63,17.11,423.489,0,513.32h42.777    c21.388-98.386,109.081-171.107,213.883-171.107s192.495,72.72,213.883,171.107h42.777    C496.21,421.35,432.045,346.491,346.491,316.547z M128.33,171.107c0-70.581,57.749-128.33,128.33-128.33    s128.33,57.749,128.33,128.33s-57.749,128.33-128.33,128.33S128.33,241.688,128.33,171.107z"></path></svg><a href="/conta/pedido/listar">Meus Pedidos</a><a href="/conta/logout">Sair</a></div>');
    }

    $("#rastreio").submit(function (e) {
        e.preventDefault();

        //var link = "http://rastreie.com/" + $("#rastreio .objeto").val();
        var link = "https://www.muambator.com.br/pacotes/" + $("#rastreio .objeto").val() + "/detalhes/";

        window.open(link, '_blank');

    });

    $("#carouselImagem li img").each(function () {
        var url = $(this).attr("src").replace("64x50", "110x85");
        $(this).attr("src", url);
    });

    $(".thumbs-vertical #carouselImagem .flex-viewport").each(function(){
        if($(this).find("li").length > 3){

            $(this).css("maxHeight", "594px");

        }
    });

    $(".box-links .prev, .shadow").click(function(){
        $(".menu.superior,.header-mob .menu").removeClass("active");
    });

    $("#modalNewsletter .newsletter .botao").html('Continuar <i class="fa fa-angle-right" aria-hidden="true"></i>');

    $(".menu.superior .nivel-um li.com-filho > a").click(function(e){
        if($(".header-mob").is(":visible")){
            e.preventDefault();
            $(this).next().toggleClass("active");
        }
    });

    $(".listagem-item").each(function () {
        var text = $(this).find(".bandeira-promocao").text();

        text = text.replace(" Desconto", "");

        $(this).find(".bandeira-promocao").text(text);
    });

    var titleButton = $(".listagem-item .acoes-produto .botao-comprar").attr("title");
    
    $(".listagem-item .acoes-produto .botao-comprar").prepend('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"><path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/></svg><span class="text">' + titleButton +'</span>');


    //footer

    //$("#rodape .institucional").prepend('<div class="news"><div class="conteiner"><div class="msg"><div class="icon"></div><span class="first">RECEBA VANTAGENS EXCLUSIVAS</span><span class="last" data-mobile="Cadastre-se e receba no seu e-mail">Cadastre-se e receba diretamente em seu e-mail.</span></div><div id="formNews"> <div class="interno-conteudo"> <div class="newsletter-cadastro input-conteiner control-group error"> <label class="emailNews"> <input type="email" name="email" placeholder="DIGITE SEU E-MAIL"> </label> <button class="submit newsletter-assinar" data-action="newsletter/assinar/index.html">Cadastrar <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="306px" height="306px" viewBox="0 0 306 306" style="enable-background:new 0 0 306 306;" xml:space="preserve"><polygon points="94.35,0 58.65,35.7 175.95,153 58.65,270.3 94.35,306 247.35,153 "></polygon></svg></button> </div><div class="newsletter-confirmacao hide"> <i class="icon-ok icon-3x"></i> <span>Obrigado por se inscrever! Aguarde novidades da nossa loja em breve.</span> </div></div></div></div></div>');

    var pageface= $(".caixa-facebook .fb-page").attr("data-href");

    if (pageface != null){

        $(".caixa-facebook .fb-page").remove();

        $(".redes-sociais .titulo").after('<div class="fb-page" data-href="' + pageface+'" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"></div>');
    }    
    socialRodape();    

	$('.listagem ul li .info-produto .nome-produto').each(function(){
	    var $titulo = $(this).text();
	    $(this).text(limita($titulo, 45));
	});

	galleryTop();

	$('.menu.superior .nivel-um > li').each(function(){
	    var categoriaPrincipal = $(this).find('a').attr("href");
	    $(this).find('.nivel-dois').prepend($('<a href="' + categoriaPrincipal + '" class="ver-todos">Ver todos</a>'));
	});

	$('.menu.superior .nivel-um').each(function(){

	    var numberList = $(this).find("> li").length;
	    if (numberList > 4){
	        $(this).addClass("flex-grow");
	    }

	});

});