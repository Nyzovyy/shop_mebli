
        <!DOCTYPE html><!--[if lt IE 7]>
<html lang="{{ app()->getLocale() }}" class="no-js lt-ie9 lt-ie8 lt-ie7">
<![endif]--><!--[if IE 7]>
<html lang="{{ app()->getLocale() }}" class="no-js lt-ie9 lt-ie8">
<![endif]--><!--[if IE 8]>
<html lang="{{ app()->getLocale() }}" class="no-js lt-ie9">
<![endif]--><!--[if gt IE 8]><!-->
<html lang="{{ app()->getLocale() }}" class="no-js">
<!--<![endif]-->
<head lang="{{ app()->getLocale() }}">
    @include('frontend.header')
</head>

<body id="" class="nowosci landing-page-toplider-corrector">



<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>

<nav class="mash-menu navbar " data-color="">
    @include('frontend.menu')
</nav>
<script>
    ;var isSmallMenu = !1;
    jQuery(document).ready(function (e) {
        var t = e(window).width();
        e('.mash-menu').mashableMenu({
            separator: !1,
            ripple_effect: !1,
            search_bar_hide: !0,
            top_fixed: !1,
            full_width: !1,
            right_to_left: !1,
            trigger: 'hover',
            vertical_tabs_trigger: 'click',
            vertical_tabs_effect_speed: 400,
            drop_down_effect_in_speed: 200,
            drop_down_effect_out_speed: 200,
            drop_down_effect_in_delay: 200,
            drop_down_effect_out_delay: 200,
            outside_close_dropDown: !0,
            sticky_header: !1,
            sticky_header_height: 200,
            sticky_header_animation_speed: 400,
            timer_on: !1,
            timer_morning_color: 'cyan',
            timer_afternoon_color: 'red',
            timer_evening_color: 'teal',
            internal_links_enable: !0,
            internal_links_toggle_drop_down: !1,
            internal_links_target_speed: 400,
            mobile_search_bar_hide: !1,
            mobile_sticky_header: !1,
            mobile_sticky_header_height: 100,
            media_query_max_width: 1023
        });
        e('#polyglotLanguageSwitcher').on('mouseover', function () {
            e(this).find('ul').stop().show()
        }).on('mouseout', function (t) {
            e(this).find('ul').stop().hide()
        })
    });</script>
<script>;function inittopbar() {
        window.addEventListener('scroll', function (a) {
            function s() {
                var a = $('nav').height();
                return a
            };
            function o(a, e) {
                var n = $('#fullpage');
                if (n) {
                    if (a && !$(n).hasClass('smallerMenu' && !e)) {
                        $(n).addClass('smallerMenu')
                    }
                    else {
                        var l = $('body').hasClass('kolekcjebody');
                        if ($(n).hasClass('smallerMenu') && !l && e) {
                            $(n).removeClass('smallerMenu')
                        }
                    }
                }
            };
            function t(a, n) {
                var e = $('body').hasClass('kolekcjebody'), l = $('nav').hasClass('smaller');
                return l && !e && n
            };
            var e = window.pageYOffset || document.documentElement.scrollTop, l = s(),
                n = document.querySelector('nav');
            if (e > l) {
                if (!classie.has(n, 'smaller') && !isSmallMenu) {
                    classie.add(n, 'smaller');
                    isSmallMenu = !0
                }
            }
            else if (e == 0) {
                if (t(n, isSmallMenu)) {
                    classie.remove(n, 'smaller');
                    isSmallMenu = !1
                }
            }
            ;
            o(e > l, isSmallMenu)
        })
    };
    window.onload = inittopbar();
    $(document).ready(function () {
        function a() {
            $('ul#topmenu').load($('ul#topmenu').data('url-async'), function (a) {
                var n = $(a).find('.tpl-logout-link');
                if (n.size()) {
                    $('a.tpl-login-link').replaceWith(n)
                }
            });
            $('section#async-cart').load($('section#async-cart').data('url-async'))
        };
    /*    $('body').on('cart:refresh', function (a) {
            var n = $('ul#topmenu').load('/header/login-header', function () {
                $('section#async-cart').load('/header/cart-header', function () {
                    $('.dropdown-cart').fadeIn('fast');
                    setTimeout(function () {
                        $('.dropdown-cart').fadeOut('fast')
                    }, 2500);
                    return !1
                })
            })
        });*/
        a();
        $('section.mash-menu-inner-container a').on('click', function () {
            $(this).focus()
        })
    });
</script>



{{--Content--}}
@yield('content')

<div id="app"></div>


{{--Footer--}}
@include('frontend.footer')

</body>
</html>


