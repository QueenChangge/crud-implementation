<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MeetingController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        $meets = Meeting::all();
        return view('dashboard.meeting.meeting-dash', [
            'meets' => $meets,
            'grades' => $grades
        ]);
    }

    public function createMeet(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'date' => 'required',
            'description' => 'required',
            'grade_id' => 'required',
        ]);
    
        $validator->after(function ($validator) use ($request) {
            // Cek apakah tanggal dan waktu pelaksanaan sudah ada dalam database
            $existingEvent = Meeting::where('date', $request->date)
                ->where('description', $request->description)
                ->first();
    
            if ($existingEvent) {
                $validator->errors()->add('tanggal_pelaksanaan', 'Jam pada tanggal tersebut sudah digunakan.');
            }
        });

        // COBA BUAT PENAMBAH WAKTU
        // Ambil input waktu dari permintaan
        $inputWaktu = $request->description;
        // Pisahkan jam dan menit dari input waktu
        list($jam, $menit) = explode(':', $inputWaktu);
        // Buat objek Carbon dari input waktu
        $waktuCarbon = Carbon::createFromTime($jam, $menit);
        // Tambahkan 60 menit
        $waktuHasil = $waktuCarbon->addMinutes(60);
        // Format waktu hasil ke dalam format HH:MM
        $waktuHasilFormat = $waktuHasil->format('H:i');





    
        if ($validator->fails()) {
            return redirect('/dashboard/meeting/list')
                ->withErrors($validator)
                ->withInput();
        } else{
            Meeting::create($request->all());

            Session::flash('status', 'Success');
            Session::flash('message', 'Successfully Added New Meeting');
            session(['timefinished' => $waktuHasilFormat]);
            return redirect('/dashboard/meeting/list');
        }
        
        
    }

    public function modifyMeet($id){
        $grades = Grade::all();
        $meet = Meeting::findOrFail($id);
        return view('dashboard.meeting.meeting-update', [
            'meet' => $meet,
            'grades' => $grades
        ]);
    }

    public function updateMeet(Request $request, $id){
        $meeting = Meeting::findOrFail($id);
        $meeting->fill([
            'title' => $request->title,
            'grade_id' => $request->grade_id,
            'description' => $request->description,
            'date' => $request->date
        ]);
        $meeting->save();

        Session::flash('status', 'Success');
        Session::flash('message', 'Successfully Updated Meeting '. $meeting->title);
    
        return redirect('/dashboard/meeting/list');
    }

    public function deleteMeet($id){
        $meeting = Meeting::find($id);

        if($meeting)
        {
            $meeting->delete();

            Session::flash('status', 'Success');
            Session::flash('message', 'Successfully Deleted meeting');

            return redirect('/dashboard/meeting/list');

        } else{
            return redirect('/dashboard/meeting/list');

            Session::flash('status', 'Success');
            Session::flash('message', 'meeting Dissapeared');
        }
    }
}
