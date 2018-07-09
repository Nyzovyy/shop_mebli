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
                Контакти компанії
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin_panel"><i class="fa fa-tv"></i> Панель управління</a></li>
                <li class="active">Контакти компанії</li>
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
				<form id="main" class="form-horizontal"  action="/admin_panel/contact-update" method="post" enctype="multipart/form-data" novalidate>
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
									{{ Form::label('description_ru', 'Описание', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
									<div class="col-sm-8">
										<textarea class="form-control" name="description_ru">{{$contact_ru->description}}</textarea>
									</div>
								</div>
							</div>
							<div id="ua" class="tab-pane fade">
								<br />
								<div class="form-group">
									{{ Form::label('description_ua', 'Опис', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
									<div class="col-sm-8">
										<textarea class="form-control" name="description_ua">{{$contact_ua->description}}</textarea>
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
            CKEDITOR.replace('description_ru');
            CKEDITOR.replace('description_ua');
        });
    </script>

@endsection
