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
                Редагувати товар
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin_panel"><i class="fa fa-tv"></i> Панель управління</a></li>
                <li><a href="/admin_panel/catalog"><i class="fa fa-book"></i> Каталог</a></li>
                <li class="active">{{$goods->description->name}}</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Main row -->
            <div class="row">
                <div class="col-md-12">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    @if(session()->has('message_error'))
                        <div class="alert alert-danger">
                            {{ session()->get('message_error') }}
                        </div>
                    @endif
                    <div class="box box-primary">
                        <form id="main" class="form-horizontal" action="#" method="post" enctype="multipart/form-data"
                              novalidate>
                            {{ csrf_field() }}
                            <div class="box-body">
                                <a href="/admin_panel/catalog/goods/{{$goods->id}}/delete"
                                   class="btn btn-danger pull-right">Видалити</a>
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
                                                <input type="text" name="name_ru"
                                                       value="{{$goods->description_ru->name}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('description', 'Описание', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
                                            <div class="col-sm-8">
                                 <textarea class="form-control"
                                           name="description_ru">{{$goods->description_ru->description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="ua" class="tab-pane fade">
                                        <br/>
                                        <div class="form-group">
                                            {{ Form::label('name', 'Ім\'я', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
                                            <div class="col-sm-5">
                                                <input type="text" name="name_ua"
                                                       value="{{$goods->description_ua->name}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('description', 'Опис', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
                                            <div class="col-sm-8">
                                 <textarea class="form-control"
                                           name="description_ua">{{$goods->description_ua->description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('price', 'Ціна', ['class' => 'col-sm-offset-1 col-sm-3 control-label', 'for' => 'price']) }}
                                        <div class="col-sm-6">
                                            <input type="text" name="price" value="{{$goods->price}}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('height', 'Виберіть коцекцію(не обов\'язково)', ['class' => 'col-sm-4 control-label', 'for' => 'height']) }}
                                        <div class="col-sm-6">
                                            <select class="form-control" name="interior_id" id="sel1">
                                                <option value="0" @if(0 == $goods->collection_id) selected @endif>Не
                                                    вибрано
                                                </option>
                                                @if(count($collections))
                                                    @foreach($collections as $collection)
                                                        <option value="{{$collection->id}}"
                                                                @if($collection->id == $goods->collection_id) selected @endif>{{ $collection->name_ua}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('width', 'Ширина', ['class' => 'col-sm-2 control-label', 'for' => 'width']) }}
                                        <div class="col-sm-6">
                                            <input type="text" name="width" value="{{$goods->width}}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('depth', 'Глибина', ['class' => 'col-sm-2 control-label', 'for' => 'price']) }}
                                        <div class="col-sm-6">
                                            <input type="text" name="depth" value="{{$goods->depth}}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('height', 'Висота', ['class' => 'col-sm-2 control-label', 'for' => 'height']) }}
                                        <div class="col-sm-6">
                                            <input type="text" name="height" value="{{$goods->height}}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                                @if(!empty($goods->img))
                                    @php
                                        $q = explode("||", substr($goods->img, 1, -1));
                                        $count = count($q);
                                    @endphp
                                @endif
                                @if(!empty($goods->img))
                                    <div class="text-center">
                                        @for($i =0; $i< $count; $i++)
                                            @if($i%3==0)
                                                @if($i!=0)
                                    </div>
                                @endif
                                @endif
                                @if($i%3==0)
                                    <div class="row">
                                        @endif
                                        <div class="col-md-4">
                                            <img src="/files/image/catalog/{{$goods->subcategory_id}}/{{$goods->id}}/preview/{{$q[$i]}}"
                                                 class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
                                            <p>
                                                <a href="/admin_panel/catalog/goods/remove/img/{{$goods->id}}/{{$q[$i]}}">Видалити</a>
                                                |
                                                @if($goods->cover != $q[$i])
                                                    <a href="/admin_panel/catalog/goods/img/{{$goods->id}}/{{$q[$i]}}/setup">Зробити
                                                        головною</a> |
                                                @else
                                                    <i style="color: red;">[Головна картинка] </i>    |
                                                @endif
                                                @if($goods->album_cover != $q[$i])
                                                    <a href="/admin_panel/catalog/goods/img/{{$goods->id}}/{{$q[$i]}}/setupalbumcover">Зробити
                                                        фоновою картинкою</a>
                                                @else
                                                    <i style="color: red;">[Фонова картинка] </i>
                                                @endif
                                            </p>
                                        </div>
                                        @endfor
                                    </div>
                                @endif
                                <hr>
                                <div class="form-group">
                                    {{ Form::label('img', 'Image', ['class' => 'col-sm-4 control-label', 'for' => 'img']) }}
                                    <div class="col-sm-5">
                                        <input type="file" name="photos[]" multiple/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('colors', 'Кольори:', ['class' => 'col-sm-4 control-label ', 'for' => 'colors']) }}
                                    <div class="col-sm-5 text-right">
                                        <button id="createCategoryColor" class="btn btn-success pull-right"><i
                                                    class="fa fa-plus" aria-hidden="true"></i> Створити розділ
                                        </button>
                                    </div>
                                    <div class="clearfix">.</div>
                                    <hr>
                                    <div class="col-sm-5 text-left">
                                        <a href="/admin_panel/catalog/goods/{{$goods->id}}/color/photos"
                                           class="btn btn-success"><i class="fa fa-photo" aria-hidden="true"></i>
                                            Управління картинками</a>
                                    </div>
                                    {{--@if(count($goods->colors))
                                    @foreach($goods->colors as $color)
                                    <p>
                                       <img src="/files/image/catalog/{{$goods->subcategory_id}}/{{$goods->id}}/colors/{{$color->file}}" alt="">
                                       <a href="/admin_panel/catalog/goods/crop/{{$color->id}}/edit">Редагувати</a>
                                       <a href="/admin_panel/catalog/goods/crop/{{$color->id}}/delete">Видалити</a>
                                    </p>
                                    <img src="/img/flags/ru.png" alt=""> {{$color->name_ru}} <br>
                                    <img src="/img/flags/ua.png" alt=""> {{$color->name_ua}}
                                    @endforeach
                                    @endif--}}
                                    <br>
                                    @if(count($goods->colors_category))
                                        <div class="box-group" id="accordion">
                                            @foreach($goods->colors_category as $category)
                                                <hr>
                                                <h4>
                                                    {{$category->name_ua}}: <span> </span>
                                                    <div class="addColor btn btn-success" data-id="{{$category->id}}"><i
                                                                class="fa fa-upload" aria-hidden="true"></i> Завантажити
                                                        колір
                                                    </div>
                                                    <div class="editCategoryColor btn btn-success"
                                                         data-id="{{$category->id}}"><i class="fa fa-edit"
                                                                                        aria-hidden="true"></i>
                                                        Редагувати
                                                    </div>
                                                    <div class="ColorCategoryDelete btn btn-danger"
                                                         data-id="{{$category->id}}"><i class="fa fa-remove"
                                                                                        aria-hidden="true"></i> Видалити
                                                    </div>
                                                </h4>
                                                <br>
                                                @if(count($category->colors))
                                                    <div class="row">
                                                        @foreach($category->colors as $color)
                                                            <div class="col-xs-12 col-sm-2">
                                                                <img src="/files/image/catalog/{{$goods->subcategory_id}}/{{$goods->id}}/colors/{{$color->file}}"
                                                                     alt="" class="img-thumbnail">
                                                                <p>
                                                                    {{$color->name_ua}}<br/>
                                                                    <a href="/admin_panel/catalog/goods/crop/{{$color->id}}/edit"><i
                                                                                class="fa fa-pencil-square-o"
                                                                                aria-hidden="true"></i></a>
                                                                    <a href="/admin_panel/catalog/goods/crop/{{$color->id}}/delete"><i
                                                                                class="fa fa-trash"
                                                                                aria-hidden="true"></i></a>
                                                                </p>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
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
        $(function () {
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
                        url: '/admin_panel/catalog/goods/{{$goods->id}}/update',
                        type: 'post',
                        data: formData,
                        async: false,
                        cache: false,
                        contentType: false,
                        enctype: 'multipart/form-data',
                        processData: false,
                        success: function (response) {
                            if (response == 'success') {
                                window.location.href = location.href;
                            }

                        }
                    });
                }
            });
            $('#createCategoryColor').click(function (e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/admin_panel/catalog/goods/color/{{$goods->id}}/create/category',
                    type: 'get',
                    async: false,
                    cache: false,
                    contentType: false,
                    enctype: 'multipart/form-data',
                    processData: false,
                    success: function (response) {
                        $('#modalWindow').remove();
                        $('#app').append(response);

                    }
                });
            });
            $('.ColorCategoryDelete').click(function (e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/admin_panel/catalog/goods/color/' + $(this).data('id') + '/category/delete',
                    type: 'get',
                    async: false,
                    cache: false,
                    contentType: false,
                    enctype: 'multipart/form-data',
                    processData: false,
                    success: function (response) {
                        window.location.href = location.href;

                    }
                });
            });
            $('.addColor').click(function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/admin_panel/catalog/goods/color/' + id + '/upload',
                    type: 'get',
                    async: false,
                    cache: false,
                    contentType: false,
                    enctype: 'multipart/form-data',
                    processData: false,
                    success: function (response) {
                        $('#modalWindow').remove();
                        $('#app').append(response);

                    }
                });
            });
            $('.editCategoryColor').click(function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/admin_panel/catalog/goods/color/' + id + '/category/edit',
                    type: 'get',
                    async: false,
                    cache: false,
                    contentType: false,
                    enctype: 'multipart/form-data',
                    processData: false,
                    success: function (response) {
                        $('#modalWindow').remove();
                        $('#app').append(response);

                    }
                });
            });

            $(document).on('click', '.closeModal', function () {
                $('#modalWindow').remove();
            });
            CKEDITOR.editorConfig = function (config) {
                config.language = 'es';
                config.uiColor = '#F7B42C';
                config.height = 300;
                config.toolbarCanCollapse = true;

            };
            CKEDITOR.replace('description_ru');
            CKEDITOR.replace('description_ua');
        });
    </script>
@endsection