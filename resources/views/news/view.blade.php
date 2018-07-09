@extends('layouts.app')

@section('content')
    <div class="container-fluid breadcrumbs">
        <div class="row"><div class="container bordertop">
                <div class="row">
                    <div class="col-xs-12">
                        <ul>
                            <li>
                                <a href="/">Главная</a>
                            </li>
                            <li>
                                <a href="/news">Новости</a>
                            </li>
                            <li>
                                <a href="/news/{{$news->description->slug}}">{{$news->description->name}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<div class="container article">
		<div class="row">
			<div class="col-xs-12">
				<h3>{{$news->description->name}}</h3>
				<div class="headimage">
					<div class="owl-carousel owl-carousels top-page-slider ">
						@if(!empty($news->img))
							@php
								$q = explode("||", substr($news->img, 1, -1));
								$count = count($q);
							@endphp
						@endif
						@if(!empty($news->img))
							@for($i =0; $i< $count; $i++)
							<div class="item">
								<div class="image">
									<a href="/files/news/images/{{$news->id}}/{{$q[$i]}}" class="fancybox" data-fancybox-group="gallery">
										<img class="owl-lazy" data-src="/files/news/images/{{$news->id}}/{{$q[$i]}}" alt="{{$news->description->name}}">
									</a>
								</div>
							</div>
							@endfor
						@endif
					</div>
				</div>
				<div class="left-col">
					<div class="lead"></div>
				</div>
				<div class="right-col">
					{{$news->description->text}}
				</div>
				<div class="articlefoot">
				<div class="added">@lang('news.added'): {{$news->description->created_at}}</div>
				</div>
			</div>
		</div>
	</div>
 <script>eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('4 $3=$(\'#s\');4 D=5(){4 p=$(\'.r-w-S-v x.r-w-Q-v c.i\');q(p.F)l $(p).2(\'M\');K l W};4 t=5(e){e.y();$(8).9({7:\'0\',},{O:z,})};4 z=5(){4 H=$3.6(\'.b a B\').m().2(\'E-X\');4 J=$3.6(\'.b a B\').m().2(\'E-I\');$.j({2:{\'T\':H,\'I\':J,\'h\':D(),},P:\'/R-j-d\',U:5(2){4 d=$(\'g.b\',2).A().k(\'G\',\'0%\').k(\'7\',\'0\');$3.6(\'g.b\').m().10().Z(d);$3.6(\'g.b:12\').13().9({7:\'1\',G:\'14%\',});q(d.F>=16){$3.6(\'.f\').C().9({7:\'1\',})}K{$3.6(\'.f\').A()}},})};4 L=5(e){e.y();$(8).C();4 h=$(8).2(\'M\');q($(8).o(\'c\').11(\'i\')){l}4 N=$(8).o(\'x\');N.6(\'c\').15(\'i\');$(8).o(\'c\').17(\'i\');$3.9({7:\'0\',},{O:5(){$.j({2:{\'h\':h,},P:\'/R-j-d\',U:5(2){2=$(2);$(2).k(\'7\',\'0\');$3.V(2);$3=$(\'#s\');$3.6(\'.f\').u(\'n\',t);$3.9({7:\'1\',})},})}})};$(5(){$(\'#s .f\').u(\'n\',t);$(\'g.Y-T-S x.r-w-Q-v c a\').u(\'n\',L)});',62,70,'||data|postsContainer|var|function|find|opacity|this|animate||articlethumb|li|articles|event|more|div|type|active|get|css|return|last|click|closest|activeButton|if|cat|posts|moreClickHandler|on|custom|list|ul|preventDefault|downloadMoreArticlesFunction|hide|img|blur|getShownArticlesType|article|length|height|lastArticleDate|position|lastArticlePosition|else|filterButtonClicked|id|parent|complete|url|menu|aktualnosci|container|filter|success|replaceWith|false|date|news|after|prev|hasClass|hidden|show|100|removeClass||addClass'.split('|'),0,{}))</script><script>;$(function(){var t=$(window).width(),o=$('.owl-carousels.top-page-slider'),e={loop:!1,margin:10,nav:1,dots:!1,mouseDrag:1,autoplay:!0,autoplayTimeout:3000,navSpeed:1000,autoplayHoverPause:!0,lazyLoad:!0,responsive:{0:{items:1},600:{items:1},1000:{items:1}}};var a=o.owlCarousel(e);$('.owl-next').click(function(){o.trigger('stop.owl.autoplay')});$('.owl-prev').click(function(){o.trigger('stop.owl.autoplay')});$('.owl-dot').click(function(){o.trigger('stop.owl.autoplay')})});$(function(){$('.fancybox').fancybox({padding:0,openEffect:'elastic',openSpeed:150,closeEffect:'elastic',closeSpeed:150,closeClick:!0,helpers:{overlay:{css:{'background':'rgba(0,0,0,0.85)'}}},onUpdate:function(){var o='';$('.fancybox-skin').draggable({axis:'x',drag:function(a,e){o=e.position.left;if(o>60){return!1};if(o<-60){return!1}},stop:function(){if(o>50){$.fancybox.prev()};if(o<-50){$.fancybox.next()}}})}})});$(function(){$('.fancybox-media').attr('rel','media-gallery').fancybox({padding:0,openEffect:'elastic',openSpeed:150,closeEffect:'elastic',closeSpeed:150,maxHeight:455,arrows:!1,helpers:{overlay:{css:{'background':'rgba(0,0,0,0.85)'}},media:{},buttons:{}}})});</script>

@endsection