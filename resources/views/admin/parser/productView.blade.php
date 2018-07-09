<div class="modal fade in" id="modalWindow" role="dialog" style="display: block; padding-left: 15px; overflow-y: auto;">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="closeModal close" data-dismiss="modal">×</button>
                <h4 class="modal-title">{{-- @if($file->has('name')){{$file['name']}}@endif--}}</h4>
            </div>
            <div class="modal-body">

                <form role="form" method="post" data-images="{{$file['images']}}" data-get="{{$get}}" id="ParserSaveProduct" action="/admin_panel/parser/product/create" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if($file->has('images'))
                        @php
                            $q_photo = explode("||", substr($file['images'], 1, -1));
                            $count_photo = count($q_photo);
                        @endphp
                        @if($count_photo > 0)
                            @for($a = 0 ; $a < $count_photo; $a++)
                                <img src="{{$q_photo[$a]}}" class="img-thumbnail" alt="Cinque Terre" width="100" height="100">
                            @endfor

                        @endif
                    @endif
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#ru"> <img src="/img/flags/ru.png" alt=""> Ru</a></li>
                        <li><a data-toggle="tab" href="#ua"> <img src="/img/flags/ua.png" alt=""> Ua</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="ru" class="tab-pane fade in active">
                            <br />
                            <div class="form-group">
                                {{ Form::label('name', 'Имя', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}

                                    <input type="text" name="name_ru" value="@if($file->has('name')){{$file['name']}}  @endif" class="form-control">

                                <div class="col-sm-5 messages"></div>
                            </div>
                            <div class="form-group">
                               {{-- {{ Form::label('description', 'Описание', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
--}}{{--
                                    <textarea class="form-control" name="description_ru">@if($file->has('about')){{ $file['about'] }}@endif</textarea>

                                <div class="col-sm-5 messages"></div>
                            </div>
                        </div>
                        <div id="ua" class="tab-pane fade">
                            <br />
                            <div class="form-group">
                                {{ Form::label('name', 'Ім\'я', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}

                                    <input type="text" name="name_ua" value="@if($file->has('name')){{$file['name']}}  @endif" class="form-control">

                                <div class="col-sm-5 messages"></div>
                            </div>
                            <div class="form-group">
                                --}}{{--{{ Form::label('description', 'Опис', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
--}}{{--
                                    <textarea class="form-control" name="description_ua">@if($file->has('about')){{ $file['about'] }}@endif</textarea>

                                <div class="col-sm-5 messages"></div>
                            </div>
                        </div>

                    </div>

                <p></p>
                    --}}{{--@if($file->has('colors'))
                        @foreach($file['colors'] as $colors)
                            <img src="{{$colors}}" class="img-thumbnail" alt="Cinque Terre" width="30" height="30">
                        @endforeach

                    @endif--}}

                    <p></p>
                    <label for="usr">Ширина:</label>
                    <input type="text" class="form-control" name="width" value="@if(isset($file['parametrs']['width'])){{$file['parametrs']['width']}} @endif">
                    <label for="usr">Глибина:</label>
                    <input type="text" class="form-control" name="depth" value="@if(isset($file['parametrs']['depth'])){{$file['parametrs']['depth']}} @endif">
                    <label for="usr">Висота:</label>
                    <input type="text" class="form-control" name="height" value="@if(isset($file['parametrs']['height'])){{$file['parametrs']['height']}} @endif">

                    <label for="usr">Ціна:</label>
                    <input type="text" class="form-control" name="price" value="">

                    <div class="form-group">
                        <label for="sel1">Select Category:</label>
                        <select class="form-control" name="category" id="sel1">
                            @if(count($categories))
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if(\Cookie::get('admin_category_parser') && \Cookie::get('admin_category_parser') == $category->id) selected @endif>{{$category->description->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default">Зберегти</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>
<script>
    CKEDITOR.editorConfig = function (config) {
        config.language = 'es';
        config.uiColor = '#F7B42C';
        config.height = 300;
        config.toolbarCanCollapse = true;

    };
    CKEDITOR.replace('description_ru');
    CKEDITOR.replace('description_ua');
</script>