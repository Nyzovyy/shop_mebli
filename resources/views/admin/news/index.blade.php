@extends('layouts.admin')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Новини
		</h1>
		<ol class="breadcrumb">
			<li><a href="/admin_panel"><i class="fa fa-tv"></i> Панель управління</a></li>
			<li class="active">Новини</li>
		</ol>
	</section>

    <!-- Main content -->
    <section class="content">
 
		<!-- Main row -->
		<div class="row">

			<div class="col-md-12">

				<a href="/admin_panel/news/create" class="btn btn-warning pull-right">Створити новину</a>
				
				<div class="clearfix"></div>
				<br>
				@if(count($news))
					@foreach($news as $new)
							@if(!empty($new->img))
								@php
									$q = explode("||", substr($new->img, 1, -1));
									$count = count($q);
								@endphp
							@endif
				<div class="well">
					<div class="media">
						<span class="pull-left">
							@if(!empty($new->img))
								<img class="media-object" src="/files/news/images/{{$new->id}}/preview/{{$q[$count-1]}}" style="background-size: cover; width: 200px; height: auto;">
							 @else
								<img class="media-object" src="/files/system/image/no-image.png" style="background-size: cover; width: 200px; height: 200px;">
							@endif
						</span>
						<div class="media-body">
							<h4 class="media-heading">
								<a href="/admin_panel/news/edit/{{$new->id}}">{{$new->description->name}}</a>
							</h4>
							<p>{!!   str_limit($new->description->text, 250) !!}</p>
							<ul class="list-inline list-unstyled">
								<li>
									<span><i class="fa fa-user" aria-hidden="true"></i> {{\_Function::user($new->user_id)}}</span>
								</li>
								<li>|</li>
								<li>
									<span><i class="glyphicon glyphicon-calendar"></i> {{\_Function::timestemp($new->created_at)}} </span>
								</li>
								<li>|</li>
								<li>
									<span><i class="fa fa-times" aria-hidden="true"></i> <a href="/admin_panel/news/delete/{{$new->id}}">Видалити</a></span>
								</li>
							</ul>
						</div>
					</div>
				</div>
				@endforeach
					<div class="col-md-2 col-md-offset-5">
						{{ $news->links() }}
					</div>
				@else
					<div class="well">
						Новини відсутні
					</div>
				@endif
		
			</div>
	   
		</div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
