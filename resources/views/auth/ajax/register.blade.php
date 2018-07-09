<div id="pgwModalBackdrop" class="pgwModalBackdrop" style="display: block;"></div>
<div id="pgwModal" class="pgwModal">
	<div class="pm-container">
		<div class="pm-body" style="max-width: 660px; margin-top: 65px;">
			<span id="closeModal" class="pm-close">
				<span class="pm-icon"></span>
			</span>
			<div class="pm-title">@lang('auth.registration')</div>
			<div class="pm-content">
			
				<form class="register-form" role="form" id="AjaxAuthRegister" method="POST" action="{{ route('register') }}">

					<div id="AuthFailedAjaxRegister"></div>


					<div class="form-group text{{ $errors->has('name') ? ' has-error' : '' }}">
						<label>*@lang('auth.name'):</label>
						<input id="nameRegisterAjax" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
					</div>	
					<div class="form-group text{{ $errors->has('email') ? ' has-error' : '' }}">
						<label>*E-mail:</label>
						<input id="emailAjaxRegister" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
					</div>	
					<div class="form-group text{{ $errors->has('password') ? ' has-error' : '' }}">
						<label>*@lang('auth.pass'):</label>
						<input id="passwordAjaxRegister" type="password" class="form-control" name="password" required>
					</div>
					<div class="form-group text">
						<label>*@lang('auth.pass_confirm'):</label>
						<input id="password-confirmAjaxRegister" type="password" class="form-control" name="password_confirmation" required>
					</div>

					<span class="pull-left form-info"><font class="red">*</font> @lang('auth.required_fields')</span>
					
					<button type="submit" class="btnred small pull-right">@lang('auth.sign') <i class="fa fa-caret-right"></i></button>
					<a href="javascript:;" class="btn blue small pull-right returnauthAjax">
						@lang('auth.back') <i class="fa fa-caret-left"></i>
					</a>
					<div class="clearfix"></div>
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
					<form class="form-horizontal" role="form" id="AjaxAuthRegister" method="POST" action="{{ route('register') }}">
					{{ csrf_field() }}
						<div id="AuthFailedAjaxRegisterName"></div>
						
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label">Name</label>

							<div class="col-md-6">
								<input id="nameRegisterAjax" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
							</div>
						</div>
						<div id="AuthFailedAjaxRegisterEmail"></div>
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="col-md-4 control-label">E-Mail Address</label>

							<div class="col-md-6">
								<input id="emailAjaxRegister" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
							</div>
						</div>
						<div id="AuthFailedAjaxRegisterPassword"></div>
						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label for="password" class="col-md-4 control-label">Password</label>

							<div class="col-md-6">
								<input id="passwordAjaxRegister" type="password" class="form-control" name="password" required>
							</div>
						</div>

						<div class="form-group">
							<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

							<div class="col-md-6">
								<input id="password-confirmAjaxRegister" type="password" class="form-control" name="password_confirmation" required>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" id="authAjax" class="btn btn-primary">
									Назад
								</button>
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
	<div class="modal-backdrop fade in"></div>
</div>
--}}