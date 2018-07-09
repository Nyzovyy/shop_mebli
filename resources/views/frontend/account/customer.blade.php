@extends('layouts.app')

@section('content')
    <div class="clearfix"></div>
    <div class="container-fluid breadcrumbs">
        <div class="row">
            <div class="container bordertop">
                <div class="row">
                    <div class="col-xs-12">
                        <ul>
                            <li><a href="/">@lang('home.main_page')</a></li>
                            <li><a href="/customer">@lang('account.my_account') </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container userpanel">
        <div class="row">
            <div class="col-xs-12 userpmenu">
                <ul class="userpanelmenu">
                    <li class=""><a href="/customer/orders">@lang('account.my_orders')</a></li>
                    <li class="active"><a href="/customer">@lang('account.my_data')</a></li>
                </ul>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div id="customer-wrapper" class="row border-top-bottom">
            <div class="cart-col-1 padding-top-bottom">
                <div class=" userpanel-col-header">
                    <h4>@lang('account.change_pass')</h4>
                </div>
                <div class="clearfix"></div>

                <div class="padding-top-bottom">
                    <form class="form-horizontal" data-title="Zmiana hasła" action="/customer/change-password"
                          id="change-password-form" method="post" novalidate="novalidate">
                        {{ csrf_field() }}
                        @if ($errors->has('password'))
                            <span class="help-block" style="color: #a94442">
                                        <strong>@lang('account.nomatch_pass')</strong>
                                    </span>
                        @endif
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} form-login">
                            <label for="haslo" class="form-label control-label">*@lang('account.pass'):</label>
                            <div class="form-input">
                                <!-- UWAGA! Przy zmianie nazw pól sprawdzić rules validation (MO)-->
                                <input type="password" name="password" class="form-control" id="password"
                                       placeholder="">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} form-login">
                            <label for="password" class="form-label control-label">*@lang('account.repeat_pass'):</label>
                            <div class="form-input">
                                <input type="password" name="password_confirmation" class="form-control"
                                       id="password_again" placeholder=""></div>
                        </div>
                        <div class="form-group form-login">
                            <div class="form-input form-input-offset">
                                <button type="submit" class="submit btn btn-black btn-login">@lang('account.change')</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="cart-col-1 userpanel-col-header2 ">
                    <h4>@lang('account.change') e-mail </h4>
                </div>
                <div class="padding-top-bottom">
                    <form class="form-horizontal" method="post" action="/customer/change-email" id="change-email-form"
                          novalidate="novalidate">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} form-login">
                            <label for="haslo2" class="form-label control-label">*@lang('account.pass')Пароль:</label>
                            <div class="form-input"><input type="password" name="password" required=""
                                                           class="form-control" id="password" placeholder=""
                                                           aria-required="true"></div>
                        </div>
                        <span class="" style="color: #a94442">{{ $errors->first('err_password') }}</span>
                        <div class="form-group form-login">
                            <label for="email2" class="form-label control-label">*@lang('account.new_emeil'):</label>
                            <div class="form-input"><input type="email" name="email" required=""
                                                           class="form-control" id="email" placeholder=""
                                                           aria-required="true"></div>
                        </div>
                        <div class="form-group form-login">
                            <div class="form-input form-input-offset">
                                <button type="submit" class="submit btn btn-black btn-login">@lang('account.change')</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="cart-col-1 userpanel-col-header2 ">
                    <h4>@lang('account.invoice')</h4>
                </div>

                <div class="padding-top-bottom">
                    <form class="form-horizontal" action="/customer/change-invoice-data" method="post"
                          id="invoice-data-form" novalidate="novalidate">
                        {{ csrf_field() }}
                        <div class="form-group form-reg fvleft">
                            <label for="fvcompanyname" class="form-label control-label">*@lang('account.company_name'):</label>
                            <div class="form-input"><input type="text" name="name" required="" class="form-control"
                                                           id="fvcompanyname" placeholder=""
                                                           value="@if(isset($user->invoice->name)){{ $user->invoice->name }} @endif"
                                                           aria-required="true"></div>
                        </div>
                        <div class="form-group form-reg fvleft">
                            <label for="fvnip" class="form-label control-label">*@lang('account.phone')</label>
                            <div class="form-input"><input type="text" name="phone" required="" class="nip form-control"
                                                           id="fvnip" placeholder="___-___-__-__"
                                                           value="@if(isset($user->invoice->phone)) {{ $user->invoice->phone }} @endif"
                                                           aria-required="true"></div>
                        </div>
                        <div class="form-group form-reg fvleft">
                            <label for="fvulica" class="form-label control-label">*@lang('account.street')</label>
                            <div class="form-input"><input type="text" name="street" required=""
                                                           class="form-control" id="fvulica" placeholder=""
                                                           value="@if(isset($user->invoice->street)){{ $user->invoice->street }} @endif"
                                                           aria-required="true"></div>
                        </div>
                        <div class="form-group form-reg fvleft">
                            <label for="fvnrdomu" class="form-label control-label">*@lang('account.house')</label>
                            <div class="form-input form-lokal"><input type="text" name="house_number" required=""
                                                                      class="form-control" id="fvnrdomu" placeholder=""
                                                                      value="@if(isset($user->invoice->house_number)){{ $user->invoice->house_number }} @endif"
                                                                      aria-required="true"></div>
                            <div class="form-input form-lokal"><input type="text" name="apartment_number"
                                                                      class="form-control" id="fvnrlokalu"
                                                                      placeholder=""
                                                                      value="@if(isset($user->invoice->apartment_number)){{ $user->invoice->apartment_number }} @endif">
                            </div>
                        </div>
                        <div class="form-group form-reg fvleft">
                            <label for="fvkod" class="form-label control-label">*@lang('account.index')</label>
                            <div class="form-input form-kodp"><input type="text" name="zip" required=""
                                                                     class="zipcode form-control" id="fvkod"
                                                                     placeholder="__-___"
                                                                     value="@if(isset($user->invoice->zip)){{ $user->invoice->zip }} @endif"
                                                                     aria-required="true">
                            </div>
                        </div>
                        <div class="form-group form-reg fvleft">
                            <label for="fvmiejscowosc" class="form-label control-label">*@lang('account.city')</label>
                            <div class="form-input"><input type="text" name="city" required="" class="form-control"
                                                           id="fvmiejscowosc" placeholder=""
                                                           value="@if(isset($user->invoice->city)){{ $user->invoice->city }} @endif"
                                                           aria-required="true"></div>
                        </div>
                        <div class="form-group form-login">
                            <div class="form-input form-input-offset">
                                <button type="submit" class="submit btn btn-black btn-login">@lang('account.save')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="cart-col-2 left-margin ">
                <div class="userpanel-col-header left-margin">
                    <h4>@lang('account.my_data')</h4>
                </div>
                <div class="clearfix"></div>

                <div id="regform" class="left-margin left-border padding-top-bottom">
                    <form class="form-horizontal" method="post" id="user-account-data-form"
                          action="/customer/change-user-account-data" novalidate="novalidate">
                        {{ csrf_field() }}
                        <input type="hidden" name="current_nick" id="current_nick" value="Ostap22">
                        <div class="form-group form-reg">
                            <label for="name" class="form-label control-label">*@lang('account.name'):</label>
                            <div class="form-input"><input type="text" name="name" required="" class="form-control"
                                                           id="name" placeholder=""
                                                           value="@if(isset($user->account->name)) {{ $user->account->name }} @endif"
                                                           aria-required="true"></div>
                        </div>
                        <div class="form-group form-reg">
                            <label for="surname" class="form-label control-label">*@lang('account.surname')</label>
                            <div class="form-input"><input type="text" name="lastname" required="" class="form-control"
                                                           id="surname" placeholder=""
                                                           value="@if(isset($user->account->lastname)) {{ $user->account->lastname }} @endif"
                                                           aria-required="true">
                            </div>
                        </div>
                        <div class="form-group form-reg">
                            <label for="username" class="form-label control-label">*@lang('account.login')</label>
                            <div class="form-input"><input type="text" disabled="" name="nick" class="form-control"
                                                           id="username" placeholder=""
                                                           value="@if(isset($user->name)) {{ $user->name }} @endif">
                            </div>
                            <div class="form-tool"><a href="">?</a></div>
                        </div>
                        <div class="form-group form-reg">
                            <label for="ulica" class="form-label control-label">*@lang('account.street')</label>
                            <div class="form-input"><input type="text" name="street" required=""
                                                           class="form-control" id="street" placeholder=""
                                                           value="@if(isset($user->account->street)) {{ $user->account->street }} @endif"
                                                           aria-required="true"></div>
                        </div>
                        <div class="form-group form-reg">
                            <label for="nrdomu" class="form-label control-label">*@lang('account.house')</label>
                            <div class="form-input form-lokal"><input type="text" name="house_number" required=""
                                                                      class="form-control" id="nrdomu" placeholder=""
                                                                      value="@if(isset($user->account->house_number)) {{ $user->account->house_number }} @endif"
                                                                      aria-required="true"></div>
                            <div class="form-input form-lokal"><input type="text" name="apartment_number"
                                                                      class="form-control" id="nrlokalu" placeholder=""
                                                                      value="@if(isset($user->account->apartment_number)) {{ $user->account->apartment_number }} @endif">
                            </div>
                        </div>
                        <div class="form-group form-reg">
                            <label for="kod" class="form-label control-label">*@lang('account.index')</label>
                            <div class="form-input form-kodp"><input type="text" name="zip" required=""
                                                                     class="zipcode form-control" id="kod"
                                                                     placeholder="__-___"
                                                                     value="@if(isset($user->account->zip)) {{ $user->account->zip }} @endif"
                                                                     aria-required="true">
                            </div>
                        </div>
                        <div class="form-group form-reg">
                            <label for="miejscowosc" class="form-label control-label">*@lang('account.city')</label>
                            <div class="form-input"><input type="text" name="city" required="" class="form-control"
                                                           id="miejscowosc" placeholder=""
                                                           value="@if(isset($user->account->city)) {{ $user->account->city }} @endif"
                                                           aria-required="true"></div>
                        </div>
                        <div class="form-group form-reg">
                            <label for="telefon" class="form-label control-label">*@lang('account.phone')</label>
                            <div class="form-input"><input type="text" name="phone" required=""
                                                           class="phone form-control" id="telefon"
                                                           placeholder="___ ___ ___"
                                                           value="@if(isset($user->account->phone)) {{ $user->account->phone }} @endif"
                                                           aria-required="true">
                            </div>
                        </div>
                        <div class="form-group form-reg">
                            <label for="email" class="form-label control-label">*E-mail</label>
                            <div class="form-input"><input type="email" name="email" required="" class="form-control"
                                                           id="email" disabled="" placeholder=""
                                                           value="@if(isset($user->email)) {{ $user->email }} @endif"
                                                           aria-required="true"></div>
                        </div>
                        <div class="form-group form-reg">
                            <div class="form-input form-input-offset">
                                <button type="submit" class="submit btn btn-black btn-login">@lang('account.save')</button>
                            </div>
                        </div>
						{{--
                        <div class="form-group form-reg agreementuserpanel grpzgoda">
                            <div class="form-group checkboxes">
                                <div class="checkbox checkbox-danger required" aria-required="true"><input
                                            type="checkbox" required="" name="zgodza_przetwarzanie"
                                            class="zgoda shop-types" id="zgoda1" value="true" checked="checked"
                                            aria-required="true"><label for="zgoda1"> Wyrażam zgodę na przetwarzanie
                                        moich danych osobowych przez Vox Detal S.A. w celu rejestracji i umożliwienia
                                        dokonywania zakupów w sklepie internetowym vox.pl, a w szczególności w celu
                                        udostępniania moich danych osobowych podmiotom&#8203;, które oferują do
                                        sprzedania towar za pośrednictwem sklepu vox.pl, w celu zawarcia umowy
                                        sprzedaży.* </label></div>
                            </div>
                        </div>
                        <div class="form-group form-reg grpzgoda">
                            <div class="form-group checkboxes">
                                <div class="checkbox checkbox-danger"><input type="checkbox" name="zgoda_regulamin"
                                                                             required="" class="zgoda shop-types"
                                                                             id="regulamin" value="true"
                                                                             checked="checked"
                                                                             aria-required="true"><label
                                            for="regulamin"> Oświadczam, że zapoznałam/łem się z <a class="red"
                                                                                                    target="_blank"
                                                                                                    href="/regulamin-1">regulaminem</a>
                                        funkcjonowania strony internetowej <a class="red" target="_blank" href="/">www.vox.pl</a>
                                        i że go akceptuję. Oświadczam, że zapoznałam/łem się z prawem do <a class="red"
                                                                                                            target="_blank"
                                                                                                            href="/zwroty-i-reklamacje-1">odstąpienia</a>
                                        i że je akceptuję.* </label></div>
                            </div>
                        </div>
                        <div class="form-group form-reg grpzgoda">
                            <div class="form-group checkboxes">
                                <div class="checkbox checkbox-danger"><input type="checkbox" name="zgoda_wysylanie"
                                                                             class="shop-types" id="zgoda2" value="true"
                                                                             checked="checked"><label for="zgoda2">
                                        Wyrażam zgodę na otrzymywanie od Vox Detal S.A. za pomocą środków komunikacji
                                        elektronicznej informacji handlowych dotyczących towarów i usług oferowanych w
                                        sklepie vox.pl. </label></div>
                            </div>
                        </div>
                        <div class="form-group form-reg">
                            <div class="form-input form-input-offset2"> * Pola zaznaczone gwiazdką są wymagane.</div>
                        </div>
						--}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.map')
@endsection