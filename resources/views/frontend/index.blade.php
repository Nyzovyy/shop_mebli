@extends('layouts.app')

@section('content')

    {{--  Slider  --}}
    @include('frontend.slider')
    <div class="lp-wrapper">

        <section class="container lp-description">
            <div class="lp-desc-row">
                <div class="lp-desc-left">
                    <a href="https://www.youtube.com/watch?v=FSKJovHovkU&vq=hd1080&iv_load_policy=3"
                       class="fancybox-media">
                        <h3 class="lp-desc-caption">ИНТЕРЬЕР, В КОТОРОМ<br>ОЧЕНЬ СВОБОДНО</h3>
                    </a>
                    <a href="https://www.youtube.com/watch?v=FSKJovHovkU&vq=hd1080&iv_load_policy=3"
                       class="fancybox-media">
                        <p> Мы проектируем нашу мебель и элементы отделки, продумывая все до мелочей, заботясь об их качестве и функциональности. Это позволяет создать законченный и красивый интерьер, соответствующий вашим потребностям и стилю жизни. </p><br>
                        <p> В таком интерьере легче оставаться самим собой, делать то, что любишь, и чувствовать себя очень свободно. </p>
                    </a>
                </div>
                <div class="lp-desc-right" data-interval="3000">
                    <a
                            href="https://www.youtube.com/watch?v=FSKJovHovkU&vq=hd1080&iv_load_policy=3"
                            class="lp-desc-img-free fancybox-media"
                            style="background-image:url('/img/lp/wolnewnetrza.jpg')">
                    </a>
                    <a
                            href="https://www.youtube.com/watch?v=FSKJovHovkU&vq=hd1080&iv_load_policy=3"
                            class="lp-desc-img-free fancybox-media"
                            style="background-image:url('/img/lp/wolnewnetrza2.jpg')">
                    </a>
                    <a
                            href="https://www.youtube.com/watch?v=FSKJovHovkU&vq=hd1080&iv_load_policy=3"
                            class="lp-desc-img-free fancybox-media"
                            style="background-image:url('/img/lp/wolnewnetrza3.jpg')">
                    </a>
                    <a
                            href="https://www.youtube.com/watch?v=FSKJovHovkU&vq=hd1080&iv_load_policy=3"
                            class="lp-desc-img-free fancybox-media"
                            style="background-image:url('/img/lp/wolnewnetrza4.jpg')">
                    </a>
                </div>
            </div>
        </section>

        <section class="lp-prod-cat lp-section-furniture lazyload">
            <div class="lp-prod-cat-row">
                <div class="lp-prod-cat-desc">
                    <div class="lp-prod-cat-desc-valign">
                        <h3><a href="#" title="Meble">МЕБЕЛЬ</a></h3>
                        <p class="lp-prod-cat-desc-text"><a href="/meble-vox" title="Meble">Удивляет креативностью и качеством. Стул, с которого легко вставать из-за стола, стеллаж, внешний вид и функции которого вы выбираете сами, и диван со столиком для ноутбука. С такой мебелью Вы можете ... делать все, что хотите.</a></p>
                        {{--<p class="lp-prod-cat-desc-btn">
                            <a href="#" class="btnred btnred-caret">SPRAWDŹ PROMOCJE<br/>W
                                TWOIM SALONIE</a>
                        </p>--}}
                    </div>
                </div>
                <div class="lp-prod-cat-video">
                    <a href="/meble-vox" title="Meble">
                        <video data-setup="{&quot;controls&quot;:false,&quot;autoplay&quot;:false,&quot;preload&quot;:&quot;none&quot;,&quot;loop&quot;:true}">
                            <source src="/img/lp/furniture/video.mp4" type="video/mp4"/>
                        </video>
                    </a>
                </div>
            </div>
        </section>

        <section class="container">
            <div class="row">
                {{--
                <script src="assets/js/jquery.dotdotdot.min.js"></script>
                <script src="assets/js/jquery.appear.js"></script>
                <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
                <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
                --}}
                <div class="clearfix"></div>
                <div class="productContainer">

                    @if(count($goods))

                        @foreach($goods as $good)
                            @if(!empty($good->img))
                                @php
                                    $q = explode("||", substr($good->img, 1, -1));
                                    $count = count($q);
                                @endphp
                            @endif
                            {{-- Product item start --}}
                            @if($good->description)
                                <div class="productItem" data-price="2978">
                                    <div class="image">
                                        <div class="hover">
                                            <a href="/{{$good->description->slug}}" target="_blank">
                                                <img style="max-height: 426px; max-width: 426px;"
                                                        data-src="{{_Function::ProductBackCover($good->id)}}"
                                                        alt="" class="lazyload"/>
                                            </a>
                                        </div>
                                        <div class="imageSlider">
                                            <div class="owl-carousel owl-carousels productSlider">
                                                <div class="item">
                                                    <a href="/{{$good->description->slug}}" target="_blank">
                                                        <img style="max-width: 300px;"
                                                             data-src="{{_Function::ProductCover($good->id)}}"
                                                             alt="" class="lazyload"/>

                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="imageInfo">
                                        <div class="colorBoxes"></div>
                                        <div class="categoryInfo">
                                            <a href="/{{$good->description->slug}}" target="_blank">{{$good->category->description->name}}</a>
                                        </div>
                                        <div class="productName">
                                            <a href="/{{$good->description->slug}}" target="_blank"> {{$good->description->name}} </a>
                                        </div>
                                        <div class="productPrice"> {{$good->price}} грн</div>
                                    </div>
                                </div>
                            @endif
                            {{-- Product item end --}}
                        @endforeach
                    @endif

                </div>
                <script>;$(function () {
                        var o = function () {
                            var t = $(window).width(), o = $('.productContainer .productSlider'), a = {
                                loop: !1,
                                margin: 0,
                                nav: !1,
                                mouseDrag: !1,
                                autoplay: !1,
                                navSpeed: 1000,
                                autoplayHoverPause: !0,
                                lazyLoad: !0,
                                dots: !1,
                                items: 1
                            };
                            if (o.length > 0) {
                                if (jQuery().owlCarousel) {
                                    o.each(function () {
                                        var o = $(this), r = $(this).parent().parent().parent().find('.colorBoxes'),
                                                i = r.find('.box');
                                        o.owlCarousel(a);
                                        i.hover(function () {
                                            var a = $(this).data('color');
                                            if (t > 1024) {
                                                o.trigger('to.owl.carousel', [a, 500, !0])
                                            }
                                        })
                                    })
                                }
                            }
                        }, t = function () {
                            var o = parseInt($('div.productContainer div.productName').css('line-height'), 10);
                            $('div.productContainer div.productName').dotdotdot({height: o * 3})
                        };
                        $(o);
                        $(t)
                    });</script>
            </div>
        </section>

        <section class="product-shop-list-section product-any-section">
            <div class="container" id="container-product-desc">
                <div class="row">
                    <div class="col-xs-12">
                        <h4 class="h4-section-title"><i class="fa fa-map-marker" aria-hidden="true"></i> Відвідайте
                            найближчий салон VOX:</h4>
                    </div>
                </div>
                <div class="row toggle-content">
                    <div class="container shopsXhr">
                        <div id="shops-list">
                            <div class="shops-list-wrapper">
                                <div class="shop-list-item1 col-xs-12 col-sm-6 col-md-6">
                                    <span class="city">Львов</span>
                                    <h4>VOX. Salon mebli</h4>
                                    <div class="address">ТЦ «МАРК» 2 поверх, ul., <br>vox@lviv.farlep.net<br>tel. +380
                                        32 242 20 42; моб +38 093 6303592
                                    </div>
                                    <div class="hours"></div>
                                    {{--<a style="font-size:12px;" href="/salony#MEBLE_149" class="red">zobacz dojazd</a>--}}
                                </div>
                                <div class="shop-list-item1 col-xs-12 col-sm-6 col-md-6">
                                    <span class="city">Львов</span>
                                    <h4>VOX. Salon mebli</h4>
                                    <div class="address">ТЦ “ Три Слони», Салон «Меблі VOX», ul., <br>vox@lviv
                                        .farlep.net<br>tel. +38 032 2421980
                                    </div>
                                    <div class="hours"></div>
                                    {{--<a style="font-size:12px;" href="/salony#MEBLE_150" class="red">zobacz dojazd</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </section>

    </div>
    {{--Map--}}
    {{--@include('frontend.map')--}}
@endsection