@extends('layouts.admin')

@section('head')
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
                Редагувати категорію
            </h1>
			<ol class="breadcrumb">
				<li><a href="/admin_panel"><i class="fa fa-tv"></i> Панель управління</a></li>
				<li><a href="/admin_panel/catalog"><i class="fa fa-book"></i> Каталог</a></li>
				<li class="active">Редагувати категорію</li>
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
						{{--{{ Form::open(['action' => ['Admin\Catalog\GoodsController@createPost', $category->id], 'files' => true, 'class' => 'form-horizontal', 'id' => 'main', 'novalidate']) }}--}}
						<form id="main" class="form-horizontal"  action="" method="post" enctype="multipart/form-data" novalidate>
							{{ csrf_field() }}
							<div class="box-body">
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#ru"> <img src="/img/flags/ru.png" alt=""> Ru</a></li>
									<li><a data-toggle="tab" href="#ua"> <img src="/img/flags/ua.png" alt=""> Ua</a></li>
								</ul>
								
								<div class="tab-content">
									@if($category_descriptions)
										@foreach($category_descriptions as $category_description)
											<div id="{{$category_description->language}}" class="tab-pane fade in @if($category_description->language == 'ru')active @endif">
												<br />
												<div class="form-group">
														<label class="col-sm-2 control-label" for="usr">Назва:</label>
														<div class="col-sm-5">
															<input type="text" class="form-control" name="name_{{$category_description->language}}" value="{{$category_description->name}}">
														</div>
												</div>
											</div>
										@endforeach
									@endif
									@if(count($category->cover))
											<img src="/files/image/catalog/{{$category->id}}/{{$category->cover}}" alt="">
										@endif
										<div class="form-group">
											<label class="col-sm-2 control-label" id="selectfile">Виберіть фото</label>
											
											<div class="col-sm-5">
												<input type="file" name="image" id="uploadimage">
											</div>
											<!--  <p class="help-block">Example block-level help text here.</p> -->
										</div>
									{{--<div id="ua" class="tab-pane fade">
										<label for="usr">Name:</label>
										<input type="text" class="form-control" name="name_ua" value="">
									</div>--}}

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

@endsection
