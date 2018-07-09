@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Редагувати колекцію {{$collection->name_ua}}
		</h1>
		<ol class="breadcrumb">
			<li><a href="/admin_panel"><i class="fa fa-tv"></i> Панель управління</a></li>
			<li><a href="/admin_panel/collection"><i class="fa fa-laptop"></i> Колекції</a></li>
			<li class="active">Редагувати колекцію {{$collection->name_ua}}</li>
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

					<form id="main" class="form-horizontal"  action="/admin_panel/collection/edit/{{$id}}" method="post" enctype="multipart/form-data" novalidate>
						{{ csrf_field() }}
						<div class="box-body">
							<a href="/admin_panel/collection/remove/{{$collection->id}}" class="btn btn-danger pull-right">Видалити колекцію</a>
							<input type="hidden" name="category_id" value="{{$id}}">
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
											{{ Form::text('name', $collection->name_ru, ['class' => 'form-control', 'placeholder' => 'Название', 'name' => 'name_ru', 'id' => 'name_ru' ,]) }}
										</div>
									</div>
									<div class="form-group{{ $errors->has('description_ru') ? ' has-error' : '' }}">
										{{ Form::label('description', 'Описание колекции', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
										<div class="col-sm-8">
											{{ Form::textarea('description', $collection->description_ru, ['class' => 'form-control', 'placeholder' => 'Описание колекции', 'name' => 'description_ru', 'id' => 'description_ru']) }}
										</div>
									</div>
								</div>
								<div id="ua" class="tab-pane fade">
									<br />
									<div class="form-group{{ $errors->has('name_ua') ? ' has-error' : '' }}">
										{{ Form::label('name', 'Назва', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
										<div class="col-sm-5">
											{{ Form::text('name', $collection->name_ua, ['class' => 'form-control', 'placeholder' => 'Назва', 'name' => 'name_ua', 'id' => 'name']) }}
										</div>
									</div>
									<div class="form-group{{ $errors->has('description_ua') ? ' has-error' : '' }}">
										{{ Form::label('description', 'Опис колекції', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
										<div class="col-sm-8">
											{{ Form::textarea('description', $collection->description_ua, ['class' => 'form-control', 'placeholder' => 'Опис колекції', 'name' => 'description_ua', 'id' => 'description']) }}
										</div>
									</div>
								</div>
								@if(count($collection->img))
								<div class="col-sm-2"></div>
								<div class="col-sm-5">
									<img class="img-thumbnail" src="/files/collection/cover/{{$collection->id}}/{{$collection->img}}" alt=""> <br><br>
								</div><div class="clearfix"></div>
								@endif
								<div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
									{{ $errors->first('photos') }}
									{{ Form::label('img', 'Картинка', ['class' => 'col-sm-2 control-label', 'for' => 'img']) }}
									<div class="col-sm-5">
										<input type="file" name="photo" id="uploadimage">
									</div>
								</div>
								@if(count($collection->avatar))
									<div class="col-sm-2"></div>
									<div class="col-sm-5">
										<img class="img-thumbnail" src="/files/collection/avatar/{{$collection->id}}/{{$collection->avatar}}" alt=""> <br><br>
									</div><div class="clearfix"></div>
								@endif
								<div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
									{{ $errors->first('photos') }}
									{{ Form::label('img', 'Аватар(основне фото)', ['class' => 'col-sm-2 control-label', 'for' => 'img']) }}
									<div class="col-sm-5">
										<input type="file" name="avatar" id="uploadimage">
									</div>
								</div>
								<hr>
								<h3>Слайдер</h3>
								<button class="btn btn-success slider"><i class="fa fa-plus" aria-hidden="true"></i> Додати слайд</button>
								<br>
								<br>
								@if(count($contents))
								<div>
									@php($number=1)
									@foreach($contents as $content)
									<div class="box box-solid">
										<div class="box-body">
										@if($content->type == 'pictures')
											<a href="/admin_panel/collection/slider/{{$content->id}}">{{$number}}.&nbsp;<i class="fa fa-photo"></i> Картинка</a> </br>
										   @elseif($content->type == 'pictures+test')
											<a href="/admin_panel/collection/slider/{{$content->id}}">{{$number}}.&nbsp;<i class="fa fa-photo"></i> Картинка + текст</a> </br>
										@else
											<a href="/admin_panel/collection/slider/{{$content->id}}">{{$number}}.&nbsp;<i class="fa fa-photo"></i> Картинка + текст + картинка</a> </br>
										@endif
										</div>
									</div>
									@php($number++)
									@endforeach
								</div>
								@endif
								<hr>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="sel1">Виберіть інтер'єр:</label>
									<div class="col-sm-5">
										<select class="form-control" name="interior_id" id="sel1">
											@if(count($interiors))
												@foreach($interiors as $interior)
													<option value="{{$interior->int_id}}" @if($interior->int_id == $collection->interior_id) selected @endif>{{$interior->name}}</option>
												@endforeach

											@endif
										</select>
									</div>
								</div>
							
								<br>
								<div class="form-group{{ $errors->has('page') ? ' has-error' : '' }}">
									{{ Form::label('name', 'К-сть товарів на сторінку', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
									<div class="col-sm-5">
										{{ Form::text('name', $collection->page , ['class' => 'form-control', 'placeholder' => 'К-сть товарів на сторінку', 'name' => 'page', 'id' => 'page' ,]) }}
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
</div>
    <script>
        $( document ).ready(function() {
        CKEDITOR.editorConfig = function (config) {
            config.language = 'ru';
            config.uiColor = '#F7B42C';
            config.height = 300;
            config.toolbarCanCollapse = true;

        };
        CKEDITOR.replace('description_ru');
        CKEDITOR.replace('description_ua');

        $('.slider').click( function (e) {
            e.preventDefault();
            var data = "<div class='modal fade in' id='modalWindow' role='dialog' style='display: block; padding-left: 15px; overflow-y: auto;'>";
            data += '<div class="modal-dialog">';
            data += '<div class="modal-content">';
            data += '<div class="modal-header">';
            data += '<button type="button" class="closeModal close" data-dismiss="modal">×</button>';
            data += '</div>';
            data += '<div class="modal-body">';
            data += '<div class="form-group">';
            data += '<label for="sel1">Тип слайдера:</label>';
            data += '<select class="form-control" name="slider" id="sl">';
            data += '<option value="pictures" selected>Картинка</option>';
            data += '<option value="pictures+test" >Картинка + текст</option>';
            data += '<option value="pictures+test+pictures" >Картинка + текст + картинка</option>';
            data += '</select>';
            data += '<div id="content_data">';
            data += '</div>';
            data += '</div>';
            data += '<div class="modal-footer">';
            data += '<button type="submit" class="btn btn-success slider-save">Зберегти</button>';
            data += '</div>';
            data += '</div>';
            data += '</div>';
            data += '</div>';
            data += '</div>';
            $('.content-wrapper').append(data);

       /*     $( "#sl" ).change(function() {
                var select = $( "#sl option:selected" ).val();
                if(select == 'pictures'){
                    var datanew = '<p><b>Слайдер (Картинка)</b></p>';
                    datanew += '<div class="form-group">';
                    datanew += '<div class="col-sm-5">';
                    datanew += '<input type="file" name="photos[]" multiple />';
                    datanew += '</div>';
                    datanew += '</div>';
                    $('#content_data').html(datanew);
                }else if(select == 'pictures+test'){
                    var datanew = '<p><b>Картинка + текст</b></p>';
                    datanew += '<div class="form-group">';
                    datanew += '<div class="col-sm-5">';
                    datanew += '<input type="file" name="photos[]" multiple />';
                    datanew += '</div>';
                    datanew += '<p><label for="description" class="col-sm-2 control-label">Текст</label></p>';
                    datanew += '<textarea class="form-control" placeholder="Описание колекции" name="description_ru" id="description_ru" cols="50" rows="10">&lt;p&gt;asdsadASD&lt;/p&gt;</textarea>';
                    datanew += '</div>';
                    $('#content_data').html(datanew);
                }else{

                }
            });*/




            $('.slider-save').click( function (e) {
                e.preventDefault();
                var select = $( "#sl option:selected" ).val();
             $.post( "/admin_panel/collection/addslider", { id_collection: "{{$id}}" , type: select })
                        .done(function(  ) {
                            location.reload();
                        });
            });
        });
/////////////////////////////////////////

            ////////////////////////////
    $(document).on('click', '.close' , function (e) {
        e.preventDefault();
        $('#modalWindow').remove();
    });
        });
    </script>
@endsection
