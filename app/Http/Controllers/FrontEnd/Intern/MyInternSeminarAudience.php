<?php

namespace App\Http\Controllers\Frontend\Intern;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\InternshipAudience;

class MyInternSeminarAudience extends Controller
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
    public function create($id)
    {   
        $datas = DB::table('internships')->where('id',$id)->get();
        $audiences = DB::table('students')
        ->join('internship_audiences', 'internship_audiences.student_id',
        '=', 'students.id')
        ->where('internship_audiences.internship_id',$id)
        ->orderBy('internship_audiences.created_at','desc')
        ->get();
        $students = DB::table('students')->get();
        return view('klp02.create_audience',compact('datas','students','audiences'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $posts = new InternshipAudience;
        $posts->internship_id = $request->input('internship_id');
        $posts->student_id = $request->input('student_id');
        $posts->save();
        
        return back();
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        DB::table('internship_audience')->where('internship_id',$id)->delete();
        return back();
    }
}
