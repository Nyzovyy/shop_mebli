@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">

		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Редагувати новину
			</h1>
			<ol class="breadcrumb">
				<li><a href="/admin_panel"><i class="fa fa-tv"></i> Панель управління</a></li>
				<li><a href="/admin_panel/news"><i class="fa fa-newspaper-o"></i> Новини</a></li>
				<li class="active">Редагувати новину</li>
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
						<form id="main" class="form-horizontal"  action="/admin_panel/news/edit/{{$news->id}}" method="post" enctype="multipart/form-data" novalidate>
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
											{{ Form::label('name', 'Заголовок', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
											<div class="col-sm-5">
												{{ Form::text('name', $news_description_ru->name, ['class' => 'form-control', 'placeholder' => 'Заголовок', 'name' => 'name_ru', 'id' => 'name_ru' ,]) }}
											</div>
										</div>
										<div class="form-group{{ $errors->has('description_ru') ? ' has-error' : '' }}">
											{{ Form::label('description', 'Новость', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
											<div class="col-sm-8">
												{{ Form::textarea('description', $news_description_ru->text, ['class' => 'form-control', 'placeholder' => 'Новость', 'name' => 'description_ru', 'id' => 'description_ru']) }}
											</div>
										</div>
										<div class="form-group{{ $errors->has('error_slug_ru') ? ' has-error' : '' }}">
											{{ $errors->first('error_slug_ru') }} {{old('slug_ru')}}
											{{ Form::label('name', 'Ссылка на новость', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
											<div class="col-sm-5">
												{{ Form::text('name', $news_description_ru->slug, ['class' => 'form-control', 'placeholder' => 'Ссылка на новость', 'name' => 'slug_ru', 'id' => 'slug_ru' ,]) }}
											</div>
										</div>
									</div>
									<div id="ua" class="tab-pane fade">
										<br />
										<div class="form-group{{ $errors->has('name_ua') ? ' has-error' : '' }}">
											{{ Form::label('name', 'Заголовок', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
											<div class="col-sm-5">
												{{ Form::text('name', $news_description_ua->name , ['class' => 'form-control', 'placeholder' => 'Заголовок', 'name' => 'name_ua', 'id' => 'name']) }}
											</div>
										</div>
										<div class="form-group{{ $errors->has('description_ua') ? ' has-error' : '' }}">
											{{ Form::label('description', 'Новина', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
											<div class="col-sm-8">
												{{ Form::textarea('description', $news_description_ua->text, ['class' => 'form-control', 'placeholder' => 'Новина', 'name' => 'description_ua', 'id' => 'description']) }}
											</div>
										</div>

										<div class="form-group{{ $errors->has('error_slug_ua') ? ' has-error' : '' }}">
											{{ $errors->first('error_slug_ua') }} {{old('slug_ua')}}
											{{ Form::label('name', 'Лінк на новину', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
											<div class="col-sm-5">
												{{ Form::text('name', $news_description_ua->slug, ['class' => 'form-control', 'placeholder' => 'Лінк на новину', 'name' => 'slug_ua', 'id' => 'slug_ua' ,]) }}
											</div>
										</div>
									</div>

								</div>				

								<br>

								@if(!empty($news->img))
									@php
										$q = explode("||", substr($news->img, 1, -1));
										$count = count($q);
									@endphp
								@endif
								@if(!empty($news->img))
									<div class="text-center">
										@for($i =0; $i< $count; $i++)
										@if($i%3==0) @if($i!=0) </div> @endif @endif
										@if($i%3==0) <div class="row"> @endif 
										<div class="col-md-4">
												<img src="/files/news/images/{{$news->id}}/{{$q[$i]}}" class="img-thumbnail" alt="Cinque Terre" width="304" height="auto">
												<p><a href="/admin_panel/news/remove/img/{{$news->id}}/{{$q[$i]}}">Видалити</a> </p>
										</div>
										@endfor
									</div>
								@endif
								<hr>
								<div class="form-group{{ $errors->has('photos') ? ' has-error' : '' }}">
									{{ $errors->first('photos') }}
									{{ Form::label('img', 'Картинки', ['class' => 'col-sm-2 control-label', 'for' => 'img']) }}
									<div class="col-sm-5">
										<input type="file" name="photos[]" multiple />
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
