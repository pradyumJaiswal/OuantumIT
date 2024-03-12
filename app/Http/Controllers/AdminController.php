<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()-> regenerate();
 
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
        


    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
        else{
        return redirect('/')->withSuccess('login to access');
        }
    }

    public function logout()
    {
        session::flush();
        Auth::logout();
        return redirect('/');
    }

}
