@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Товари 
            </h1>
			<ol class="breadcrumb">
				<li><a href="/admin_panel"><i class="fa fa-tv"></i> Панель управління</a></li>
				<li><a href="/admin_panel/parser/index"><i class="fa fa-hand-grab-o"></i> Парсер</a></li>
				<li class="active">Товари</li>
			</ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            {!! $file !!}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.8
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All
        rights
        reserved.
    </footer>

    <!-- ./wrapper -->
    <script>
        $(function () {



        $('.productView').click( function (e) {
            e.preventDefault();


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'post',
                url: '/admin_panel/parser/ajax/get/product'+$(this).attr('href'),
                data: $(this).serialize()+ '&image=' + $(this).data('image'),
                success: function (data) {
                    $('#modalWindow').remove();
                    $('#app').append(data);
                }

            });
        });



          $(document).on('submit' , '#ParserSaveProduct' , function (e){
                e.preventDefault();
                var error = true;
              /*if($( "input[name='price']" ).val() == ''){
                  $("input[name='price']").css('border-color' , 'red');
                  error = false;
              }else{
                  $("input[name='price']").css('border-color' , '#d2d6de');
              }*/
              if($( "input[name='name_ru']" ).val() == ''){
                  $("input[name='name_ru']").css('border-color' , 'red');
                  error = false;
              }else{
                  $("input[name='name_ua']").css('border-color' , '#d2d6de');
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
                    data: $(this).serialize()+ '&images=' + $(this).data('images')+ '&parse_url=' + $(this).data('get'),
                    success: function (data) {

                        if(data == 'success')
                        {
                            $('#modalWindow').remove();
                            notification('','Збережено')
                        }
                    }

                });

                }


            });

        });
        $(document).on('click' , '.closeModal' , function () {
            $('#modalWindow').remove();
        });


    </script>
@endsection
