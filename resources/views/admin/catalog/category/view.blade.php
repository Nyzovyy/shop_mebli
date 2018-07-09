@extends('layouts.admin')

@section('head')
    <link rel="stylesheet" href="/admin/css/modal/remodal.css">
    <link rel="stylesheet" href="/admin/css/modal/remodal-default-theme.css">
@stop


@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Каталог
		</h1>
		<ol class="breadcrumb">
			<li><a href="/admin_panel"><i class="fa fa-tv"></i> Панель управління</a></li>
			<li class="active">Каталог</li>
		</ol>
	</section>

    <!-- Main content -->
    <section class="content">
 
		<!-- Main row -->
		<div class="row">

			<div class="col-md-12">
		
				<h3>
					Категорії: 
					<a href="/#" type="button" data-id="0" class="btn btn-warning pull-right add_category">Додати основну категорію</a>
					<div class="clearfix"></div>
				</h3>

				
				{{--вивід категорій за допомогою foreach-----------------------------------------------------------}}
				@if($categories)
				<div class="box-group" id="accordion">
					@foreach($categories as $category)

					<div class="panel box box-primary">
						<div class="box-header with-border">
							<div class="">
								<div data-toggle="collapse"
							   data-parent="#accordion" href="#collapse{{$category->id}}" class="box-title collapsed"><i class="fa fa-fw fa-arrow-down"></i> {{$category->description->name}}</div>

								<div class="category-button-admin pull-right">
									<a href="/#" type="button" data-id="{{$category->id}}" class="btn btn-sm btn-success add_category">
										<i class="fa fa-plus" aria-hidden="true"></i>
									</a>
									<a href="/admin_panel/catalog/{{$category->id}}/update" class="btn btn-sm btn-info"
									   data-toggle="tooltip" data-original-title="Редагувати категорію">
										<i class="fa fa-pencil-square-o"></i>
									</a>
									<a id="{{$category->id}}" href="/admin_panel/catalog/{{$category->id}}/delete"
									   class="btn btn-sm btn-danger removeCategory" data-toggle="tooltip"
									   data-original-title="Видалити категорію" data-id="{{$category->id}}">
										<i class="fa fa-times"></i>
									</a>
									@if ($category->status == \App\Category::CATEGORY_ACTIVE )
										<a href="/admin_panel/catalog/{{$category->id}}/status" class="btn btn-sm btn-warning"
										   data-toggle="tooltip" data-original-title="Деактивувати">
											<i class="fa fa-unlock"></i>
										</a>
									@else
										<a href="/admin_panel/catalog/{{$category->id}}/status" class="btn btn-sm btn-success"
										   data-toggle="tooltip" data-placement="top" title=""
										   data-original-title="Активувати">
											<i class="fa fa-lock"></i>
										</a>
									@endif
								</div>
							</div>
						</div>
						<div id="collapse{{$category->id}}" class="panel-collapse collapse">

							<div class="box-body">

								@if($category->children)
									@foreach($category->children as $sub)
										<div class="lead">
											<a href="/admin_panel/catalog/{{$sub->id}}">
												<i class="fa fa-fw fa-long-arrow-right"></i> {{$sub->description->name}}
											</a>
											<div class="category-button-admin pull-right">
												<a href="/admin_panel/catalog/{{$sub->id}}/update" class="btn btn-sm btn-info"
												   data-toggle="tooltip"
												   data-original-title="Редагувати категорію">
													<i class="fa fa-pencil-square-o"></i>
												</a>
												<a id="{{$sub->id}}" href="#deleteModal"
												   class="deleteArticle btn btn-sm btn-danger"
												   data-toggle="tooltip"
												   data-original-title="Видалити категорію" data-id="{{$sub->id}}">
													<i class="fa fa-times"></i>
												</a>
												@if ($category->status == 1 )
													<a href="#"
													   class="btn btn-sm btn-success"
													   data-toggle="tooltip"
													   data-original-title="">
														<i class="fa fa-lock"></i>
													</a>
												@else
												@if ($sub->status == \App\Category::CATEGORY_ACTIVE )
													<a href="/admin_panel/catalog/{{$sub->id}}/status"
													   class="btn btn-sm btn-warning"
													   data-toggle="tooltip"
													   data-original-title="Деактивувати">
														<i class="fa fa-unlock"></i>
													</a>
												@else
													<a href="/admin_panel/catalog/{{$sub->id}}/status"
													   class="btn btn-sm btn-success"
													   data-toggle="tooltip" data-placement="top" title=""
													   data-original-title="Активувати">
														<i class="fa fa-lock"></i>
													</a>
												@endif
												@endif
											</div>
										</div>
										
										
									
									@endforeach
								@endif
								
							</div>
						</div>
					</div>
					@endforeach
				</div>
				@endif
			</div>
		</div>

    </section>
    <!-- catalogtent -->

</div>

<!-- catalogtent-wrapper -->
<footer class="main-footer">
	<div class="pull-right hidden-xs">
		<b>Version</b> 2.3.8
	</div>
	<strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
</footer>


        <script src="/admin/js/validate/validate-options.js"></script>
        <script>
            $(function () {
                $('.removeCategory').click(function(e){
                    e.preventDefault();
                    var id = $(this).data('id');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: '/admin_panel/catalog/modal/remove/'+id,
                        // data: $(this).serialize()+ '&image=' + $(this).data('image'),
                        success: function (data) {
                            $('#modalWindow').remove();
                            $('#app').append(data);
                        }

                    });
                });

                $('.add_category').click( function (e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'get',
                        url: '/admin_panel/category/create/'+id,
                       // data: $(this).serialize()+ '&image=' + $(this).data('image'),
                        success: function (data) {
                            $('#modalWindow').remove();
                            $('#app').append(data);
                        }

                    });
                });
                $(document).on('click' , '.closeModal' , function () {
                    $('#modalWindow').remove();
                });

                $(document).on('submit' , '#createCategory' , function (e){
                    e.preventDefault();
                    var error = true;
                    var formData = new FormData($('#createCategory')[0]);
                    if($( "input[name='name_ru']" ).val() == ''){
                        $("input[name='name_ru']").css('border-color' , 'red');
                        error = false;
                    }else{
                        $("input[name='name_ru']").css('border-color' , '#d2d6de');
                    }
                    if($( "input[name='name_ua']" ).val() == ''){
                        $("input[name='name_ua']").css('border-color' , 'red');
                        error = false;
                    }else{
                        $("input[name='name_ua']").css('border-color' , '#d2d6de');
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    if(error){

                        $.ajax({
                            type: 'post',
                            url: $(this).attr('action'),
                            data: formData,
                            async: false,
                            cache: false,
                            contentType: false,
                            enctype: 'multipart/form-data',
                            processData: false,
                            success: function (data) {

                                if(data == 'success')
                                {
                                    $('#modalWindow').remove();
                                    window.location.href = '/admin_panel/catalog';
                                }
                            }

                        });

                    }


                });
            });
        </script>
<!-- ./wrapper -->
@endsection
