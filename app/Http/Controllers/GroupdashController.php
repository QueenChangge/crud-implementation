<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GroupdashController extends Controller
{
    public function index(){
        $grades = Grade::with('user')->get();
        // $users = $grades->user;
        return view('dashboard.group.groupdash', 
    ['grades' => $grades]);
    }
}
