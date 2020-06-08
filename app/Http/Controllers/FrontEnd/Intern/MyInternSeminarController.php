<?php

namespace App\Http\Controllers\Frontend\Intern;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Internship;
use App\Models\Proposal;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Room;
use App\Models\Student;



class MyInternSeminarController extends Controller
{


    public function index()
    {
        //
    }


    public function create(request $id)
    {

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        $kpid=$id;

        $data = Internship::where('id',$id)->get();
        $rooms = Room::all()->pluck('name','id');

        return view('klp02.createSeminar', compact('data','kpid','rooms'));


    }


    public function store(Request $request)
    {
  
        $file = $request->file('file_report');
        if(isset($file)){
         $tujuan_upload = 'files/intern-proposal';
         $file->move($tujuan_upload,$file->getClientOriginalName());
        }
        
        
        $update= Internship::where('id',$id)->update([
                'title' => $request->title,
                'seminar_date' => $request->seminar_date,
                'seminar_time' => $request->seminar_time,
                'seminar_room_id' => $request->seminar_room_id,
                'grade' => $request->grade,
                'file_report' => $request->file_report]);

        if($create)
        {
             notify('success', 'Berhasil menambahkan data seminar');
         }else{
             notify('error', 'Gagal menambahkan data seminar');
         }

        return redirect()->route('frontend.myinterns.index');


    }


    public function show($id)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $kpid=$id;
        $data = Internship::where('id',$id)->get();

        return view('klp02.show', compact('data','kpid'));
    }


    public function edit($id)
    {

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $kpid=$id;


        $rooms = Room::all()->pluck('name','id');
        $data = Internship::where('id',$id)->get();

        
        return view('klp02.edit', compact('rooms','kpid','data'));

    }


    public function update(Request $request, $id)
    {

        $kpid=$id;
    
        $file = $request->file('file_report');
        if(isset($file)){
         $tujuan_upload = 'files/intern-proposal';
         $file->move($tujuan_upload,$file->getClientOriginalName());
        }
        
        
        $update= Internship::where('id',$id)->update([
                'title' => $request->title,
                'seminar_date' => $request->seminar_date,
                'seminar_time' => $request->seminar_time,
                'seminar_room_id' => $request->seminar_room_id,
                'grade' => $request->grade,
                'file_report' => $request->file_report]);

            if($update)
            {
                notify('success', 'Berhasil mengedit data seminar');
            }else{
                notify('error', 'Gagal mengedit data seminar');
            }
        
        return redirect()->route('frontend.myintern-seminars.show', [$kpid]);
        

    }

 
    public function destroy($id)
    {

    }
}
