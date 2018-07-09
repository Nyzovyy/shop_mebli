@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Додати картинку
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin_panel"><i class="fa fa-tv"></i> Панель управління</a></li>
                <li><a href="/admin_panel/collection/edit/{{$collection->id}}"><i class="fa fa-newspaper-o"></i>{{$collection->name_ua}}</a></li>
                <li><a href="/admin_panel/collection/slider/{{$slider->id}}"><i class="fa fa-newspaper-o"></i>Слайдер</a></li>
                <li class="active">Додати картинку</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">

            <!-- Main row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                    @if($slider->type == 'pictures')
                            <form id="main" class="form-horizontal"  action="/admin_panel/collection/slider/{{$slider->id}}/upload" method="post" enctype="multipart/form-data" novalidate>
                                {{ csrf_field() }}
                                <div class="box-body">

                                    <br>

                                    <div class="form-group{{ $errors->has('photo_text') ? ' has-error' : '' }}">
                                        {{ $errors->first('photos') }}
                                        {{ Form::label('img', 'Виберіть картинку:', ['class' => 'col-sm-2 control-label', 'for' => 'img']) }}
                                        <div class="col-sm-5">
                                            <input type="file" name="photos" multiple />
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>

                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-success">
                                        <i class='fa fa-fw fa-save'></i> Зберегти
                                    </button>
                                </div>
                            </form>

                        @elseif($slider->type == 'pictures+test')
                            <form id="main" class="form-horizontal"  action="/admin_panel/collection/slider/{{$slider->id}}/upload" method="post" enctype="multipart/form-data" novalidate>
                                {{ csrf_field() }}
                                <div class="box-body">

                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a data-toggle="tab" href="#ru"> <img src="/img/flags/ru.png" alt=""> Ru</a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#ua"> <img src="/img/flags/ua.png" alt=""> Ua</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="ru" class="tab-pane fade active in">
                                            <div class="form-group{{ $errors->has('description_ru') ? ' has-error' : '' }}">
                                                {{ Form::label('description', 'Текст', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
                                                <div class="col-sm-8">
                                                    {{ Form::textarea('description', old('description_ru'), ['class' => 'form-control', 'placeholder' => 'Текст', 'name' => 'description_ru', 'id' => 'description_ru']) }}
                                                </div>
                                            </div>

                                            <div class="clearfix"></div>

                                        </div>

                                        <div id="ua" class="tab-pane fade">
                                            <div class="form-group{{ $errors->has('description_ua') ? ' has-error' : '' }}">
                                                {{ Form::label('description', 'Текст', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
                                                <div class="col-sm-8">
                                                    {{ Form::textarea('description', old('description_ua'), ['class' => 'form-control', 'placeholder' => 'Текст', 'name' => 'description_ua', 'id' => 'description']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="form-group{{ $errors->has('photo_text') ? ' has-error' : '' }}">
                                        {{ $errors->first('photos') }}
                                        {{ Form::label('img', 'Картинка', ['class' => 'col-sm-2 control-label', 'for' => 'img']) }}
                                        <div class="col-sm-5">
                                            <input type="file" name="photo_text" />
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>

                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-success">
                                        <i class='fa fa-fw fa-save'></i> Зберегти
                                    </button>
                                </div>
                            </form>

                        @else

                            <form id="main" class="form-horizontal"  action="/admin_panel/collection/slider/{{$slider->id}}/upload" method="post" enctype="multipart/form-data" novalidate>
                                {{ csrf_field() }}
                                <div class="box-body">

                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a data-toggle="tab" href="#ru"> <img src="/img/flags/ru.png" alt=""> Ru</a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#ua"> <img src="/img/flags/ua.png" alt=""> Ua</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="ru" class="tab-pane fade active in">
                                            <div class="form-group{{ $errors->has('description_ru') ? ' has-error' : '' }}">
                                                {{ Form::label('description', 'Текст', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
                                                <div class="col-sm-8">
                                                    {{ Form::textarea('description', old('description_ru'), ['class' => 'form-control', 'placeholder' => 'Текст', 'name' => 'description_ru', 'id' => 'description_ru']) }}
                                                </div>
                                            </div>

                                            <div class="clearfix"></div>

                                        </div>

                                        <div id="ua" class="tab-pane fade">
                                            <div class="form-group{{ $errors->has('description_ua') ? ' has-error' : '' }}">
                                                {{ Form::label('description', 'Текст', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
                                                <div class="col-sm-8">
                                                    {{ Form::textarea('description', old('description_ua'), ['class' => 'form-control', 'placeholder' => 'Текст', 'name' => 'description_ua', 'id' => 'description']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="form-group{{ $errors->has('photo_text1') ? ' has-error' : '' }}">
                                        {{ $errors->first('photos') }}
                                        {{ Form::label('img', 'Картинка1', ['class' => 'col-sm-2 control-label', 'for' => 'img']) }}
                                        <div class="col-sm-5">
                                            <input type="file" name="photo_text1" />
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('photo_text2') ? ' has-error' : '' }}">
                                        {{ $errors->first('photos') }}
                                        {{ Form::label('img', 'Картинка2', ['class' => 'col-sm-2 control-label', 'for' => 'img']) }}
                                        <div class="col-sm-5">
                                            <input type="file" name="photo_text2" />
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>

                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-success">
                                        <i class='fa fa-fw fa-save'></i> Зберегти
                                    </button>
                                </div>
                            </form>


                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        CKEDITOR.editorConfig = function (config) {
            config.language = 'ru';
            config.uiColor = '#F7B42C';
            config.height = 300;
            config.toolbarCanCollapse = true;

        };
        CKEDITOR.replace('description_ru');
        CKEDITOR.replace('description_ua');
    </script>
@endsection