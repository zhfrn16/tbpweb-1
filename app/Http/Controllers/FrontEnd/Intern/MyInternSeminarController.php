<?php

namespace App\Http\Controllers\Frontend\Intern;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class MyInternSeminarController extends Controller
{


    public function index()
    {
        //
    }


    public function create(request $id)
    {

    }


    public function store(Request $request)
    {
  
       


    }


    public function show($id)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $kpid=$id;

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
