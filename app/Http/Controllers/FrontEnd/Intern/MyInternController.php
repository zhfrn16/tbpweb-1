<?php

namespace App\Http\Controllers\Frontend\Intern;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Internship;
use App\Models\Proposal;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class MyInternController extends Controller
{

    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $data = DB::table('internships')
        ->join('internship_proposals', 'internships.internship_proposal_id',
        '=', 'internship_proposals.id')
        ->join('internship_agencies', 'internship_proposals.agency_id', '=',
        'internship_agencies.id')
        ->select('internships.id','internships.title', 'internships.created_at', 'internship_agencies.name', 'internship_agencies.address')
        ->where('student_id', $user_id)
        ->get();
        return view('klp02.index',compact('data'));

    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

 
    public function show($id)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $kpid=$id;
        $data = Internship::where('id', $id)->get();

       return view('klp02.showDetailKP',compact('data','kpid'));
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
