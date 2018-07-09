

<section class="footblack footerPart1">
    <div class="container">
        <div class="row">
            <div class="socials">
                <div class="col-6 infolinia">Гаряча лінія інтернет-магазин (67) 253 94 94</div>
                <div class="col-6 socialicons justify-image pull-right">
					<a href="#" target="_blank">
						<i class="fa fa-facebook"></i>
					</a>
					
					<a href="#" target="_blank">
						<i class="fa fa-instagram"></i>
					</a>
					
					<a href="#" target="_blank">
						<i class="fa fa-pinterest-p"></i>
					</a>
					
					<a href="#" target="_blank">
						<i class="fa fa-google-plus"></i>
					</a>
					
					<a href="#" target="_blank">
						<i class="fa fa-youtube"></i>
					</a>
                </div>
            </div>
            <div id="inteliwise-agent" style="display:none;z-index:9999;width:320px;position:fixed;bottom:34px;right:0px"></div>
        </div>
    </div>
</section>

<section class="graybg3 foot footerPart2">
    <div class="container">
        <div class="row">
            <div class="col-md-3 onecol 1footcol1">
                <div class="wrapper button-dropdown">
                    <h4><a href="" class="dropdown-toggle">@lang('home.Прокомпанію') <span><i class="fa fa-caret-down"></i></span></a></h4>
                    <ul class="dropdown-list">
                        <li><a href="/about_us">@lang('home.Пронас')</a></li>
                        <li><a href="/contact">@lang('home.Контакти') </a></li>
						@if(!Auth::check())
							<li class="login-link">
								<a href="javascript:;" class="authAjax">@lang('home.Авторизуйся')</a><span></span>
							</li>
						@else
							<li class="logout-link kreska">
								<a style="font-weight:bold;"href="/customer">@lang('footer.profile')</a><span></span>
							</li>
							@if(\Auth::check() && \Auth::user()->is_admin == 1)
								<li class="logout-link kreska"><a style="font-weight:bold;" href="/admin_panel">Панель управління </a><span></span>
							</li>
							@endif
							<li class="logout-link">
								<a href="/logout" class="tpl-logout-link">@lang('home.Вийти') </a><span></span>
							</li>
						@endif
                    </ul>
                </div>
            </div>
			

			
            <div class="col-md-3 onecol 1footcol4">
                <div class="wrapper button-dropdown">
                    <h4><a href="#" class="dropdown-toggle">@lang('footer.cooperation') <span><i class="fa fa-caret-down"></i></span></a></h4>
                    <ul class="dropdown-list">
                        <li><a href="https://www.vox.pl/ru/architektor-interer">@lang('home.ДляАрхітекторів')</a></li>

                    </ul>
                </div>
            </div>

            <div class="col-md-3 onecol 1footcol6">
                <div class="wrapper button-dropdown downloadcatalog">
                    <h4><a href="https://www.vox.pl/ru/katalog" class="dropdown-toggle">@lang('footer.down_cat') <span><i class="fa fa-caret-down"></i></span></a></h4>
                    <div class="dropdown-list">
						<a href="https://www.vox.pl/ru/katalog" class="getcatalog">
							<img src="/img/icon-Pobierz-katalog.png" alt="Pobierz katalogi">
						</a>
					</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="graybg3 footerPart3">
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-pull-6 col-sm-6 copy"> Copyrights © 2009-{{date('Y')}} VOX. Всі права захищені.</div>
            </div>
        </div>
    </div>
</section>

{{--<script type="text/javascript" defer src="{{ asset('js/vox_plugin.min.js') }}"></script>--}}
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" defer src="{{ asset('js/app/vox-base-body.min.js') }}"></script>
<script type="text/javascript" defer src="{{ asset('js/app/vox-freedom-body.min.js') }}"></script>

<script type="text/javascript" defer src="{{ asset('js/auth.js') }}"></script>
<script>

    $(function () {
        function a(o) {
            function a(o) {
                var e = new Image();
                e.src = o;
                return e
            };
            try {
                var e = o.item.count, t = o.item.index === e ? 1 : o.item.index + 1,
                    i = o.item.index === 1 ? e : o.item.index - 1,
                    n = $(o.target).find('.item').eq(t).find('img.owl-lazy').data('src'), d = a(n),
                    l = $(o.target).find('.item').eq(i).find('img.owl-lazy').data('src'), s = a(l)
            } catch (r) {
                console.log('Image buffor failed: ' + r)
            }
        };
        var e = {
            loop: !0,
            margin: 0,
            nav: !0,
            mouseDrag: !1,
            autoplay: !0,
            autoplayTimeout: 6000,
            navSpeed: 1000,
            autoplayHoverPause: !0,
            lazyLoad: !0,
            responsive: {0: {items: 1, dots: !1}, 600: {items: 1, dots: !1}, 1000: {items: 1}}
        };
        var o = $('#landingpage-freedom-carousel');
        o.owlCarousel(e);
        $('#landingpage-freedom-carousel .owl-next').click(function () {
            o.trigger('stop.autoplay.owl')
        });
        $('#landingpage-freedom-carousel .owl-prev').click(function () {
            o.trigger('stop.autoplay.owl')
        });
        $('#landingpage-freedom-carousel .owl-dot').click(function () {
            o.trigger('stop.autoplay.owl')
        });
        o.on('loaded.owl.lazy', function (o) {
            a(o)
        })
    });
</script>
@yield('foot')