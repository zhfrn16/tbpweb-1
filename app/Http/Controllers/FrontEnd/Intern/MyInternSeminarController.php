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
    public function create()
    {
        //
        return view('klp02.createSeminar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
