@extends('layouts.admin')

@section('head')
    <link rel="stylesheet" href="/admin/css/modal/remodal.css">
    <link rel="stylesheet" href="/admin/css/modal/remodal-default-theme.css">
    <link rel="stylesheet" href="/admin/css/cropper.css">

    <script src="/admin/js/validate/underscore-min.js"></script>
    <script src="/admin/js/validate/moment.min.js"></script>
    <script src="/admin/js/validate/validate.min.js"></script>
@stop

@section('content')
    <div class="content-wrapper">
        <style>
            .container {
                max-width: 960px;
                margin: 20px auto;
            }

            img {
                max-width: 100%;
            }

            .row,
            .preview {
                overflow: hidden;
            }

            .col {
                float: left;
            }

            .col-6 {
                width: 50%;
            }

            .col-3 {
                width: 25%;
            }

            .col-2 {
                width: 16.7%;
            }

            .col-1 {
                width: 8.3%;
            }
        </style>
        </head>
        <body>

        <div class="container">

            <a href="/admin_panel/catalog/goods/{{$color->color_category->good_id}}/update">Назад</a>

        </div>
        <form action="#" id="colorform">
            <div class="form-group">
                <img src="/files/image/catalog/{{$color->color_category->goods->subcategory_id}}/{{$color->color_category->good_id}}/colors/{{$color->file}}" alt="">
                <br>

                <input type="hidden" name="id" value="{{$color->id}}">
                <div class="col-sm-5">
                    <input type="file" name="photo"/>
                </div>
                <br>
                <img src="/img/flags/ru.png" alt=""> Ru
                <input type="text" name="name_ru" value="{{$color->name_ru}}" class="form-control">
                <img src="/img/flags/ua.png" alt=""> Ua
                <input type="text" name="name_ua" value="{{$color->name_ua}}" class="form-control">
                </div>
            <button class="btn download">Зберегти</button>
        </form>

    </div>

    <script>
        $(function () {
        $('#colorform').submit(function (e) {
            e.preventDefault();

            var error = true;
            if($( "input[name='name_ru']" ).val() == ''){
                $("input[name='name_ru']").css('border-color' , 'red');
                $('.nav a[href="#ru"]').tab('show');
                $("input[name='name_ru']").focus();
                error = false;
            }else{
                $("input[name='name_ru']").css('border-color' , '#d2d6de');
            }
            if($( "input[name='name_ua']" ).val() == ''){
                $("input[name='name_ua']").css('border-color' , 'red');
                $('.nav a[href="#ua"]').tab('show');
                $("input[name='name_ua']").focus();
                error = false;
            }else{
                $("input[name='name_ua']").css('border-color' , '#d2d6de');
            }

            var formData = new FormData($('#colorform')[0]);
            var name_ru = $( "input[name='name_ru']").val();
            var name_ua = $("input[name='name_ua']").val();
           // var photo = $("input[name='photo']");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var name_ru = $( "input[name='name_ru']").val();
            var name_ua = $("input[name='name_ua']").val();
            if(error) {
                $.ajax({

                    url: '/admin_panel/catalog/goods/crop/edit/save',
                    type: 'post',
                    async: false,
                    cache: false,
                    context: this,
                    data: formData,
                    contentType: false,
                    enctype: 'multipart/form-data',
                    processData: false,

                    success: function (response) {
                        if(response == 'success'){
                            window.location = "/admin_panel/catalog/goods/{{$color->color_category->good_id}}/update";
                        }
                    }
                });
            }
         });
        });
    </script>
    <script src="/js/functions.js"></script>
@endsection
