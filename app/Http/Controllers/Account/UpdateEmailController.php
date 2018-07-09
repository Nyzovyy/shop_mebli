<?php

namespace App\Http\Controllers\Account;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateEmailController extends Controller
{
    /**
     * Ensure the user is signed in to access this page
     */
    public function __construct() {

        $this->middleware('auth');

    }

    /**
     * Update the password for the user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function change(Request $request)
    {
        $this->validate($request, [

            'password' => 'required|min:6',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        if (Hash::check($request->password, Auth::user()->password)){
        $user = User::find(\Auth::id());
        $user->email = $request->email;
        $user->save();


        Auth::logout();

        return redirect('/');
        }

        $error_change_email = 'Неправильний пароль';
        return back()->withInput()->withErrors(array('err_password' => $error_change_email));


    }
}
