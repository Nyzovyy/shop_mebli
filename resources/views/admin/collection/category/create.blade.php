@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Створити категорію колекції
			</h1>
			<ol class="breadcrumb">
				<li><a href="/admin_panel"><i class="fa fa-tv"></i> Панель управління</a></li>
				<li><a href="/admin_panel/collection"><i class="fa fa-laptop"></i> Колекції</a></li>
				<li class="active">Створити категорію</li>
			</ol>
		</section>

        <!-- Mcatalogtent -->
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
						<form id="main" class="form-horizontal"  action="/admin_panel/collection/category/create" method="post" enctype="multipart/form-data" novalidate>
							{{ csrf_field() }}
							<div class="box-body">
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#ru"> <img src="/img/flags/ru.png" alt=""> Ru</a></li>
									<li><a data-toggle="tab" href="#ua"> <img src="/img/flags/ua.png" alt=""> Ua</a></li>
								</ul>
								<div class="tab-content">
									<div id="ru" class="tab-pane fade in active">
										<br />
										<div class="form-group{{ $errors->has('name_ru') ? ' has-error' : '' }}">
											{{ Form::label('name', 'Название', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
											<div class="col-sm-5">
												{{ Form::text('name', old('name_ru'), ['class' => 'form-control', 'placeholder' => 'Название', 'name' => 'name_ru', 'id' => 'name_ru' ,]) }}
											</div>
											<div class="col-sm-5 messages"></div>
										</div>

									</div>
									<div id="ua" class="tab-pane fade">
										<br />
										<div class="form-group{{ $errors->has('name_ua') ? ' has-error' : '' }}">
											{{ Form::label('name', 'Назва', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
											<div class="col-sm-5">
												{{ Form::text('name', old('name_ua'), ['class' => 'form-control', 'placeholder' => 'Назва', 'name' => 'name_ua', 'id' => 'name']) }}
											</div>
											<div class="col-sm-5 messages"></div>
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
				</div>
			</div>
		</section>
@endsection
