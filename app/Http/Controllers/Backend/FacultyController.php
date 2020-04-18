<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FacultyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:faculties_access']);
    }

    public function index()
    {
        $faculties = Faculty::paginate(config('central.default_paginage_item', 25));
        return view('backends.faculties.index', compact('faculties'));
    }

    public function create()
    {
        if(!Gate::allows('faculties_manage')){
            return abort(403);
        }

        return view('backends.faculties.create');
    }

    public function store(Request $request)
    {
        if(!Gate::allows('faculties_manage')){
            return abort(403);
        }

        $request->validate(Faculty::validation_rules);
        if(Faculty::create($request->all())){
            notify('success', 'Berhasil menyimpan data fakultas');
        }else{
            notify('error', 'Gagal menyimpan data fakultas');
        }

        return redirect()->route('backend.faculties.index');
    }

    public function show(Faculty $faculty)
    {
        return view('backends.faculties.show', compact('faculty'));
    }

    public function edit(Faculty $faculty)
    {
        if(!Gate::allows('faculties_manage')){
            return abort(403);
        }

        return view('backends.faculties.edit', compact('faculty'));
    }

    public function update(Request $request, Faculty $faculty)
    {
        if(!Gate::allows('faculties_manage')){
            return abort(403);
        }

        $request->validate(Faculty::validation_rules);

        if($faculty->update($request->all())){
            notify('success', 'Berhasil mengubah data fakultas');
        }else{
            notify('error', 'Gagal mengubah data fakultas');
        }
        return redirect()->route('backend.faculties.index');
    }

    public function destroy(Faculty $faculty)
    {
        if(!Gate::allows('faculties_manage')){
            return abort(403);
        }
        if($faculty->delete()){
            notify('success', 'Berhasil menghapus data fakultas');
        }else{
            notify('error', 'Gagal menghapus data fakultas');
        }

        return redirect()->route('backend.faculties.index');
    }
}
