<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request){
        $programs = Program::all();

        $request->session()->flush();

        return view('landing-page', [
            'programs' => $programs
        ]);
    }

    public function programs(){
        $programs = Program::all();
        return view('landing-programs', [
            'programs' => $programs
        ]);
    }

    public function about(){
        return view('landing-about');
    }

    
}
