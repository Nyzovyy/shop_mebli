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
                        <div class="form-group">
                            <img src="/img/flags/ru.png" alt=""> Название цвета
                            <input type="text" name="name_ru_color" value="" class="form-control">
                            <img src="/img/flags/ua.png" alt=""> Назва кольору
                            <input type="text" name="name_ua_color" value="" class="form-control">
                        </div>


<div class="clearfix"></div>
                        <div class="form-group clearfix">
                            <label for="exampleInputFile" id="selectfilecolor">Виберіть колір</label>
                            <input type="file" name="image_color_pictures" id="uploadimagecolor">
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
        if($( "input[name='name_ru_color']" ).val() == ''){
            $("input[name='name_ru_color']").css('border-color' , 'red');
            $('.nav a[href="#ru"]').tab('show');
            $("input[name='name_ru_color']").focus();
            error = false;
        }else{
            $("input[name='name_ru_color']").css('border-color' , '#d2d6de');
        }
        if($( "input[name='name_ua_color']" ).val() == ''){
            $("input[name='name_ua_color']").css('border-color' , 'red');
            $('.nav a[href="#ua"]').tab('show');
            $("input[name='name_ua_color']").focus();
            error = false;
        }else{
            $("input[name='name_ua_color']").css('border-color' , '#d2d6de');
        }



        if ($('#uploadimagecolor').get(0).files.length === 0) {
            $("#selectfilecolor").css('color' , 'red');
            error = false;
        }else{
            $("#selectfilecolor").css('color' , 'black');
        }

        var formData = new FormData($('#ColorUpload')[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if(error) {
            $.ajax({
                url: '/admin_panel/catalog/goods/color/{{$id_category}}/upload',
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