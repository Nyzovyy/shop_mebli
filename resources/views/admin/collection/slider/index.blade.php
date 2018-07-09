@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Редагувати слайдер
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin_panel"><i class="fa fa-tv"></i> Панель управління</a></li>
                <li><a href="/admin_panel/collection/edit/{{$collection->id}}"><i class="fa fa-newspaper-o"></i>{{$collection->name_ua}}</a></li>
                <li class="active">Редагувати слайдер</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <p>
                <button class="btn btn-danger pull-right remove_slider" data-id="{{$slider->id}}"><i class="fa fa-remove" aria-hidden="true"></i></button>
              {{--  <button class="btn btn-success pull-right add_photo" data-type="{{$slider->type}}"><i class="fa fa-plus" aria-hidden="true"></i></button>--}}
               @if(!count($slider->data))
                <a href="/admin_panel/collection/slider/{{$slider->id}}/add" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i></a>
               @endif
            </p>
            <!-- Main row -->
            <div class="row">

                <div class="col-md-12">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="box-body">
                        @if(count($dataAll))
                            @foreach($dataAll as $data)
                                @if($data->content->type == 'pictures')
                                    <img src="/files/collection/slider/{{$slider->id}}/{{$data->photo}}" alt="">
                                    <br>
                                    <a href="/admin_panel/collection/slider/{{$slider->id}}/delete/{{$data->id}}" class="btn btn-success pull-right"><i class="fa fa-remove" aria-hidden="true"></i></a>
                                    <br>
                                @elseif($data->content->type == 'pictures+test')
                                    <br>
                                    <img src=" /files/collection/slider/{{$slider->id}}/{{$data->photo}}" alt="">
                                    </br>

                                    <a href="/admin_panel/collection/slider/{{$data->id}}/edit" class="btn btn-success pull-right"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="/admin_panel/collection/slider/{{$slider->id}}/delete/{{$data->id}}" class="btn btn-success pull-right"><i class="fa fa-remove" aria-hidden="true"></i></a>
                                    {!! $data->description_ru !!} <br>
                                    {!! $data->description_ua !!} <br>
                                @elseif($data->content->type == 'pictures+test+pictures')
                                    <br>
                                    <img src="/files/collection/slider/{{$slider->id}}/{{$data->photo}}" alt=""></br>
                                    <br>
                                    <img src="/files/collection/slider/{{$slider->id}}/{{$data->photo_second}}" alt=""></br>

                                    <a href="/admin_panel/collection/slider/{{$data->id}}/edit" class="btn btn-success pull-right"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="/admin_panel/collection/slider/{{$slider->id}}/delete/{{$data->id}}" class="btn btn-success pull-right"><i class="fa fa-remove" aria-hidden="true"></i></a>
                                    {!! $data->description_ru !!} <br>
                                    {!! $data->description_ua !!} <br>
                                @endif
                            @endforeach
                            @else
                            пусто
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        $( document ).ready(function() {
            $('.add_photo').click( function (e) {
                e.preventDefault();
                var type = $(this).data('type');

                var data = "<div class='modal fade in' id='modalWindow' role='dialog' style='display: block; padding-left: 15px; overflow-y: auto;'>";
                data += '<div class="modal-dialog">';
                data += '<div class="modal-content">';
                data += '<div class="modal-header">';
                data += '<button type="button" class="closeModal close" data-dismiss="modal">×</button>';
                data += '</div>';
                data += '<div class="modal-body">';
                data += '<form id="main_upload" class="form-horizontal"  action="#" method="post" enctype="multipart/form-data" novalidate>';

                if(type == 'pictures') {
                    data += '<div class="form-group">';
                    data += '<label for="sel1">Виберіть картинки (max 10):</label>';
                    data += '<input type="file" name="photos[]" multiple />';
                    data += '</div>';
                }else if(type == 'pictures+test'){

                    data += '<label for="sel1">Виберіть картинку:</label>';
                    data += '<input type="file" name="photo_text"/>';

                    data += '<ul class="nav nav-tabs">';
                    data += '<li class="active">';
                    data += '<a data-toggle="tab" href="#ru"> <img src="/img/flags/ru.png" alt=""> Ru</a>';
                    data += '</li>';
                    data += '<li class="">';
                    data += '<a data-toggle="tab" href="#ua"> <img src="/img/flags/ua.png" alt=""> Ua</a>';
                    data += '</li>';
                    data += '</ul>';

                    data += '<div class="tab-content">';

                    data += '<div id="ru" class="tab-pane fade in active">';
                    data += '<textarea class="form-control" placeholder="Введите текст" name="description_ru" id="description_ru" cols="100" rows="10"></textarea>';
                    data += '</div>';

                    data += '<div id="ua" class="tab-pane fade in">';
                    data += '<textarea class="form-control" placeholder="Введіть текст" name="description_ua" id="description_ua" cols="100" rows="10"></textarea>';
                    data += '</div>';


                    data += '</div>';



                }
                data += '</form>';
                data += '</div>';

                data += '<div class="modal-footer">';
                data += '<button type="submit" class="btn btn-success slider-save-upload">Зберегти</button>';
                data += '</div>';
                data += '</div>';
                data += '</div>';
                data += '</div>';
                data += '</div>';
                $('.content-wrapper').append(data);
                if(type == 'pictures+test') {
                    CKEDITOR.replace('description_ru');
                    CKEDITOR.replace('description_ua');
                }

                $('.slider-save-upload').click(function(e){
                    e.preventDefault();
                    var formData = new FormData($('#main_upload')[0]);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                   var description_ua = CKEDITOR.instances['description_ua'].getData();
                   var description_ru = CKEDITOR.instances['description_ru'].getData();


                    $.ajax({
                        url: '/admin_panel/collection/slider/{{$slider->id}}/upload',
                        type: 'post',
                        data: {description_ua: description_ua , description_ru: description_ru , photo_text : $('input[type=file]').val()},

                        enctype: 'multipart/form-data',

                        success: function (response) {
                            if (response == 'success') {
                                $('#modalWindow').remove();
                                window.location.href = location.href;
                            }

                        }
                    });

                });

            });
            $('.edit').click( function (e) {
                e.preventDefault();
                var type = $(this).data('type');
                var id = $(this).data('id');

                var data = "<div class='modal fade in' id='modalWindow' role='dialog' style='display: block; padding-left: 15px; overflow-y: auto;'>";
                data += '<div class="modal-dialog">';
                data += '<div class="modal-content">';
                data += '<div class="modal-header">';
                data += '<button type="button" class="closeModal close" data-dismiss="modal">×</button>';
                data += '</div>';
                data += '<div class="modal-body">';
                if(type == 'pictures') {
                    data += '<form id="main_upload" class="form-horizontal"  action="#" method="post" enctype="multipart/form-data" novalidate>';
                    data += '<div class="form-group">';
                    data += '<label for="sel1">Виберіть картинки:</label>';
                    data += '<input type="file" name="photos[]" multiple />';
                    data += '</div>';
                    data += '</form>';
                }else if(type == 'pictures+test'){
                    var description_ru = $(this).data('description_ru');
                    var description_ua = $(this).data('description_ua');

                    data += '<form id="main_upload" class="form-horizontal"  action="#" method="post" enctype="multipart/form-data" novalidate>';
                    data += '<ul class="nav nav-tabs">';
                    data += '<li class="active">';
                    data += '<a data-toggle="tab" href="#ru"> <img src="/img/flags/ru.png" alt=""> Ru</a>';
                    data += '</li>';
                    data += '<li class="">';
                    data += '<a data-toggle="tab" href="#ua"> <img src="/img/flags/ua.png" alt=""> Ua</a>';
                    data += '</li>';
                    data += '</ul>';

                    data += '<div class="tab-content">';

                    data += '<div id="ru" class="tab-pane fade in active">';
                    data += '<textarea class="form-control" placeholder="Введите текст" name="description_ru" id="description_ru" cols="100" rows="10">'+description_ru+'</textarea>';

                    data += '</div>';

                    data += '<div id="ua" class="tab-pane fade in">';
                    data += '<textarea class="form-control" placeholder="Введіть текс" name="description_ua" id="description_ua" cols="100" rows="10">'+description_ua+'</textarea>';

                    data += '</div>';



                    data += '</form>';
                }
                data += '</div>';

                data += '<div class="modal-footer">';
                data += '<button type="submit" class="btn btn-success slider-save-upload">Зберегти</button>';
                data += '</div>';
                data += '</div>';
                data += '</div>';
                data += '</div>';
                data += '</div>';
                $('.content-wrapper').append(data);
                CKEDITOR.replace('description_ru');
                CKEDITOR.replace('description_ua');

                $('.slider-save-upload').click(function(e){
                    e.preventDefault();
                    var formData = new FormData($('#main_upload')[0]);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: '/admin_panel/collection/slider/section/'+id+'/update',
                        type: 'post',
                        data: formData,
                        async: false,
                        cache: false,
                        contentType: false,
                        enctype: 'multipart/form-data',
                        processData: false,
                        success: function (response) {
                            if (response == 'success') {
                                $('#modalWindow').remove();
                                window.location.href = location.href;
                            }

                        }
                    });

                });

            });

            $('.remove_slider').click( function (e) {
                e.preventDefault();
                var type = $(this).data('type');
                var id = $(this).data('id');

                var data = "<div class='modal fade in' id='modalWindow' role='dialog' style='display: block; padding-left: 15px; overflow-y: auto;'>";
                data += '<div class="modal-dialog">';
                data += '<div class="modal-content">';
                data += '<div class="modal-header">';
                data += '<button type="button" class="closeModal close" data-dismiss="modal">×</button>';
                data += '</div>';
                data += '<div class="modal-body">';

                data += 'Видалити? </br>';


                data += '</div>';

                data += '<div class="modal-footer">';
                data += '<button type="submit" class = "btn btn-danger remove-success">Так</button>';
                data += '</div>';
                data += '</div>';
                data += '</div>';
                data += '</div>';
                data += '</div>';
                $('.content-wrapper').append(data);


                $('.remove-success').click(function(e){
                    e.preventDefault();
                   // var formData = new FormData($('#main_upload')[0]);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: '/admin_panel/collection/slider/deleteall/'+id,
                        type: 'post',
                        data: '',
                        async: false,
                        cache: false,
                        contentType: false,
                        enctype: 'multipart/form-data',
                        processData: false,
                        success: function (response) {
                            if (response == 'success') {
                                $('#modalWindow').remove();
                                window.location.href = '/admin_panel/collection/edit/{{$slider->id_collection}}';
                            }

                        }
                    });

                });

            });
            $(document).on('click', '.close' , function (e) {
                e.preventDefault();
                $('#modalWindow').remove();
            });
            CKEDITOR.editorConfig = function (config) {
                config.language = 'ru';
                config.uiColor = '#F7B42C';
                config.height = 300;
                config.toolbarCanCollapse = true;

            };
        });
    </script>
@endsection