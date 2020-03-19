<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Users;
use DB;
use Auth;
use Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('email','password_hash'))) {
            return redirect('/data_santri');
        }
        return redirect('/login')->with('die','Inputan Tidak Valid');
        // $validate_admin = DB::table('user')
        //                     ->select('email')
        //                     ->where('email', $request->input('email'))
        //                     ->first();

        // if ($validate_admin && Hash::check(Input::get('password_hash'), $validate_admin->password_hash)) {
        //     return redirect('/data_santri');
        // }
        // return redirect('/login')->with('die','Inputan Tidak Valid');
    }

    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
