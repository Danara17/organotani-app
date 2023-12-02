<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function savePersonalInfo(Request $request)
    {

        $saveUser = User::where('id', $request->id)->first();
        $saveUser->username = $request->username;
        $saveUser->name = $request->name;
        $saveUser->gender = $request->gender;
        $saveUser->email = $request->email;
        $saveUser->phone = $request->phone;

        $saveUser->save();

        return redirect()->route('myaccount')->with('success', 'Data Berhasil <strong>diperbarui</strong>');
    }
}