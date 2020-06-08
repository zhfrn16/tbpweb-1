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
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $kpid=$id;
        $internships = Internship::all()->pluck('name', 'id');  
        $rooms = Room::all()->pluck('name','id');
        $data = Internship::where('id',$id)->get();
        //dd($internships);

        return view('klp02.createSeminar',compact('kpid','rooms','data'));  
    }


    public function store(Request $request)
    {
        $internships = Internship::where('student_id',auth()->user()->id)->first();
        $internships->update($request->all());

        


        if($internships)
        {
            notify('success','Data Berhasil Ditambah');
        }
        else
        {
            notify('error','Data Gagal Ditambahkan');
        }

        return redirect('myinterns');
       


    }


    public function show($id)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $kpid=$id;
        $data = Internship::where('id', $id)->get()->first();
        $dosbing = DB::table('students')
        ->join('student_semesters', 'students.id',
        '=', 'student_semesters.student_id')
        ->join('semesters', 'student_semesters.semester_id', '=',
        'semesters.id')
        ->join('classrooms', 'classrooms.semester_id', '=',
        'semesters.id')
        ->join('class_lecturers', 'classrooms.id', '=',
        'class_lecturers.classroom_id')
        ->join('lecturers', 'lecturers.id', '=',
        'class_lecturers.lecturer_id')
        ->where('student_id', $user_id)
        ->get();
    
       return view('klp02.showSeminarDetail',compact('data','kpid','dosbing'));

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
