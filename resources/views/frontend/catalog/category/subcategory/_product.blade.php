<div class="clearfix"></div>
<div class="col-md-12 productHeader">
    <h3>WYBIERZ MEBEL DO KONFIGURACJI</h3>
</div>
<div class="clearfix"></div>

<div class="productContainer productContainer-1040930152 ">
    @foreach($goods as $good)
        @if(!empty($good->img))
            @php
                $q = explode("||", substr($good->img, 1, -1));
                $count = count($q);

            @endphp

        @endif
    <div class="productItem " data-price="1099">
        <div class="image">
            <div class="imageSlider">
                <div class="owl-carousel owl-carousels productSlider">
                    <div class="item vox-product-list-gallery-item" data-colors="111" data-id=""><a
                                href="/produkt-szafa-narozna-18849.html">
                            @if(!empty($good->img))
                                <img data-src="/files/image/catalog/{{$id}}/{{$good->id}}/{{$q[$count-1]}}" alt="" class=" lazyloaded" src="/files/image/catalog/{{$id}}/{{$good->id}}/{{$q[$count-1]}}">
                            @endif

                        </a>
                    </div>
                    <div class="item vox-product-list-gallery-item" data-colors="74" data-id=""><a
                                href="/produkt-szafa-narozna-18849.html"><img class="lazyload"
                                                                              data-src="https://static1.vox.pl/files/bw/images/pw_zdjecia/szafa_narozna_00184_w260-h260-q95.jpg"
                                                                              alt="">
                        </a>
                    </div>
                    <div class="item vox-product-list-gallery-item" data-colors="129" data-id=""><a
                                href="/produkt-szafa-narozna-18849.html"><img class="lazyload"
                                                                              data-src="https://static1.vox.pl/files/bw/images/pw_zdjecia/szafa_narozna_00029_w260-h260-q95.jpg"
                                                                              alt="">
                        </a>
                    </div>
                    <div class="item vox-product-list-gallery-item" data-colors="93" data-id=""><a
                                href="/produkt-szafa-narozna-18849.html"><img class="lazyload"
                                                                              data-src="https://static1.vox.pl/files/bw/images/pw_zdjecia/szafa_narozna_00246_w260-h260-q95.jpg"
                                                                              alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="imageInfo">
            <div class="colorBoxes vox-product-list-colors">
                <a href="#" class="vox-product-list-color" data-id="111" title="dąb">
                    <div class="box"
                         style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/dab-80_w22-h22.jpg)"
                         title="dąb"></div>
                </a>
                <a href="#" class="vox-product-list-color" data-id="93" title="biały">
                    <div class="box"
                         style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/bia80_w22-h22.jpg)"
                         title="biały"></div>
                </a>
                <a href="#" class="vox-product-list-color" data-id="129" title="szary">
                    <div class="box"
                         style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/ovo_szary_w22-h22.jpg)"
                         title="szary"></div>
                </a>
                <a href="#" class="vox-product-list-color" data-id="74" title="czarny">
                    <div class="box"
                         style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/czarny_kamasutra_w22-h22.jpg)"
                         title="czarny"></div>
                </a>
            </div>
            <div class="categoryInfo"><a href="/kolekcje-mebli-vox-simple"> Simple </a></div>
            <div class="productName"><a href="/produkt-szafa-narozna-18849.html"> Szafa narożna </a></div>
            <div class="productPrice"> od 1099 zł</div>
        </div>
    </div>
    @endforeach
</div>

<script type="text/javascript">;window.criteo_q = window.criteo_q || [];
    window.criteo_q.push({event: 'setAccount', account: 16926}, {
        event: 'setSiteType',
        type: Cookies.get('affiliate_siteType')
    }, {
        event: 'viewList',
        item: ['MEBLE_PW_18849', 'MEBLE_PW_18850', 'MEBLE_PW_18851', 'MEBLE_PW_18847', 'MEBLE_PW_18848', 'MEBLE_PW_18845', 'MEBLE_PW_18846', 'MEBLE_PW_18842', 'MEBLE_PW_18836', 'MEBLE_PW_18839', 'MEBLE_PW_18840', 'MEBLE_PW_18841', 'MEBLE_PW_18830', 'MEBLE_PW_18831', 'MEBLE_PW_18834', 'MEBLE_PW_18835', 'MEBLE_PW_18833', 'MEBLE_PW_18832', 'MEBLE_PW_18844', 'MEBLE_PW_18843', 'MEBLE_PW_18911', 'MEBLE_PW_18910', 'MEBLE_PW_18866', 'MEBLE_PW_18865', 'MEBLE_PW_18862', 'MEBLE_PW_18859', 'MEBLE_PW_18858', 'MEBLE_PW_18774', 'MEBLE_PW_18822', 'MEBLE_PW_18853', 'MEBLE_PW_18852', 'MEBLE_PW_18907', 'MEBLE_PW_18829', 'MEBLE_PW_18825', 'MEBLE_PW_18776', 'MEBLE_PW_18777', 'MEBLE_PW_18775', 'MEBLE_PW_18779', 'MEBLE_PW_18913', 'MEBLE_PW_18812', 'MEBLE_PW_18811', 'MEBLE_PW_18814', 'MEBLE_PW_18816', 'MEBLE_PW_18815', 'MEBLE_PW_18813', 'MEBLE_PW_18821', 'MEBLE_PW_18820', 'MEBLE_PW_18818', 'MEBLE_PW_18819', 'MEBLE_PW_18817', 'MEBLE_PW_18797', 'MEBLE_PW_18798', 'MEBLE_PW_18914', 'MEBLE_PW_18781', 'MEBLE_PW_18782', 'MEBLE_PW_18780', 'MEBLE_PW_18783']
    });</script>
<script>;$(function () {
        new productListModule('1040930152')
    });</script>
