<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function register()
    {
        return view('register');
    }

    public function store(Request $request){
        $request->validate([
            'fullname' => 'required',
            'username' => 'required|unique:users|max:20',
            'email' => 'required|unique:users',
            'password' => 'required',
            'address' => 'required',
            'phone' => 'required|max:15',
            'evidence' => 'required'
        ]);

        $newName = '';
        if($request->file('evidence')){
            $extension = $request->file('evidence')->getClientOriginalExtension();
            $newName = $request->phone.'-'.now()->timestamp.'.'.$extension;
            // pengennya pake slug tapi slugnya blm jadi karena datanya belum terinput
            $request->file('evidence')->storeAs('cover', $newName);
        }

        $request['cover'] = $newName;

        
        $hashPassword = Hash::make($request->password);
        $request['password'] = $hashPassword;

        $request['profile_photo_path'] = "face7.jpg";

        $user = User::create($request->all());
        //proses verifikasi email
        event(new Registered($user));
        // // dd('masuk');
        Auth::login($user);
        
        return redirect('/email/verify');
    }

    public function login(){
        return view('login');
    }

    public function authenticating(Request $request)
    {
        $cre = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        if(Auth::attempt($cre))
        {
            if(Auth::user()->status != 'active'){
                $request->session()->flush();

                Session::flash('status', 'failed');
                Session::flash('message', 'Your account is not active yet');
                return redirect('/login');
            }else{
                $request->session()->regenerate();
                return redirect('/dashboard/students/list');
            }
            
            
            // if(Auth::user()->role_id == 1){
            //     return redirect('/dashboard');
            // } else{
            //     return redirect('/dashboard');
            // }


        }
        else{
            Session::flash('status', 'failed');
            Session::flash('message', 'Your account is not registered');
            return redirect('/login');
        }

        // dd($request->all());
    }

    public function logout(Request $request)
    {
        // request() tu sama kek $request

        // Auth::logout();
        // request()->session()->invalidate();
        // request()->session()->regenerateToken();
        // return redirect('/login');
        // // dd($request);
        $request->session()->flush();
        return redirect('/login');
        
    }
}
