<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Staff;
use App\Models\User;
use App\Traits\UploadFileTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StaffController extends Controller
{
    use UploadFileTrait;

    public function __construct()
    {
        $this->middleware(['permission:staffs_access']);
    }

    public function index()
    {
        $staffs = Staff::paginate(config('central.default_paginate_item', 25));
        return view('backends.staffs.index', compact('staffs'));
    }

    public function create()
    {

        if(!Gate::allows('staffs_manage')){
            return abort(401);
        }

        $departments = Department::all()->pluck('name', 'id');
        $genders = config('central.gender');
        $marital_statuses = config('central.marital_status');
        $religions = config('central.religion');
        $association_types = Staff::ASSOCIATION_SELECT;
        $statuses = Staff::STATUS_SELECT;

        return view('backends.staffs.create', compact(
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
        if(!Gate::allows('staffs_manage')){
            return abort(401);
        }

        $this->validate($request, Staff::$validation_rules);

        $user = User::create([
            'username' => request('nip'),
            'email' => request('email'),
            'password' => bcrypt('nip'),
            'status' => 1,
            'type' => User::STAFF
        ]);

        $user->assignRole(config('central.system_roles')['staff']);

        $data=$request->except('photo', 'email');
        $staff = $user->staff()->create($data);

        if($request->hasFile('photo')){
            $filename = uniqid($staff->id . '_') . '.' . $request->file('photo')->getClientOriginalExtension();
            $staff->photo = $this->saveUploadedPhoto($staff->photo, $request->file('photo'), config('central.path.staff_photo'), $filename);
            $staff->save();
            $user->avatar = $this->saveAvatar($user->avatar, $request->file('photo'), $filename);
            $user->save();
        }

        notify('success', 'Berhasil menambahkan data tendik atas nama '. request('name'));
        return redirect()->route('backend.staffs.show', [$user->id]);
    }

    public function show(Staff $staff)
    {
        return view('backends.staffs.show', compact(
            'staff'
        ));
    }

    public function edit(Staff $staff)
    {
        if(!Gate::allows('staffs_manage')){
            return abort(401);
        }

        $departments = Department::all()->pluck('name', 'id');
        $genders = config('central.gender');
        $marital_statuses = config('central.marital_status');
        $religions = config('central.religion');
        $association_types = Staff::ASSOCIATION_SELECT;
        $statuses = Staff::STATUS_SELECT;

        return view('backends.staffs.edit', compact(
            'staff',
            'departments',
            'genders',
            'marital_statuses',
            'religions',
            'association_types',
            'statuses'
        ));
    }

    public function update(Request $request, Staff $staff)
    {
        if(!Gate::allows('staffs_manage')){
            return abort(401);
        }

        $this->validate($request, Staff::$validation_rules);

        $staff->update($request->only(
            'nip',
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
            'association_type'));

        $user = $staff->user;
        $user->update([
            'username' => request('nip'),
            'email' => request('email'),
            'status' => 1,
        ]);

        if($request->hasFile('photo')){
            $filename = uniqid($staff->id . '_') . '.' . $request->file('photo')->getClientOriginalExtension();
            $staff->photo = $this->saveUploadedPhoto($staff->photo, $request->file('photo'), config('central.path.staff_photo'), $filename);
            $staff->save();
            $user->avatar = $this->saveAvatar($user->avatar, $request->file('photo'), $filename);
            $user->save();
        }

        notify('success', 'Berhasil mengubah data tendik '.$staff->name);
        return redirect()->route('backend.staffs.show', [$staff->id]);

    }

    public function destroy(Staff $staff)
    {
        if(!Gate::allows('staffs_manage')){
            return abort(401);
        }

        $user = User::find($staff->id);
        $staff->delete();

        optional($user)->delete();

        notify('success', 'Berhasil menghapus data tendik '.$staff->name);
        return redirect()->route('backend.staffs.index');
    }
}
