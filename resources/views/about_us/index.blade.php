@extends('layouts.app')

@section('head')

@endsection

@section('content')

<div class="container-fluid breadcrumbs">
    <div class="row">
        <div class="container bordertop">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li><a href="/">@lang('home.Головна')</a></li>
                        <li><a href="/about_us">@lang('home.Пронас')</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container kontaktpage">
    <div class="row">
        <div class="col-xs-12">
            <h3>@lang('home.Пронас')</h3>
            <div class="center-col">
                <p>
                @if (\App::isLocale('ru'))
                {!! $about->text_ru !!}
                    @else
                 {!! $about->text_ua !!}
                @endif
                </p>
            </div>
        </div>
    </div>
</div>


@endsection