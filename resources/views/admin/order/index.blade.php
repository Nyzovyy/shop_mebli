@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Користувачі
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin_panel"><i class="fa fa-tv"></i> Панель управління</a></li>
                <li class="active">Список користувачів</li>
            </ol>
        </section>
        <section class="content">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 pull-right" style="margin-bottom:10px">
                        <form>
                            <div class="typeahead-container">

                            </div>
                        </form>
                    </div>
                </div>
                <div class="box box-primary box-solid">
                    <div class="box-header" style="padding:10px !important">
                        <div class="row">
                            <div class="col-sm-2 pull-right">
                                <select class="form-control"
                                        onchange="self.location='?order='+this.options[this.selectedIndex].value+''">
                                    <option value="0" @if(isset($_GET['order']) && $_GET['order'] < 1)selected @endif>Всі</option>
                                    <option value="1" @if(isset($_GET['order']) && $_GET['order'] == 1)selected @endif>На оформленні</option>
                                    <option value="2" @if(isset($_GET['order']) && $_GET['order'] == 2)selected @endif>Виконано</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive table-bordered">
                            <div id="changeUserType-2178" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                            <h4 class="modal-title">Change User Type</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <select id="2178" class="userRoleDrop form-control">
                                                    <option value="1">Admin</option>
                                                    <option value="2">Moderator</option>
                                                    <option value="0" selected="">User</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a class="change-role-btn-2178 btn btn-success">Submit</a>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-striped">
                                <tbody>
                                <tr>

                                    <th style="width: 20%">№ номер замовлення</th>
                                    <th style="width: 20%">Дата замовлення</th>
                                    <th style="width: 10%">Вартість</th>
                                    <th style="width: 10%">Користувач</th>
                                    <th style="width: 10%">Статус</th>
                                    <th style="width: 220px; float: right;">Дії</th>
                                </tr>

                                @if($orders)

                                    @foreach($orders as $order)
                                        <tr>

                                            <td>{{$order->id}}</td>
                                            <td>{{$order->created_at}}</td>
                                            <td>{{$order->totalPrice}} грн</td>
                                            <td>
                                                <a href="/admin_panel/user-profile/{{ $order->user->id }}">{{$order->user->name}}</a>
                                            </td>
                                            <td>
                                                @if($order->status == 0)
                                                    Відправленно
                                                @elseif($order->status == 1)
                                                    На оформленні
                                                @elseif($order->status == 2)
                                                    Завершено
                                                @endif
                                            </td>
                                            <td>
                                                {{--@if(isset($user->account->id))
                                                    {{ $user->account->phone }}
                                                @endif--}}
                                            </td>
                                            <td>
                                                <a href="/admin_panel/order/view/{{$order->id}}" class="btn btn-sm btn-info" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Переглянути">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        {{$orders->links()}}
                        <div id="controls" class="pull-right" style="margin-top:5px; display:none;">
                            <button class="btn btn-success" id="publish">
                                <i class="fa fa-unlock"></i>
                                <span class="hidden-xs"> Publish </span>
                            </button>
                            <button class="btn btn-warning" id="unpublish">
                                <i class="fa fa-lock"></i>
                                <span class="hidden-xs"> Unpublish </span>
                            </button>
                            <button class="btn btn-success" id="enable">
                                <i class="fa fa-check-square-o"></i>
                                <span class="hidden-xs"> Enable Ads </span>
                            </button>
                            <button class="btn btn-warning" id="disable">
                                <i class="fa fa-ban"></i>
                                <span class="hidden-xs"> Disable Ads </span>
                            </button>
                            <button class="btn btn-success" id="verify">
                                <i class="fa fa-star"></i>
                                <span class="hidden-xs"> Verify </span>
                            </button>
                            <button class="btn btn-warning" id="unverify">
                                <i class="fa fa-star-o"></i>
                                <span class="hidden-xs"> Unverify </span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </section>
    </div>
@endsection