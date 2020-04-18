<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Lecturer;
use App\Models\User;
use App\Traits\UploadFileTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LecturerController extends Controller
{
    use UploadFileTrait;

    public function __construct()
    {
        $this->middleware(['permission:lecturers_access']);
    }

    public function index()
    {
        $lecturers = Lecturer::paginate(config('central.default_paginate_item', 25));
        return view('backends.lecturers.index', compact('lecturers'));
    }

    public function create()
    {
        if(!Gate::allows('lecturers_manage')){
            return abort(401);
        }

        $departments = Department::all()->pluck('name', 'id');
        $genders = config('central.gender');
        $marital_statuses = config('central.marital_status');
        $religions = config('central.religion');
        $association_types = Lecturer::ASSOCIATION_SELECT;
        $statuses = Lecturer::STATUS_SELECT;

        return view('backends.lecturers.create', compact(
            'departments',
            'genders',
            'marital_statuses',
            'religions',
            'association_types',
            'statuses'
        ));
    }

    public function store(Request $request)
    {

        if(!Gate::allows('lecturers_manage')){
            return abort(401);
        }

        $this->validate($request, Lecturer::$validation_rules);

        $user = User::create([
            'username' => request('nip'),
            'email' => request('email'),
            'password' => bcrypt('nip'),
            'status' => 1,
            'type' => User::LECTURER
        ]);

        $user->assignRole(config('central.system_roles')['lecturer']);

        $lecturer = $user->lecturer()->create($request->only(
            'nip',
            'nidn',
            'nik',
            'name',
            'birthday',
            'birthplace',
            'phone',
            'gender',
            'karpeg',
            'npwp',
            'department_id',
            'address',
            'marital_status',
            'religion',
            'status',
            'association_type'));

        if($request->hasFile('photo')){
            $filename = uniqid($lecturer->id . '_') . '.' . $request->file('photo')->getClientOriginalExtension();
            $lecturer->photo = $this->saveUploadedPhoto($lecturer->photo, $request->file('photo'), config('central.path.student_photo'), $filename);
            $lecturer->save();
            $user->avatar = $this->saveAvatar($user->avatar, $request->file('photo'), $filename);
            $user->save();
        }

        notify('success', 'Berhasil menambahkan data dosen atas nama '. request('name'));
        return redirect()->route('backend.lecturers.show', [$user->id]);
    }


    public function show(Lecturer $lecturer)
    {

        return view('backends.lecturers.show', compact(
            'lecturer',
            'departments',
            'genders',
            'marital_statuses',
            'religions',
            'association_types'
        ));
    }

    public function edit(Lecturer $lecturer)
    {
        if(!Gate::allows('lecturers_manage')){
            return abort(401);
        }

        $departments = Department::all()->pluck('name', 'id');
        $genders = config('central.gender');
        $marital_statuses = config('central.marital_status');
        $religions = config('central.religion');
        $association_types = Lecturer::ASSOCIATION_SELECT;
        $statuses = Lecturer::STATUS_SELECT;

        return view('backends.lecturers.edit', compact(
            'lecturer',
            'departments',
            'genders',
            'marital_statuses',
            'religions',
            'association_types',
            'statuses'
        ));
    }

    public function update(Request $request, Lecturer $lecturer)
    {
        if(!Gate::allows('lecturers_manage')){
            return abort(401);
        }

        $this->validate($request, Lecturer::$validation_rules);

        $lecturer->update($request->only(
            'nip',
            'nidn',
            'nik',
            'name',
            'birthday',
            'birthplace',
            'phone',
            'gender',
            'karpeg',
            'npwp',
            'department_id',
            'address',
            'marital_status',
            'religion',
            'status',
            'association_type'));

        $user = $lecturer->user;
        $user->update([
            'username' => request('nip'),
            'email' => request('email'),
            'status' => 1,
        ]);

        if($request->hasFile('photo')){
            $filename = uniqid($lecturer->id . '_') . '.' . $request->file('photo')->getClientOriginalExtension();
            $lecturer->photo = $this->saveUploadedPhoto($lecturer->photo, $request->file('photo'), config('central.path.student_photo'), $filename);
            $lecturer->save();
            $user->avatar = $this->saveAvatar($user->avatar, $request->file('photo'), $filename);
            $user->save();
        }

        notify('success', 'Berhasil mengubah data dosen '. $lecturer->name);
        return redirect()->route('backend.lecturers.show', [$lecturer->id]);
    }

    public function destroy(Lecturer $lecturer)
    {
        if(!Gate::allows('lecturers_manage')){
            return abort(401);
        }

        $user = User::find($lecturer->id);
        $lecturer->delete();
        optional($user)->delete();

        notify('success', 'Berhasil menghapus dosen '.$lecturer->name);
        return redirect()->route('backend.lecturers.index');
    }
}
