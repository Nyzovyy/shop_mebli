@extends('layouts.app')

@section('content')

<div class="container-fluid breadcrumbs">
	<div class="row">
		<div class="container bordertop">
			<div class="row">
				<div class="col-xs-12">
					<ul>
						<li>
							<a href="/">@lang('home.main_page')</a>
						</li>
						@if($category->category && $category->category->parent && $category->category->parent->description)
						<li>
							<a href="/{{$category->category->parent->description->slug}}">{{$category->category->parent->description->name}}</a>
						</li>
						@endif
						<li>
							<a href="/{{$category->slug}}">{{$category->name}}</a>
						</li>

					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">

	<div class="row">
		<div class="col-md-12 topimage">
			<img data-src="{{_Function::CategoryCover($category	->category_id)}}" class="lazyload furniture-image-size-320" alt="">
			<img data-src="{{_Function::CategoryCover($category	->category_id)}}" class="lazyload furniture-image-size-768" alt="">
			<img data-src="{{_Function::CategoryCover($category	->category_id)}}" class="lazyload furniture-image-size-1280" alt="">
			<img data-src="{{_Function::CategoryCover($category	->category_id)}}" class="furniture-image-size-1281 lazyloaded" alt="" src="{{_Function::CategoryCover($category	->category_id)}}">
		</div>
	</div>

    <div class="row productlist">

	{{--	<div class="productFilter productFilter-1634347248">
			<div class="row filter_tiles_container" style="display:none">
				<div class="filter_tile" data-filter_type="" style="display:none"><span class="title"> Test </span><a href="javascript:void(0);" class="close"><i class="fa fa-close"></i></a></div>
			</div>
			<form id="frm-products-filters" name="frm-products-filters" class="frm-products-filters frm-products-filters-1634347248" data-action="/{{$category->slug}}" data-query_state="" method="POST">
				<div id="collection" class="col-sm-3 col-filter filter_holder">
					<div class="vcontrol dropdown-select collection">
						<select name="collection" class="hidden" data-filter="type,color" multiple="multiple">
							<option data-id="simple-523" value="simple-523" data-filter_type="biurka-81" data-filter_color="bialy-93,szary-129,czarny-74,dab-111">Simple</option>
							<option data-id="concept-513" value="concept-513" data-filter_type="biurka-81" data-filter_color="grafit-357">Concept</option>
							<option data-id="nest-504" value="nest-504" data-filter_type="biurka-81" data-filter_color="modrzew_bialy_grafit-391">Nest</option>
							<option data-id="balance-502" value="balance-502" data-filter_type="biurka-81" data-filter_color="dab-111">Balance</option>
							<option data-id="lori-490" value="lori-490" data-filter_type="biurka-81" data-filter_color="grafit-357">Lori</option>
							<option data-id="spot_young-485" value="spot_young-485" data-filter_type="biurka-81" data-filter_color="bialy-93,akacja-356,grafit-357">Spot Young</option>
							<option data-id="4_you-411" value="4_you-411" data-filter_type="biurka-81" data-filter_color="bialy_dab-291,popiel_dab-405">4 You</option>
							<option data-id="smart-475" value="smart-475" data-filter_type="biurka-81" data-filter_color="bialy___szary-340">Smart</option>
							<option data-id="young_users-409" value="young_users-409" data-filter_type="biurka-81" data-filter_color="bialy-93,biel_premium_czarny-292">Young Users</option>
							<option data-id="evolve-407" value="evolve-407" data-filter_type="biurka-81" data-filter_color="bialo_czarno_szary-145">Evolve</option>
							<option data-id="3d-476" value="3d-476" data-filter_type="biurka-81" data-filter_color="brzoza-347">3D</option>
							<option data-id="hifi-410" value="hifi-410" data-filter_type="biurka-81" data-filter_color="dab_ciemny-138,dab_ciemny_bez-143">Hifi</option>
							<option data-id="2pir-413" value="2pir-413" data-filter_type="biurka-81" data-filter_color="bez-130,orzech-119">2pir</option>
							<option data-id="inbox-405" value="inbox-405" data-filter_type="biurka-81" data-filter_color="bez_wysoki_polysk-131,cieply_szary_wysoki_polysk-120">Inbox</option>
							<option data-id="classic-406" value="classic-406" data-filter_type="biurka-81" data-filter_color="ciemny_dab-112">Classic</option>
							<option data-id="modern-402" value="modern-402" data-filter_type="biurka-81" data-filter_color="szary_dab-105,wenge-84">Modern</option>
							<option data-id="2pir-449" value="2pir-449" data-filter_type="biurka-81" data-filter_color="bez-130">2pir</option>
						</select>
						<span class="selected" data-title="Kolekcja mebli">Kolekcja mebli</span><span class="btn-dropdown"></span>
						<div class="dropdown">
							<div class="scrollbar-wrapper enable_300">
								<div class="scrolling-content" data-autowidth="100%">
									<div class="dropdown-option">
										<div class="filter_element filter_option_group">Meble Vox</div>
										<div class="filter_element" data-id="simple-523" alt="simple-523" data-title="Simple"><span class="checkbox"></span> Simple </div>
										<div class="filter_element" data-id="concept-513" alt="concept-513" data-title="Concept"><span class="checkbox"></span> Concept </div>
										<div class="filter_element" data-id="nest-504" alt="nest-504" data-title="Nest"><span class="checkbox"></span> Nest </div>
										<div class="filter_element" data-id="balance-502" alt="balance-502" data-title="Balance"><span class="checkbox"></span> Balance </div>
										<div class="filter_element" data-id="lori-490" alt="lori-490" data-title="Lori"><span class="checkbox"></span> Lori </div>
										<div class="filter_element" data-id="spot_young-485" alt="spot_young-485" data-title="Spot Young"><span class="checkbox"></span> Spot Young </div>
										<div class="filter_element" data-id="4_you-411" alt="4_you-411" data-title="4 You"><span class="checkbox"></span> 4 You </div>
										<div class="filter_element" data-id="smart-475" alt="smart-475" data-title="Smart"><span class="checkbox"></span> Smart </div>
										<div class="filter_element" data-id="young_users-409" alt="young_users-409" data-title="Young Users"><span class="checkbox"></span> Young Users </div>
										<div class="filter_element" data-id="evolve-407" alt="evolve-407" data-title="Evolve"><span class="checkbox"></span> Evolve </div>
										<div class="filter_element" data-id="3d-476" alt="3d-476" data-title="3D"><span class="checkbox"></span> 3D </div>
										<div class="filter_element" data-id="hifi-410" alt="hifi-410" data-title="Hifi"><span class="checkbox"></span> Hifi </div>
										<div class="filter_element" data-id="2pir-413" alt="2pir-413" data-title="2pir"><span class="checkbox"></span> 2pir </div>
										<div class="filter_element" data-id="inbox-405" alt="inbox-405" data-title="Inbox"><span class="checkbox"></span> Inbox </div>
										<div class="filter_element" data-id="classic-406" alt="classic-406" data-title="Classic"><span class="checkbox"></span> Classic </div>
										<div class="filter_element" data-id="modern-402" alt="modern-402" data-title="Modern"><span class="checkbox"></span> Modern </div>
										<div class="filter_element filter_option_group">Baby VOX</div>
										<div class="filter_element" data-id="2pir-449" alt="2pir-449" data-title="2pir"><span class="checkbox"></span> 2pir </div>
									</div>
								</div>
								<div class="scrollbar" style="right:-5px;margin:0px 12px">
									<div class="scroll">
										<div class="bar">
											<div class="top">
												<div class="shadow"></div>
											</div>
											<div class="middle">
												<div class="shadow"></div>
											</div>
											<div class="bottom">
												<div class="shadow"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="color" class="col-sm-3 col-filter filter_holder">
					<div class="vcontrol dropdown-select color">
						<select name="color" class="hidden" data-filter="collection,type" multiple="multiple">
							<option data-id="bez-130" value="bez-130" data-filter_collection="2pir-413,2pir-449" data-filter_type="biurka-81">beż</option>
							<option data-id="bialy___szary-340" value="bialy___szary-340" data-filter_collection="smart-475" data-filter_type="biurka-81">biały / szary</option>
							<option data-id="biel_premium_czarny-292" value="biel_premium_czarny-292" data-filter_collection="young_users-409" data-filter_type="biurka-81">biel premium/czarny</option>
							<option data-id="bialy-93" value="bialy-93" data-filter_collection="young_users-409,simple-523,spot_young-485" data-filter_type="biurka-81">biały</option>
							<option data-id="cieply_szary_wysoki_polysk-120" value="cieply_szary_wysoki_polysk-120" data-filter_collection="inbox-405" data-filter_type="biurka-81">ciepły szary wysoki połysk</option>
							<option data-id="bez_wysoki_polysk-131" value="bez_wysoki_polysk-131" data-filter_collection="inbox-405" data-filter_type="biurka-81">beż wysoki połysk</option>
							<option data-id="bialo_czarno_szary-145" value="bialo_czarno_szary-145" data-filter_collection="evolve-407" data-filter_type="biurka-81">bialo/czarno/szary</option>
							<option data-id="wenge-84" value="wenge-84" data-filter_collection="modern-402" data-filter_type="biurka-81">wenge</option>
							<option data-id="dab_ciemny-138" value="dab_ciemny-138" data-filter_collection="hifi-410" data-filter_type="biurka-81">dąb ciemny</option>
							<option data-id="modrzew_bialy_grafit-391" value="modrzew_bialy_grafit-391" data-filter_collection="nest-504" data-filter_type="biurka-81">modrzew biały/grafit</option>
							<option data-id="dab-111" value="dab-111" data-filter_collection="simple-523,balance-502" data-filter_type="biurka-81">dąb</option>
							<option data-id="czarny-74" value="czarny-74" data-filter_collection="simple-523" data-filter_type="biurka-81">czarny</option>
							<option data-id="szary-129" value="szary-129" data-filter_collection="simple-523" data-filter_type="biurka-81">szary</option>
							<option data-id="szary_dab-105" value="szary_dab-105" data-filter_collection="modern-402" data-filter_type="biurka-81">szary dąb</option>
							<option data-id="dab_ciemny_bez-143" value="dab_ciemny_bez-143" data-filter_collection="hifi-410" data-filter_type="biurka-81">dąb ciemny/beż</option>
							<option data-id="orzech-119" value="orzech-119" data-filter_collection="2pir-413" data-filter_type="biurka-81">orzech</option>
							<option data-id="ciemny_dab-112" value="ciemny_dab-112" data-filter_collection="classic-406" data-filter_type="biurka-81">ciemny dąb</option>
							<option data-id="bialy_dab-291" value="bialy_dab-291" data-filter_collection="4_you-411" data-filter_type="biurka-81">biały/dąb</option>
							<option data-id="grafit-357" value="grafit-357" data-filter_collection="spot_young-485,lori-490,concept-513" data-filter_type="biurka-81">grafit</option>
							<option data-id="akacja-356" value="akacja-356" data-filter_collection="spot_young-485" data-filter_type="biurka-81">akacja</option>
							<option data-id="brzoza-347" value="brzoza-347" data-filter_collection="3d-476" data-filter_type="biurka-81">brzoza</option>
							<option data-id="popiel_dab-405" value="popiel_dab-405" data-filter_collection="4_you-411" data-filter_type="biurka-81">popiel/dąb</option>
						</select>
						<span class="selected" data-title="Kolor">Kolor</span><span class="btn-dropdown"></span>
						<div class="dropdown">
							<div class="scrollbar-wrapper enable_300">
								<div class="scrolling-content" data-autowidth="100%">
									<div class="dropdown-option">
										<div class="filter_element" data-id="bez-130" alt="bez-130" data-title="beż"><span class="checkbox"></span><span class="colorOuter"><span class="color">beż</span></span><span class="texture " style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/ovo_bez_w65-h65.jpg)"></span></div>
										<div class="filter_element" data-id="bialy___szary-340" alt="bialy___szary-340" data-title="biały / szary"><span class="checkbox"></span><span class="colorOuter"><span class="color">biały / szary</span></span><span class="texture " style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/kolorSMART_80px_w65-h65.jpg)"></span></div>
										<div class="filter_element" data-id="biel_premium_czarny-292" alt="biel_premium_czarny-292" data-title="biel premium/czarny"><span class="checkbox"></span><span class="colorOuter"><span class="color">biel premium/czarny</span></span><span class="texture " style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/yu_czarno_blay_80px_w65-h65.jpg)"></span></div>
										<div class="filter_element" data-id="bialy-93" alt="bialy-93" data-title="biały"><span class="checkbox"></span><span class="colorOuter"><span class="color">biały</span></span><span class="texture " style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/bia80_w65-h65.jpg)"></span></div>
										<div class="filter_element" data-id="cieply_szary_wysoki_polysk-120" alt="cieply_szary_wysoki_polysk-120" data-title="ciepły szary wysoki połysk"><span class="checkbox"></span><span class="colorOuter"><span class="color">ciepły szary wysoki połysk</span></span><span class="texture " style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/inbox_cieply_szary_wysoki_p_w65-h65.jpg)"></span></div>
										<div class="filter_element" data-id="bez_wysoki_polysk-131" alt="bez_wysoki_polysk-131" data-title="beż wysoki połysk"><span class="checkbox"></span><span class="colorOuter"><span class="color">beż wysoki połysk</span></span><span class="texture " style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/inbox_bez_w65-h65.jpg)"></span></div>
										<div class="filter_element" data-id="bialo_czarno_szary-145" alt="bialo_czarno_szary-145" data-title="bialo/czarno/szary"><span class="checkbox"></span><span class="colorOuter"><span class="color">bialo/czarno/szary</span></span><span class="texture " style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/bialo_czarno_szary2_w65-h65.jpg)"></span></div>
										<div class="filter_element" data-id="wenge-84" alt="wenge-84" data-title="wenge"><span class="checkbox"></span><span class="colorOuter"><span class="color">wenge</span></span><span class="texture " style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/modern_wzor-plyty_wenge_w65-h65.jpg)"></span></div>
										<div class="filter_element" data-id="dab_ciemny-138" alt="dab_ciemny-138" data-title="dąb ciemny"><span class="checkbox"></span><span class="colorOuter"><span class="color">dąb ciemny</span></span><span class="texture " style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/hifi_dab_ciemny_w65-h65.jpg)"></span></div>
										<div class="filter_element" data-id="modrzew_bialy_grafit-391" alt="modrzew_bialy_grafit-391" data-title="modrzew biały/grafit"><span class="checkbox"></span><span class="colorOuter"><span class="color">modrzew biały/grafit</span></span><span class="texture " style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/MOD_GRA_w65-h65.png)"></span></div>
										<div class="filter_element" data-id="dab-111" alt="dab-111" data-title="dąb"><span class="checkbox"></span><span class="colorOuter"><span class="color">dąb</span></span><span class="texture " style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/dab-80_w65-h65.jpg)"></span></div>
										<div class="filter_element" data-id="czarny-74" alt="czarny-74" data-title="czarny"><span class="checkbox"></span><span class="colorOuter"><span class="color">czarny</span></span><span class="texture " style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/czarny_kamasutra_w65-h65.jpg)"></span></div>
										<div class="filter_element" data-id="szary-129" alt="szary-129" data-title="szary"><span class="checkbox"></span><span class="colorOuter"><span class="color">szary</span></span><span class="texture " style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/ovo_szary_w65-h65.jpg)"></span></div>
										<div class="filter_element" data-id="szary_dab-105" alt="szary_dab-105" data-title="szary dąb"><span class="checkbox"></span><span class="colorOuter"><span class="color">szary dąb</span></span><span class="texture " style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/szary_dab___w65-h65.jpg)"></span></div>
										<div class="filter_element" data-id="dab_ciemny_bez-143" alt="dab_ciemny_bez-143" data-title="dąb ciemny/beż"><span class="checkbox"></span><span class="colorOuter"><span class="color">dąb ciemny/beż</span></span><span class="texture " style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/dab_ciemny_bez_hifi_w65-h65.jpg)"></span></div>
										<div class="filter_element" data-id="orzech-119" alt="orzech-119" data-title="orzech"><span class="checkbox"></span><span class="colorOuter"><span class="color">orzech</span></span><span class="texture " style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/inbox_orzech_w65-h65.jpg)"></span></div>
										<div class="filter_element" data-id="ciemny_dab-112" alt="ciemny_dab-112" data-title="ciemny dąb"><span class="checkbox"></span><span class="colorOuter"><span class="color">ciemny dąb</span></span><span class="texture " style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/classic_kolor_w65-h65.jpg)"></span></div>
										<div class="filter_element" data-id="bialy_dab-291" alt="bialy_dab-291" data-title="biały/dąb"><span class="checkbox"></span><span class="colorOuter"><span class="color">biały/dąb</span></span><span class="texture " style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/bialy_dab_80_w65-h65.jpg)"></span></div>
										<div class="filter_element" data-id="grafit-357" alt="grafit-357" data-title="grafit"><span class="checkbox"></span><span class="colorOuter"><span class="color">grafit</span></span><span class="texture " style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/GRAF_w65-h65.jpg)"></span></div>
										<div class="filter_element" data-id="akacja-356" alt="akacja-356" data-title="akacja"><span class="checkbox"></span><span class="colorOuter"><span class="color">akacja</span></span><span class="texture " style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/AKA_w65-h65.jpg)"></span></div>
										<div class="filter_element" data-id="brzoza-347" alt="brzoza-347" data-title="brzoza"><span class="checkbox"></span><span class="colorOuter"><span class="color">brzoza</span></span><span class="texture " style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/Brzoza_w65-h65.jpg)"></span></div>
										<div class="filter_element" data-id="popiel_dab-405" alt="popiel_dab-405" data-title="popiel/dąb"><span class="checkbox"></span><span class="colorOuter"><span class="color">popiel/dąb</span></span><span class="texture " style="background-image:url(https://static1.vox.pl/files/bw/images/kolory/POP_D80_w65-h65.jpg)"></span></div>
									</div>
								</div>
								<div class="scrollbar" style="right:-5px;margin:0px 12px">
									<div class="scroll">
										<div class="bar">
											<div class="top">
												<div class="shadow"></div>
											</div>
											<div class="middle">
												<div class="shadow"></div>
											</div>
											<div class="bottom">
												<div class="shadow"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="sort" class="col-sm-3 col-filter filter_holder">
					<div class="vcontrol dropdown-select sort">
						<select name="sort" class="hidden" data-filter="">
							<option data-id="name_asc" value="name_asc">Nazwa A-Z</option>
							<option data-id="name_desc" value="name_desc">Nazwa Z-A</option>
							<option data-id="price_asc" value="price_asc">Cena rosnąco</option>
							<option data-id="price_desc" value="price_desc">Cena malejąca</option>
							<option data-id="promotion" value="promotion">Według promocji</option>
							<option data-id="new" value="new">Według nowości</option>
						</select>
						<span class="selected" data-title="Sortuj według">Sortuj według</span><span class="btn-dropdown"></span>
						<div class="dropdown">
							<div class="scrollbar-wrapper enable_300">
								<div class="scrolling-content" data-autowidth="100%">
									<div class="dropdown-option">
										<div class="filter_element" data-id="name_asc" alt="name_asc" data-title="Nazwa A-Z"><span class="checkbox"></span> Nazwa A-Z </div>
										<div class="filter_element" data-id="name_desc" alt="name_desc" data-title="Nazwa Z-A"><span class="checkbox"></span> Nazwa Z-A </div>
										<div class="filter_element" data-id="price_asc" alt="price_asc" data-title="Cena rosnąco"><span class="checkbox"></span> Cena rosnąco </div>
										<div class="filter_element" data-id="price_desc" alt="price_desc" data-title="Cena malejąca"><span class="checkbox"></span> Cena malejąca </div>
										<div class="filter_element" data-id="promotion" alt="promotion" data-title="Według promocji"><span class="checkbox"></span> Według promocji </div>
										<div class="filter_element" data-id="new" alt="new" data-title="Według nowości"><span class="checkbox"></span> Według nowości </div>
									</div>
								</div>
								<div class="scrollbar" style="right:-5px;margin:0px 12px">
									<div class="scroll">
										<div class="bar">
											<div class="top">
												<div class="shadow"></div>
											</div>
											<div class="middle">
												<div class="shadow"></div>
											</div>
											<div class="bottom">
												<div class="shadow"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-filter">
					<div id="price" alt="price" class="vcontrol range-slider price" data-min="140" data-max="1698" data-title="cena">
						<kbdparams class="params hidden">{"name":"range","id":"","class":"price","min":140,"max":1698,"postfix":"zł","label":"cena:","value":[140,1698],"range":true}</kbdparams>
						<div class="range-label">cena:</div>
						<div class="range-from"><input type="text" name="range_from" value="140" readonly="readonly"/><span>zł</span></div>
						<div class="range-slider-bar"></div>
						<div class="range-to"><input type="text" name="range_to" value="1698" readonly="readonly"/><span>zł</span></div>
					</div>
				</div>
			</form>
		</div>
--}}
		<div class="clearfix"></div>

		<div class="productContainer productContainer-1634347248 ">
			@if(count($goods))
			@foreach($goods as $good)
					<div class="productItem " data-price="{{$good->price}}">
						<div class="image">
							<div class="hover">
								<a href="/{{$good->description->slug}}">
									<img class="lazyload" data-src="{{_Function::ProductBackCover($good->id)}}" alt="">
								</a>
							</div>
							<div class="imageSlider">
								<div class="owl-carousel owl-carousels productSlider">
									<div class="item vox-product-list-gallery-item" data-colors="111" data-id="">
										<a href="/{{$good->description->slug}}">
											<img class="lazyload" data-src="{{_Function::ProductCover($good->id)}}" alt="">
										</a>
									</div>

								</div>
							</div>
						</div>
						<div class="imageInfo">
							@if($good->collection_id > 0)
							<div class="categoryInfo">
								<a href="/{{$good->collection->slug}}"> {{_Function::CollectionName($good->collection_id)}} </a>
							</div>
							@endif
							<div class="productName">
								<a href="/{{$good->description->slug}}"> {{$good->description->name}} </a>
							</div>
							<div class="productPrice"> {{$good->price}} грн</div>
						</div>
					</div>
				@endforeach
			@endif


		</div>
	</div>

</div>


		<script>;$(function(){new productListModule('1634347248');$('.colorOuter span.color').on('mouseover',scrollColorName);$('.colorOuter span.color').on('touchstart',scrollColorName)});var scrollColorName=function(){var o=$(this),l=o.html().length,t=o.width();if(window.innerWidth>1280){var r=24,n='-'+(t-150)+'px'}
		else{var r=13,n='-'+(t-80)+'px'};if(l>r){o.animate({'margin-left':n,},2000,function(){o.animate({'margin-left':'0',},2000,function(){})})}};</script>



@endsection