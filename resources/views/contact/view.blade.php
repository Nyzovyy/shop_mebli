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
                        <li><a href="/contact">@lang('home.Контакти')</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container kontaktpage">
    <div class="row">
        <div class="col-xs-12">
            <h3>@lang('home.Контакти')</h3>
            @if(!empty($contact->description))
                <div class="center-col">
                    {!! $contact->description !!}
                </div>
            @endif

        </div>
    </div>
</div>


@endsection