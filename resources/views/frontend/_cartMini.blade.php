<div class="dropcart">

    @if(count($cards))
    <div class="topcart" style="cursor:pointer;">
        <div class="scrollcontent mCustomScrollbar _mCS_1 mCS_no_scrollbar">
            <div id="mCSB_1" class="mCustomScrollBox mCS-light-thick mCSB_vertical mCSB_inside"
                 style="max-height: none;" tabindex="0">
                <div id="mCSB_1_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y"
                     style="position:relative; top:0; left:0;" dir="ltr">
                    <ul>
                    @php
                    $count_p = 1;
                    @endphp
                        @foreach($cards as $card)
                        <li id="{{ $card->id }}"
                            data-id="{{ $card->id }}">
                            <div class="clp">{{$count_p}}</div>
                            <div class="cclose">
                                <a href="" data-id="{{ $card->id }}" class="delete-fromcart">
                                </a>
                            </div>
                            <div class="cimage">
                                <a href="/" target="_blank">
                                        <img src="{{_Function::ProductCover($card->good->id)}}" alt="" class="mCS_img_loaded"/>
                                </a>
                            </div>
                            <div class="ctitle">
                                <a target="_blank" href="/{{$card->good->description->slug}}">{{$card->good->description->name}}</a>
                            </div>
                        </li>
                            @php
                                $count_p++;
                            @endphp
                        @endforeach
                    </ul>
                </div>
                <div id="mCSB_1_scrollbar_vertical"
                     class="mCSB_scrollTools mCSB_1_scrollbar mCS-light-thick mCSB_scrollTools_vertical"
                     style="display: none;">
                    <a href="#" class="mCSB_buttonUp" oncontextmenu="return false;"></a>
                    <div class="mCSB_draggerContainer">
                        <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                             style="position: absolute; min-height: 30px; top: 0px; height: 0px;"
                             oncontextmenu="return false;">
                            <div class="mCSB_dragger_bar" style="line-height: 30px;"></div>
                        </div>
                        <div class="mCSB_draggerRail"></div>
                    </div>
                    <a href="#" class="mCSB_buttonDown" oncontextmenu="return false;"></a>
                </div>
            </div>
        </div>
        <a href="/cart" class="btnred zobacz-koszyk">Замовити <i class="fa fa-caret-right"></i></a>
        <div class="emptycart hidden">
            Brak produktów w koszyku!
        </div>
    </div>
    @else
    <div class="topcart">
        <div class="emptycart">
            Нема товарів в корзині!
        </div>
    </div>
    @endif
        <script>
            $('.delete-fromcart').click(function(e){
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var id = $(this).data('id');
                $.ajax({
                    url: '/cart-delete/'+id,
                    type: 'get',
                    async: false,
                    cache: false,
                    contentType: false,
                    enctype: 'multipart/form-data',
                    processData: false,
                    success: function (response) {
                        $.get( window.location.pathname, {ajax: 'yes'}).done((data) => {
                            $("#async-cart").html($(data).find('#async-cart').html());
                    });
                        $(".dropdown-cart").show();
                    }
                });
            });
        </script>
</div>
