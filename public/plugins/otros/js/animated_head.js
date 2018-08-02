$ = jQuery.noConflict();
"use strict";
var cbpAnimatedHeader = (function() {
    function init() {
        "use strict";
        window.addEventListener('scroll', function(event) {}, false);
        window.addEventListener('scroll', function(e) {
            if (!$('header').hasClass('non-sticky-header')) {
                if ($(window).scrollTop() > 10) {
                    $('nav').addClass('shrink-nav');
                } else {
                    $('nav').removeClass('shrink-nav');
                }
            }
        });
    }

    function scrollY() {
        return window.pageYOffset || docElem.scrollTop;
    }
    init();
})();
$(window).scroll(function() {
    if (!$('header').hasClass('non-sticky-header')) {
        if ($(window).scrollTop() > 10) {
            $('header').addClass('shrink-nav');
        } else {
            $('header').removeClass('shrink-nav');
        }
    }
});
var $grid = $('.masonry-listing').imagesLoaded(function() {
    $grid.masonry({
        itemSelector: '.masonry-item',
        columnWidth: '.masonry-item',
        percentPosition: true
    });
});
$(document).ready(function() {
    if ($(".navigation .page-numbers").hasClass("next")) {
        $(".navigation .page-numbers").prev("a.page-numbers:last").addClass("last-page");
    } else {
        $(".navigation .page-numbers:last").addClass("last-page");
    }
    var btnFixed = '.btn-fixed-bottom';
    var btnToTopClass = '.back-to-top';
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $(btnFixed).fadeIn();
        } else {
            $(btnFixed).fadeOut();
        }
    });
    $(document).on('click', btnToTopClass, function(event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
        return false;
    });
    var isMobile = false;
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        isMobile = true;
    }
    $('.post-popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        gallery: {
            enabled: true
        },
        image: {
            titleSrc: function(item) {
                var title = lightbox_caption = '';
                if (item.el.attr('title')) {
                    title = item.el.attr('title');
                }
                if (item.el.attr('lightbox_caption')) {
                    lightbox_caption = '<span class="lightbox-popup-caption">' + item.el.attr('lightbox_caption') + '</span>';
                }
                return title + lightbox_caption;
            }
        },
        callbacks: {
            open: function() {
                $.magnificPopup.instance.close = function() {
                    if (!isMobile) {
                        $.magnificPopup.proto.close.call(this);
                    } else {
                        $(document).on('click', 'button.mfp-close', function() {
                            $.magnificPopup.proto.close.call(this);
                        });
                    }
                }
            }
        }
    });
    $(".fit-videos").fitVids();
    $(document).on('click', '.sl-button', function() {
        var button = $(this);
        var post_id = button.attr('data-post-id');
        var security = button.attr('data-nonce');
        var iscomment = button.attr('data-iscomment');
        var allbuttons;
        if (iscomment === '1') {
            allbuttons = $('.sl-comment-button-' + post_id);
        } else {
            allbuttons = $('.sl-button-' + post_id);
        }
        var loader = allbuttons.next('#sl-loader');
        if (post_id !== '') {
            $.ajax({
                type: 'POST',
                url: simpleLikes.ajaxurl,
                data: {
                    action: 'process_simple_like',
                    post_id: post_id,
                    nonce: security,
                    is_comment: iscomment
                },
                beforeSend: function() {},
                success: function(response) {
                    var icon = response.icon;
                    var count = response.count;
                    allbuttons.html(icon + '<span>' + count + '</span>');
                    if (response.status === 'unliked') {
                        var like_text = simpleLikes.like;
                        allbuttons.prop('title', like_text);
                        allbuttons.removeClass('liked');
                    } else {
                        var unlike_text = simpleLikes.unlike;
                        allbuttons.prop('title', unlike_text);
                        allbuttons.addClass('liked');
                    }
                    loader.empty();
                }
            });
        }
        return false;
    });
    $('a.inner-link').smoothScroll({
        speed: 900,
        offset: -110
    });
    $(".post-owl-slider-simple").owlCarousel({
        navigation: true,
        pagination: true,
        autoPlay: 3000,
        stopOnHover: true,
        singleItem: true,
        navigationText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>']
    });
    var pagesNum = $("div.paperio-infinite-scroll").attr('data-pagination');
    paperio_separator();
    $('.infinite-scroll-pagination').infinitescroll({
        nextSelector: 'div.paperio-infinite-scroll .old-post a',
        loading: {
            img: "images/ajax-loader.gif",
            msgText: '<div class="paging-loader" style="transform:scale(0.35);"><div class="circle"><div></div></div><div class="circle"><div></div></div><div class="circle"><div></div></div><div class="circle"><div></div></div></div>',
            finishedMsg: '<div class="finish-load">' + "Mensaje que deberia estar en: " + "paperio_infinite_scroll_message.message" + '</div>',
            speed: 'fast',
        },
        navSelector: 'div.paperio-infinite-scroll',
        contentSelector: '.infinite-scroll-pagination',
        itemSelector: '.infinite-scroll-pagination div.blog-single-post',
        maxPage: pagesNum,
    }, function(newElements) {
        var $newblogpost = $(newElements);
        var $grid = $('.masonry-listing').imagesLoaded(function() {
            $grid.masonry('appended', $newblogpost);
        });
        paperio_separator();
    });
    $(".paperio-comment-button").on("click", function() {
        var fields;
        fields = "";
        if ($(this).parent().parent().find('#author').length == 1) {
            if ($("#author").val().length == 0 || $("#author").val().value == '') {
                fields = '1';
                $("#author").addClass("inputerror");
            }
        }
        if ($(this).parent().parent().find('#comment').length == 1) {
            if ($("#comment").val().length == 0 || $("#comment").val().value == '') {
                fields = '1';
                $("#comment").addClass("inputerror");
            }
        }
        if ($(this).parent().parent().find('#email').length == 1) {
            if ($("#email").val().length == 0 || $("#email").val().length == '') {
                fields = '1';
                $("#email").addClass("inputerror");
            } else {
                var re = new RegExp();
                re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                var sinput;
                sinput = "";
                sinput = $("#email").val();
                if (!re.test(sinput)) {
                    fields = '1';
                    $("#email").addClass("inputerror");
                }
            }
        }
        if (fields != "") {
            return false;
        } else {
            return true;
        }
    });
    var keys = Object.keys(window);
    for (var i in keys) {
        if (keys[i].toLowerCase().indexOf("paperio_instagram_widget_") >= 0) {
            if (typeof window[keys[i]] != 'function') {
                window[keys[i]].run();
            }
        }
    }
    $(".paperio-default-menu > .page_item_has_children").each(function(index) {
        if ($(this).hasClass('page_item_has_children')) {
            $(this).find('a:first').before('<a class="dropdown-caret-icon" data-toggle="dropdown"><i class="fa fa-caret-down"></i></a>');
        }
    });
    $(".paperio-default-menu > .menu-item-has-children").each(function(index) {
        if ($(this).hasClass('menu-item-has-children') && !$(this).hasClass('dropdown')) {
            $(this).find('a:first').before('<a class="dropdown-caret-icon" data-toggle="dropdown"><i class="fa fa-caret-down"></i></a>');
        }
    });
    if ($(".menu-item-language ul").hasClass('submenu-languages')) {
        $(".menu-item-language ul").prev().before('<a class="dropdown-caret-icon" data-toggle="dropdown"><i class="fa fa-caret-down"></i></a>');
    }
});

function paperio_separator() {
    var setColumnType = $('.infinite-scroll-pagination').attr('data-column');
    $(".infinite-scroll-pagination > .page-separator").remove();
    var total = $('.infinite-scroll-pagination > .blog-single-post').length;
    var setColumnType = $('.infinite-scroll-pagination').attr('data-column');
    for (var i = 1; i < total; i++) {
        if (i % setColumnType == 0) {
            var appendDiv = $('.page-separator-parent > .page-separator').clone(false);
            var appendElement = $('.infinite-scroll-pagination').find('.blog-single-post:eq(' + (i - 1) + ')');
            $(appendDiv).insertAfter(appendElement);
        }
    }
}
$('.header-img').each(function() {
    if ($(this).children('.header-background-img').length) {
        var imgSrc = jQuery(this).children('.header-background-img').attr('src');
        jQuery(this).css('background', 'url("' + imgSrc + '")');
        jQuery(this).children('.header-background-img').remove();
    }
});

function inputfocus(id) {
    $('#' + id).removeClass('inputerror');
}
$("form.wpcf7-form input").focus(function() {
    if ($(this).hasClass("wpcf7-not-valid")) {
        $(this).removeClass("wpcf7-not-valid");
        $(this).parent().find(".wpcf7-not-valid-tip").remove();
        $(this).parents('.wpcf7-form').find(".wpcf7-validation-errors").hide();
    }
});;
! function(a, b) {
    "use strict";

    function c() {
        if (!e) {
            e = !0;
            var a, c, d, f, g = -1 !== navigator.appVersion.indexOf("MSIE 10"),
                h = !!navigator.userAgent.match(/Trident.*rv:11\./),
                i = b.querySelectorAll("iframe.wp-embedded-content");
            for (c = 0; c < i.length; c++) {
                if (d = i[c], !d.getAttribute("data-secret")) f = Math.random().toString(36).substr(2, 10), d.src += "#?secret=" + f, d.setAttribute("data-secret", f);
                if (g || h) a = d.cloneNode(!0), a.removeAttribute("security"), d.parentNode.replaceChild(a, d)
            }
        }
    }
    var d = !1,
        e = !1;
    if (b.querySelector)
        if (a.addEventListener) d = !0;
    if (a.wp = a.wp || {}, !a.wp.receiveEmbedMessage)
        if (a.wp.receiveEmbedMessage = function(c) {
                var d = c.data;
                if (d.secret || d.message || d.value)
                    if (!/[^a-zA-Z0-9]/.test(d.secret)) {
                        var e, f, g, h, i, j = b.querySelectorAll('iframe[data-secret="' + d.secret + '"]'),
                            k = b.querySelectorAll('blockquote[data-secret="' + d.secret + '"]');
                        for (e = 0; e < k.length; e++) k[e].style.display = "none";
                        for (e = 0; e < j.length; e++)
                            if (f = j[e], c.source === f.contentWindow) {
                                if (f.removeAttribute("style"), "height" === d.message) {
                                    if (g = parseInt(d.value, 10), g > 1e3) g = 1e3;
                                    else if (~~g < 200) g = 200;
                                    f.height = g
                                }
                                if ("link" === d.message)
                                    if (h = b.createElement("a"), i = b.createElement("a"), h.href = f.getAttribute("src"), i.href = d.value, i.host === h.host)
                                        if (b.activeElement === f) a.top.location.href = d.value
                            } else;
                    }
            }, d) a.addEventListener("message", a.wp.receiveEmbedMessage, !1), b.addEventListener("DOMContentLoaded", c, !1), a.addEventListener("load", c, !1)
}(window, document);
