<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $cre = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        if(Auth::attempt($cre))
        {
            if(Auth::user()->status !== 'active'){
                $request->session()->flush();

                Session::flash('status', 'failed');
                Session::flash('message', 'Your account is not active yet');
                return redirect()->route('auth.login');
            }else{
                $request->session()->regenerate();
                return redirect()->route('dashboard.index');
            }
        }
        else{
            Session::flash('status', 'failed');
            Session::flash('message', 'Your account is not registered');
            return redirect()->route('auth.login');
        }

        // dd($request->all());
    }
}
