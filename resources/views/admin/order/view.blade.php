@extends('layouts.admin')

@section('head')

@stop


@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Замовлення
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin_panel"><i class="fa fa-tv"></i> Панель управління</a></li>
                <li class="active">Замовлення</li>
            </ol>
        </section>
        <section class="content">
            <div class="row offset">
                <div class="col-lg-12">

                    <div class="profileTimeline">
                        <div class="panel panel-default">
                            <div class="panel-body">

                                <div class="profileText">
                                    <h1>Замовлення № {{$data_order->id}} (Загальна сума замовлення <i
                                                style="color: red">{{$data_order->totalPrice}} грн</i>)</h1><br>
                                    <h5>{{$data_order->created_at}}</h5>
                                    <hr>
                                    <div class="form-group">
                                        <label for="sel1">Статус:</label>
                                        <select class="form-control" id="selstatus">
                                            <option value="0" @if($data_order->status == 0) selected @endif>Відправлено
                                                користувачем
                                            </option>
                                            <option value="1" @if($data_order->status == 1) selected @endif>На оформленні
                                            </option>
                                            <option value="2" @if($data_order->status == 2) selected @endif>Замовлення
                                                виконано
                                            </option>

                                        </select>
                                    </div>
                                    @if(isset($data_order->data_user))
                                        <h3>Ім'я: {{ $data_order->data_user->name }} </h3>
                                        <h3>Прізвище: {{ $data_order->data_user->lastname }} </h3>
                                        <h3>Місто: {{ $data_order->data_user->city }} </h3>
                                        <h3>
                                            Вулиця: {{ $data_order->data_user->street.','.' '.$data_order->data_user->house_number.'/'.$data_order->data_user->apartment_number }} </h3>
                                        <h3>Поштовий індекс: {{ $data_order->data_user->zip }} </h3>
                                        <h3>Номер телефону: {{ $data_order->data_user->phone }} </h3>
                                        <h3>E-mail: {{ $data_order->user->email }} </h3>
                                    @else
                                        <h3>Немає детальних даних про користувача</h3>
                                    @endif
                                    @if(isset($data_order->data_company))
                                        <hr>
                                        <h1>Про команію</h1><br>

                                        <h3>Назва компанії: {{ $data_order->data_company->name }} </h3>
                                        <h3>Місто: {{ $data_order->data_company->city }} </h3>
                                        <h3>
                                            Вулиця: {{ $data_order->data_company->street.','.' '.$data_order->data_company->house_number.'/'.$data_order->data_company->apartment_number }} </h3>
                                        <h3>Поштовий індекс: {{ $data_order->data_company->zip }} </h3>
                                        <h3>Номер телефону: {{ $data_order->data_company->phone }} </h3>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if(count($orders))
        <section class="content">
            <h3 class="mt-0">Список товарів ({{$orders->count()}})</h3>

            <div class="row productlist">
                
                @foreach($orders as $order)
                    @if(count($order->good))
                        <div class="col-md-3">
                            <a href="/{{$order->good->description->slug}}">
                                @if($order->color_id > 0)
                                    <img class="img-thumbnail" src="/files/image/catalog/{{$order->good->subcategory_id}}/{{$order->good->id}}/colors/photo/{{$order->color->file}}"
                                         alt="">
                                @else
                                    <img class="img-thumbnail" src="{{_Function::ProductCover($order->good->id)}}" alt="">
                                @endif
                            </a>
                            <p><a href="/{{$order->good->description->slug}}">{{$order->good->description->name}}</a></p>
                            <p>Ціна
                                @if($order->color_id > 0)
                                    {{$order->color->price}} за од. к-сть: {{$order->count}} /
                                    Разом: {{$order->color->price * $order->count}}
                                @else
                                    {{$order->good->price}} за од. к-сть: {{$order->count}} /
                                    Разом: {{$order->good->price * $order->count}}
                                @endif
                            </p>
                        </div>
                    @endif
                @endforeach
                
            </div>
        </section>

        @endif

    </div>
    <script>
        $(function () {
            $("#selstatus").change(function (e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var id = $(this).val();
                $.ajax({
                    url: '/admin_panel/order/change/status/{{$data_order->id}}/' + id,
                    type: 'get',
                    async: false,
                    cache: false,
                    contentType: false,
                    enctype: 'multipart/form-data',
                    processData: false,
                    success: function (response) {
                    }
                });
            });
        });
    </script>
@endsection