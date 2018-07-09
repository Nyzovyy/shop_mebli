@php
        if(\Auth::guest()){
        $card = \Illuminate\Support\Facades\Cookie::get('card');
        if($card)$user_id = $card;
        else $card = null;
        }else{
        $user_id = \Auth::id();
        }
        if(isset($user_id))
        	$count_card = \App\Card::where('user_id' , $user_id)->count();
       else
       		$count_card = 0;

@endphp
<section class="mash-menu-inner-container">
    <!-- brand -->
    <ul class="mash-brand" id="brand">
        <li>
            <a href="/">
                <img src="/img/logo-vox.svg" alt="VOX">
            </a>
            <!-- mobile button -->
            <button class="mash-mobile-button">
                <span class="cd-menu-icon"></span>
            </button>
        </li>
    </ul>

    <div id="polyglotLanguageSwitcher">
        @if (\App::isLocale('ru'))

            <a class="current" href="#"><img src="/img/flags/ru.png" alt=""> Рус <span class="trigger">»</span></a>
        @else
            <a class="current" href="#"> <img src="/img/flags/ua.png" alt=""> Укр <span class="trigger">»</span></a>
        @endif
        <ul class="dropdown">
            @if (\App::isLocale('ru'))
                <li><a href="/language/ua"><img src="/img/flags/ua.png" alt=""> Укр</a></li>
            @else
                <li><a href="/language/ru"><img src="/img/flags/ru.png" alt=""> Рус</a></li>
            @endif
        </ul>
    </div>

  {{--  <div class="search">
        <a href="#" class="searchicon">
            <i class="fa fa-search "></i>
        </a>

        <div class="searchbox autocompletebox">
            <form id="searchform" class="form-inline" method="get" role="search" action="">
                <div class="form-group">
                    <label class="sr-only" for="search">Szukaj:</label>
                    <input id="search" type="text" name="search" placeholder="" class="form-control search-autocomplete"
                           data-source="/search-complite" data-target="/search" data-limit="5"/>
                </div>
            </form>
        </div>
    </div>--}}

    {{--Shopping Card--}}
    <section id="async-cart" data-url-async="/header/cart-header">
        <div class="basket" id="basket-quantity-header">
            <a href="/cart">{{$count_card}}</a>
        </div>

        <div class="dropdown-cart" style="display: none;">
            {{-------------   Cart Mini   ------------------------------------}}
            {!! App::call('App\Http\Controllers\CartController@getCartMini') !!}
        </div>


        <script type="text/javascript">
            $(function () {
                $.fn.lazybind = function (event, fn, timeout, abort) {
                    var timer = null;
                    $(this).bind(event, function () {
                        timer = setTimeout(fn, timeout);
                    });
                    if (abort == undefined) {
                        return;
                    }
                    $(this).bind(abort, function () {
                        if (timer != null) {
                            clearTimeout(timer);
                        }
                    });
                };
            });


            // Koszyk
            $(function () {
                // mo
                $("a.zobacz-koszyk, .ctitle a").on('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    location.href = $(this).attr('href');
                });

                $(".basket a, .basket").click(function () {
                    var viewportWidth = $(window).width();
                    if (viewportWidth < 1024) {
                        var list_items = $('.mash-menu').find('.mash-list-items'),
                            elemParent = list_items.parent();
                        if (list_items.is(':visible')) {
                            elemParent.removeClass("normal");
                            list_items.fadeOut();
                        }
                        if ($('.searchbox').is(':visible')) {
                            $(".searchbox").toggle();
                        }
                        $(".dropdown-cart").fadeToggle();
                    }
                    else {
                        location.href = $(this).attr('href');
                    }
                    return false;
                })
                // mo
                    .lazybind(
                        'mouseenter',
                        function () {
                            var viewportWidth = $(window).width();
                            if (viewportWidth >= 1024) {
                                $(".dropdown-cart").fadeIn("fast");
                            }
                        },
                        200,
                        'mouseleave'
                    );
            });


            $(function () {
                $('.topcart').lazybind(
                    'mouseout',
                    function () {
                        var viewportWidth = $(window).width();
                        if (viewportWidth >= 1024) {
                            $(".dropdown-cart").fadeOut("fast");
                        }
                    },
                    2000,
                    'mouseover'
                );
            });

            $(function () {
                $('body').on("touchstart", function () {
                    var viewportWidth = $(window).width();
                    if (viewportWidth <= 1024 && viewportWidth > 768) {
                        $(".dropdown-cart").fadeOut("fast");
                    }
                });
            });

            $(function () {
                // mo
                $(".dropcart").click(function () {
                    $(".basket a").trigger('click');
                    $(".dropdown-cart").toggle();
                    return false;
                });
            });

            $(function () {
                var viewportWidth = $(window).width();
                if (viewportWidth > 767) {
                    $(".scrollcontent").mCustomScrollbar({
                        theme: "light-thick",
                        scrollButtons: {enable: true}
                    });
                }
            });

            function _getProdId(el) {
                var $prodID = $(el).closest("*[id^='prod-row-']").data('id');
                if ($prodID === undefined) {
                    console.log('No product id');
                    return false;
                }
                return $prodID;
            }

            $(function () {
                $(".dropdown-cart").on('cart:check-empty', function () {
                    if ($(this).find("li").length == 0) {
                        $(".dropdown-cart").find(".scrollcontent").remove();
                        $(".dropdown-cart").find(".topcart > h4, .topcart > a ").remove();
                        $(".dropdown-cart").find(".emptycart").removeClass("hidden");
                    }
                })

                $('.dropcart .scrollcontent ul li .cclose a').on('click', function (e) {

                    e.preventDefault();
                    e.stopPropagation();

                    var closeLink = $(this);
                    VCart.init();
                    VCart.removeProduct($(this), _getProdId($(this)))
                        .done(function () {
                            closeLink.closest('li').slideUp('fast', function () {
                                $(this).remove();
                                $(".dropdown-cart").trigger('cart:check-empty');
                            });
                        });

                    return false;
                });


            });


        </script>
    </section>
    <div class="basket">
        <a href="/cart"></a>
    </div>

    <div class="rwdcontener">
        <ul class="mash-list-items right top-menu" id="topmenu" data-url-async="/header/login-header?login=">
            <li class="kreska"><a target="_blank" href="https://www.vox.pl/ru/architektor-interer">@lang('home.ДляАрхітекторів')</a><span></span></li>
            @if(!Auth::check())
                <li class="login-link"><a href="javascript:;" class="authAjax">@lang('home.Авторизуйся')</a><span></span></li>
            @else
                <li class="logout-link kreska"><a style="font-weight:bold;"
                                                  href="/customer">{{ Auth::user()->name }} </a><span></span></li>
                @if(\Auth::check() && \Auth::user()->is_admin == 1)
                    <li class="logout-link kreska"><a style="font-weight:bold;" href="/admin_panel">Панель
                            управління </a><span></span></li>
                @endif
                <li class="logout-link"><a href="/logout" class="tpl-logout-link">@lang('home.Вийти') </a><span></span>
                </li>
            @endif
            <li><a href="/cart" id="cart-total-header">@lang('home.Корзина') <span></span></a></li>
            <li><a href="#">&#160;</a></li>
        </ul>
        <!-- list items -->
        <hr class="linka"/>
        <ul class="mash-list-items main-menu" id="mainmenu">
            <!-- active -->
            <div class="floatleft">
                <li>
                    <a href="/interior"> @lang('home.Інтерєр')</a></li>

                <li>
                    <a href="javascript:void(0);" class="menu-top" id="meble">@lang('home.Меблі')</a>
                    <div class="drop-down-large container-menu ">
                        <div class="container-fluid">
                            <div class="row">
                                {!! App::call('App\Http\Controllers\HeadMenuController@head') !!}
                            </div>
                        </div>
                    </div>
                </li>

            </div>
            <!-- </ul><ul class="mash-list-items right add-menu" id="addmenu"> -->
            <div class="floatright">
                <li><a href="https://www.vox.pl/ru/stranica/proektiruj">@lang('home.Проектуйте') </a></li>
                <li><a href="/news">@lang('home.Новини') </a></li>
                <li><a href="/contact">@lang('home.Контакти') </a></li>
            </div>
        </ul>
        {{--<ul class="mash-list-items right rwd-menu" id="rwdmenu">
            <li><a href="/salony">Znajdź najbliższy salon </a></li>
            <li><a href="/umow-sie-na-konsultacje.html">Umów się z doradcą </a></li>
            <li><a href="/architekci-wnetrz">Dla Architekta </a>
            <li><a href="/koszty-i-zasady-dostawy-2">Koszty i zasady dostawy </a></li>
            <li><a href="tel:672539494">Dzwoń +48 67 253 94 94</a></li>
            <li class="login-link capitalize"><a href="#" class="tpl-login-link">Авторизуйся </a></li>
            <li><a href="/customer">Przejście do panelu</a></li>
            <li>
                <div class="topsocialicons justify-image"><a href="https://www.facebook.com/WnetrzaVOX/"
                                                             target="_blank"><img src="/img/ico-facebook-b.svg"
                                                                                  alt="Facebook"></a><a
                            href="https://pl.pinterest.com/wnetrzavox/" target="_blank"><img
                                src="/img/ico-pinterest-b.svg" alt="Pinterest"></a><a
                            href="https://plus.google.com/109365853046339787756" target="_blank"><img
                                src="/img/ico-google-b.svg" alt="Google"></a><a
                            href="https://www.youtube.com/user/VOXMeble" target="_blank"><img
                                src="/img/ico-youtube-b.svg" alt="Youtube"></a></div>
            </li>
        </ul>--}}
    </div>
</section>


