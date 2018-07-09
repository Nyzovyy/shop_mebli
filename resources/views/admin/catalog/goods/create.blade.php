@extends('layouts.admin')

@section('head')
    <link rel="stylesheet" href="/admin/css/modal/remodal.css">
    <link rel="stylesheet" href="/admin/css/modal/remodal-default-theme.css">

    <script src="/admin/js/validate/underscore-min.js"></script>
    <script src="/admin/js/validate/moment.min.js"></script>
    <script src="/admin/js/validate/validate.min.js"></script>
@stop

@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Додати товар
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin_panel"><i class="fa fa-tv"></i> Панель управління</a></li>
                <li><a href="/admin_panel/catalog"><i class="fa fa-book"></i> Каталог</a></li>
                <li class="active">Додати товар</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Main row -->
            <div class="row">

                <div class="col-md-12">

                    <div class="box box-primary">
                        {{--{{ Form::open(['action' => ['Admin\Catalog\GoodsController@createPost', $category->id], 'files' => true, 'class' => 'form-horizontal', 'id' => 'main', 'novalidate']) }}--}}
                        <form id="main" class="form-horizontal" action="#" method="post" enctype="multipart/form-data"
                              novalidate>
                            {{ csrf_field() }}
                            <div class="box-body">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#ru"> <img src="/img/flags/ru.png"
                                                                                             alt=""> Ru</a></li>
                                    <li><a data-toggle="tab" href="#ua"> <img src="/img/flags/ua.png" alt=""> Ua</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="ru" class="tab-pane fade in active">
                                        <br/>
                                        <div class="form-group">
                                            {{ Form::label('name', 'Имя', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
                                            <div class="col-sm-5">
                                                {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name', 'name' => 'name_ru', 'id' => 'name_ru']) }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('description', 'Опис', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
                                            <div class="col-sm-8">
                                                {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Опис', 'name' => 'description_ru', 'id' => 'description_ru']) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div id="ua" class="tab-pane fade">
                                        <br/>
                                        <div class="form-group">
                                            {{ Form::label('name', 'Ім\'я', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
                                            <div class="col-sm-5">
                                                {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name', 'name' => 'name_ua', 'id' => 'name']) }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('description', 'Опис', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
                                            <div class="col-sm-8">
                                                {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Опис', 'name' => 'description_ua', 'id' => 'description']) }}
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <br>
                                <div class="form-group">
                                    {{ Form::label('price', 'Ціна', ['class' => 'col-sm-2 control-label', 'for' => 'price']) }}
                                    <div class="col-sm-5">
                                        {{ Form::text('price', '', ['class' => 'form-control', 'placeholder' => 'Ціна', 'name' => 'price', 'id' => 'price']) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('img', 'Image', ['class' => 'col-sm-2 control-label', 'for' => 'img']) }}
                                    <div class="col-sm-5">
                                        <input type="file" name="photos[]" multiple/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('width', 'Ширина', ['class' => 'col-sm-2 control-label', 'for' => 'width']) }}
                                    <div class="col-sm-5">
                                        {{ Form::text('width', '', ['class' => 'form-control', 'placeholder' => 'Ширина', 'name' => 'width', 'id' => 'width']) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('depth', 'Глибина', ['class' => 'col-sm-2 control-label', 'for' => 'price']) }}
                                    <div class="col-sm-5">
                                        {{ Form::text('depth', '', ['class' => 'form-control', 'placeholder' => 'Глибина', 'name' => 'depth', 'id' => 'depth']) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('height', 'Висота', ['class' => 'col-sm-2 control-label', 'for' => 'height']) }}
                                    <div class="col-sm-5">
                                        {{ Form::text('height', '', ['class' => 'form-control', 'placeholder' => 'Висота', 'name' => 'height', 'id' => 'height']) }}
                                    </div>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-success">
                                    <i class='fa fa-fw fa-save'></i> Зберегти
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    {{--@include('vendor.PontoSistemas.ajax_script', ['form' => '#myform','request'=>'App/Http/Requests/TestRequest','on_start'=>true])--}}

    {{--<script src="/admin/js/validate/validate-options.js"></script>--}}
    <script>
        $(document).on('submit', '#main', function (e) {
            e.preventDefault();
            var error = true;
            if ($("input[name='name_ru']").val() == '') {
                $("input[name='name_ru']").css('border-color', 'red');
                $('.nav a[href="#ru"]').tab('show');
                $("input[name='name_ru']").focus();
                error = false;
            } else {
                $("input[name='name_ru']").css('border-color', '#d2d6de');
            }
            if ($("input[name='name_ua']").val() == '') {
                $("input[name='name_ua']").css('border-color', 'red');
                $('.nav a[href="#ua"]').tab('show');
                $("input[name='name_ua']").focus();
                error = false;
            } else {
                $("input[name='name_ua']").css('border-color', '#d2d6de');
            }

            if ($("input[name='price']").val() == '') {
                $("input[name='price']").css('border-color', 'red');
                $("input[name='price']").focus();
                error = false;
            } else {
                $("input[name='price']").css('border-color', '#d2d6de');
            }

            var formData = new FormData($('#main')[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if (error) {
                $.ajax({
                    url: '/admin_panel/catalog/{{$category->id}}/goods/create',
                    type: 'post',
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    enctype: 'multipart/form-data',
                    processData: false,
                    success: function (response) {
                        if (response == 'success') {
                            window.location.href = '/admin_panel/catalog/{{$category->id}}'
                        }

                    }
                });
            }
        });
        CKEDITOR.editorConfig = function (config) {
            config.language = 'es';
            config.uiColor = '#F7B42C';
            config.height = 300;
            config.toolbarCanCollapse = true;

        };
        CKEDITOR.replace('description_ru');
        CKEDITOR.replace('description_ua');
    </script>
@endsection
