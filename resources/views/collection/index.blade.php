@extends('layouts.app')

@section('content')

	<link rel="stylesheet" type="text/css" href="https://www.vox.pl/assets/css/jquery.fullpage.css" />
	<script type="text/javascript" src="https://www.vox.pl/assets/js/scrolloverflow.js"></script>
	<script type="text/javascript" src="https://www.vox.pl/assets/js/jquery.fullpage.js"></script>
	<script type="text/javascript" src="https://www.vox.pl/assets/js/jquery.mousewheel-3.0.6.pack.js"></script>


	<script>
		function reloadAppearJs(){
			if(typeof($.force_appear)=='function'){
				$.force_appear();console.log('Reloading appear.js')
			}
		}
		function calculateSliderPadding(){
			var e=$('nav.navbar').height(),a=$('nav.navbar').css('margin-top');
			a=Number(a.replace('px',''));if(!a){a=0};
			console.log('Navbar height: '+(e+a));return(e+a)+'px'};</script>
	<script>
		eval(function(p,a,c,k,e,d){e=function(c){
			return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};
			if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('6 i=l;6 2e=f;6 v;6 1J=l;6 1G=l;6 F=3;6 1h=\'\';6 1j=\'\';6 N=3C;6 3b=l;6 3c=l;6 t=b.11.t.2q(\'/\');6 1r=t[1];6 e=t[0];9 2m(){$(\'#c .k .1g .E 1A\').1l();$(\'#c .k .S .E 1A\').1l();6 1z=$(\'#c .k .1g .E a\');8(1z.14){$(1z.B(0)).3d(\'<1A/>\')}8(i){b.1V()}}9 3e(){8(!$(\'#Q .s-1C\').14){Y{$.m.g.D();$.m.g.D();6 1B=$(\'#Q .s-1p\');8(1B.14){6 2G=$(\'#Q  .3f-3g\').3h();$(1B).1s(\'<2E 3i="s-1C"></2E>\');$(\'#Q .s-1C\').1s(2G);$(\'#Q\').1b(\'s-3k\')}}P(x){1L.1M(\'3l 3m 2u: \'+x)}}}9 1Q(){6 1i=3a 3n();6 U=1i.3p();6 Z=1i.3q()+1;6 2k=1i.3s();8(U<10){U=\'0\'+U}8(Z<10){Z=\'0\'+Z}6 K=U+\'-\'+Z+\'-\'+2k;O K}9 2F(){8(i){6 K=1Q();8(29(b.1a)!=\'1x\'&&b.1a.3u(b.11.1v+\'|2M|\'+K)){6 u=\'#e-5\';8(u){$.m.g.2t(u.1H(1))}}j{6 t=b.11.t;6 1D=t.3v(\'/\')!==-1?t.2q(\'/\')[0]:t;8(1D){$.m.g.2t(1D.1H(1))}8(e!=="#e-1"&&1r!==\'1x\'&&1r>0){6 1q=$(\'.3w\');1q.y(\'1O.z.L\');1q.y(\'3x.z.1q\',1r-1)}}}}9 21(26){8(!i){Y{6 1o=2A();$(\'#g\').g(1o);6 r=$(b).19();6 G=$(b).n();8((r/G)<0.7){$(\'#c\').d(\'1u-1n\',\'\')}$(\'#c .k .C\').d(\'o-X\',N+\'A\');$(\'#c .k .C\').d(\'o-M\',N+\'A\');6 1t=\'#e\'+(F-1);$(1t+\' .k\').d(\'n\',\'18%\');8(26){$.m.g.D()}i=f}P(x){i=l}}8(!$(\'#c .3y.3z .3A\').2x(\':28\')){$(\'#c .s-1p\').d(\'n\',\'18%\')}}9 1W(){9 2p(){6 2g=$(\'#c .k .C\').n();6 3o=$(\'#c\').n();6 16=$(\'#1d\').n();6 1E=16-2g;8(1E>10){6 o=1E/2;$(\'#c .k .C\').d(\'o-X\',o+\'A\');$(\'#c .k .C\').d(\'o-M\',o+\'A\')}j{$(\'#c .k .C\').d(\'o-X\',N+\'A\');$(\'#c .k .C\').d(\'o-M\',N+\'A\')}$(\'#c\').d(\'1u-1n\',\'\')}9 2h(){$($(\'.2Q\').B(0)).H();$($(\'.2K\').B(0)).H();$($(\'.2y\').B(0)).H()}$(\'#c .s-1p\').d(\'n\',\'2J\');8(i){Y{$.m.g.2o(\'39\');i=l;34.2V("",1P.2W,b.11.1v)}P(x){1L.1M(\'2X 2S 2o 2u: \'+x)}}2p();2m();2h();$(\'.1y\').H();8(!i){6 16=$(\'#1d\').n();8(16!==0){6 1t=\'#e\'+(F-1);$(1t+\' .k\').d(\'n\',16+\'A\')}}}9 R(){$(\'.J-I\').d(\'n\',\'18%\');$(\'.J-I\').37(\'2Y\');$(\'.J-I\').d(\'2P\',\'31\')}9 2i(){$(\'.J-I\').d(\'n\',\'24\');$(\'.J-I\').d(\'2P\',\'35\');$(\'.J-I\').d(\'o-M\',\'32\')}9 2A(){6 1o={30:l,2Z:[\'e-1\',\'e-2\',\'e-3\',\'e-4\',\'e-5\'],2U:f,2T:\'3B\',3t:f,3D:f,3Q:f,4t:{W:f,4s:f,4r:f,4q:l,4p:l,4o:l},2v:f,4n:20(),4l:f,2D:\'#2D\',4e:9(4k,q){6 2O=q-1;$(\'#e\'+2O).4j(\'.1m\').1b(\'2N\');6 1F=5;6 1e=4;8(q===1||q===1F||q===1e){$(\'#s-1R\').H()}j{$(\'#s-1R\').13()}8(q===1F){$(\'.1y\').H()}j{$(\'.1y\').13()}8((q===F)&&i){6 r=$(b).19();8(r>2B){8(!1G){1G=f;v=$("#1I").4u({4m:\'4y://4B.4C/4D\',4E:\'4F\',4G:l,4w:f,4H:l,4x:l,4I:0,4A:1,4z:f,4d:\'3V\',4b:l,3S:l});8($(\'#1I\').14){$(v).T(\'4c\',9(){$(\'#1I .3P\').3O();1J=f});$(v).T(\'3N\',9(){6 2j=$(\'#g .e.3L\');6 2r=$(2j).3E(\'3K\');8((\'e-\'+F)!==2r){v.3J()}})}j{R()}}j{8(1J){v.1K()}j{Y{8(v.1K){v.1K()}}P(x){1L.1M(x)}}}}j{R()}}j 8(q===F){R()}6 12=$(\'#1d .1S-25-23\');8(q===1){b.17(9(){12.y(\'1c.z.L\')},1w)}j{12.y(\'1O.z.L\')}6 1N=$(\'#e\'+(1e-1)+\' .1S-25-23\');8(q===1e){b.17(9(){1N.y(\'1c.z.L\')},1w)}j{1N.y(\'1O.z.L\')}6 u=\'#e-5\';8(u!=\'\'){u=u.1H(u.14-1);8(q==u&&29(b.1a)!=\'1x\'){6 K=1Q();b.1a.3F(b.11.1v+\'|2M|\'+K,f)}}},3M:9(q,3U,44){$(\'.1m\').4a(\'2N\');2L()},49:9(){$(\'#g .e\').d(\'o-X\',20());$.m.g.D();2L()}};O 1o}9 2c(){$($(\'.2Q\').B(0)).13();$($(\'.2K\').B(0)).13();$($(\'.2y\').B(0)).13()}9 1Y(2H){2H.48();$(\'#c .s-1p\').d(\'n\',\'2J\');$(\'.S\').46();$(15).2b().1s(\'<p 2l="2n-M:24;">&2s;</p>\');$(15).1l();$(\'#c\').d(\'1u-1n\',\'\');8(i){}Y{b.1V();8(i){$.m.g.D()}}P(x){}}$(9(){9 2C(w,h){O w>2f}6 r=$(b).19();6 G=$(b).n();8(2C(r,G)){21()}j{1W()}8(!i&&r<=2B){R()}1h=$(\'#c .k .1g .E\').1f();1j=$(\'#c .k .S .E\').1f();$(\'.1k\').W(1Y);8(i){$.m.g.D()}$(\'.41\').T(\'W\',9(){6 2z=1P.40(\'3Z\');2z.1c()})});$(9(){$(1P).T(\'W\',\'.1m\',9(){$.m.g.3Y()});$(".3X").4i("1m",{38:3},42)});(9($,1T){9 27(1Z,2w,22){6 V;O 9 3W(){6 1X=15,1U=43;9 2R(){8(!22)1Z.2I(1X,1U);V=45};8(V)47(V);j 8(22)1Z.2I(1X,1U);V=17(2R,2w||18)}}2a.m[1T]=9(m){O m?15.3T(\'2v\',27(m)):15.y(1T)}})(2a,\'2d\');$(b).2d(9(){8(2e){6 r=$(b).19();6 G=$(b).n();8(r<=2f){1W()}j{8(!i){2i();$(\'1R.3G\').1b(\'3H\');$(\'#g\').1b(\'3I\');$(\'#g .e\').d(\'o-X\',20());8(1h){$(\'#c .k .1g .E\').1f(1h)}8(1j){$(\'#c .k .S .E\').1f(1j)}8((r/G)>0.7){$(\'#c\').d(\'1u-1n\',\'3R(4v/4f/4g/4h/33.36)\')}21(f);2c();b.1V();8($(\'.S\').2x(\':28\')){$(\'.1k\').2b().1s(\'<p 2l="2n-M:24;">&2s;</p>\');$(\'.1k\').1l()}j{$(\'.1k\').W(1Y)}}j{$.m.g.D()}}}});$(b).T(\'3r-3j\',9(){2F();8(!i){6 12=$(\'#1d .1S-25-23\');b.17(9(){12.y(\'1c.z.L\')},1w)}});',62,293,'||||||var||if|function||window|section1|css|section|true|fullpage||isFullScreen|else|myContent|false|fn|height|padding||index|viewportWidth|fp|hash|productsSection|myPlayer||err|trigger|owl|px|get|row|reBuild|collectBlockInfo|videoIndex|viewportHeight|hide|container|youtube|todayDate|autoplay|bottom|descriptionTopPadding|return|catch|section2|showSmallVideoPlayer|infoMore|on|dd|timeout|click|top|try|mm||location|mainOwl|show|length|this|banHeight|setTimeout|100|width|localStorage|addClass|play|section0|secSliderIndex|html|collectBlock|descSectionFirstP|today|descSectionSeconP|readMore|remove|bounce|image|fullpageoptions|scroller|carousel|slide|append|videoSectionId|background|pathname|3000|undefined|seeproducts|link|br|fpScroller|tableCell|aimSection|diff|productsIndex|videoInitStarted|substr|video|videoReady|YTPPlay|console|log|secOwl|stop|document|createNowShortDate|nav|main|sr|args|reloadFpScroll|setNormalPage|obj|readMoreAboutCollection|func|calculateSliderPadding|setFullPage|execAsap|slider|0px|scale|onSmartResize|debounce|visible|typeof|jQuery|parent|showFooter|smartresize|changeScreenBuild|768|desHeight|removeFooter|hideSmallVideoPlayer|activeSection|yyyy|style|removeNewLineMarkersFromDescription|margin|destroy|setDescriptionSectionSize|split|sectionAnchor|nbsp|moveTo|fail|resize|threshold|is|footerPart3|videoControl|createFullPageOptionsForMioTemplate|1024|haveToSetFullscreen|menu|div|moveToLastUserSection|animationSection|event|apply|auto|footerPart2|reloadAppearJs|scrollToProducts|start|sect|display|footerPart1|delayed|page|navigationPosition|navigation|pushState|title|full|slow|anchors|verticalCentered|block|5px|LineL02|history|none|jpg|fadeIn|times|all|new|htmlVideoPlayed|htmlVideoStoped|before|addAnimationSectionToPage|wrapper|980|detach|class|off|table|Fullpage|rebuild|Date|secHeight|getDate|getMonth|overlay|getFullYear|autoScrolling|getItem|indexOf|fullScreenSlider2|to|iScrollVerticalScrollbar|iScrollLoneScrollbar|iScrollIndicator|right|50|fitToSection|data|setItem|navbar|smaller|smallerMenu|YTPPause|anchor|active|onLeave|YTPStart|fadeOut|videoLoadingInfo|scrollOverflow|url|gaTrack|bind|nextIndex|default|debounced|nextSection|moveSectionDown|video278575055|getElementById|videoPlayInfo|300|arguments|direction|null|slideDown|clearTimeout|preventDefault|afterResize|removeClass|stopMovieOnBlur|YTPReady|quality|afterLoad|img|kolekcje|4you|effect|find|anchorLink|css3|videoURL|paddingTop|disableMouse|fadeScrollbars|hideScrollbars|mouseWheel|scrollbars|scrollOverflowOptions|YTPlayer|assets|autoPlay|mute|https|addRaster|opacity|youtu|be|h7vdWJ9zjOw|containment|self|showControls|loop|startAt'.split('|'),0,{}))
	</script>
 
	<div class="clearfix"></div>
	<div hidden itemscope itemtype="http://schema.org/Article">
		<meta itemprop="url" content="https://www.vox.pl/kolekcje-mebli-vox-4-you" />
		<div itemprop="name">4 You</div>
		<div itemprop="description">Kolekcja mebli - 4 You</div>
	</div>
   
	<a href="#section-3" class="seeproducts seeproducts" id="menu" data-menuanchor="section-43>
		<span class="seeproducts_slide"></span>
		<span class="seeproducts_title">Смотрите продукты</span>
	</a>
	<script>
		if(typeof($.fn.fullpage)!=='undefined'){
			$('.seeproducts').click(function(e){
				e.preventDefault();
				$.fn.fullpage.moveTo($(this).data('menuanchor'))
			});
		}
	</script>
   
	<div id="fullpage" class="smallerMenu">
		@include('collection.slider' , ['collection' => $collection])
		@include('collection.about' , ['collection' => $collection])
		@include('collection.products')
	</div>

@endsection