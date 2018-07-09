@extends('layouts.app')

@section('head')
	<link rel="stylesheet" type="text/css" href="/css/product.css">
	<link rel="stylesheet" type="text/css" href="/css/simpleTalk.css">

@endsection

@section('content')

	<div class="clearfix"></div>
	<div class="container-fluid breadcrumbs">
		<div class="row">
			<div class="container bordertop">
				<div class="row">
					<div class="col-xs-12">
						<ul>
							<li>
								<a href="/">Главная</a>
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

	<script>
		;
		$(function() {
			$('.product-next, .product-prev, .product-prev-label, .product-next-label').hover(function() {
				$a = $(this).closest('a');
				$a.find('span, div').toggleClass('hovered')
			})
		})
	</script>
	<div id="vox-product" class="vox-product">

		<section class="product-section product-page product-page-meble">
			<div class="container vox-produkt">
				<div class="vox-product-pw vox-product-pw-main" data-type="PW" data-id="16397" data-set="0" data-sale="0" data-pathCart="/cart/add/MEBLE" itemscope itemtype="http://schema.org/Product"><input type="hidden" name="vox_product_qty" value="1" id="vox_product_qty_16397">
					<meta itemprop="url" content="http://ru.voxfurniture.com/produkt-mjagkij-stul-modern-wenge-16397.html" />
					<div class="meta phidden"><a href="#" class="btn btn-primary DEBUG">DEBUG</a>
						<div class="CART" data-id="16397_17947_6016655" data-version="17947" data-korpus="84" data-front="262" data-dimension="4555290" data-stock="0" data-priceo="329" data-pricep="329"></div>
					</div>
					<div class="container-wrapper product-info-row row">
						<div class="container-right col-md-3 product-details">
							<div class="container-right-fixed-height">
								<div class="product-name-wrapper">
									<div class="product-name" itemprop="name">
										<h1 class="font-scale">Мягкий стул Modern венге</h1>
									</div>
									<div class="category-name">
										<h5><a href="/kollekcija-mebeli-vox-modern">Modern Home</a></h5>
									</div>
								</div>
								<div class="vbottom">
									<div class="slider-product-mini-gallery fake-carousel ">
										<div class="owl-productGallery owl-carousel vox-product-pw-gallery">
											<div class="owl-productGallery-thumb-crop vox-product-pw-gallery-item" data-front="262" data-body="84" data-id="19206" data-index="0">
												<div class="product-gallery-crosshair"></div><img class="item owl-productGallery-thumb " src="http://static1.vox.pl/files/bw/images/pw_zdjecia/krzeslo_modern_ii_2_w57-h34-q95.jpg"></div>
											<div class="owl-productGallery-thumb-crop vox-product-pw-gallery-item" data-front="" data-body="" data-id="22381" data-index="1"><img class="item owl-productGallery-thumb img-full-width" src="http://static1.vox.pl/files/bw/images/pw_zdjecia/modern_jadalnia_new_2_w57-h34-q95.jpg"></div>
											<div class="owl-productGallery-thumb-crop vox-product-pw-gallery-item" data-front="" data-body="" data-id="22384" data-index="2"><img class="item owl-productGallery-thumb img-full-width" src="http://static1.vox.pl/files/bw/images/pw_zdjecia/modern_jadalnia_new_2_2_w57-h34-q95.jpg"></div>
										</div>
									</div>
									<div class="furn-no-dim-filler"></div>
									<div class="sdim phidden"><span>выберите размеры:</span>
										<div class="clearfix"></div>
										<div class="select-sleepdim vox-product-dimension-select"><select class="selectpicker form-control"><option data-korpus="84" data-front="262" data-version="17947" data-id="4555290" data-h="" data-a="45,5" data-b="52" data-c="90" selected="selected" data-content="<span class='sleepdim-option-dim'>45,5 x 52 x 90</span><span class='pull-right sleepdim-option-desc'></span>">45,5 x 52 x 90 </option></select></div>
									</div>
									<div class="table-dim">
										<div class="product-dim col-xs-6 vox-product-dimension-selected"><span class="dim-heading">размеры (см):</span>
											<div class="row">
												<div class="dim-names">
													<ul>
														<li>Ширина:</li>
														<li>Глубина:</li>
														<li>Высота:</li>
													</ul>
												</div>
												<div class="dim-values">
													<ul>
														<li class="dim-a" data-key="a">45,5</li>
														<li class="dim-b" data-key="b">52</li>
														<li class="dim-c" data-key="c">90</li>
													</ul>
												</div>
											</div>
										</div>
										<div class="td-colors col-xs-6 ">
											<div class="color-korpus col-xs-6 vox-product-colors vox-product-colors-body"><span class="colors-heading popoverWybierzKolor clearfix">корпус:</span>
												<div class="productColors-list-container popoverWybierzKolor" rel="popover" data-content="выберите цвет">
													<div class="productColors-list-column">
														<a href="#" class="vox-product-color vox-product-color-body " data-id="84" data-color="body" data-dimension="4555290" data-version="17947" title="венге (кофейный)">
															<div class="colorSample" style="background-image:url(http://static1.vox.pl/files/bw/images/kolory/modern_wzor-plyty_wenge_w22-h22.jpg)" title="венге (кофейный)"></div>
														</a>
													</div>
												</div>
											</div>
											<div class="color-front col-xs-6 vox-product-colors vox-product-colors-front"><span class="colors-heading popoverWybierzKolorFront clearfix">фасад:</span>
												<div class="productColors-list-container popoverWybierzKolor" rel="popover" data-content="proszę wybrać kolor">
													<div class="productColors-list-column">
														<a href="#" class="vox-product-color vox-product-color-front " data-id="262" data-color="front" data-dimension="4555290" data-version="17947" title="рыжий">
															<div class="colorSample" style="background-image:url(http://static1.vox.pl/files/bw/images/kolory/rudy_w22-h22.jpg)" title="рыжий"></div>
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="produkt-gallery-wrapper" class="container-left col-md-9 product-photo-container">
							<div class="product-name-wrapper">
								<div class="product-name" itemprop="name">
									<h1 class="font-scale">Мягкий стул Modern венге</h1>
								</div>
								<div class="category-name">
									<h5><a href="/kollekcija-mebeli-vox-modern">Modern Home</a></h5>
								</div>
							</div>
							<div class="price-qty">
								<div class="price-section">
									<div class="price-wrapper vox-product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
										<div class="price "><span class="base-price price-price vox-product-price-current" itemprop="price">329</span><span class="price-jm">zł</span>
											<meta itemprop="priceCurrency" content="PLN" />
											<meta itemprop="availability" itemtype="http://schema.org/ItemAvailability" content="http://schema.org/InStock" />
										</div>
										<div class="price-old strikeout hidden vox-product-price-orginal"> 329 zł </div>
									</div>
									<div class="price-info"></div>
								</div>
								<div class="qty-section pull-right">
									<div class="qty"><span rel="popover" class="popoverNiepoprawnaIlosc" data-content="proszę podać poprawną ilość" data-placement="left"></span><span class="spinnerblock"><div class="input-group spinner"><input type="text" class="form-control" value="1" data-attached="vox_product_qty_16397" name="_vox_product_qty_16397" autocomplete="off"><div class="input-group-btn-vertical"><button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button><button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button></div></div></span></div>
									<div class="clearfix"></div>
									<div class="raty pull-right"><a href="#" class="vox-product-raty phidden installments-popup" data-url="/modal/installments-popup" data-amount="329">kalkulator rat</a></div>
								</div>
							</div>
							<div class="zoom-arrows-container main-arrows">
								<div class="zoom-margin-prev product-zoom-prev">
									<div class="product-zoom-prev-arrow"></div>
								</div>
								<div class="zoom-margin-next product-zoom-next">
									<div class="product-zoom-next-arrow"></div>
								</div>
							</div>
							<div class="img-zoom vox-product-pw-gallery" data-modal-url="/modal/gallery/MEBLE_PW/16397?sale=0">
								<div class="zoom-container" data-zoom-img="http://static1.vox.pl/files/bw/images/pw_zdjecia/krzeslo_modern_ii_2.jpg">
									<div class="product-full-img-crop vox-product-pw-gallery-item" data-front="262" data-body="84" data-id="19206" data-index="0"><span class="align-helper product-full-img-block "></span><a href="javascript:void(0)"><img src="http://static1.vox.pl/files/bw/images/pw_zdjecia/krzeslo_modern_ii_2_w725-h400-q95.jpg" class="product-full-img product-full-img-block"></a></div>
								</div>
								<div class="zoom-container" data-zoom-img="http://static1.vox.pl/files/bw/images/pw_zdjecia/modern_jadalnia_new_2.jpg">
									<div class="product-full-img-crop full-img-width full-vert vox-product-pw-gallery-item" data-front="" data-body="" data-id="22381" data-index="1"><span class="align-helper product-full-img-block "></span><a href="javascript:void(0)"><img src="http://static1.vox.pl/files/bw/images/pw_zdjecia/modern_jadalnia_new_2.jpg" class="product-full-img product-full-img-block"></a></div>
								</div>
								<div class="zoom-container" data-zoom-img="http://static1.vox.pl/files/bw/images/pw_zdjecia/modern_jadalnia_new_2_2.jpg">
									<div class="product-full-img-crop full-img-width full-vert vox-product-pw-gallery-item" data-front="" data-body="" data-id="22384" data-index="2"><span class="align-helper product-full-img-block "></span><a href="javascript:void(0)"><img src="http://static1.vox.pl/files/bw/images/pw_zdjecia/modern_jadalnia_new_2_2.jpg" class="product-full-img product-full-img-block"></a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row versions-row phidden">
						<div class="col-xs-12 header">
							<h4>ВЫБРАТЬ ИСПОЛНЕНИЕ<span rel="popover" class="popoverWybierzWersje" data-content="выберите вариант<br/>исполнения" data-placement="right"></span></h4>
						</div>
						<div class="col-xs-12 versions-col">
							<ul class="product-versions variants vox-product-versions">
								<li class="first-in-row vox-product-version" data-on="1" data-id="17947" data-stock="" data-ckorpus="1" data-cfront="1" data-cdim="9">
									<div class="h3-wrapper pleft">
										<h3 class="fc-1 font-scale" data-lines="2">Мягкий стул MODERN III венге</h3>
									</div>
									<div class="price-box pull-right visible-md-block visible-lg-block"><span class="price fc-1"><span class="small phidden">Od</span> 329 zł</span>
									</div>
									<div class="packshot pleft"><a href="javascript:void(0);" class="select-image"><img src="http://static1.vox.pl/files/bw/images/pw_zdjecia/krzeslo_modern_ii_2_w280-h180-q95.jpg"></a></div>
									<div class="price-box price-box-mobile visible-xs-block visible-sm-block "><span class="price fc-1"><span class="small phidden">Od</span> 329 zł</span>
									</div><a href="#select" class="btn-1 select pright">zaznacz</a><a href="javascript:void(0);" class="btn-1 selected phidden pright">zaznaczony</a></li>
								<div class="versions-border-right"></div>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>


		<section class="product-section product-page product-page-meble">
			<div class="container vox-produkt">
				<div class="container vox-product-pw vox-product-pw-main simple-talk-container" data-type="PW" data-id="18825" data-set="1" data-price_min_o="19" data-price_min_p="19" data-price_max_o="1150" data-price_max_p="1150" data-sale="0" data-pathCart="/cart/add/MEBLE" itemscope itemtype="http://schema.org/Product">

					<meta itemprop="url" content="https://www.vox.pl/produkt-biurko-140-18825.html" />
					<div hidden itemprop="offers" itemscope itemtype="http://schema.org/Offer">
						<meta itemprop="priceCurrency" content="UAH" />
						<meta itemprop="availability" itemtype="http://schema.org/ItemAvailability" content="http://schema.org/InStock" />
						<div itemprop="price">1150</div>
						<div itemprop="name">{{$goods->description->name}}</div>
					</div>


					<div class="st-configurator-work-place">

						{{-- Модальне вікно. Можна викинути, якщо не потрібне --}}
						<div id="st-configurator-modal" class="st-modal">
							<div class="st-modal-content">
								<span class="st-close">
									<img src="https://www.vox.pl/assets/img/closedark.png" alt="Zamknij">
								</span>
								<div class="st-modal-content-container"></div>
							</div>
						</div>
						<div class="row st-mobile-header">
							<div class="st-main-menu-header">
								<div class="st-main-menu-header-name">
									<p class="st-main-menu-header-name-bottom">Стол 140</p>
								</div>
								<p class="st-main-menu-header-collection">
									<a href="/kolekcje-mebli-vox-simple">Simple</a>
								</p>
							</div>
						</div>





						{{--/ Модальне вікно. Можна викинути, якщо не потрібне --}}


							<div class="clearfix"></div>

							@if(!empty($goods->img))
								@php
									$q = explode("||", substr($goods->img, 1, -1));
                                    $count = count($q);
								@endphp
							@endif

						<div class="col-md-8 col-user-menu">
							<div id="slider">
							@for($i = 0; $i <$count; $i++)
									<img data-u="image" src="/files/image/catalog/{{$goods->subcategory_id}}/{{$goods->id}}/original/{{$q[$i]}}"  style="max-width: 600px; height: auto;" />
							@endfor
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

									<div id="st-step-accordion" class="panel-group st-main-menu-sections" role="tablist" aria-multiselectable="true">
								@if(count($goods->colors_category))
									@foreach($goods->colors_category as $category)
												<div class="panel panel-default">
													<div class="panel-heading " role="tab" id="st-front-group">
														<div class="panel-title">
															<a class="st-step-accordion-header-collapse collapsed" role="button" data-toggle="collapse" data-parent="#st-step-accordion" href="#st-front-group-collapsed{{$category->id}}" aria-expanded="true" aria-controls="st-front-group-collapsed{{$category->id}}">
																<div class="row">
																	<div class="col-xs-12 st-step-accordion-header-label-container">
																		<p id="st-main-menu-9-pos" class="st-step-accordion-header-label">Выберите цвет {{$category->name_ru}}</p>
																		<i class="st-step-accordion-header-collapse-icon fa fa-caret-down"></i>
																	</div>
																</div>
															</a>
														</div>
													</div>

													<div id="st-front-group-collapsed{{$category->id}}" class="panel-collapse collapse " role="tabpanel" aria-labelledby="st-front-group">
														<div class="panel-body">
															<div class="color-row select-kolor elementGroupMiniatures" data-type="st-front">
																@if($category->colors)
																	@foreach($category->colors as $color)
																		<div class="dekor st-miniature-container" data-name="white">
																			<div class="dip-pw-color-sample img" style="background-image:url('/files/image/catalog/{{$color->color_category->goods->subcategory_id}}/{{$color->color_category->goods->id}}/colors/{{$color->file}}');"></div>
																			<div class="name">{{$color->name_ru}}</div>
																		</div>
																	@endforeach
																	@endif
															</div>
														</div>
													</div>
												</div>
										@endforeach
									@endif

									</div>
									@if($goods->width || $goods->depth || $goods->height)
									<div class="table-dim">
										<div class="product-dim col-xs-6 vox-product-dimension-selected">
											<span class="dim-heading">размеры (см):</span>
											<div class="row"><div class="dim-names">
													<ul>
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
													<ul>
														@if($goods->width)
														<li class="dim-a" data-key="a">{{$goods->width}}</li>
														@endif
															@if($goods->depth)
														<li class="dim-b" data-key="b">{{$goods->depth}}</li>
															@endif
																@if($goods->height)
														<li class="dim-c" data-key="c">{{$goods->height}}</li>
															@endif
													</ul>
												</div>
											</div>
										</div>

									</div>
									@endif

									<div class="st-main-menu-footer">
										<div id="additionalButtonsContainer" class="panel panel-footer">
											<div class="row">
												<div class="col-xs-4 st-btn-red-cell st-left">
													<div class="st-main-menu-price-value-container text-center">
														<p class="st-main-menu-price-value">{{$goods->price}} грн</p>
													</div>
												</div>
												<div class="col-xs-8 st-btn-red-cell st-right">
													<button id="zatwierdz" class="additionalButtons st-btn-red">
														добавить в корзину
														<img src="https://www.vox.pl/assets/img/koszyk_white.svg" alt="koszyk" class="st-koszyk-white">
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
		</section>

		{{-- Описание продукта --}}
		<section class="product-description-section">
			<div class="container toggle-container" id="container-product-desc">
				<div class="row toggle-header">
					<div class="col-xs-12">
						<h4 class="h4-section-title">Описание продукта</h4>
						<i class="fa fa-caret-up"></i>
					</div>
				</div>
				<div class="row toggle-content">
					<div class="vox-product-description-set col-md-12 col-opis">
						{!! $goods->description->description !!}
					</div>
				</div>
			</div>
		</section>
		{{--/ Описание продукта --}}


		{{-- Технические характеристики --}}
		<section class="product-dim-3d-section configureable">
			<div class="container toggle-container" id="container-product-dim">
				<div class="row toggle-header">
					<div class="col-xs-12">
						<h4 class="h4-section-title">Технические характеристики и 3D</h4>
						<i class="fa fa-caret-down"></i>
					</div>
				</div>
				<div class="row toggle-content collapse">
					<div class="col-md-7 col-dim">
						<div class="row">
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
							<div class="clearfix"></div>

							<div class="clearfix"></div>
						</div>
					</div>
					<div class="col-md-5 col-dim">
						<div class="row">
							<div class="col-sm-5">
								<div class="col-img">
									<div class="dim-3d-img-container"><img src="https://www.vox.pl/assets/img/product_furniture/dim_3d.png"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>

					<div class="col-md-7 col-dim">
						<h4 class="section-subtitle">3D </h4>
						<div class="btn-row">
							<a href="https://vox.pl/modal/3d_shapes?f=/all/vox_3d.zip&amp;r=BW_BRYLY_3D" class="btnred download-3d-shapes" data-title="Pobierz bryły 3D">
								Всі файли VOX інтер'єрів
								<div class="download-ico"></div>
							</a>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</section>
		{{--/ Технические характеристики --}}


		<section class="product-collection-banner-section">
			<div class="container">
				<div class="row">
					<div class="collection-bigimg">
						<div class="caption">
							<a href="/kolekcje-mebli-vox-simple">Вернуться к коллекции</a>
						</div>
						<div class="image">
							<a href="#">
								<img src="https://static1.vox.pl/files/bw/images/kolekcja_zdjecia/powrot_vox_simpletalk_01_sypialnia_0043.jpg" alt="">
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>

	</div>




@endsection

@section('foot')
{{--
	<script type="text/javascript" src="https://www.vox.pl/assets/js/underscore-min.js"></script>
	<script src="/js/app/productModule.js"></script>
	<script src="/js/app/product.js"></script>
	<script src="/js/app/SimpleTalk.min.js"></script>--}}
	<script>

		<script type="text/javascript">
		;
		var initializeModals = function() {
			$('.newsletterform').click(function(t) {
				t.preventDefault();
				$.pgwModal({
					url: '/modal/newsletter',
					maxWidth: 460,
					title: 'Newsletter'
				})
			})
		};
		$(initializeModals);
		var virtualAgent;

		function IWVA_moduleInit(t) {
			virtualAgent = t
		};

		function doTrigger() {
			virtualAgent.triggerEvent('showtab');
			return !1
		};
		$('.chat').on('click', function(t) {
			t.preventDefault();
			doTrigger();
			$('.iw-module-wrapper').toggle();
			return !1
		});
	</script>
<script type="text/javascript" defer src="assets/js/dest/vox-base-body-ff6914f04e.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQuTjCoMVs-_XflVJZiE_Q-F7L1cZX5wo&language=ru" defer></script>
<script type="text/javascript" src="https://s3-eu-west-1.amazonaws.com/inteliwise-client/saas/embed/v_1.5/2982804c02d34da08b039e086596532c36ca4307213400c10102d0459bf5ebeb/f2156cfff4f4f9e046789a0d39986f4f" defer></script>
<script type="text/javascript">
	;
	jQuery(document).ready(function(e) {
		e('#lastviewed-wrapper').load('/product/last-viewed')
	});
</script>
<script type="text/javascript" src="//img.metaffiliation.com/u/31/p54151.js"></script>
<script type="text/javascript">
	;
	window.ptag_params = {
		m_md5: '',
		zone: 'product',
		productId: 'MEBLE_PW_16397,',
		categoryId: 'MEBLE_101',
		customerId: '',
		siteType: 'd'
	};
</script>
<script type="text/javascript">
	;
	window.criteo_q = window.criteo_q || [];
	window.criteo_q.push({
		event: 'setAccount',
		account: 16926
	}, {
		event: 'setSiteType',
		type: Cookies.get('affiliate_siteType')
	}, {
		event: 'viewItem',
		item: 'MEBLE_PW_16397'
	});
</script>
<div class="zx_1C530A807834A767BD9B zx_mediaslot">
	<script type="text/javascript">
		;
		window._zx = window._zx || [];
		window._zx.push({
			'id': '1C530A807834A767BD9B'
		});
		(function(t) {
			var o = t.createElement('script');
			o.async = !0;
			o.src = (t.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.zanox.com/scripts/zanox.js';
			var e = t.getElementsByTagName('script')[0];
			e.parentNode.insertBefore(o, e)
		}(document));
	</script>
</div>
<script type="text/javascript">
	;
	var zx_identifier = 'MEBLE_PW_16397,',
			zx_name = 'Мягкий стул Modern венге',
			zx_price = '329.00 zł',
			zx_url = 'ru.voxfurniture.com/produkt-mjagkij-stul-modern-wenge-16397.html',
			zx_photo = ' http://static1.vox.pl/files/bw/images/pw_zdjecia/krzeslo_modern_ii_2_w725-h400-q95.jpg'
</script>

		$('.additionalButtons').click(function(e){
			e.preventDefault();

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$.ajax({
				url: '/add-to-cart/{{$goods->id}}',
				type: 'get',
				async: false,
				cache: false,
				contentType: false,
				enctype: 'multipart/form-data',
				processData: false,
				success: function (response) {
					$( "#async-cart" ).load( window.location.pathname+" #async-cart" );
				}
			});
		});


	</script>

@endsection