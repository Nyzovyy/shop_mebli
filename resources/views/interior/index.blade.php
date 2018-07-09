@extends('layouts.app')


@section('content')
    <div class="clearfix"></div>
    <div class="container">
        <div class="row pull-down" id="kolekcje">
            <div class="col-md-12 collectAllContener bordertop">
                <div class="clearfix"></div>
                <div class="furniture-type-menu maxwidth cat-list-container-custom">
                    <ul class="cat-list-menu-custom">

                        <li class="filter active" data-filter=".cat-0" data-filter-string="meble-do-wszystkie-pokoje">
                            <a href="javascript:void(0);">@lang('home.Інтерєр')</a>
                        </li>

                        @if($interiors)
                            @foreach($interiors as $interior)
                                <li class="filter" data-filter=".cat-{{$interior->id}}" data-filter-string="{{$interior->description->slug}}">
                                    <a href="javascript:void(0);">{{$interior->description->name}}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                    <div class="cat-list-highlight-custom" style="left: 0px; top: 0px; width: 95px; height: 40px;"></div>
                </div>

                <div class="mix cat-0" data-my-order="0" style="min-height: 680px; display: inline-block;" data-bound="">
                    <div class="collectPhotos">
                        @if($interiors)
                                @foreach($interiors as $interior)
                                    <div class=" collectThContener">
                                        <div class="kolekcjathumb intrinsic filter" data-filter=".cat-{{$interior->id}}">
                                            <a href="javascript:void(0);">
                                                @if($interior->img)
                                                <img data-src="/files/interior/images/{{$interior->id}}/preview/{{$interior->img}}" class=" lazyloaded" src="/files/interior/images/{{$interior->id}}/preview/{{$interior->img}}">
                                                @else
                                                <img data-src="/files/system/image/no-image.png" class=" lazyloaded" src="/files/system/image/no-image.png">
                                                @endif
                                                <span>{{$interior->description->name}}</span>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                        @endif
                    </div>
                </div>

                @if($interiors)
                    @foreach($interiors as $interior)
                        <div class="mix cat-{{$interior->id}}" data-my-order="1" style="min-height: 680px;" data-bound="">

                            <div class="collectPhotos">
                                @php
                                    $collections = \App\Collection::where('interior_id' , $interior->id)->orderBy('id' , 'DESC')->get();
                                @endphp
                                @if($collections)
                                    @foreach($collections as $collection)
                                            <div class=" collectThContener">
                                                <div class="kolekcjathumb intrinsic">
                                                    <a href="/{{$collection->slug}}">
                                                            <img data-src="{{\_Function::CollectionCover($collection->id)}}" class=" lazyloaded" src="{{\_Function::CollectionCover($collection->id)}}">
                                                            <span>{{$collection->name_ru}}</span>
                                                    </a>
                                                </div>
                                            </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <script>eval(function(p,a,c,k,e,d){e=function(c){return(c
                    <a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('$(h(){$(\'L.p-q-u 13 n.9 a\').E(\'w\',h(){j t=$(\'.p-q-u\').x(\'n.9.I\').o(\'9-D\');j k=$(z).12(\'n.9\').o(\'9-D\');10(Z(l.F)!=\'Y\'){j v=l.y.A.X(t,k);s.r(\'l.y.A\',l.y.A);s.r(\'t\',t);s.r(\'k\',k);s.r(\'v\',v);l.F.P(G,G,v)}j 2=[];2[\'5-3-i-g\']=0;2[\'5-3-i-g\']++;2[\'5-3-i-g\']++;2[\'5-3-i-g\']++;2[\'5-3-i-g\']++;2[\'5-3-i-g\']++;2[\'5-3-i-g\']++;2[\'5-3-i-g\']++;2[\'5-3-i-g\']++;2[\'5-3-c\']=0;2[\'5-3-c\']++;2[\'5-3-c\']++;2[\'5-3-c\']++;2[\'5-3-c\']++;2[\'5-3-c\']++;2[\'5-3-c\']++;2[\'5-3-c\']++;2[\'5-3-c\']++;2[\'5-3-c\']++;2[\'5-3-c\']++;2[\'5-3-c\']++;2[\'5-3-f\']=0;2[\'5-3-f\']++;2[\'5-3-f\']++;2[\'5-3-f\']++;2[\'5-3-f\']++;2[\'5-3-f\']++;2[\'5-3-f\']++;2[\'5-3-f\']++;2[\'5-3-f\']++;2[\'5-3-b\']=0;2[\'5-3-b\']++;2[\'5-3-b\']++;2[\'5-3-b\']++;2[\'5-3-b\']++;2[\'5-3-b\']++;2[\'5-3-b\']++;2[\'5-3-b\']++;2[\'5-3-b\']++;2[\'5-3-b\']++;2[\'5-3-b\']++;2[\'5-3-b\']++;2[\'5-3-6-7\']=0;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-7\']++;2[\'5-3-6-d\']=0;2[\'5-3-6-d\']++;2[\'5-3-6-d\']++;2[\'5-3-6-d\']++;2[\'5-3-6-d\']++;2[\'5-3-6-d\']++;2[\'5-3-6-d\']++;2[\'5-3-6-d\']++;2[\'5-3-6-d\']++;2[\'5-3-6-d\']++;2[\'5-3-6-d\']++;2[\'5-3-6-8\']=0;2[\'5-3-6-8\']++;2[\'5-3-6-8\']++;2[\'5-3-6-8\']++;2[\'5-3-6-8\']++;2[\'5-3-6-8\']++;2[\'5-3-6-8\']++;2[\'5-3-6-8\']++;2[\'5-3-6-8\']++;2[\'5-3-6-8\']++;2[\'5-3-6-8\']++;2[\'5-3-6-8\']++;2[\'5-3-6-8\']++;2[\'5-3-6-8\']++;2[\'5-3-B\']=0;2[\'5-3-B\']++;2[\'5-3-B\']++;2[\'5-3-m\']=0;2[\'5-3-m\']++;2[\'5-3-m\']++;2[\'5-3-m\']++;2[\'5-3-m\']++;j H=1h.1g(2[k]/4)*1d;$(\'.1c\').1b("1a-19",H)});$(\'.17.9\').E(\'w\',h(){j e=$(z).o(\'9\');$(\'.p-q-u\').x(\'n.9[o-9="\'+e+\'"] a\').18(\'w\');j K=$(\'.p-q-u\').x(\'n.9\').9(h(){1e $(z).o(\'9\')==e});1f(h(){K.1i(\'I\')},1j)})});$(h(){j e=\'.1k-0,\';e=e.J>0?e.1l(0,e.J-1):e;$(\'#15\').16({U:{9:e},14:{N:O,Q:\'R\',S:\'M\'},T:{V:h(C){},W:h(C){},11:h(C){}}})});',62,84,'||arr|do||meble|pokoju|dziennego|dzieciecego|filter||jadalni|sypialni|mlodziezowego|filterString|biura|pokoje|function|wszystkie|var|newFilter|window|przedpokoju|li|data|furniture|type|log|console|currentFilter|menu|newPath|click|find|location|this|pathname|kawalerki|state|string|on|history|null|min_height|active|length|filterElement|div|ease|duration|400|pushState|effects|fade|easing|callbacks|load|onMixLoad|onMixStart|replace|undefined|typeof|if|onMixEnd|closest|ul|animation|kolekcje|mixItUp|kolekcjathumb|trigger|height|min|css|mix|340|return|setTimeout|ceil|Math|addClass|250|cat|substr'.split('|'),0,{}))

        </script>
    </div>
@endsection