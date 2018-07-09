@if(count($suggests))
    <section class="product-recommended-section">
        <div class="container toggle-container">
            <div class="row toggle-header">
                <div class="col-xs-12">
                    <h4 class="h4-section-title">@lang('product.recommended_products')</h4>
                    <i class="fa fa-caret-up"></i>
                </div>
            </div>
            <div class="row toggle-content" style="display: block;">
                <div class="col-xs-12">
                    <div class="clearfix"></div>
                    <div class="productContainer productContainer-939426471 ">
                        @foreach($suggests as $suggest)
                            <div class="productItem " data-price="859">
                                <div class="image bound-hover-image">
                                    <div class="hover">
                                        <a href="/{{$suggest->description->slug}}">
                                            <img class="lazyload" data-src="{{_Function::ProductBackCover($suggest->id)}}" alt="">
                                        </a>
                                    </div>
                                    <div class="imageSlider">
                                        <div class="owl-carousel owl-carousels productSlider bound-owl owl-theme owl-loaded owl-text-select-on">
                                            <div class="owl-stage-outer">
                                                <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: 0s; width: 400px;">
                                                    <div class="owl-item active" style="width: 100px; margin-right: 0px;">
                                                        <div class="item vox-product-list-gallery-item" data-colors="111" data-id="">
                                                            <a href="/{{$suggest->description->slug}}">
                                                                <img class=" lazyloaded" style="max-width: 300px;" data-src="{{_Function::ProductCover($suggest->id)}}" alt="" src="{{_Function::ProductCover($suggest->id)}}">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="imageInfo">
                                    @if($suggest->collection_id > 0)
                                        <div class="categoryInfo">
                                            <a href="/{{$suggest->collection->slug}}"> {{_Function::CollectionName($suggest->collection_id)}} </a>
                                        </div>
                                    @endif
                                    <div class="productName">
                                        <a href="/{{$suggest->description->slug}}"> {{$suggest->description->name}} </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
@endif