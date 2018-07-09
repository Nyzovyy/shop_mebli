$(function () {
	function validateEmail(email) {
		var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(email);
	}
	//////////load auth modal form///////////////////////////////
	/*$(document).on('click', '.username-header', function(e) {
		e.preventDefault();

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			type: 'post',
			url: '/authajax/login',
			data: $(this).serialize(),
			success: function (data) {
				$('body').append(data);
			}

		});

	});*/
    /////load auth modal form inside///////////////////////////////
	$(document).on('click' , '.authAjax' , function(e) {
    //$('.authAjax').click( function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            url: '/authajax/login',
            data: $(this).serialize(),
            success: function (data) {
                $('#pgwModal').remove();
				$('#pgwModalBackdrop').remove();
				$('body').append(data);
            }

        });

    });
	$(document).on('click' , '.returnauthAjax' , function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            url: '/authajax/login',
            data: $(this).serialize(),
            success: function (data) {
                $('#pgwModal').remove();
				$('#pgwModalBackdrop').remove();
				$('body').append(data);
            }

        });

    });
	/////post auth ///////////////////////////////////////////////////
	$(document).on('submit', '#AjaxAuthPost', function(e) {
		e.preventDefault();

		$('#AuthFailedAjax').html('');
		var errorMailLang = $(this).data('erroremail');
		var errorpasslengthLang = $(this).data('passlength');
		var errorauth = $(this).data('errorauth');
		if(!validateEmail($('#emailAuth').val()) || $('#emailAuth').val().length < 1){
			$('#AuthFailedAjax').html(errorMailLang);
			$('#AuthFailedAjax').addClass('alert alert-danger');
		}
		if($('#passwordAuth').val().length < 4){
			$('#AuthFailedAjax').html(errorpasslengthLang);
			$('#AuthFailedAjax').addClass('alert alert-danger');
		}
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: 'post',
			url: '/authajax/login/post',
			data: $(this).serialize(),
			success: function (data) {
                if(data == 'success') {
                    window.location.href = '/';
                }else{
                    $('#AuthFailedAjax').html(data);
                    $('#AuthFailedAjax').addClass('alert alert-danger');
                }
			},error: function(XMLHttpRequest, textStatus, errorThrown) {
				//process validation errors here.
				var error = JSON.parse( XMLHttpRequest.responseText); //this will get the errors response data.
				var errorFull = error.errors;
				var errorsHtml = '<div class="alert alert-danger"><ul>';
				for(erro in  errorFull){
					errorsHtml += '<li>' + errorFull[erro] + '</li>'; //showing only the first error.
				}
				errorsHtml += '</ul></di>';
				$( '#AuthFailedAjax' ).html( errorsHtml ); //appending to a <div id="form-errors">
			}

		});

	});
	//////register form ajax///////////////////////////////////////////////////
	$(document).on('click' , '#registrationAjax' , function(){

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			type: 'post',
			url: '/authajax/register',
			data: $(this).serialize(),
			success: function (data) {
                $('#pgwModal').remove();
				$('#pgwModalBackdrop').remove();
				$('#app').append(data);
			}
		});
	});
		/////post register//////////////////////////////////////////////
		$(document).on('submit', '#AjaxAuthRegister', function(e) {
			e.preventDefault();

			$('#AuthFailedAjaxRegister').html('');

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({
					type: 'post',
					url: '/authajax/register/post',
					data: $(this).serialize(),
					success: function (data) {
						if(data == 'success'){
                            window.location.href = '/';
                        }
			},error: function(XMLHttpRequest, textStatus, errorThrown) {
						//process validation errors here.
						var error = JSON.parse( XMLHttpRequest.responseText); //this will get the errors response data.
						var errorFull = error.errors;
						var errorsHtml = '<div class="alert alert-danger"><ul>';
						for(erro in  error){
							errorsHtml += '<li>' + error[erro] + '</li>'; //showing only the first error.
						}
						console.log(error);
						errorsHtml += '</ul></di>';
						$( '#AuthFailedAjaxRegister' ).html( errorsHtml ); //appending to a <div id="form-errors">
					}

		});

		});
    
    //////forget password/////////////////////////////////////////////////////////
    $(document).on('click' , '#authAjaxForgetPassword' , function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            url: '/authajax/forgetpassword',
            data: $(this).serialize(),
            success: function (data) {
                $('#pgwModal').remove();
				$('#pgwModalBackdrop').remove();
                $('#app').append(data);
            }
        });
    });
    /////post register/////////////////////////////////////////////
    $(document).on('submit', '#postAjaxForgetForm', function(e) {
        e.preventDefault();

        $('#AuthForgetAjaxStatus').html('');


        var errorMailLang = $(this).data('erroremail');
        var errorpasslengthLang = $(this).data('passlength');

        var postFalse = false;
        if(!validateEmail($('#emailForgetAjax').val()) || $('#emailForgetAjax').val().length < 1)
        {
            postFalse = true;
            $('#AuthForgetAjaxStatus').html('not correct email');
            $('#AuthForgetAjaxStatus').addClass('alert alert-danger');
        }

        if(postFalse == false)
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'post',
                url: '/authajax/forgetpassword/post',
                data: $(this).serialize(),
                success: function (data) {
                    if(data == 'success'){
                        $('#AuthForgetAjaxStatus').html('Email send');
                        $('#AuthForgetAjaxStatus').addClass('alert alert-succsess');
                    }else if(data == 'email_isset'){
                        $('#AuthForgetAjaxStatus').html('Email isset');
                        $('#AuthForgetAjaxStatus').addClass('alert alert-danger');
                    }else if(data == 'no_user'){
                        $('#AuthForgetAjaxStatus').html('Not found User');
                        $('#AuthForgetAjaxStatus').addClass('alert alert-danger');
                    }else{
                        for(index in data){
                           $('#AuthForgetAjaxStatus').html(data[index]);
                           $('#AuthForgetAjaxStatus').addClass('alert alert-danger');
                        }
                    }
                }

            });
        }
    });
////////////////////close form///////////////////////////////////////
    $(document).on('click' , '#closeModal' , function(){
			$('#pgwModal').remove();
			$('#pgwModalBackdrop').remove();
		});

	});