@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Колекції
		</h1>
		<ol class="breadcrumb">
			<li><a href="/admin_panel"><i class="fa fa-tv"></i> Панель управління</a></li>
			<li class="active">Колекції</li>
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
				
				<a href="/admin_panel/collection/create/{{$id}}" class="btn btn-warning pull-right">Створити  колекцію</a>
				<div class="clearfix"></div>
				<br>
				
				@if(count($collections))
					@foreach($collections as $collection)
						<div class="well">
							<div class="media">
								<span class="pull-left">
									@if(!empty($collection->img))
										<img class="media-object" src="/files/collection/cover/{{$collection->id}}/{{$collection->img}}" style="background-size: cover; width: 200px; height: auto;">
									@else
										<img class="media-object" src="/files/system/image/no-image.png" style="background-size: cover; width: 200px; height: 200px;">
									@endif
								</span>
								<div class="media-body">
									<h4 class="media-heading">
										<a href="/admin_panel/collection/edit/{{$collection->id}}">{{$collection->name_ua}}</a>
									</h4>
									<p>{!!   str_limit($collection->description_ua, 250) !!}</p>
									<ul class="list-inline list-unstyled">

										<li>|</li>
										<li>
											<span><i class="glyphicon glyphicon-calendar"></i> {{\_Function::timestemp($collection->created_at)}} </span>
										</li>

									</ul>
								</div>
							</div>
						</div>
					@endforeach
					<div class="col-md-2 col-md-offset-5">
						{{ $collections->links() }}
					</div>
				@else
					<div class="well">
						Колекції відсутні
					</div>
				@endif
			
			</div>
		</div>
	</section>
</div>
@endsection
