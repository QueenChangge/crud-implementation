<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
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
}
