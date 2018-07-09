

@extends('layouts.app')

@section('content')

    <div class="clearfix"></div>
    <div class="container-fluid breadcrumbs">
        <div class="row">
            <div class="container bordertop">
                <div class="row">
                    <div class="col-xs-12">
                        <ul>
                            <li><a href="/">Головна сторінка</a></li>
                            <li><a href="/cart">Корзина</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(count($cards))
        @php
            $count_p = 1;
        @endphp
    <div class="container cart-wrapper" data-base-cart-url="/cart" data-base-order-arrt-url="/order/attr" data-base-shops-url="/salony" data-next-step-url=" /order/login ">
        <div class="row">
            <div class="col-md-12">
                <div class="steps step1">
                    <ul>
                        <li class=""><a href="/cart" class="current_step">@lang('card.do_order')</a><span class="step-dot full"></span></li>
                        <li class="">@lang('card.do_order_check')<span class="step-dot"></span></li>
                        <li class="">@lang('card.do_order_send')<span class="step-dot"></span></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="upTable products-table">
                    <div class="upTableRow tableHeader">
                        <div class="upTableCell head lp">@lang('card.lp')</div>
                        <div class="upTableCell head zdjecie">@lang('card.pictures')</div>
                        <div class="upTableCell head nazwa">@lang('card.name')</div>
                        <div class="upTableCell head ilosc">@lang('card.number')</div>
                        <div class="upTableCell head cena">@lang('card.price')</div>
                        <div class="upTableCell head options"></div>
                    </div>
                    @foreach($cards as $card)
                        <div class="upTableRow" id="prod-row-dc352b248033908ec68ffbf731a3d1ff" data-id="{{$card->id}}">
                        <div class="upTableCell lp">{{$count_p}}</div>
                        <div class="upTableCell zdjecie">
                            <a href="/{{$card->good->description->slug}}">
                                @if($card->color_id > 0)
                                <img src="/files/image/catalog/{{$card->good->subcategory_id}}/{{$card->good->id}}/colors/photo/{{$card->get_photo->file}}" alt="" class="img-responsive"></a></div>
                                @else
                                <img src="{{_Function::ProductCover($card->good->id)}}" alt="" class="img-responsive"></a></div>

                        @endif
                            <div class="upTableCell nazwa">
                            <a href="/{{$card->good->description->slug}}">{{$card->good->description->name}}</a><br/>

                            </div>
                        <div class="upTableCell ilosc">
                                 <span class="minitb">
                                    <span class="mobiletitle">Ilość</span>
                                    <span class="spinnerblock">
                                       <div class="input-group spinner desktoponly">
                                          <input type="number" pattern="[0-9]{2}" max="99" maxlength = "2" class="form-control product-quantity" value="{{$card->count}}">
                                          <div class="input-group-btn-vertical">
                                              <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i>
                                              </button><button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i>
                                              </button>
                                          </div>
                                       </div>
                                       <div class="input-group spinner mobileonly">
                                          <select class="selectpicker2 btn-normal btn-numberlist product-quantity">
                                             <option value="1" selected>1</option>
                                             <option value="2">2</option>
                                             <option value="3">3</option>
                                             <option value="4">4</option>
                                             <option value="5">5</option>
                                             <option value="6">6</option>
                                             <option value="7">7</option>
                                             <option value="8">8</option>
                                             <option value="9">9</option>
                                             <option value="10">10</option>
                                          </select>
                                       </div>
                                    </span>
                                 </span>
                        </div>
                        <div class="upTableCell cena"><span class="minitb"><span class="mobiletitle">Ціна</span><span class="price" data-base-price="1199"> @if($card->color_id > 0 && $card->get_photo->price > 0){{$card->get_photo->price * $card->count}} @else {{$card->good->price * $card->count}} @endif грн </span></span></div>
                        <div class="upTableCell wartosc"><span class="price value"></span></div>
                        <div class="upTableCell options"><a href="" class="cart-delete" data-id="" data-row-type="upTableRow"></a></div>
                    </div>
                @php
                    $count_p++;
                @endphp
                    @endforeach
                </div>
                <!-- cena koncowa widoczna tylko w mobile, przez zmieniona kolejnosc bloków -->
                <div class="mobileonly priceinfo upTwoColsPrice sumAllMobile"><span class="price value">Razem: 1199 zł</span></div>
                <!-- end -->
                <div class="upTable products-table results">
                    <div class="upTableRow ">
                        <div class="upTableCell noborder attention"></div>
                        <div class="upTableCell noborder options"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">


                <div class="cart-foot ">
                    <div class="sumAll" data-sumAll="1199">@lang('card.total_price'): <span>{{$totalPrice}}</span> грн</div>
                    @if(\Auth::guest())
                    <button class="submitBtn authAjax" data-next-step="orderProduct"><span style="white-space:nowrap">@lang('card.buy') <i class="fa fa-caret-right"></i></span></button>
                    @else
                        <a href="/cart/buy" class="submitBtn">@lang('card.buy') <i class="fa fa-caret-right"></i></a>
                    @endif
                </div>


        </div>
        <div class="loader-fade"></div>
        <div class="zx_3706E2E3156E356D0370 zx_mediaslot">
            <script type="text/javascript">;window._zx=window._zx||[];window._zx.push({'id':'3706E2E3156E356D0370'});(function(t){var o=t.createElement('script');o.async=!0;o.src=(t.location.protocol=='https:'?'https:':'http:')+'//static.zanox.com/scripts/zanox.js';var e=t.getElementsByTagName('script')[0];e.parentNode.insertBefore(o,e)}(document));</script>
        </div>
    </div>
        @else
        <div class="container cart-wrapper">
            <div class="empty-cart">
                <h1>Корзина пуста.</h1>
            </div>
        </div>

        @endif


@endsection