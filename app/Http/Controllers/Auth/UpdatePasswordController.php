<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UpdatePasswordController extends Controller
{
    /*
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
            'password' => 'required|confirmed|min:6',
            'password_again' => 'sometimes|required_with:password',
        ]);

        $user = User::find(\Auth::id());
        $user->password = bcrypt($request->password);
        $user->save();
        Auth::logout();

        return redirect('/');
    }
}
