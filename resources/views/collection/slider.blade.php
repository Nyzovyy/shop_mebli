<div class="section slider-section" id="section0">
	<div class="bounce"></div>
	<script>
		if(typeof($.fn.fullpage)!=='undefined'){
			$('.bounce').off('click').on('click',function(n){
				n.preventDefault();
				n.stopPropagation();
				$.fn.fullpage.moveSectionDown()
			});
		}
	</script>

	<div class="myContent collectFFSlider">

		<div class="scale-slider owl-carousel owl-carousels main-scale-slider fullScreenSlider fullScreenSlider-775209583">
			@if(count($collection->content))
				@foreach($collection->content as $content)
			{{-- Slider: img+text --}}
			@if($content->type == 'pictures+test')
			<div class="item all studio">
				<div class="caption">
					<div class="onlyText">
						{!! _Function::CollectionSliderDescription($content->dataOne->id) !!}
					</div>
				</div>
				<div class="owl-lazy image"
					 data-src="/files/collection/slider/{{$content->dataOne->id_slider}}/{{$content->dataOne->photo}}"
					 data-src-retina="/files/collection/slider/{{$content->dataOne->id_slider}}/{{$content->dataOne->photo}}"
					 style="background-image:url('/files/collection/slider/{{$content->dataOne->id_slider}}/{{$content->dataOne->photo}}');background-size:cover;background-position:center center"></div>
			</div>
			@endif
			{{-- Slider: img --}}
			@if($content->type == 'pictures')
			<div class="item all studio">
				<div class="owl-lazy image"
					 data-src="/files/collection/slider/{{$content->dataOne->id_slider}}/{{$content->dataOne->photo}}"
					 data-src-retina="/files/collection/slider/{{$content->dataOne->id_slider}}/{{$content->dataOne->photo}}"
					 style="background-image:url('https://www.vox.pl/assets/img/kolekcje_ostatnio1.jpg');background-size:cover;background-position:center center"></div>
			</div>
			@endif
			{{-- Slider: img+img+text --}}
			@if($content->type == 'pictures+test+pictures')
			<div class="item all ">
				<div class="sliderCollectBox1">
					<div class="owl-lazy image"
						 data-src="/files/collection/slider/{{$content->dataOne->id_slider}}/{{$content->dataOne->photo}}"
						 data-src-retina="/files/collection/slider/{{$content->dataOne->id_slider}}/{{$content->dataOne->photo}}"
						 style="background-image:url('https://www.vox.pl/assets/img/kolekcje_ostatnio1.jpg');background-size:cover;background-position:center center"></div>
				</div>
				<div class="sliderCollectBox2">
					<div class="collectTable">
						<div class="collectRow scaleSlider colrow1">
							<div class="tableInner collectInfo">
								<h3> {!! _Function::CollectionSliderDescription($content->dataOne->id) !!} </h3>
								<div class="innetText"></div>
							</div>
						</div>
						<div class="collectRow scaleSlider colrow2">
							<div class="tableInner owl-lazy image"
								 data-src="/files/collection/slider/{{$content->dataOne->id_slider}}/{{$content->dataOne->photo}}"
								 data-src-retina="/files/collection/slider/{{$content->dataOne->id_slider}}/{{$content->dataOne->photo_second}}"
								 style="background-image:url('https://www.vox.pl/assets/img/kolekcje_ostatnio1.jpg');background-size:cover;background-position:center center"></div>
						</div>
					</div>
				</div>
			</div>
			@endif
				@endforeach
			@endif

		</div>

		<script>eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('$(5(){5 S(e){5 s(d){3 J=1e Q();J.d=d;11 J}X{3 r=e.4.1d;3 h=e.4.f===r?1:e.4.f+1;3 g=e.4.f===1?r:e.4.f-1;3 y=$(e.w).9(\'.4\').v(h).9(\'q.2-p.x\').i(\'d\');3 1c=s(y);3 z=$(e.w).9(\'.4\').v(g).9(\'q.2-p.x\').i(\'d\');3 1b=s(z);h=h===r?1:h+1;g=g===1?r:g-1;y=$(e.w).9(\'.4\').v(h).9(\'q.2-p.x\').i(\'d\');3 1f=s(y);z=$(e.w).9(\'.4\').v(g).9(\'q.2-p.x\').i(\'d\');3 19=s(z)}10(R){18.17(\'Q 15 14: \'+R)}}3 B=[];$(".b-c .4").T(5(f,A){3 4=$(V);B.1h(4)});3 2=$(\'.b-c\');3 E={1D:m,1C:0,H:m,1B:m,1A:t,k:t,1z:1y,1x:I,1w:I,1v:m,16:m,1u:{0:{K:1,H:t},1i:{K:1,H:t},I:{K:1}}};3 1g=2.L(E);2.n(\'o.2.k\');$(".b-c .2-h").D(5(){2.n(\'o.2.k\')});$(".b-c .2-g").D(5(){2.n(\'o.2.k\')});$(".b-c .2-1r").D(5(){2.n(\'o.2.k\')});3 P=6.8.7.M(\'&\')!=-1?6.8.7.1t(6.8.7.M(\'&\')+1):\'\';l(P!=\'\'){3 1j=$(B).1J(5(){11 $(V).Z(P)}).U;l(1j){2.i(\'L\').1o();$(".b-c").1E();1s.T(B,5(f,A){l(A.Z(P)){$(".b-c").1a(A)}});2.L(E)}}l(1k(6.Y)==\'1H\'||6.Y==t){6.Y=m;$(\'.1G a\').D(5(j){j.1F();3 O=$(V).i("C");2.i(\'L\').1o();$(".b-c").1E();1s.T(B,5(f,A){l(A.Z(O)){$(".b-c").1a(A)}});$(".1I").1K("1L");2.L(E);l(6.8.7.M(\'&\')==-1){6.8.7=6.8.7+"&"+O}12{6.8.7=6.8.7.1t(0,6.8.7.M(\'&\'))+"&"+O}})}2.F(\'1q.2.p\',5(j){S(j)});2.F(\'1p.2.u\',5(j){3 C=j.4.f;3 7=6.8.7;3 G=7.13(\'/\');l(G.U>1){6.8.7=G[0]+\'/\'+C}12{6.8.7+=(\'/\'+C)}});2.F(\'1n.2.u\',5(j){2.n(\'o.2.k\')})});$(5(){5 S(e){5 s(d){3 J=1e Q();J.d=d;11 J}X{3 r=e.4.1d;3 h=e.4.f===r?1:e.4.f+1;3 g=e.4.f===1?r:e.4.f-1;3 y=$(e.w).9(\'.4\').v(h).9(\'q.2-p.x\').i(\'d\');3 1c=s(y);3 z=$(e.w).9(\'.4\').v(g).9(\'q.2-p.x\').i(\'d\');3 1b=s(z);h=h===r?1:h+1;g=g===1?r:g-1;y=$(e.w).9(\'.4\').v(h).9(\'q.2-p.x\').i(\'d\');3 1f=s(y);z=$(e.w).9(\'.4\').v(g).9(\'q.2-p.x\').i(\'d\');3 19=s(z)}10(R){18.17(\'Q 15 14: \'+R)}}3 B=[];$(".b-c .4").T(5(f,A){3 4=$(V);B.1h(4)});3 1M=$(6).1N();3 1O;3 2=$(\'.b-c\');3 E={1D:m,1C:0,H:m,1B:m,1A:t,k:t,1z:1y,1x:I,1w:I,1v:m,16:m,1u:{0:{K:1,H:t},1i:{K:1,H:t},I:{K:1}}};3 1g=2.L(E);2.n(\'o.2.k\');$(".b-c .2-h").D(5(){2.n(\'o.2.k\')});$(".b-c .2-g").D(5(){2.n(\'o.2.k\')});$(".b-c .2-1r").D(5(){2.n(\'o.2.k\')});2.F(\'1q.2.p\',5(j){S(j)});2.F(\'1p.2.u\',5(j){3 C=j.4.f;3 7=6.8.7;3 G=7.13(\'/\');l(G.U>1){6.8.7=G[0]+\'/\'+C}12{6.8.7+=(\'/\'+C)}});2.F(\'1n.2.u\',5(j){2.n(\'o.2.k\')})});$(5(){3 $u=$(\'.b-c\').1P();l($u.1m(\'q.1l\').U){3 W=$u.1m(\'q.1l\').i(\'1Q\');l(W&&6.8.7&&6.8.7.M(W)!=-1&&6.8.7.M(\'/\')!=-1){3 N=6.8.7.13(\'/\')[1];X{N=1R(N)}10(1S){}l(1k(N)==\'1T\'){$u.n(\'1U.2.u\',N-1)}}}});',62,119,'||owl|var|item|function|window|hash|location|find||fullScreenSlider|775209583|src||index|prev|next|data|event|autoplay|if|true|trigger|stop|lazy|div|total|cacheImage|false|carousel|eq|target|image|nextImgSrc|prevImgSrc|value|itemList|id|click|owlOptions|on|hashElements|dots|1000|toCache|items|owlCarousel|indexOf|slide|ident|category|Image|err|bufforNextImage|each|length|this|sectionId|try|sliderFilterInitialized|hasClass|catch|return|else|split|failed|buffor|lazyLoad|log|console|cachedPrevImage2|append|cachedPrevImage|cachedNextImage|count|new|cachedNextImage2|owlActive|push|768|itemsWithCategory|typeof|section|closest|dragged|destroy|translated|loaded|dot|jQuery|substr|responsive|autoplayHoverPause|navSpeed|autoplaySpeed|6000|autoplayTimeout|mouseDrag|nav|margin|loop|empty|preventDefault|sliderFilter|undefined|menuf|filter|slideToggle|slow|viewportWidth|width|deviceInfo|first|anchor|parseInt|error|number|to'.split('|'),0,{}))</script>
	</div>
</div>
		