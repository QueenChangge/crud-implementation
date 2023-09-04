<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Program;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index(){
        // if(Auth::user()->role_id == 2){
        //     return view ('dashboard.students', [
        //         'users' => $users
        //     ]);
        // }
        $users = User::latest()
        ->where('role_id', 2)
        ->where('status', 'active')
        // ->whereNotNull('program_id')
        ->paginate(7);

        return view ('dashboard.students', [
            'users' => $users
        ]);
    }

    public function filterIndex(Request $request)
    {
        $fullname = $request->input('fullname');
        $users = User::where('fullname', 'LIKE', '%'.$fullname.'%')
                    ->where('role_id', 2)
                    ->where('status', 'active')
                    // ->whereNotNull('program_id')
                    ->paginate(7);
        return view('dashboard.students', [
            'users' => $users
        ]);
    }



    public function getCreate(){
        return view('dashboard.students-create');
    }

    public function createStudent(Request $request)
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
        
        $hashPassword = Hash::make($request->password);
        $request['password'] = $hashPassword;

        $user = User::create($request->all());


        Session::flash('status', 'Success');
        Session::flash('message', 'Successfully Added '.$user->username. ' Account');

        return redirect('/dashboard/students/create');


    }




    public function modifPage(){
        $users = User::where('role_id', 2)
                ->where('status', 'active')
                ->whereNotNull('grade_id')
                ->get();

        return view('dashboard.students-modify', [
            'users' => $users
        ]);
    }

    public function modif($id){
        $grades = Grade::all();
        // $programs = Program::pluck('name');
        $user = User::findOrFail($id);
        return view('dashboard.students-datamodif', [
            'user' => $user,
            'grades' => $grades,
        ]);
    }

//     public function modifUpdate(Request $request, $id)
// {
//     $user = User::findOrFail($id);

//     $user->fill([
//         'fullname' => $request->input('fullname'), 
//         'username' => $request->input('username'), 
//         'email' => $request->input('email'), 
//         'password' => $request->input('password', Hash::make($request->password)), 
//         'phone' => $request->input('phone'), 
//         'address' => $request->input('address'), 
//         'evidence' => $request->input('evidence'), 
//         'program_id' => $request->input('program_id'), 
//         'grade_id' => $request->input('grade_id'), 
//     ]);
//     $user->save();

//     Session::flash('status', 'Success');
//     Session::flash('message', 'Successfully Updated '. $user->fullname. ' Account');

//     return redirect('/dashboard/modify');
// }


    public function modifUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);
   
        $user->fill([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'evidence' => $request->evidence,
            'grade_id' => $request->grade_id,




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
        $user->save();

        Session::flash('status', 'Success');
        Session::flash('message', 'Successfully Updated '. $user->fullname. ' Account');
    
        return redirect('/dashboard/modify');
    }


    public function modifDelete($id)
    {
        $user = User::find($id);

        if($user)
        {
            $user->delete();

            Session::flash('status', 'Success');
            Session::flash('message', 'Successfully Deleted Account');

            return redirect()->route('dashboard.modify');

        } else{
            return redirect()->route('dashboard.modify');

            Session::flash('status', 'Success');
            Session::flash('message', 'User Dissapeared');
        }
    }





    public function approvPage(){
        $users = User::where('status', 'in progress')
            ->where('grade_id', null)
            // ->where('role_id', 2)
            ->get();

        return view('dashboard.students-approving', [
            'users' => $users
        ]);
    }

    public function confirmed($id)
    {
        
        $grades = Grade::all();
        // $programs = Program::pluck('name');
        $user = User::findOrFail($id);
        return view('dashboard.students-confirmed', [
            'user' => $user,
            
            'grades' => $grades
        ]);
    }

    public function updateConfirmed(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->fill([
            'program_id' => $request->program_id,
            'grade_id' => $request->grade_id,
            'status' => $request->status
        ]);
        $user->save();

        if($user->status == 'active')
        {
            Session::flash('status', 'Success');
            Session::flash('message', 'Successfully Activated '. $user->fullname. ' Account');
        } else{
            Session::flash('status', 'Success');
            Session::flash('message', 'Successfully Changed '. $user->fullname. ' Account');
        }
        
        return redirect('/dashboard/approving');
    }

    public function materialsPage(){

        $materials = Material::all();
        
        return view('dashboard.materials', [
            'materials' => $materials
        ]);
    }

    public function materialsDetail($id)
    {
        $material = Material::findOrFail($id);
        return view('dashboard.materials-detail', [
            'material' => $material
        ]);
    }

    public function materialsCreatePage()
    {
        $materials = Material::all();
        return view('dashboard.materials-create',[
            'materials' => $materials
        ]);
    }

    public function materialsCreate(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:materials',
            'description' => 'required',
            'image' => 'required',
            'icon' => 'required',
        ]);
        
        Material::create($request->all());


        Session::flash('status', 'Success');
        Session::flash('message', 'Successfully Added New Material');

        return redirect('/dashboard/materials/create');


    }

    public function materialsModifyPage()
    {
        $materials = Material::all();
        return view('dashboard.materials-modifypage', [
            'materials' => $materials
        ]);
    }

    public function materialsUpdatePage($id)
    {

        $material = Material::findOrFail($id);
        return view('dashboard.materials-updatepage', [
            'material' => $material
        ]);
    }

    public function materialsUpdate(Request $request, $id)
    {
        $material = Material::findOrFail($id);
        $material->fill([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'icon' => $request->icon


        ]);
        $material->save();

        Session::flash('status', 'Success');
        Session::flash('message', 'Successfully Updated Material '. $material->title);
    
        return redirect('/dashboard/materials/modify');
    }
}

