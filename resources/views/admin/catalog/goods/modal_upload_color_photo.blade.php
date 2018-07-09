<div class="modal fade in" id="modalWindow" role="dialog" style="display: block; padding-left: 15px; overflow-y: auto;">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="closeModal close" data-dismiss="modal">×</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post" id="ColorUpload" action="#" enctype="multipart/form-data">
                    <div class="box-body">
                        <b>Параметри:</b>
                        <hr>
                        @if(count($all_category))
                            @foreach($all_category as $category)


                                        <div class="form-group">
                                            {{ Form::label('height', $category->name_ua, ['class' => 'col-sm-4 control-label', 'for' => 'height']) }}
                                            <div class="col-sm-5">
                                                <select class="form-control" name="select_color[]" id="sel1">
                                                    <option value="">Не вибрано</option>
                                        @foreach($category->colors as $color)>
                                                        <option value="{{$category->id}}:{{$color->id}}">{{ $color->name_ua}}</option>
                                            @endforeach
                                                </select>
                                            </div>
                                        </div>


                                    @endforeach
                            @endif
<div class="clearfix"></div>
                        <hr>
                        <div class="form-group">
                            {{ Form::label('height', 'Ціна', ['class' => 'col-sm-4 control-label', 'for' => 'height']) }}
                            <div class="col-sm-5">
                                <input type="text" name="price" value="0" class="form-control">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group">
                            <label for="exampleInputFile" id="selectfile">Виберіть фото</label>
                            <input type="file" name="image" id="uploadimage">
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Завантажити</button>
                        </div>
                    </div>
                    <!-- /.box-body -->

                </form>
            </div>

        </div>

    </div>
</div>
<script>
    $('#ColorUpload').submit( function (e){
        e.preventDefault();
        var error = true;


        if ($('#uploadimage').get(0).files.length === 0) {
            $("#selectfile").css('color' , 'red');
            error = false;
        }else{
            $("#selectfile").css('color' , 'black');
        }



        var formData = new FormData($('#ColorUpload')[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if(error) {
            $.ajax({
                url: '/admin_panel/catalog/goods/color/photo/{{$id_category}}/upload',
                type: 'post',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                enctype: 'multipart/form-data',
                processData: false,
                success: function (response) {
                    if (response == 'success') {
                        window.location.href = location.href;
                    }

                }
            });
        }
    });
</script>