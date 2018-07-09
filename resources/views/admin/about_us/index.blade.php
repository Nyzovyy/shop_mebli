@extends('layouts.admin')

@section('head')
    <link rel="stylesheet" href="/admin/css/modal/remodal.css">
    <link rel="stylesheet" href="/admin/css/modal/remodal-default-theme.css">

    <script src="/admin/js/validate/underscore-min.js"></script>
    <script src="/admin/js/validate/moment.min.js"></script>
    <script src="/admin/js/validate/validate.min.js"></script>
@stop


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Про компанію
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin_panel"><i class="fa fa-tv"></i> Панель управління</a></li>
                <li class="active">Про компанію</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->

            <hr>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
			
			<div class="box box-primary">
				<!-- form start -->
				<form id="main" class="form-horizontal"  action="/admin_panel/about_us" method="post" enctype="multipart/form-data" novalidate>
					{{ csrf_field() }}
					<div class="box-body">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#ru"> <img src="/img/flags/ru.png" alt=""> Ru</a></li>
							<li><a data-toggle="tab" href="#ua"> <img src="/img/flags/ua.png" alt=""> Ua</a></li>
						</ul>

						<div class="tab-content">
							<div id="ru" class="tab-pane fade in active">
								<br />
								<div class="form-group">
									{{ Form::label('description_ru', 'Про нас', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
									<div class="col-sm-8">
										<textarea class="form-control" name="text_ru">{{$about->text_ru}}</textarea>
									</div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('description_ru', 'Номер телефона', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
                                    <div class="col-sm-8">
                                    <input type="text" name="number_ru" class="form-control" value="{{$about->number_ru}}">
								    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('description_ru', 'Instagram(RU)', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
                                    <div class="col-sm-8">
                                        <input type="text" name="instagram_ru" class="form-control" value="{{$about->instagram_ru}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('description_ru', 'Facebook(RU)', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
                                    <div class="col-sm-8">
                                        <input type="text" name="facebook_ru" class="form-control" value="{{$about->facebook_ru}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('description_ru', 'Vk(RU)', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
                                    <div class="col-sm-8">
                                        <input type="text" name="vk_ru" class="form-control" value="{{$about->vk_ru}}">
                                    </div>
                                </div>
							</div>
							<div id="ua" class="tab-pane fade">
								<br />
								<div class="form-group">
									{{ Form::label('description_ua', 'Про нас', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
									<div class="col-sm-8">
										<textarea class="form-control" name="text_ua">{{$about->text_ua}}</textarea>
									</div>
								</div>
                                <div class="form-group">
                                    {{ Form::label('description_ru', 'Номер телефону', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
                                    <div class="col-sm-8">
                                        <input type="text" name="number_ua" class="form-control" value="{{$about->number_ua}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('description_ru', 'Instagram(UA)', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
                                    <div class="col-sm-8">
                                        <input type="text" name="instagram_ua" class="form-control" value="{{$about->instagram_ua}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('description_ru', 'Facebook(UA)', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
                                    <div class="col-sm-8">
                                        <input type="text" name="facebook_ua" class="form-control" value="{{$about->facebook_ua}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('description_ru', 'Vk(UA)', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
                                    <div class="col-sm-8">
                                        <input type="text" name="vk_ua" class="form-control" value="{{$about->vk_ua}}">
                                    </div>
                                </div>
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
				
		
			
			

            



        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <div class="control-sidebar-bg"></div>

    <!-- ./wrapper -->

    <script>
        $(function () {
            CKEDITOR.editorConfig = function (config) {
                config.language = 'es';
                config.uiColor = '#F7B42C';
                config.height = 300;
                config.toolbarCanCollapse = true;

            };
            CKEDITOR.replace('text_ru');
            CKEDITOR.replace('text_ua');
        });
    </script>

@endsection
