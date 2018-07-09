<?php

namespace App\Http\Controllers\Account;

use App\UserInvoiceData;
use App\UserData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserDataController extends Controller
{
    /**
     * Ensure the user is signed in to access this page
     */
    public function __construct() {

        $this->middleware('auth');

    }

    public function changeInvoiceData(Request $request)
    {

        $this->validate($request, [

            'name' => 'required|min:3|max:255',
            'phone' => 'sometimes|max:13',
            'street' => 'sometimes|max:255',
            'house_number' => 'sometimes|max:5',
            'apartment_number' => 'sometimes|max:5',
            'zip' => 'sometimes|max:6',
            'city' => 'sometimes|max:255',
        ]);

        $data = UserInvoiceData::where('user_id',Auth::id())->first();
        if(!$data)
        {
            $data = new UserInvoiceData;
            $data->user_id = \Auth::id();
            $data->save();
        }
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->street = $request->street;
        $data->house_number = $request->house_number;
        $data->apartment_number = $request->apartment_number;
        $data->zip = $request->zip;
        $data->city = $request->city;
        $data->user_id = Auth::id();

        $data->save();

       return redirect('/customer')->with('message', 'Дані успішно оновленно');
    }

    public function changeUserAccountData(Request $request)
    {

        $this->validate($request, [

            'name' => 'sometimes|max:255',
            'lastname' => 'sometimes|max:255',
            'phone' => 'sometimes|max:13',
            'street' => 'sometimes|max:255',
            'house_number' => 'sometimes|max:5',
            'apartment_number' => 'sometimes|max:5',
            'zip' => 'sometimes|max:6',
            'city' => 'sometimes|max:255',
        ]);

        $data = UserData::where('user_id',Auth::id())->first();
        if(!$data)
        {
            $data = new UserData;
            $data->user_id = \Auth::id();
            $data->save();
        }
        $data->name = $request->name;
        $data->lastname = $request->lastname;
        $data->phone = $request->phone;
        $data->street = $request->street;
        $data->house_number = $request->house_number;
        $data->apartment_number = $request->apartment_number;
        $data->zip = $request->zip;
        $data->city = $request->city;
        $data->user_id = Auth::id();

        $data->save();

        return redirect('/customer')->with('message', 'Дані успішно оновленно');
    }
}
