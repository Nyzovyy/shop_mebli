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
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
    <div class="container">
        <div class="row">
            <div class="col-xs-12 articlethumblist" id="posts">

               @if($news)
                   @foreach($news as $new)
                        @if(!empty($new->img))
                            @php
                                $q = explode("||", substr($new->img, 1, -1));
                                $count = count($q);

                            @endphp
                        @endif
                        <div class="articlethumb">
                            <a href="/news/{{$new->description->slug}}">
                                @if(!empty($new->img))
                                    <img class="owl-lazy1" data-src="/files/news/images/{{$new->id}}/preview/{{$q[$count-1]}}" src="/files/news/images/{{$new->id}}/preview/{{$q[$count-1]}}" alt="{{$new->description->name}}">
                                @else
                                    <img class="owl-lazy1" src="/files/system/image/no-image.png"  alt="{{$new->description->name}}">
                                @endif
                               <span>{{$new->description->name}}</span>
                            </a>
                        </div>
                       @endforeach
                   @endif


            </div>
            @if($news->lastPage() != $news->currentPage())
                <div class="articlethumb last pagination_">
                    <a href="#" class="more">
                        <span class="arrow" onclick="loadPage(event, '{{$news->nextPageUrl()}}'); return false">@lang('news.show_more')</span>
                    </a>
                </div>
            @endif
        </div>
    </div>
    <script>
        function loadPage(evt, next) {
            $.get(next, function(data){
                var Page = $(data).find(".pagination_").html();
                var Albums = $(data).find(".articlethumblist").html();
                if(!Page)
                    $(".pagination_").html('');
                else
                    $(".pagination_").html(Page);

                $(".articlethumblist").append(Albums);

            });
        }
    </script>
@endsection