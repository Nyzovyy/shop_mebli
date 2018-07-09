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
                            <li><a href="/customer">@lang('account.my_account')</a></li>
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
                    <li class=""><a href="/customer">@lang('account.my_data')</a></li>
                    <li class="active"><a href="/customer/addresses">@lang('account.delivery_address')</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <div class="upTable orders-table">
                <div class="upTableRowHead tableHeader">
                    <div class="upTableCellHead head lp">№</div>
                    <div class="upTableCellHead head iminaz">@lang('account.name')</div>
                    <div class="upTableCellHead head adres">@lang('account.delivery_address')</div>
                    <div class="upTableCellHead head telef">@lang('account.phone')</div>
                    <div class="upTableCellHead head defadr"></div>
                    <div class="upTableCellHead"></div>
                </div>
            </div>
            <div class="upTable orders-table"></div>
        </div>
        
        <div class="col-xs-12 ">
            <div class="addnew" style="display: block;"><a href="#" class="btn-addnew">@lang('account.add_new') <i class="fa fa-caret-right"></i></a></div>
            <div class="clearfix"></div>
            <div class="adresy">
                <div class="addnew-form nowyadres" style="display: none;">
                    <form class="form-horizontal customer-address-form-add" novalidate="novalidate">
                        <input type="hidden" name="edit" id="edit">
                        <div class="addnew-col">
                            <div class="form-group form-addnew">
                                <label for="name" class="form-label control-label">*@lang('account.name'):</label>
                                <div class="form-input"><input type="text" name="firstname" required="" class="form-control" id="name" placeholder="" aria-required="true"></div>
                            </div>
                            <div class="form-group form-addnew">
                                <label for="surname" class="form-label control-label">*@lang('account.surname')</label>
                                <div class="form-input"><input type="text" name="lastname" required="" class="form-control" id="surname" placeholder="" aria-required="true"></div>
                            </div>
                            <div class="form-group form-addnew">
                                <label for="telefon" class="form-label control-label">*@lang('account.phone')</label>
                                <div class="form-input"><input type="text" name="phone" required="" class="phone form-control" id="telefon" placeholder="___ ___ ___" aria-required="true"></div>
                            </div>
                        </div>
                        <div class="addnew-col">
                            <div class="form-group form-addnew">
                                <label for="ulica" class="form-label control-label">*@lang('account.street')</label>
                                <div class="form-input"><input type="text" name="address_street" required="" class="form-control" id="ulica" placeholder="" aria-required="true"></div>
                            </div>
                            <div class="form-group form-addnew">
                                <label for="nrdomu" class="form-label control-label">*@lang('account.house')</label>
                                <div class="form-input form-lokal"><input type="text" name="address_nr" required="" class="form-control" id="nrdomu" placeholder="" aria-required="true"></div>
                                <div class="form-input form-lokal"><input type="text" name="address_apt" class="form-control" id="nrlokalu" placeholder=""></div>
                            </div>
                            <div class="form-group form-addnew">
                                <label for="kod" class="form-label control-label">*@lang('account.index')</label>
                                <div class="form-input form-kodp"><input type="text" name="zip" required="" class="zipcode form-control" id="kod" placeholder="__-___" aria-required="true"></div>
                            </div>
                            <div class="form-group form-addnew">
                                <label for="miejscowosc" class="form-label control-label">*@lang('account.city')</label>
                                <div class="form-input"><input type="text" name="city" required="" class="form-control" id="miejscowosc" placeholder="" aria-required="true"></div>
                            </div>
                        </div>
                        <div class="addnew"><button type="button" class="customer-address-submit-add btn btn-red btn-save">@lang('account.save')</button><a href="#" class="cancel">@lang('account.cencel')</a></div>
                    </form>
                </div>
            </div>
        </div>
        <script>;jQuery(document).ready(function(n){n('#kod').inputmask('99-999');n('.addnew').click(function(){n(this).hide();n('.addnew-form.nowyadres').show();return!1});n('.cancel').click(function(){n('.addnew-form.nowyadres').hide();n('.addnew').show();return!1})});</script>
    </div>

    <script>;$(document).ready(function(){formValidations.init()})</script>
@endsection