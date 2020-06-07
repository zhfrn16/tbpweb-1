<?php

namespace App\Http\Controllers\Frontend\Intern;

use App\Http\Controllers\Controller;
use App\Models\Internship;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;



class MyInternController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        $data = DB::table('internships')
        ->join('internship_proposals', 'internships.internship_proposal_id',
        '=', 'internship_proposals.id')
        ->join('internship_agencies', 'internship_proposals.agency_id', '=',
        'internship_agencies.id')
        ->select('internships.id','internships.status','internships.title', 'internships.created_at', 'internship_agencies.name', 'internship_agencies.address')
        ->where('student_id', $user_id)
        ->get();
        $status_internship=config('seminar.status_internship');
        return view('klp02.index',compact('data','status_internship'));

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $kpid=$id;
        $data = Internship::where('student_id', $user_id)->where('id', $id)->get();
        
       return view('klp02.showDetailKP',compact('data','kpid'));
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