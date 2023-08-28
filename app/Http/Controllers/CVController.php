<?php

namespace App\Http\Controllers;

use App\Models\Civi;
use App\Models\User;
use App\Models\Course;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Achievement;
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

            return redirect('/dashboard/cv/download');
        }
        
    }

    public function cvData()
    {
        $civis = Civi::all();
        return view('dashboard.civi.civi-download', [
            'civis' => $civis
        ]);
    }

    public function education(){
        $edus = Education::all();
        // dd(Auth::user()->civi->id);

        return view('dashboard.civi.civi-education', [
            'edus' => $edus
        ]);
    }

    public function educationInput(Request $request){

        $request->validate([
            'range_time' => 'required',
            'spesific_education' => 'required',
        ]);

        $request['civi_id'] = Auth::user()->civi->id;

        Education::create($request->all());

        return redirect('/dashboard/cv/education');

    }

    public function educationDelete($id){
        $education = Education::find($id);

        if($education)
        {
            $education->delete();

            Session::flash('status', 'Success');
            Session::flash('message', 'Successfully Deleted Spesific Education');

            return redirect('/dashboard/cv/education');

        } else{

            Session::flash('status', 'Failed');
            Session::flash('message', 'Spesific Education Dissapeared');

            return redirect('/dashboard/cv/education');
        }
    }



    // -------------------------

    public function experience(){
        $expers = Experience::all();
        // dd(Auth::user()->civi->id);

        return view('dashboard.civi.civi-experience', [
            'expers' => $expers
        ]);
    }

    public function experienceInput(Request $request){

        $request->validate([
            'title' => 'required',
            'position' => 'required',
            'spesific_range_time' => 'required',
            'responsibility_1' => 'required',
            'responsibility_2' => 'required',
            'responsibility_3' => 'required'
        ]);

        $request['civi_id'] = Auth::user()->civi->id;

        Experience::create($request->all());

        return redirect('/dashboard/cv/experience');

    }

    public function experienceDelete($id){
        $experience = Experience::find($id);

        if($experience)
        {
            $experience->delete();

            Session::flash('status', 'Success');
            Session::flash('message', 'Successfully Deleted Experience');

            return redirect('/dashboard/cv/experience');

        } else{

            Session::flash('status', 'Failed');
            Session::flash('message', 'Experience Dissapeared');

            return redirect('/dashboard/cv/experience');
        }
    }



    // ---------------------------------------------------------
    public function achievement(){
        $achieves = Achievement::all();
        // dd(Auth::user()->civi->id);

        return view('dashboard.civi.civi-achievement', [
            'achieves' => $achieves
        ]);
    }

    public function achievementInput(Request $request){

        $request->validate([
            'name' => 'required',
        ]);

        $request['civi_id'] = Auth::user()->civi->id;

        Achievement::create($request->all());

        return redirect('/dashboard/cv/achievement');

    }

    public function achievementDelete($id){
        $achievement = Achievement::find($id);

        if($achievement)
        {
            $achievement->delete();

            Session::flash('status', 'Success');
            Session::flash('message', 'Successfully Deleted achievement');

            return redirect('/dashboard/cv/achievement');

        } else{

            Session::flash('status', 'Failed');
            Session::flash('message', 'Achievement Dissapeared');

            return redirect('/dashboard/cv/achievement');
        }
    }


    // ----------------------------------------------

    public function skill(){
        $skills = Course::all();
        // dd(Auth::user()->civi->id);

        return view('dashboard.civi.civi-skill', [
            'skills' => $skills
        ]);
    }

    public function skillInput(Request $request){

        $request->validate([
            'name' => 'required',
        ]);

        $request['civi_id'] = Auth::user()->civi->id;

        Course::create($request->all());

        return redirect('/dashboard/cv/skill');

    }

    public function skillDelete($id){
        $skill = Course::find($id);

        if($skill)
        {
            $skill->delete();

            Session::flash('status', 'Success');
            Session::flash('message', 'Successfully Deleted skill');

            return redirect('/dashboard/cv/skill');

        } else{

            Session::flash('status', 'Failed');
            Session::flash('message', 'skill Dissapeared');

            return redirect('/dashboard/cv/skill');
        }
    }
    
}
