@extends('layouts.admin')

@section('head')

@stop


@section('content')
    <div class="content-wrapper">
        <div class="row offset">
            <div class="col-lg-10 col-lg-offset-1">

                <div class="profileTimeline">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="loader imagecontainer coverImg">
                                <img src="/admin/img/vox_profile.jpg" alt="Profile Cover"
                                     class="img-responsive coverPic" style="display: block;">
                                <div class="loadGrad"></div>
                            </div>
                            <div id="send-message" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header primary-bg-color">
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                            <h4 class="modal-title">Send Message</h4>
                                        </div>
                                        <form method="post" id="start-con">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input id="userName" type="hidden" value="kashkool">
                                                    <input id="userID" type="hidden" value="2178">
                                                    <input type="text" value="mahmoud" class="form-control" readonly="">
                                                </div>
                                                <div class="form-group">
                                                    <textarea id="newMessage" class="form-control"
                                                              placeholder="Enter you message..." rows="6"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
												<span style="font-size: 12px; vertical-align:middle; margin-right: 15px; display: inline-block;position: relative;top: 4px;">
													<div class="checkbox">
													  <label>
														Enter to send
														<input type="checkbox" id="enterToSend" checked="">
														<span class="checkbox-radio"><i class="CR-icon fa fa-check"></i></span>
													  </label>
													</div>
												</span>
                                                <button type="submit" class="btn btn-success">Send</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="profileText">
                                <h1>{{ $user->name }}</h1>
                                @if(isset($user->account->id))
                                    <hr>
                                    <h3>Ім'я: {{ $user->account->name }} </h3>
                                    <h3>Прізвище: {{ $user->account->lastname }} </h3>
                                    <h3>Місто: {{ $user->account->city }} </h3>
                                    <h3>
                                        Вулиця: {{ $user->account->street.','.' '.$user->account->house_number.'/'.$user->account->apartment_number }} </h3>
                                    <h3>Поштовий індекс: {{ $user->account->zip }} </h3>
                                    <h3>Номер телефону: {{ $user->account->phone }} </h3>
                                @endif
                                @if(isset($user->invoice->id))
                                    <br>
                                    <hr>
                                    <h3>Назва компанії: {{ $user->invoice->name }} </h3>
                                    <h3>Місто: {{ $user->invoice->city }} </h3>
                                    <h3>
                                        Вулиця: {{ $user->invoice->street.','.' '.$user->account->house_number.'/'.$user->account->apartment_number }} </h3>
                                    <h3>Поштовий індекс: {{ $user->invoice->zip }} </h3>
                                    <h3>Номер телефону: {{ $user->invoice->phone }} </h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection