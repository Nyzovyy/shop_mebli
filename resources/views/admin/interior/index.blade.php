@extends('layouts.admin')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Інтер'єри
		</h1>
		<ol class="breadcrumb">
			<li><a href="/admin_panel"><i class="fa fa-tv"></i> Панель управління</a></li>
			<li class="active">Інтер'єри</li>
		</ol>
	</section>

    <!-- Main content -->
    <section class="content">
 
		<!-- Main row -->
		<div class="row">

			<div class="col-md-12">

				<a href="/admin_panel/interior/create" class="btn btn-warning pull-right">Створити інтер'єр</a>
				<div class="clearfix"></div>
				<br>
				@if(count($interiors))
					@foreach($interiors as $interior)
				<div class="well">
					<div class="media">
						<span class="pull-left">
						@if(!empty($interior->img))
							<img class="media-object" src="/files/interior/images/{{$interior->id}}/preview/{{$interior->img}}" style="background-size: cover; width: 200px; height: auto;">
						@endif
						</span>
						<div class="media-body">
							<h4 class="media-heading">
								<a href="/admin_panel/interior/edit/{{$interior->id}}">{{$interior->description->name}}</a>
							</h4>
							<ul class="list-inline list-unstyled">
								<li>
									<span><i class="glyphicon glyphicon-calendar"></i> {{\_Function::timestemp($interior->created_at)}} </span>
								</li>
								<li>|</li>
								<li>
									<span><i class="fa fa-times" aria-hidden="true"></i> <a href="/admin_panel/interior/delete/{{$interior->id}}">Видалити</a></span>
								</li>
							</ul>
						</div>
					</div>
				</div>
                @endforeach
                    <div class="col-md-2 col-md-offset-5">
                        {{ $interiors->links() }}
                    </div>
                @else

                    <div class="well">
                        Інтер'єри відсутні
					</div>
                @endif
                </div>
		
			</div>
	   
		</div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
