<?php

namespace App\Http\Controllers\Frontend\Intern;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Internship;
use App\Models\Proposal;
use App\Models\Student;
use App\Models\StudentSemester;
use App\Models\Semester;
use App\Models\Classroom;
use App\Models\ClassLecturer;
use App\Models\Lecturer;
use App\Models\Room;


class MyInternSeminarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create(request $id)
    {

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $kpid=$id;
        $internships = Internship::all()->pluck('name', 'id');  
        $rooms = Room::all();
        $data = Internship::where('id',$id)->get();
        //dd($internships);

        return view('klp02.createSeminar',compact('kpid','rooms','data'));  

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $oke = Internship::where('student_id', $user_id)->get()->first();
        $posts = new Internship;
        $posts->internship_proposal_id = $oke->proposal->id;
            //
        $posts->status = 1;
        $posts->title = $request->input('title');
        $posts->student_id = $user_id;
        $posts->seminar_date = $request->input('seminar_date');
        $posts->seminar_time = $request->input('seminar_time');
        $posts->seminar_room_id = $request->input('seminar_room_id');
        $posts->save();

        return redirect('myinterns');



    }

    /**
     * Display the specified resource.
     * Test
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $kpid=$id;
        $mhs= Student::where('id', $user_id)->get()->first();
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
    
       return view('klp02.showSeminarDetail',compact('data','kpid','dosbing','mhs'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $kpid=$id;


        $rooms = Room::all()->pluck('name','id');
        $data = Internship::where('id',$id)->get();

        
        return view('klp02.edit', compact('rooms','kpid','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
