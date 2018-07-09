@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">

		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Редагувати інтер'єр
			</h1>
			<ol class="breadcrumb">
				<li><a href="/admin_panel"><i class="fa fa-tv"></i> Панель управління</a></li>
				<li><a href="/admin_panel/interior"><i class="fa fa-photo"></i> Інтер'єри</a></li>
				<li class="active">Редагувати інтер'єр</li>
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

					<div class="box box-primary">
						<!-- form start -->
						<form id="main" class="form-horizontal"  action="/admin_panel/interior/edit/{{$interior->id}}" method="post" enctype="multipart/form-data" novalidate>
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
									<div id="ru" class="tab-pane fade in active">
										<br />
										<div class="form-group{{ $errors->has('name_ru') ? ' has-error' : '' }}">
											{{ Form::label('name', 'Название', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
											<div class="col-sm-5">
												{{ Form::text('name', $interior_ru->name, ['class' => 'form-control', 'placeholder' => 'Название', 'name' => 'name_ru', 'id' => 'name_ru' ,]) }}
											</div>
										</div>
										{{--<div class="form-group{{ $errors->has('error_slug_ru') ? ' has-error' : '' }}">
											{{ $errors->first('error_slug_ru') }} {{old('slug_ru')}}
											{{ Form::label('name', 'Ссылка ', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
											<div class="col-sm-5">
												{{ Form::text('name', $interior_ru->slug, ['class' => 'form-control', 'placeholder' => 'Ссылка на новость', 'name' => 'slug_ru', 'id' => 'slug_ru' ,]) }}
											</div>
										</div>--}}
									</div>
									<div id="ua" class="tab-pane fade">
										<br />
										<div class="form-group{{ $errors->has('name_ua') ? ' has-error' : '' }}">
											{{ Form::label('name', 'Назва', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
											<div class="col-sm-5">
												{{ Form::text('name', $interior_ua->name , ['class' => 'form-control', 'placeholder' => 'Назва', 'name' => 'name_ua', 'id' => 'name']) }}
											</div>
										</div>
										{{--<div class="form-group{{ $errors->has('error_slug_ua') ? ' has-error' : '' }}">
											{{ $errors->first('error_slug_ua') }} {{old('slug_ua')}}
											{{ Form::label('name', 'Лінк ', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
											<div class="col-sm-5">
												{{ Form::text('name', $interior_ua->slug, ['class' => 'form-control', 'placeholder' => 'Лінк на новину', 'name' => 'slug_ua', 'id' => 'slug_ua' ,]) }}
											</div>
										</div>--}}
									</div>

								</div>				

								<br>
								

								@if(!empty($interior->img))
									<div class="text-center">
										<img src="/files/interior/images/{{$interior->id}}/preview/{{$interior->img}}" class="img-thumbnail" alt="Cinque Terre" width="304" height="auto">
									</div>
									<hr>
								@endif
								<div class="form-group{{ $errors->has('photos') ? ' has-error' : '' }}">
									{{ $errors->first('photos') }}
									{{ Form::label('img', 'Картинки', ['class' => 'col-sm-2 control-label', 'for' => 'img']) }}
									<div class="col-sm-5">
										<input type="file" name="photo" id="uploadimage">
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
					</div>
				
				</div>
		   
			</div>
			<!-- /.row (main row) -->

		</section>
		<!-- /.content -->	

@endsection