<div id="pgwModalBackdrop" class="pgwModalBackdrop" style="display: block;"></div>
<div id="pgwModal" class="pgwModal">
	<div class="pm-container">
		<div class="pm-body" style="max-width: 660px; margin-top: 65px;">
			<span id="closeModal" class="pm-close">
				<span class="pm-icon"></span>
			</span>
			<div class="pm-title">@lang('auth.sign_in')</div>
			<div class="pm-content">
			
				<form class="login-form" id="AjaxAuthPost" data-errorauth = "error email lang text" data-erroremail = "error email lang text" data-passlength = "small password lang text" role="form" method="POST" action="">
					{{ csrf_field() }}
					<div id="AuthFailedAjax"></div>
					
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group text{{ $errors->has('email') ? ' has-error' : '' }}">
								<label>*E-mail:</label>
								<input id="emailAuth" type="email" class="form-control" name="email" value="{{ old('email') }}" required >
							</div>	
							<div class="form-group text{{ $errors->has('password') ? ' has-error' : '' }}">
								<label>*@lang('auth.pass'):</label>
								<input id="passwordAuth" type="password" class="form-control" name="password" required>
							</div>
							<a href="javascript:;" id="authAjaxForgetPassword" class="new-password pull-left">@lang('auth.pass_forgot')</a>
							<button type="submit" class="btnblack small pull-right">
								@lang('auth.login') <i class="fa fa-caret-right"></i>
							</button>
							<div class="clearfix"></div>			
						</div>
						<div class="col-sm-4">
							<p>@lang('auth.no_acc')</p>
							<a href="javascript:;" class="btnred small register-link" id="registrationAjax">
								@lang('auth.registration') <i class="fa fa-caret-right"></i>
							</a>
							<div class="clearfix"></div>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>




{{--
<div id="modalWindow">
	<div class="modal fade in" id="myModal" role="dialog" style="display: block; padding-left: 15px; z-index: 10000">
		<div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<span id="closeModal" class="close pull-right" data-dismiss="modal"></span>
					<h4 class="modal-title">Modal Header</h4>
				</div>
				<div class="modal-body">
				   <form class="form-horizontal" id="AjaxAuthPost" data-errorauth = "error email lang text" data-erroremail = "error email lang text" data-passlength = "small password lang text" role="form" method="POST" action="">
						{{ csrf_field() }}
						<div id="AuthFailedAjax"></div>

						
					<div style="display: none;" class="row">	
					<div class="col-md-9">	
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="col-md-4 control-label">E-Mail Address</label>

							<div class="col-md-6">
								<input id="emailAuth" type="email" class="form-control" name="email" value="{{ old('email') }}" required >

							</div>
						</div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label for="password" class="col-md-4 control-label">Password</label>

							<div class="col-md-6">
								<input id="passwordAuth" type="password" class="form-control" name="password" required>
							</div>
						</div>



						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Login
								</button>

								<a class="btn btn-link" id="authAjaxForgetPassword">
									Forgot Your Password?
								</a>
							</div>
						</div>
						 
					</div>
						
					<div class="col-md-3">
						<div class="form-groupe">	
							<p>У Вас еще нет аккаунта?</p><br>
							<button type="submit" id="registrationAjax" class="btn btn-primary pt-10">
								Registration
							</button>
						</div>
					</div>
					</div>
					
					
					
					
					
	<div class="row" id="login-form">
		<div class="col-sm-8">
            <div class="form-group text">
                <label>*E-mail:</label>
                <input type="text" class="form-control" name="email" value="" data-valid="required email">
            </div>	
            <div class="form-group text">
                <label>*Hasło:</label>
                <input type="password" name="password" class="form-control" value="" data-valid="required">
            </div>
            <a href="" id="new-password" class="pull-left">Zapomniałem hasła</a>
            <button type="submit" class="btnblack small pull-right">Zaloguj się <i class="fa fa-caret-right"></i></button>
            <div class="clearfix"></div>			
		</div>
		<div class="col-sm-4">
			<p>У Вас еще нет аккаунта?</p>
			<a href="" class="btnred small pull-right" id="register-link">Zarejestruj się <i class="fa fa-caret-right"></i></a>
			<div class="clearfix"></div>
		</div>
	</div>					
					
					
					
					
					
					
					
					
						 
					</form>
				</div>
			</div>
		  
		</div>
	</div>
	<div class="modal-backdrop fade in"></div>
</div>--}}