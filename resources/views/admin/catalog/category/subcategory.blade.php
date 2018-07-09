@extends('layouts.admin')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Товари підкатегорії
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin_panel"><i class="fa fa-tv"></i> Панель управління</a></li>
                <li><a href="/admin_panel/catalog"><i class="fa fa-book"></i> Каталог</a></li>
                <li class="active">Товари підкатегорії</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">

                    <a href="/admin_panel/catalog/{{$id}}/goods/create" class="btn btn-warning pull-right">Додати
                        товар</a>
                    <br>
                    <hr>

                    @if($goods)
                        <?php $i = 0; ?>
                        @foreach($goods as $good)
                            @if(!empty($good->img))
                                @php
                                    $q = explode("||", substr($good->img, 1, -1));
                                    $count = count($q);

                                @endphp

                            @endif

                            @if($i%4==0) @if($i!=0) </div> @endif @endif
                @if($i%4==0)
                    <div class="row"> @endif
                        <div class="col-md-3">
                            @if(!empty($good->img))
                                <a href="/admin_panel/catalog/goods/{{$good->id}}/update"><img
                                            src="/files/image/catalog/{{$id}}/{{$good->id}}/preview/{{$q[$count-1]}}"
                                            class="img-thumbnail" alt="{{$good->description->name}}"></a>
                            @else
                                <a href="/admin_panel/catalog/goods/{{$good->id}}/update"><img
                                            src="/img/no-image-available.png" class="img-thumbnail"
                                            alt="{{$good->description->name}}"></a>
                            @endif
                            <p>
                                <a href="/admin_panel/catalog/goods/{{$good->id}}/update">{{$good->description->name}}</a>
                            </p>
                            <p>{{$good->price}} грн</p>
                        </div>
                        <?php $i++; ?>

                        @endforeach
                        @endif
                    </div>

            </div>
    </div>
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- ./wrapper -->

@endsection
