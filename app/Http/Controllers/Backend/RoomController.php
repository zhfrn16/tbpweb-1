<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use SebastianBergmann\CodeCoverage\Report\Xml\BuildInformation;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:rooms_access']);
    }

    public function index()
    {
        $rooms = Room::paginate(config('defaul_paginate_item', 25));

        return view('backends.buildings.rooms.index', compact('rooms'));
    }

    public function create()
    {
        abort_unless(Gate::allows('rooms_manage'), 403);

        $buildings = Building::all()->pluck('name', 'id');

        return view('backends.buildings.rooms.create', compact('buildings'));
    }

    public function store(Request $request)
    {
        abort_unless(Gate::allows('rooms_manage'), 403);

        $request->validate(Room::VALIDATION_RULES);

        $room = Room::create($request->all());
        if($room)
        {
            notify('success', 'Berhasil menambahkan data ruangan');
        }else{
            notify('error', 'Gagal menambahkan data ruangan');
        }
        return redirect()->route('backend.rooms.show', [$room->id]);
    }

    public function show(Room $room)
    {
        return view('backends.buildings.rooms.show', compact('room'));
    }

    public function edit(Room $room)
    {
        abort_unless(Gate::allows('rooms_manage'), 403);

        $buildings = Building::all()->pluck('name', 'id');
        return view('backends.buildings.rooms.edit', compact('buildings', 'room'));
    }

    public function update(Request $request, Room $room)
    {
        abort_unless(Gate::allows('rooms_manage'),403);
        $request->validate(Room::VALIDATION_RULES);
        if($room->update($request->all()))
        {
            notify('success', 'Berhasil memperbaharui data ruangan');
        }else{
            notify('error', 'Gagal memperbaharui data ruangan');
        }
        return redirect()->route('backend.rooms.show', [$room->id]);
    }

    public function destroy(Room $room)
    {
        abort_unless(Gate::allows('rooms_manage'), 403);
        if($room->delete())
        {
            notify('success', 'Berhasil menghapus data ruangan');
        }else{
            notify('error', 'Gagal menghapus data ruangan');
        }
        return redirect()->route('backend.rooms.index');
    }
}
