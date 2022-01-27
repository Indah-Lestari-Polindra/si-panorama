<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\resources\views\auth;
use Session;

class LoginController extends Controller
{
    public function login()
    {

            return view('auth.login');

}

public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect('home');
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
