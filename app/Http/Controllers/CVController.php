<?php

namespace App\Http\Controllers;

use App\Models\Civi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CVController extends Controller
{
    public function inputData(){
        return view('dashboard.civi.civi-create');
    }

    public function storeData(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'aboutme' => 'required',
            'email' => 'required|unique:users',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'nationality' => 'required',
            'gender' => 'required',
            'weight' => 'required',
            'hight' => 'required',
            'religion' => 'required',
            'marital_status' => 'required',
            'target_position' => 'required',
            'address' => 'required',
            'phone_number' => 'required|max:15',
        ]);

        if ($request->fullname != Auth::user()->fullname){
            Session::flash('status', 'failed');
            Session::flash('message', 'Maaf, CV yang anda buat tidak sama dengan akun anda saat ini');
            return redirect('/dashboard/cv/input');
        } else{

            // blm ada fitur foto
            $request['user_id'] = Auth::user()->id;
            $request['picture'] = Auth::user()->profile_photo_path;

            Civi::create($request->all());

            return redirect('dashboard/cv/download');
        }
        
    }

    public function cvData()
    {
        $civi = Civi::all();
        return view('dashboard.civi.civi-download', [
            'cv' => $civi
        ]);
    }
}
