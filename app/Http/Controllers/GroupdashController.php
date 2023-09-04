<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Program;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GroupdashController extends Controller
{
    public function index(){
        
        $programs = Program::all();
        $grades = Grade::all();
        
        $otherusers = User::where('grade_id', Auth::user()->grade_id)
        // ->where('id', '!=', Auth::user()->id)
        ->get();
        

        // $users = $grades->user;
        return view('dashboard.group.groupdash', 
        ['grades' => $grades, 
        'programs' => $programs,
        'otherusers' => $otherusers
    
        ]);
        }

        

    public function groupCreatePage(){
        $groups = Grade::all();
        return view('dashboard.group.groupcreate',[
            'groups' => $groups
        ]);
    }

    public function groupCreate(Request $request){
        $request->validate([
            'name' => 'required|unique:grades',
            'class_meeting' => 'required',
        ]);
        $request['name'] = Str::upper($request->name);
        Grade::create($request->all());


        Session::flash('status', 'Success');
        Session::flash('message', 'Successfully Added New Group');

        return redirect('/dashboard/group/list');
    }

    public function groupModifyPage(){
        $groups = Grade::all();
        return view('dashboard.group.groupmodifpage', [
            'groups' => $groups
        ]);
    }

    public function updatePage($id){
        $group = Grade::findOrFail($id);
        return view('dashboard.group.groupupdate', [
            'group' => $group
        ]);
    }

    public function groupUpdate(Request $request, $id){
        $group = Grade::findOrFail($id);
        $group->fill([
            'name' => $request->name,
            'class_meeting' => $request->class_meeting,




            // 'fullname' => $request->input($request->fullname), 
            // 'username' => $request->input($request->username), 
            // 'email' => $request->input($request->email), 
            // 'passwrod' => $request->input(Hash::make($request->password)), 
            // 'phone' => $request->input($request->phone), 
            // 'address' => $request->input($request->address), 
            // 'evidence' => $request->input($request->evidence), 
            // 'program_id' => $request->input($request->program_id), 
            // 'grade_id' => $request->input($request->grade_id), 
        ]);
        $group->save();

        Session::flash('status', 'Success');
        Session::flash('message', 'Successfully Updated Group '. $group->name);
    
        return redirect('/dashboard/group/modify');
    }


    public function groupDelete($id){
        $group = Grade::find($id);

        if($group)
        {
            $group->delete();

            Session::flash('status', 'Success');
            Session::flash('message', 'Successfully Deleted Group');

            return redirect('/dashboard/group/list');

        } else{
            return redirect('/dashboard/group/list');

            Session::flash('status', 'Success');
            Session::flash('message', 'Group Dissapeared');
        }
    }


    public function groupDetail($id){
        $group = Grade::findOrFail($id);
        return view('dashboard.group.groupdetail', [
            'group' => $group
        ]);
    }
}
