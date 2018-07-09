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
                    <li class="active"><a href="/customer/orders">@lang('account.my_orders')</a></li>
                    <li class=""><a href="/customer">@lang('account.my_data')</a></li>
               {{--     <li class=""><a href="/customer/addresses">@lang('account.delivery_address')</a></li>
               --}} </ul>
            </div>
        </div>
        <div class="clearfix"></div>
        <div id="customer-orders-wrapper" class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    
                
                <div class="upTable orders-table">
                    <div class="upTableRowHead tableHeader">
                        <div class="upTableCellHead head lp">№</div>
                        <div class="upTableCellHead head numzam">@lang('account.order_number')</div>
                        <div class="upTableCellHead head datzam">@lang('account.order_date')</div>
                        <div class="upTableCellHead head wartos">@lang('account.oreder_cost')</div>
                        <div class="upTableCellHead head stazam">@lang('account.order_status')</div>
                        <div class="upTableCellHead"></div>
                    </div>
          
                    @if(count($orders))
                        @php
                            $count_p = 1;
                        @endphp
                        @foreach($orders as $order)
                    <div class="upTableRow" id="prod-row-dc352b248033908ec68ffbf731a3d1ff">
                        <div class="upTableCell lp">{{$count_p}}</div>

                    <div class="upTableCell numzam">
                       {{$order->id}}
                    </div>
                            <div class="upTableCell datzam">
                                {{$order->created_at}}
                            </div>
                            <div class="upTableCell wartos">
                            {{$order->totalPrice}} грн
                            </div>
                        <div class="upTableCell stazam">
                            @if($order->status == 0)
                                Отправленно
                            @elseif($order->status == 1)
                                На оформлении
                            @elseif($order->status == 2)
                                Завершенно
                            @endif


                        </div>
                </div>
                            @php
                                $count_p++;
                            @endphp
                        @endforeach
                        {{$orders->links()}}
                    @else
                    <div style="padding:20px">
                        <p>@lang('account.no_orders')</p>
                    </div>
                        @endif
                </div>
                </div>
            </div>
        </div>

    </div>
    <br><br>
@endsection