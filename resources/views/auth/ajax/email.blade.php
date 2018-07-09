<div id="pgwModalBackdrop" class="pgwModalBackdrop" style="display: block;"></div>
<div id="pgwModal" class="pgwModal">
	<div class="pm-container">
		<div class="pm-body" style="max-width: 660px; margin-top: 65px;">
			<span id="closeModal" class="pm-close">
				<span class="pm-icon"></span>
			</span>
			<div class="pm-title">@lang('auth.new_pass')</div>
			<div class="pm-content">
			
				<div id="AuthForgetAjaxStatus"></div>
				<p class="small">
					@lang('auth.security_text')
				</p>

				<form class="new-password-form" role="form" method="POST" id="postAjaxForgetForm" action="{{ route('password.email') }}">		
					<div class="form-group">
						<label>*E-mail:</label>
						<div class="form-input">
							<input id="emailForgetAjax" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
						</div>
					</div>
					<div class="clearfix"></div>
					<button type="submit" class="submit btnblack small">
						@lang('auth.send') <i class="fa fa-caret-right"></i>
					</button>

					
					<a href="javascript:;" class="btn blue small returnauthAjax">
						@lang('auth.back') <i class="fa fa-caret-left"></i>
					</a>
					
					<a href="javascript:;" class="btnred small register-link pull-right" id="registrationAjax">
						@lang('auth.registration') <i class="fa fa-caret-right"></i>
					</a>
			

				</form>


			</div>
		</div>
	</div>
</div>



{{--
<div id="modalWindow">
    <div class="modal fade in" id="myModal" role="dialog" style="display: block; padding-left: 15px;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
					<span id="closeModal" class="close pull-right" data-dismiss="modal"></span>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">

					<div class="panel panel-default">
						<div class="panel-heading">Reset Password</div>
						<div class="panel-body">
							@if (session('status'))
								<div class="alert alert-success">
									{{ session('status') }}
								</div>
							@endif

							<form class="form-horizontal" role="form" method="POST" id="postAjaxForgetForm" action="{{ route('password.email') }}">
								<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
									<div id="AuthForgetAjaxStatus"></div>
									<label for="email" class="col-md-4 control-label">E-Mail Address</label>

									<div class="col-md-6">
										<input id="emailForgetAjax" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

					
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-6 col-md-offset-4">
										<button type="submit" class="btn btn-primary">
											Send Password Reset Link
										</button>
									</div>
									<button type="submit" id="authAjax" class="btn btn-primary">
										Назад
									</button>
									<button type="submit" id="registrationAjax" class="btn btn-primary">
										Registration
									</button>
								</div>
							</form>
						</div>
					</div>
                </div>
            </div>

        </div>
    </div>
    <div class="modal-backdrop fade in"></div>
</div>
--}}
