<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index(){
        $users = User::all();
        return view('dashboard.profile', [
            'users' => $users
        ]);
    }

    public function updateProfile(Request $request, $id){
        $user = User::findOrFail($id);
   
        $user->fill([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);


        $user->save();

        Session::flash('status', 'Success');
        Session::flash('message', 'Successfully Updated '. $user->username. ' Account');
    
        return redirect('/dashboard/profile/{$id}');
    }
}
