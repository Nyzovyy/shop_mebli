@extends('layouts.app')

@section('content')
    <div class="clearfix"></div>
    <div class="container">
        <div class="row pull-down" id="kolekcje">
            <div class="col-md-12 collectAllContener bordertop">
                <div class="clearfix"></div>
                <div class="furniture-type-menu maxwidth cat-list-container-custom">
                    <ul class="cat-list-menu-custom">
                        @if($categories)
                            <li class="filter active" data-filter=".cat-0"
                                data-filter-string="meble-do-wszystkie-pokoje"><a href="javascript:void(0);">Всі</a>
                            </li>
                            @foreach($categories as $category)
                                <li class="filter active" data-filter=".cat-{{ $category->id }}"
                                    data-filter-string="{{ $category->slug }}"><a href="javascript:void(0);">{{ $category->description->name }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                    <div class="cat-list-highlight-custom" style="left: 0px; top: 0px; width: 95px; height: 40px;"></div>
                </div>
                <div class="mix cat-0" data-my-order="0" style="min-height: 680px; display: inline-block;" data-bound="">
                    <div class="collectPhotos">
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic filter" data-filter=".cat-1"><a href="javascript:void(0);"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263sypialnia_visual_w318-h263-o80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263sypialnia_visual_w318-h263-o80.jpg"><span>Спальня</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic filter" data-filter=".cat-3"><a href="javascript:void(0);"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263biuro_0_visual_w318h263q80_visual_w318-h263-o80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263biuro_0_visual_w318h263q80_visual_w318-h263-o80.jpg"><span>Офіс</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic filter" data-filter=".cat-4"><a href="javascript:void(0);"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263jadalnia_visual_w318-h263-o80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263jadalnia_visual_w318-h263-o80.jpg"><span>Їдальня</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic filter" data-filter=".cat-2"><a href="javascript:void(0);"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzienny_visual_w318-h263-o80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzienny_visual_w318-h263-o80.jpg"><span>Вітальня</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic filter" data-filter=".cat-5"><a href="javascript:void(0);"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263mlodziezowy_visual_w318-h263-o80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263mlodziezowy_visual_w318-h263-o80.jpg"><span>Для молодих людей</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic filter" data-filter=".cat-8"><a href="javascript:void(0);"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzieciecy_visual_w318-h263-o80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzieciecy_visual_w318-h263-o80.jpg"><span>Для дітей</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic filter" data-filter=".cat-11"><a href="javascript:void(0);"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263kawalerka_visual_w318-h263-o80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263kawalerka_visual_w318-h263-o80.jpg"><span>Студія</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic filter" data-filter=".cat-10"><a href="javascript:void(0);"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263przedpokoj_visual_w318-h263-o80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263przedpokoj_visual_w318-h263-o80.jpg"><span>Przedpokój</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="mix cat-1" data-my-order="1" style="min-height: 680px;" data-bound="">
                    <div class="collectPhotos">
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-simple#&amp;bedroom"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/mvox_simpletalk_01_sypialnia_0047_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/mvox_simpletalk_01_sypialnia_0047_visual_w318-h263-q80.jpg"><span>Simple</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-spot#&amp;bedroom"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/spot_2608_sypialnia_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/spot_2608_sypialnia_visual_w318-h263-q80.jpg"><span>Spot</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-4-you#&amp;bedroom"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263sypialnia_4_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263sypialnia_4_visual_w318-h263-q80.jpg"><span>4 You</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-3d#&amp;bedroom"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263sypialnia_3_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263sypialnia_3_visual_w318-h263-q80.jpg"><span>3D</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-hifi#&amp;bedroom"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263sypialnia_5_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263sypialnia_5_visual_w318-h263-q80.jpg"><span>Hifi</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-2pir#&amp;bedroom"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263sypialnia_6_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263sypialnia_6_visual_w318-h263-q80.jpg"><span>2pir</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-inbox#&amp;bedroom"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263sypialnia_7_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263sypialnia_7_visual_w318-h263-q80.jpg"><span>Inbox</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-volant#&amp;pokoj-1"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263sypialnia_0_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263sypialnia_0_visual_w318-h263-q80.jpg"><span>Volant</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-r-o#&amp;bedroom"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263rio_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263rio_visual_w318-h263-q80.jpg"><span>R&amp;O</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-classic#&amp;bedroom"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263sypialnia_8_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263sypialnia_8_visual_w318-h263-q80.jpg"><span>Classic</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-modern#&amp;bedroom"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263sypialnia_9_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263sypialnia_9_visual_w318-h263-q80.jpg"><span>Modern</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="mix cat-3" data-my-order="2" style="min-height: 680px;" data-bound="">
                    <div class="collectPhotos">
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-simple#&amp;office"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/mvox_simpletalk_03_biuro_01_0089_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/mvox_simpletalk_03_biuro_01_0089_visual_w318-h263-q80.jpg"><span>Simple</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-balance#&amp;office"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/minibiurobalance_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/minibiurobalance_visual_w318-h263-q80.jpg"><span>Balance</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-mio#&amp;office"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263biuro_0_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263biuro_0_visual_w318-h263-q80.jpg"><span>Mio</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-lori#&amp;office"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263biuro_1_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263biuro_1_visual_w318-h263-q80.jpg"><span>Lori</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-hifi#&amp;office"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263biuro_2_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263biuro_2_visual_w318-h263-q80.jpg"><span>Hifi</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-inbox#&amp;office"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263biuro_3_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263biuro_3_visual_w318-h263-q80.jpg"><span>Inbox</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-classic#&amp;office"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263biuro_4_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263biuro_4_visual_w318-h263-q80.jpg"><span>Classic</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-modern#&amp;office"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263biuro_5_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263biuro_5_visual_w318-h263-q80.jpg"><span>Modern</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="mix cat-4" data-my-order="3" style="min-height: 680px;" data-bound="">
                    <div class="collectPhotos">
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-nature#&amp;dining-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/jadalniavox_nature_2_0578_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/jadalniavox_nature_2_0578_visual_w318-h263-q80.jpg"><span>Nature</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-balance#&amp;dining-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/minijadalniabalance_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/minijadalniabalance_visual_w318-h263-q80.jpg"><span>Balance</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-mio#&amp;dining-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263jadalnia_0_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263jadalnia_0_visual_w318-h263-q80.jpg"><span>Mio</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-lori#&amp;dining-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263jadalnia_1_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263jadalnia_1_visual_w318-h263-q80.jpg"><span>Lori</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-spot#&amp;dining-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263jadalnia_3_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263jadalnia_3_visual_w318-h263-q80.jpg"><span>Spot</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-4-you#&amp;dining-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263jadalnia_5_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263jadalnia_5_visual_w318-h263-q80.jpg"><span>4 You</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-3d#&amp;dining-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263jadalnia_4_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263jadalnia_4_visual_w318-h263-q80.jpg"><span>3D</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-hifi#&amp;dining-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263jadalnia_6_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263jadalnia_6_visual_w318-h263-q80.jpg"><span>Hifi</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-inbox#&amp;dining-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263jadalnia_7_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263jadalnia_7_visual_w318-h263-q80.jpg"><span>Inbox</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-classic#&amp;dining-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263jadalnia_8_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263jadalnia_8_visual_w318-h263-q80.jpg"><span>Classic</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-modern#&amp;dining-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263jadalnia_9_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263jadalnia_9_visual_w318-h263-q80.jpg"><span>Modern</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="mix cat-2" data-my-order="4" style="min-height: 680px;" data-bound="">
                    <div class="collectPhotos">
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-simple#&amp;living-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/mvox_simple_16_pokoj_dzienny_01_0019_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/mvox_simple_16_pokoj_dzienny_01_0019_visual_w318-h263-q80.jpg"><span>Simple</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-nature#&amp;living-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/dziennyvox_nature_3_0136_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/dziennyvox_nature_3_0136_visual_w318-h263-q80.jpg"><span>Nature</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-balance#&amp;living-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/minidziennybalance_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/minidziennybalance_visual_w318-h263-q80.jpg"><span>Balance</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-custom#&amp;living-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/minidziennycustom_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/minidziennycustom_visual_w318-h263-q80.jpg"><span>Custom</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-mio#&amp;living-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzienny_0_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzienny_0_visual_w318-h263-q80.jpg"><span>Mio</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-muto#&amp;living-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzienny_1_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzienny_1_visual_w318-h263-q80.jpg"><span>Muto</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-lori#&amp;living-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzienny_2_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzienny_2_visual_w318-h263-q80.jpg"><span>Lori</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-4-you#&amp;living-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzienny_4_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzienny_4_visual_w318-h263-q80.jpg"><span>4 You</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-young-users#&amp;living-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzienny_5_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzienny_5_visual_w318-h263-q80.jpg"><span>Young Users</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-3d#&amp;living-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzienny_3_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzienny_3_visual_w318-h263-q80.jpg"><span>3D</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-hifi#&amp;living-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzienny_6_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzienny_6_visual_w318-h263-q80.jpg"><span>Hifi</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-2pir#&amp;living-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzienny_7_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzienny_7_visual_w318-h263-q80.jpg"><span>2pir</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-inbox#&amp;living-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzienny_8_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzienny_8_visual_w318-h263-q80.jpg"><span>Inbox</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-classic#&amp;living-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzienny_9_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzienny_9_visual_w318-h263-q80.jpg"><span>Classic</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-modern#&amp;living-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzienny_10_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzienny_10_visual_w318-h263-q80.jpg"><span>Modern</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="mix cat-5" data-my-order="5" style="min-height: 680px;" data-bound="">
                    <div class="collectPhotos">
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-simple#&amp;youth-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/mvox_simpletalk_02_pokoj_rodzenstwo_0070_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/mvox_simpletalk_02_pokoj_rodzenstwo_0070_visual_w318-h263-q80.jpg"><span>Simple</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-concept#&amp;youth-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263concpet0243_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263concpet0243_visual_w318-h263-q80.jpg"><span>Concept</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-nest#&amp;youth-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/minivox_tratwa_06_0090v2_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/minivox_tratwa_06_0090v2_visual_w318-h263-q80.jpg"><span>Nest</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-spot-young#&amp;youth-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/02_vox_spot_hippi_034_2_800px_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/02_vox_spot_hippi_034_2_800px_visual_w318-h263-q80.jpg"><span>Spot Young</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-4-you#&amp;youth-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263mlodziezowy_3_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263mlodziezowy_3_visual_w318-h263-q80.jpg"><span>4 You</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-smart#&amp;youth-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263mlodziezowy_2_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263mlodziezowy_2_visual_w318-h263-q80.jpg"><span>Smart</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-young-users#&amp;youth-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263mlodziezowy_4_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263mlodziezowy_4_visual_w318-h263-q80.jpg"><span>Young Users</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-evolve#&amp;youth-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263mlodziezowy_6_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263mlodziezowy_6_visual_w318-h263-q80.jpg"><span>Evolve</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-2pir#&amp;youth-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263mlodziezowy_5_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263mlodziezowy_5_visual_w318-h263-q80.jpg"><span>2pir</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-modern#&amp;youth-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263mlodziezowy_7_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263mlodziezowy_7_visual_w318-h263-q80.jpg"><span>Modern</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="mix cat-8" data-my-order="6" style="min-height: 680px;" data-bound="">
                    <div class="collectPhotos">
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-baby-vox-4-you#&amp;children-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/mini4you_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/mini4you_visual_w318-h263-q80.jpg"><span>4 You</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-baby-vox-spot#&amp;children-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/minispotbaby_visual_w318-h263-q80.png" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/minispotbaby_visual_w318-h263-q80.png"><span>Spot</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-baby-vox-jasmine#&amp;children-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/minijasminbaby0014_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/minijasminbaby0014_visual_w318-h263-q80.jpg"><span>Jasmine</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-baby-vox-milk#&amp;children-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/minimilk_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/minimilk_visual_w318-h263-q80.jpg"><span>Milk</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-baby-vox-maxim#&amp;children-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/minimaxim_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/minimaxim_visual_w318-h263-q80.jpg"><span>Maxim</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-baby-vox-young-users#&amp;children-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263baby_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263baby_visual_w318-h263-q80.jpg"><span>Young Users</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-baby-vox-modern#&amp;children-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzieciecy_10_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzieciecy_10_visual_w318-h263-q80.jpg"><span>Modern</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-baby-vox-2pir#&amp;children-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzieciecy_7_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzieciecy_7_visual_w318-h263-q80.jpg"><span>2pir</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-baby-vox-evolve#&amp;children-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzieciecy_6_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzieciecy_6_visual_w318-h263-q80.jpg"><span>Evolve</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-baby-vox-meee#&amp;children-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzieciecy_5_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzieciecy_5_visual_w318-h263-q80.jpg"><span>Meee</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-baby-vox-magnolia#&amp;children-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzieciecy_8_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzieciecy_8_visual_w318-h263-q80.jpg"><span>Magnolia</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-baby-vox-hometown#&amp;children-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzieciecy_4_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzieciecy_4_visual_w318-h263-q80.jpg"><span>Hometown</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-young-users#&amp;children-room"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzieciecy_3_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263dzieciecy_3_visual_w318-h263-q80.jpg"><span>Young Users</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="mix cat-11" data-my-order="7" style="min-height: 680px;" data-bound="">
                    <div class="collectPhotos">
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-muto#&amp;studio"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263kawalerka_1_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263kawalerka_1_visual_w318-h263-q80.jpg"><span>Muto</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-4-you#&amp;studio"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263kawalerka_2_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263kawalerka_2_visual_w318-h263-q80.jpg"><span>4 You</span></a></div>
                        </div>
                    </div>
                </div>
                <div class="mix cat-10" data-my-order="8" style="min-height: 680px;" data-bound="">
                    <div class="collectPhotos">
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-mio#&amp;hall"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263przedpokoj_0_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263przedpokoj_0_visual_w318-h263-q80.jpg"><span>Mio</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-muto#&amp;hall"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263przedpokoj_1_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263przedpokoj_1_visual_w318-h263-q80.jpg"><span>Muto</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-classic#&amp;hall"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263przedpokoj_2_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263przedpokoj_2_visual_w318-h263-q80.jpg"><span>Classic</span></a></div>
                        </div>
                        <div class=" collectThContener">
                            <div class="kolekcjathumb intrinsic"><a href="/kolekcje-mebli-vox-modern#&amp;hall"><img data-src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263przedpokoj_3_visual_w318-h263-q80.jpg" class=" lazyloaded" src="https://static1.vox.pl/files/bw/images/kolekcja_wizual/318x263przedpokoj_3_visual_w318-h263-q80.jpg"><span>Modern</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('$(h(){$(\'L.p-q-u 13 n.9 a\').E(\'w\',h(){j t=$(\'.p-q-u\').x(\'n.9.I\').o(\'9-D\');j k=$(z).12(\'n.9\').o(\'9-D\');10(Z(l.F)!=\'Y\'){j v=l.y.A.X(t,k);s.r(\'l.y.A\',l.y.A);s.r(\'t\',t);s.r(\'k\',k);s.r(\'v\',v);l.F.P(G,G,v)}j 2=[];2[\'5-3-i-g\']=0;2[\'5-3-i-g\']++;2[\'5-3-i-g\']++;2[\'5-3-i-g\']++;2[\'5-3-i-g\']++;2[\'5-3-i-g\']++;2[\'5-3-i-g\']++;2[\'5-3-i-g\']++;2[\'5-3-i-g\']++;2[\'5-3-c\']=0;2[\'5-3-c\']++;2[\'5-3-c\']++;2[\'5-3-c\']++;2[\'5-3-c\']++;2[\'5-3-c\']++;2[\'5-3-c\']++;2[\'5-3-c\']++;2[\'5-3-c\']++;2[\'5-3-c\']++;2[\'5-3-c\']++;2[\'5-3-c\']++;2[\'5-3-f\']=0;2[\'5-3-f\']++;2[\'5-3-f\']++;2[\'5-3-f\']++;2[\'5-3-f\']++;2[\'5-3-f\']++;2[\'5-3-f\']++;2[\'5-3-f\']++;2[\'5-3-f\']++;2[\'5-3-b\']=0;2[\'5-3-b\']++;2[\'5-3-b\']++;2[\'5-3-b\']++;2[\'5-3-b\']++;2[\'5-3-b\']++;2[\'5-3-b\']++;2[\'5-3-b\']++;2[\'5-3-b\']++;2[\'5-3-b\']++;2[\'5-3-b\']++;2[\'5-3-b\']++;2[\'5-3-6-7\']=0;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-d\']=0;2[\'5-3-6-d\']++;2[\'5-3-6-d\']++;2[\'5-3-6-d\']++;2[\'5-3-6-d\']++;2[\'5-3-6-d\']++;2[\'5-3-6-d\']++;2[\'5-3-6-d\']++;2[\'5-3-6-d\']++;2[\'5-3-6-d\']++;2[\'5-3-6-d\']++;2[\'5-3-6-8\']=0;2[\'5-3-6-8\']++;2[\'5-3-6-8\']++;2[\'5-3-6-8\']++;2[\'5-3-6-8\']++;2[\'5-3-6-8\']++;2[\'5-3-6-8\']++;2[\'5-3-6-8\']++;2[\'5-3-6-8\']++;2[\'5-3-6-8\']++;2[\'5-3-6-8\']++;2[\'5-3-6-8\']++;2[\'5-3-6-8\']++;2[\'5-3-6-8\']++;2[\'5-3-B\']=0;2[\'5-3-B\']++;2[\'5-3-B\']++;2[\'5-3-m\']=0;2[\'5-3-m\']++;2[\'5-3-m\']++;2[\'5-3-m\']++;2[\'5-3-m\']++;j H=1h.1g(2[k]/4)*1d;$(\'.1c\').1b("1a-19",H)});$(\'.17.9\').E(\'w\',h(){j e=$(z).o(\'9\');$(\'.p-q-u\').x(\'n.9[o-9="\'+e+\'"] a\').18(\'w\');j K=$(\'.p-q-u\').x(\'n.9\').9(h(){1e $(z).o(\'9\')==e});1f(h(){K.1i(\'I\')},1j)})});$(h(){j e=\'.1k-1,\';e=e.J>0?e.1l(0,e.J-1):e;$(\'#15\').16({U:{9:e},14:{N:O,Q:\'R\',S:\'M\'},T:{V:h(C){},W:h(C){},11:h(C){}}})});',62,84,'||arr|do||meble|pokoju|dziennego|dzieciecego|filter||jadalni|sypialni|mlodziezowego|filterString|biura|pokoje|function|wszystkie|var|newFilter|window|przedpokoju|li|data|furniture|type|log|console|currentFilter|menu|newPath|click|find|location|this|pathname|kawalerki|state|string|on|history|null|min_height|active|length|filterElement|div|ease|duration|400|pushState|effects|fade|easing|callbacks|load|onMixLoad|onMixStart|replace|undefined|typeof|if|onMixEnd|closest|ul|animation|kolekcje|mixItUp|kolekcjathumb|trigger|height|min|css|mix|340|return|setTimeout|ceil|Math|addClass|250|cat|substr'.split('|'),0,{}))</script>
    </div>

@endsection