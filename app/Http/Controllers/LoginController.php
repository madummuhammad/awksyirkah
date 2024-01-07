<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('complete-profile');
        }else{
            $data['title'] = 'Login';
            return view('login', $data);
        }
    }

    public function actionlogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('complete-profile');
        } 
        return Redirect::to('login')->with('error' , 'Email atau Password salah');
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
