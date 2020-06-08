<?php

namespace App\Http\Controllers\Frontend\Intern;

use App\Http\Controllers\Controller;
use App\Models\Internship;
use Illuminate\Http\Request;
use App\Models\User;

class MyInternProposalController extends Controller
{

    public function index()
    {
        $user_id = auth()->user()->id;
        $internships = Internship::where('student_id', $user_id)->get();

        return view('klp01.proposals.index', compact('internships'));
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
        //
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
