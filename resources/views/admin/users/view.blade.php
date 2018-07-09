@extends('layouts.admin')

@section('head')
    <link rel="stylesheet" href="/admin/css/search-admin.css">
@stop


@section('content')
    <div class="content-wrapper">
		<section class="content-header">
			<h1>
				Користувачі
			</h1>
			<ol class="breadcrumb">
				<li><a href="/admin_panel"><i class="fa fa-tv"></i> Панель управління</a></li>
				<li class="active">Список користувачів</li>
			</ol>
		</section>
        <section class="content">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 pull-right" style="margin-bottom:10px">
                        <form>
                            <div class="typeahead-container">
                                <div class="typeahead-field">
									<span class="typeahead-query">
										<input id="search" name="search" type="search" autocomplete="off" value="" required="">
									</span>
                                    <span class="typeahead-button">
										<button type="submit">
											<span class="typeahead-search-icon">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </span>
										</button>
									</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box box-primary box-solid">
                    <div class="box-header" style="padding:10px !important">
                        <div class="row">
                            <div class="col-sm-2 pull-right">
                                <select class="form-control"
                                        onchange="self.location='users.php?opt='+this.options[this.selectedIndex].value+''">
                                    <option value="all" selected="">All</option>
                                    <option value="unblock">Unblocked</option>
                                    <option value="block">Blocked</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive table-bordered">
                            <div id="changeUserType-2178" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                            <h4 class="modal-title">Change User Type</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <select id="2178" class="userRoleDrop form-control">
                                                    <option value="1">Admin</option>
                                                    <option value="2">Moderator</option>
                                                    <option value="0" selected="">User</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a class="change-role-btn-2178 btn btn-success">Submit</a>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <th style="width: 5%">
                                        <input type="checkbox" id="selectAll">
                                    </th>
                                    <th style="width: 20%">Ім'я користувача</th>
                                    <th style="width: 20%">Ім'я, Прізвище</th>
                                    <th style="width: 10%">Статус</th>
                                    <th style="width: 10%">Місто</th>
                                    <th style="width: 15%">Телефон</th>
                                    <th style="width: 220px; float: right;">Actions</th>
                                </tr>

                                @if($users)

                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="selected" name="checkboxvar[]"
                                                       value="2178">
                                            </td>
                                            <td>
                                                <a href="">
                                                    <span class="badge bg-black1" style="width: 30px; height: 30px;
                                                        border-radius: 50%; line-height: 18px; font-size: 30px; background: #3C8DBC;">
                                                        {{ mb_substr($user->name,0,1,'UTF-8') }}
                                                    </span>
                                                </a>
                                                &nbsp;
                                                <a href="/admin_panel/user-profile/{{ $user->id }}">{{ $user->name }}</a>

                                            </td>
                                            <td>
                                                @if(isset($user->account->id))
                                                    {{ $user->account->name }}{{ ' '.$user->account->lastname }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($user->is_admin == 0)
                                                    User
                                                @else($user->is_admin == 1)
                                                    Admin
                                                @endif
                                            </td>
                                            <td>
                                                @if(isset($user->account->id))
                                                    {{ $user->account->city }}
                                                @endif
                                            </td>
                                            <td>
                                                @if(isset($user->account->id))
                                                    {{ $user->account->phone }}
                                                @endif
                                            </td>
                                            <td>
                                                {{--<a href="editUser.php?id=2178">--}}
                                                {{--<button class="btn btn-sm btn-info" data-toggle="tooltip"--}}
                                                {{--data-placement="top" title="" data-original-title="Edit">--}}
                                                {{--<i class="fa fa-pencil-square-o"></i>--}}
                                                {{--</button>--}}
                                                {{--</a>--}}
                                                <a href="/admin_panel/user-delete" class="btn btn-sm btn-danger"
                                                   data-toggle="tooltip"
                                                   data-placement="top" title="" data-original-title="Видалити">
                                                        <i class="fa fa-times"></i>
                                                </a>
                                                @if ($user->ban == \App\User::USER_ACTIVE )
                                                    <a href="/admin_panel/{{$user->id}}/user-status" class="btn btn-sm btn-warning"
                                                       data-toggle="tooltip" data-original-title="Деактивувати">
                                                        <i class="fa fa-unlock"></i>
                                                    </a>
                                                @else
                                                    <a href="/admin_panel/{{$user->id}}/user-status" class="btn btn-sm btn-success"
                                                       data-toggle="tooltip" data-placement="top" title=""
                                                       data-original-title="Активувати">
                                                        <i class="fa fa-lock"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        {{$users->links()}}
                        <div id="controls" class="pull-right" style="margin-top:5px; display:none;">
                            <button class="btn btn-success" id="publish">
                                <i class="fa fa-unlock"></i>
                                <span class="hidden-xs"> Publish </span>
                            </button>
                            <button class="btn btn-warning" id="unpublish">
                                <i class="fa fa-lock"></i>
                                <span class="hidden-xs"> Unpublish </span>
                            </button>
                            <button class="btn btn-success" id="enable">
                                <i class="fa fa-check-square-o"></i>
                                <span class="hidden-xs"> Enable Ads </span>
                            </button>
                            <button class="btn btn-warning" id="disable">
                                <i class="fa fa-ban"></i>
                                <span class="hidden-xs"> Disable Ads </span>
                            </button>
                            <button class="btn btn-success" id="verify">
                                <i class="fa fa-star"></i>
                                <span class="hidden-xs"> Verify </span>
                            </button>
                            <button class="btn btn-warning" id="unverify">
                                <i class="fa fa-star-o"></i>
                                <span class="hidden-xs"> Unverify </span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </section>
    </div>
@endsection