<?php

namespace App\Http\Controllers\Frontend\Intern;

use App\Http\Controllers\Controller;
use App\Models\Internship;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;



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