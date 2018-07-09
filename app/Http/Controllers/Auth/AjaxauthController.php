<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\User;
use Carbon\Carbon;
use Mail;

class AjaxauthController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest');
	}
	public function showLoginForm()
	{
		return view('auth.ajax.login');
	}
	public function LoginFormPost(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'email' => 'required|email|max:255',
			'password' => 'required|min:6',
		]);
		if ($validator->fails()){
			return $validator->errors();
		}
		if (\Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
			$card = \Illuminate\Support\Facades\Cookie::get('card');
			if($card){
				$get_card = \App\Card::where('user_id' , $card)->select('id')->get();
				if(count($get_card))
				\App\Card::whereIn('id', $get_card)->update(['user_id' => \Auth::id()]);
				\Illuminate\Support\Facades\Cookie::forget('card');
			}
			return 'success';
		}else{
			return __('auth.no_auth_error');
		}
		
	}
	public function RegisterForm()
	{
		return view('auth.ajax.register');
	} 
	public function RegisterFormPost(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|max:20|min:3|',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:6|confirmed'
		]);
		
		$user = $this->create($request->all());
		if($user) {
			\Auth::login($user, true);
			$card = \Illuminate\Support\Facades\Cookie::get('card');
			if($card){
				$get_card = \App\Card::where('user_id' , $card)->select('id')->get();
				if(count($get_card))
					\App\Card::whereIn('id', $get_card)->update(['user_id' => \Auth::id()]);
					\Illuminate\Support\Facades\Cookie::forget('card');
			}
			return 'success';
		}

	}
	////////////////////////////////////////////////////////////////////////////
	protected function create(array $data)
	{
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			]);
	}
	public function ForgetForm()
	{
		return view('auth.ajax.email');
	}
	public function ForgetFormPost(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'email' => 'required|email|max:255',
		]);
		if ($validator->fails()) {
			return $validator->errors();
		}
		$user = User::where('email' , $request->email)->first();
		if(!$user) return 'no_user';
		$pw_reset = \DB::table('password_resets')->where('email', $request->email)->first();
		if (!$pw_reset) 
		{
			$token = str_random(255);
			$mail_send = $request->email;

			$pw_reset_new = \DB::table('password_resets')->insert(
				['email' => $request->email, 'token' =>  $token, 'created_at' => Carbon::now()]
			);


			Mail::send('auth.ajax.send_email', ['user' => $user , 'token' => $token], function ($message) use ($mail_send) {
				$message->from('test@email.com', 'Test name');
				$message->to($mail_send)->subject('Reset password!');
			});
			return 'success';
		} else {
			return 'email_isset';
		}
	}
	public function passwordRecover($token)
	{
		$pw_reset = \DB::table('password_resets')->where('token', $token)->first();
		if($pw_reset && $pw_reset->token == $token)
		{
			$data['token'] = $pw_reset->token;
			return view('auth.ajax.resetpass')->with($data);
		}else{
			return redirect('/');
		}
		
	}
	public function passwordRecoverPost(Request $request , $token)
	{
		$validator = Validator::make($request->all(), [
			'password' => 'required|min:6|confirmed',
		]);
		if ($validator->fails()) {
			//return $validator->errors();
			return Redirect::back()->withErrors(['err_password']);
		}


		$pw_reset = \DB::table('password_resets')->where('token', $token)->first();
		if($pw_reset && $pw_reset->token == $token)
		{
			$user  = User::where('email' , $pw_reset->email)->first();
			if($user)
			{
				$user->password = bcrypt($request->password);
				$user->save();
				\DB::table('password_resets')->where('token', $token)->delete();
				\Auth::login($user, true);
				return redirect('/cabinet');
			}

		}else{
			return redirect('/');
		}
	}
}
