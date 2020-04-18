<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BuildingController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:rooms_access']);
    }

    public function index()
    {
        $buildings = Building::paginate(config('default_paginate_item', 25));

        return view('backends.buildings.index', compact('buildings'));
    }

    public function create()
    {
        if(!Gate::allows('rooms_manage'))
        {
            return abort(403);
        }

        return view('backends.buildings.create');
    }

    public function store(Request $request)
    {
        if(!Gate::allows('rooms_manage'))
        {
            return abort(403);
        }

        $request->validate(Building::VALIDATION_RULES);
        $building = Building::create($request->all());
        if($building)
        {
            notify('success', 'Berhasil menyimpan data Gedung');
        }else{
            notify('error', 'Gagal menyimpan data Gedung');
        }
        return redirect()->route('backend.buildings.show', $building->id);
    }

    public function show(Building $building)
    {
        return view('backends.buildings.show', compact('building'));
    }

    public function edit(Building $building)
    {
        abort_unless(Gate::allows('rooms_manage'), 403);

        return view('backends.buildings.edit', compact('building'));
    }

    public function update(Request $request, Building $building)
    {
        abort_unless(Gate::allows('rooms_manage'), 403);

        $request->validate(Building::VALIDATION_RULES);
        if($building->update($request->all()))
        {
            notify('success', 'Berhasil memperbaharui data Gedung');
        }else{
            notify('error', 'Gagal memperbaharui data Gedung');
        }
        return redirect()->route('backend.buildings.show', $building);
    }

    public function destroy(Building $building)
    {
        abort_unless(Gate::allows('rooms_manage'), 403);

        if($building->delete()){
            notify('success', 'Behasil menghapus data gedung');
        }else{
            notify('error', 'Gagal menghapus data Gedung');
        }
        return redirect()->route('backend.buildings.index');
    }
}
