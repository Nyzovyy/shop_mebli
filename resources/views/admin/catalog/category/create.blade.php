<div class="modal fade in" id="modalWindow" role="dialog" style="display: block; padding-left: 15px; overflow-y: auto;">
    <div class="modal-dialog">

        <!-- Mocatalogtent-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="closeModal close" data-dismiss="modal">×</button>
				<h4 class="modal-title"> Додати категорію</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post"  id="createCategory" action="/admin_panel/category/create/{{$id}}" enctype="multipart/form-data">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#ru"><img src="/img/flags/ru.png" alt=""> Ru</a></li>
                        <li><a data-toggle="tab" href="#ua"><img src="/img/flags/ua.png" alt=""> Ua</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="ru" class="tab-pane fade in active">
                            <label for="usr">Название:</label>
                            <input type="text" class="form-control" name="name_ru" value="">
                        </div>
                        <div id="ua" class="tab-pane fade">
                            <label for="usr">Назва:</label>
                            <input type="text" class="form-control" name="name_ua" value="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile" id="selectfile">Виберіть фото</label>
                            <input type="file" name="image" id="uploadimage">

                            <!--  <p class="help-block">Example block-level help text here.</p> -->
                        </div>
                    </div>


            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Зберегти</button>
            </div>
            </form>
            </div>
        </div>

    </div>

</div>

