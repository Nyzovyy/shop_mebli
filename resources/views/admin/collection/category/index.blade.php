@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Категорії колекцій
		</h1>
		<ol class="breadcrumb">
			<li><a href="/admin_panel"><i class="fa fa-tv"></i> Панель управління</a></li>
			<li class="active">КолекціЇ</li>
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
				
				@if($inter > 0)
				<a href="/admin_panel/collection/category/create" class="btn btn-warning pull-right">Створити категорію колекції</a>
				@else
                <a href="#" class="btn btn-danger pull-right">Спочатку створіть Інтер'єр</a>
                @endif
				<div class="clearfix"></div>
				<br>
				
				@if(count($categories))
					@foreach($categories as $category)
					<div class="panel box box-primary">
					<div class="box-header with-border">
						<div class="box-title5">
							<a  aria-expanded="false" href="/admin_panel/collection/category/{{$category->id}}">{{$category->name_ua}}

								<div class="category-button-admin pull-right">
									<a href="/admin_panel/collection/category/{{$category->id}}/update" class="btn btn-sm btn-info"
									   data-toggle="tooltip" data-original-title="Редагувати категорію">
										<i class="fa fa-pencil-square-o"></i>
									</a>
									<a id="" href="/admin_panel/collection/category/{{$category->id}}/delete"
									   class="btn btn-sm btn-danger removeCategory" data-toggle="tooltip"
									   data-original-title="Видалити категорію" data-id="">
										<i class="fa fa-times"></i>
									</a>

								</div>
							</a>
						</div>
					</div>
					</div>
					@endforeach
					<div class="col-md-2 col-md-offset-5">
						{{ $categories->links() }}
					</div>
					@else
					<div class="well">
						Категорії відсутні
					</div>
					@endif
			</div>
		</div>
		
	</section>
</div>
@endsection
