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
            <h1>{{$goods->description->name}}</h1>
            <a href="/admin_panel/catalog/goods/{{$goods->id}}/update">Назад</a>
            <div class="row">
                <div class="col col-6">
                    <img id="image" src="{{$file}}" alt="Picture">
                </div>
                <div class="col col-3">
                    <div class="preview" style="width: 40px; min-height: 40px;"></div>
                </div>

            </div>
        </div>
        <form action="#" id="colorform">
            <div class="form-group">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#ru"> <img src="/img/flags/ru.png" alt=""> Ru</a></li>
                    <li><a data-toggle="tab" href="#ua"> <img src="/img/flags/ua.png" alt=""> Ua</a></li>
                </ul>

                <div id="ru" class="tab-pane fade in active">
                    <br />
                    <div class="form-group">
                        {{ Form::label('name', 'Имя', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
                        <div class="col-sm-5">
                            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name', 'name' => 'name_ru', 'id' => 'name_ru']) }}
                        </div>
                        <div class="col-sm-5 messages"></div>
                    </div>

                </div>
                <div id="ua" class="tab-pane fade">
                    <br />
                    <div class="form-group">
                        {{ Form::label('name', 'Ім\'я', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
                        <div class="col-sm-5">
                            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name', 'name' => 'name_ua', 'id' => 'name']) }}
                        </div>
                        <div class="col-sm-5 messages"></div>
                    </div>

                </div>
            </div>
            <div class="form-group">
                <label for="sel1">Виберіть катерогію кольору</label>
                <select class="form-control" name="category_color" id="sel1">
                    @if(count($category_colors))
                        @foreach($category_colors as $category)
                            <option value="{{$category->id}}">{{$category->name_ua}}</option>
                        @endforeach

                    @endif
                </select>
            </div>
            <a href="" class="btn download" onclick="SaveColor(this.href); return false">Зберегти</a>
        </form>

    </div>


    <script src="/admin/js/cropper.js"></script>
    <script>
        function each(arr, callback) {
            var length = arr.length;
            var i;

            for (i = 0; i < length; i++) {
                callback.call(arr, arr[i], i, arr);
            }

            return arr;
        }

        window.addEventListener('DOMContentLoaded', function () {
            var image = document.querySelector('#image');
            var previews = document.querySelectorAll('.preview');
            var cropper = new Cropper(image, {
                ready: function () {
                    var clone = this.cloneNode();

                    clone.className = '';
                    clone.style.cssText = (
                            'display: block;' +
                            'width: 100%;' +
                            'min-width: 0;' +
                            'min-height: 0;' +
                            'max-width: none;' +
                            'max-height: none;'
                    );

                    each(previews, function (elem) {
                        elem.appendChild(clone.cloneNode());
                    });
                },

                crop: function (e) {
                    var data = e.detail;
                    var cropper = this.cropper;
                    var imageData = cropper.getImageData();
                    var previewAspectRatio = data.width / data.height;

                    let imgSrc = cropper.getCroppedCanvas({
                        width: 30 // input value
                    }).toDataURL();

                    document.querySelector('.download').setAttribute('href',imgSrc);
                    each(previews, function (elem) {
                        var previewImage = elem.getElementsByTagName('img').item(0);
                        var previewWidth = elem.offsetWidth;
                        var previewHeight = previewWidth / previewAspectRatio;
                        var imageScaledRatio = data.width / previewWidth;

                        elem.style.height = previewHeight + 'px';
                        previewImage.style.width = imageData.naturalWidth / imageScaledRatio + 'px';
                        previewImage.style.height = imageData.naturalHeight / imageScaledRatio + 'px';
                        previewImage.style.marginLeft = -data.x / imageScaledRatio + 'px';
                        previewImage.style.marginTop = -data.y / imageScaledRatio + 'px';


                    });
                }
            });

        });
        function SaveColor(data) {
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var name_ru = $( "input[name='name_ru']").val();
            var name_ua = $("input[name='name_ua']").val();
            var category_color = $("select[name='category_color']").val();
            if(error) {
                $.ajax({

                    url: '/admin_panel/catalog/goods/crop/{{$id}}',
                    type: 'post',
                    async: false,
                    cache: false,
                    context: this,
                    data: jQuery.param({img: data, origin: '{{$origin_img}}' , name_ru: name_ru , name_ua: name_ua , category_color: category_color}),
                    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                    enctype: 'multipart/form-data',
                    processData: false,

                    success: function (response) {
                       $( "input[name='name_ru']").val('');
                       $("input[name='name_ua']").val('');
                        notification('Збережено', '');
                    }
                });
            }
        }
    </script>
    <script src="/js/functions.js"></script>
@endsection
