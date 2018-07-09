@extends('layouts.app')

@section('content')


    <link rel="stylesheet" type="text/css" href="/css/product.css">
    <link rel="stylesheet" type="text/css" href="/css/simpleTalk.css">
    <link rel="stylesheet" type="text/css" href="/css/slick.css">
    <link rel="stylesheet" type="text/css" href="/css/slick-theme.css">




    <div class="clearfix"></div>
    <div class="container-fluid breadcrumbs">
        <div class="row">
            <div class="container bordertop">
                <div class="row">
                    <div class="col-xs-12">
                        <ul>
                            <li>
                                <a href="/">@lang('product.home')</a>
                            </li>
                            <li>
                                <a href="/{{$goods->category->description->slug}}">{{$goods->category->description->name}}</a>
                            </li>
                            <li>
                                <a href="/{{$goods->description->slug}}">{{$goods->description->name}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container change-product-container">
        <div class="product-arrows-small"></div>
    </div>
    <div id="vox-product" class="vox-product" data-sversion="" data-scart="">
        <section class="product-section product-page product-page-meble">
            <div class="container vox-produkt">
                <div class="container vox-product-pw vox-product-pw-main simple-talk-container" data-type="PW"
                     data-id="18829" data-set="1" data-price_min_o="10" data-price_min_p="10" data-price_max_o="590"
                     data-price_max_p="590" data-sale="0" data-pathcart="/cart/add/MEBLE" itemscope=""
                     itemtype="http://schema.org/Product">

                    <input type="hidden" name="vox_product_qty" value="1" id="vox_product_qty_18829"
                           class="bound-controls">

                    <!--<div id="fog" style="display: none;">
                        <img class="absolute-center" src="assets/img/stLogoC2.png" alt="VOX - Simple">
                    </div>-->
                    <div class="st-configurator-work-place">
                        
                        
                        <div class="row">
                            <div class="col-md-9 col-preview">
                                <!--<div id="mainImageContainer" class="openGalleryModal bound-openGalleryModal"
                                     data-modal-url="/modal/gallery/MEBLE_PW/18829?version_id=1">

                                    <img class="mainImage st-responsive-xl1" src="/img/white_wallpaper_images_028.jpg"
                                         data-responsive="XL1" data-src="/img/white_wallpaper_images_028.jpg"
                                         style="opacity: 1;">
                                </div>-->

                                <div class="shop-slider-single">
                                    
                                       @if(count($allPhotos))
                                            @foreach($allPhotos as $photo)
                                                <div class="product-full-img-crop">
                                                    <img class="" src="{{ $photo }}"
                                                     alt="">
                                                </div>
                                            @endforeach
                                        @endif
                                    
                                </div>
                            </div>
                            <div class="col-md-3 col-user-menu">
                                <div id="mainMenu" class="panel-group menu">
                                    <div class="st-main-menu-header">
                                        <div class="st-main-menu-header-name">
                                            <p class="st-main-menu-header-name-bottom">{{$goods->description->name}}</p>
                                        </div>
                                        <p class="st-main-menu-header-collection">
                                            <a href="/{{$goods->category->description->slug}}">{{$goods->category->description->name}}</a>
                                        </p>
                                    </div>
                                    <div id="st-step-accordion" class="panel-group st-main-menu-sections" role="tablist"
                                         aria-multiselectable="true">
                                        @if(count($goods->colors_category))
                                            @php
                                                $color_u = 0;
                                            @endphp
                                            @foreach($goods->colors_category as $category)
                                                @php
                                                    $color_i = 0;
                                                @endphp
                                                <div class="panel panel-default">
                                                    <div class="panel-heading " role="tab" id="st-front-group">
                                                        <div class="panel-title">
                                                            <a class="st-step-accordion-header-collapse collapsed"
                                                               role="button" data-toggle="collapse"
                                                               data-parent="#st-step-accordion"
                                                               href="#st-front-group-collapsed{{$category->id}}"
                                                               aria-expanded="true"
                                                               aria-controls="st-front-group-collapsed{{$category->id}}">
                                                                <div class="row">
                                                                    <div class="col-xs-12 st-step-accordion-header-label-container">
                                                                        <p id="st-main-menu-9-pos"
                                                                           class="st-step-accordion-header-label">{{$category->name_ru}}</p>
                                                                        <i class="st-step-accordion-header-collapse-icon fa fa-caret-down"></i>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div id="st-front-group-collapsed{{$category->id}}"
                                                         class="panel-collapse collapse @if($color_u == 0) in @endif "
                                                         role="tabpanel" aria-labelledby="st-front-group">
                                                        <div class="panel-body">
                                                            <div class="color-row select-kolor elementGroupMiniatures"
                                                                 data-type="st-front">

                                                                <div class="shop-slider-single-nav">
                                                                    @if(count($allPhotos))
                                                                        @foreach($allPhotos as $photo)
                                                                        <div class="item">
                                                                                <div class="product-gallery-crosshair"></div>
                                                                                <div class="owl-productGallery-thumb-crop">

                                                                                    <img class="item owl-productGallery-thumb" src="/files/image/catalog/{{$goods->subcategory_id}}/{{$photo->good_id}}/colors/photo/{{$photo->file}}"
                                                                                     alt="">
                                                                                </div>
                                                                        </div>
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                             
                                                                <!--

                                                                @if($category->colors)

                                                                    @foreach($category->colors as $color)
                                                                        <div class="dekor st-miniature-container"
                                                                             data-name="white">
                                                                            <div class="dip-pw-color-sample img @if($color_i == 0)st-position-in-step-selected @endif"
                                                                                 style="background-image:url('/files/image/catalog/{{$color->color_category->goods->subcategory_id}}/{{$color->color_category->goods->id}}/colors/{{$color->file}}');"
                                                                                 data-id="{{$color->category_id}}:{{$color->id}}"></div>
                                                                            <div class="name">{{$color->name_ru}}</div>
                                                                        </div>
                                                                        @php
                                                                            $color_i++;
                                                                            $color_u++;
                                                                        @endphp
                                                                    @endforeach
                                                                @endif

                                                                -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>

                                    <div class="st-main-menu-footer">
                                        <div id="additionalButtonsContainer" class="panel panel-footer">
                                            <div class="row">
                                                <div class="col-xs-4 st-btn-red-cell st-left">
                                                    <div class="st-main-menu-price-value-container text-center">
                                                        <p class="st-main-menu-price-value totalProductPrice"
                                                           data-price="{{$goods->price}}"
                                                           data-id_photo="0">{{$goods->price}} грн</p>
                                                    </div>
                                                </div>
                                                <div class="col-xs-8 st-btn-red-cell st-right">
                                                    <button id="zatwierdz"
                                                            class="additionalButtons st-btn-red"> @lang('product.add_to_cart')
                                                        <img src="/img/koszyk_white.svg" alt="koszyk"
                                                             class="st-koszyk-white">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-description-section">
            <div class="container toggle-container" id="container-product-desc">
                <div class="row toggle-header">
                    <div class="col-xs-12">
                        <h4 class="h4-section-title">@lang('product.about_product')</h4>
                        <i class="fa fa-caret-up"></i>
                    </div>
                </div>
                <div class="row toggle-content">
                    <div class="vox-product-description-set col-md-12 col-opis">
                        {!! $goods->description->description !!}
                        <ul class="ul-product-desc ul-3d-dim">
                            <div class="col-md-12">
                                <h4 class="section-subtitle">размеры (см):</h4>
                                <ul class="ul-product-desc ul-3d-dim">
                                    <div class="row">
                                        <div class="dim-names">
                                            <ul class="no-bullets">
                                                @if($goods->width)
                                                    <li>Ширина:</li>
                                                @endif
                                                @if($goods->depth)
                                                    <li>Глубина:</li>
                                                @endif
                                                @if($goods->height)
                                                    <li>Высота:</li>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="dim-values">
                                            <ul class="no-bullets">
                                                @if($goods->width)
                                                    <li>{{$goods->width}}</li>
                                                @endif
                                                @if($goods->depth)
                                                    <li>{{$goods->depth}}</li>
                                                @endif
                                                @if($goods->height)
                                                    <li>{{$goods->height}}</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </ul>
                    </div>

                </div>
            </div>

        </section>
        @include('goods.suggest',  ['suggests' => $suggests])
    </div>


    <!--<script src="/js/owl.carousel.min.js"></script>
    <script src="/js/owl.carousel2.thumbs.js"></script>-->
    <script src="/js/slick.min.js"></script>
    <script src="/js/jquery.unveil.js"></script>

    <script>
        $(document).ready(function () {


            $('.shop-slider-single').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                asNavFor: '.shop-slider-single-nav'
            });
            $('.shop-slider-single-nav').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                asNavFor: '.shop-slider-single',
                dots: false,
                arrows: false,
                focusOnSelect: true,
                infinite: false,
            });
         

            $('.dip-pw-color-sample').click(function (e) {
                e.preventDefault();
                /* if($(this).hasClass('st-position-in-step-selected')){
                 $(this).removeClass('st-position-in-step-selected');
                 return false;
                 }*/
                var section = $(this).parent('.st-miniature-container').parent('.select-kolor');
                var search_class = $(section).find('.st-miniature-container').children('.dip-pw-color-sample');
                if ($(search_class).hasClass('st-position-in-step-selected'))
                    $(search_class).removeClass('st-position-in-step-selected');

                $(this).addClass('st-position-in-step-selected');

                var push_array = new Array;
                $(".st-position-in-step-selected").get().forEach(function (entry, index, array) {
                    push_array.push($(entry).data('id'));

                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/get/colors',
                    type: 'post',
                    data: push_array,
                    async: false,
                    cache: false,
                    dataType: "json",
                    enctype: 'multipart/form-data',
                    processData: false,
                    success: function (response) {
                        var status = response[0];
                        var file = response[1];
                        var price = response[2];
                        var id_photo = response[3];
                        $('.mainImage').attr('src', file);
                        if (price > 0) {
                            $('.totalProductPrice').html(price + ' грн');
                            $('.totalProductPrice').attr('data-price', price);
                            $('.totalProductPrice').attr('data-id_photo', id_photo);
                        } else {
                            $('.totalProductPrice').html('{{$goods->price}} грн');
                            $('.totalProductPrice').attr('data-price', {{$goods->price}});
                        }

                        //    console.log(status);
                    }
                });

            });
            ///////////////////////////////////////////////////////
            var push_array_single = new Array;
            $(".st-position-in-step-selected").get().forEach(function (entry, index, array) {
                push_array_single.push($(entry).data('id'));

            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/get/colors',
                type: 'post',
                data: push_array_single,
                async: false,
                cache: false,
                dataType: "json",
                enctype: 'multipart/form-data',
                processData: false,
                success: function (response) {
                    var status = response[0];
                    var file = response[1];
                    var price = response[2];
                    var id_photo = response[3];
                    $('.mainImage').attr('src', file);
                    if (price > 0) {
                        $('.totalProductPrice').html(price + ' грн');
                        $('.totalProductPrice').attr('data-price', price);
                        $('.totalProductPrice').attr('data-id_photo', id_photo);
                    } else {
                        $('.totalProductPrice').html('{{$goods->price}} грн');
                        $('.totalProductPrice').attr('data-price', {{$goods->price}});
                    }


                }
            });
            ///////////////////////////////////////////////////////


            $('.additionalButtons').click(function (e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var idPhoto = $('.totalProductPrice').data('id_photo');
                $.ajax({
                    url: '/add-to-cart/{{$goods->id}}/' + idPhoto,
                    type: 'get',
                    async: false,
                    cache: false,
                    contentType: false,
                    enctype: 'multipart/form-data',
                    processData: false,
                    success: function (response) {
                        $.get(window.location.pathname, {ajax: 'yes'}).done((data) => {
                            $("#async-cart").html($(data).find('#async-cart').html());
                    });}
                });
            });

            $(".toggle-header").click(function () {
                var target = $(this).next(".toggle-content");
                if ($(this).find('.fa-caret-down').length > 0) {
                    $(this).find('.fa-caret-down').remove()
                    $(this).find('.col-xs-12').append('<i class="fa fa-caret-up"></i>')
                } else {
                    $(this).find('.fa-caret-up').remove()
                    $(this).find('.col-xs-12').append('<i class="fa fa-caret-down"></i>')
                }
                target.slideToggle(400);
            });

        });
    </script>


@endsection