@extends('layouts.app')

@section('content')
<div class="clearfix"></div>
<div class="container-fluid breadcrumbs">
	<div class="row">
		<div class="container bordertop">
			<div class="row">
				<div class="col-xs-12">
					<ul>
						<li>
							<a href="/">@lang('home.main_page')</a>
						</li>
						<li>
							<a href="/{{ $category->slug}}">{{ $category->description->name}}</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
    <div class="row" id="kolekcje">
        <div class="col-md-12 collectAllContener">
            <div class="clearfix"></div>
            <div class="mix cat-{{$category->id}}" data-my-order="{{$category->id}}" style="display: inline-block;">
				<div class="collectTitle typeFurnitureTitle"><h3>{{ $category->description->name}}</h3></div>
            @if($categories)
                @foreach($categories as $category)
                <div class="collectPhotos">
                    <div class=" collectThContener">
                        <div class="kolekcjathumb intrinsic filter" data-filter=".cat-10">

                            <a href="/{{$category->description->slug}}">
                                @if($category->cover)
                                <img data-src="/files/image/catalog/{{$category->id}}/{{$category->cover}}" class="lazyload">
                                @endif
                                    <span>{{$category->description->name}}</span>
                            </a>

                        </div>
                    </div>
                </div>
                @endforeach
            @endif
            </div>
        </div>
    </div>

</div>
@endsection