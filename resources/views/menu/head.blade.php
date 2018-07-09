{{--<div class="col-2 colmenu button-dropdown m1c1">
    <h4 id="m1">
        <a  href="/interior" class="dropdown-toggle">@lang('home.Інтерєр')
            <span>
                <i class="fa fa-caret-down"></i>
            </span>
        </a>
    </h4>
@if(count($interiors)
        <ul class="list-items space-0 dropdown-list topdropdown">
    @foreach($interiors as $interior)
       <li>
         <a href="/interior/{{$interior->description->slug}}"> {{$interior->description->name}}</a>
       </li>
    @endforeach
        </ul>
@endif
    </div>--}}
@if(count($categories))
    @foreach($categories as $category)
    @if(count($category->description))
    <div class="col-2 colmenu button-dropdown m1c1">
        <h4 id="m1">
            <a href="/{{$category->description->slug}}" class="dropdown-toggle">{{$category->description->name}} <span><i
                            class="fa fa-caret-down"></i></span></a>
        </h4>
        @if(count($category->children))

        <ul class="list-items space-0 dropdown-list topdropdown">
            @foreach($category->children as $sub)
            @if(count($sub->description->name))
            <li>
                <a href="/{{$sub->description->slug}}"> {{$sub->description->name}}</a>
            </li>
            @endif
                @endforeach
        </ul>
            @endif
    </div>
    @endif
    @endforeach
    @endif
@if(count($category_collections))
    @foreach($category_collections as $category_collection)
        <div class="col-2 colmenu button-dropdown m1c1">
            <h4 id="m1">
                <a href="javascript:void(0)" class="dropdown-toggle">
                    {{ \App::getLocale() == 'ua' ? $category_collection->name_ua : $category_collection->name_ru}}
                    <span>
                        <i class="fa fa-caret-down"></i>
                    </span>
                </a>
            </h4>

            @if(count($category_collection->collections))

                <ul class="list-items space-0 dropdown-list topdropdown">
                    @foreach($category_collection->collections as $col)
                        <li>
                            <a href="/{{$col->slug}}"> {{ \App::getLocale() == 'ua' ? $col->name_ua : $col->name_ru}}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endforeach
@endif

