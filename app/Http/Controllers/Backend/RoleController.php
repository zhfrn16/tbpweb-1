<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRolesRequest;
use App\Http\Requests\Admin\UpdateRolesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        if (!Gate::allows('roles_access')) {
            return abort(401);
        }

        $roles = Role::all();

        return view('backends.roles.index', compact('roles'));
    }

    public function create()
    {
        if (!Gate::allows('roles_manage')) {
            return abort(401);
        }
        $permissions = Permission::all();

        return view('backends.roles.create', compact('permissions'));
    }

    public function store(StoreRolesRequest $request)
    {
        if (!Gate::allows('roles_manage')) {
            return abort(401);
        }
        try {
            $role = Role::create($request->except('permission'));
            $permissions = $request->input('permission') ? $request->input('permission') : [];
            $role->givePermissionTo($permissions);

            notify('success', 'Data role berhasil ditambahkan');
        } catch (Exception $e) {
            notify('error', 'Data role gagal ditambahkan');
        }

        return redirect()->route('backend.roles.index');
    }

    public function edit($id)
    {
        if (!Gate::allows('roles_manage')) {
            return abort(401);
        }

        $permissions = Permission::all();

        $role = Role::findOrFail($id);

        return view('backends.roles.edit', compact('role', 'permissions'));
    }

    public function update(UpdateRolesRequest $request, $id)
    {
        if (!Gate::allows('roles_manage')) {
            return abort(401);
        }
        try {
            $role = Role::findOrFail($id);
            $role->update($request->except('permission'));
            $permissions = $request->input('permission') ? $request->input('permission') : [];
            $role->syncPermissions($permissions);
            notify('success', 'Berhasil mengubah data role');
        } catch (Exception $e) {
            notify('error', 'Gagal mengubah data role');
        }

        return redirect()->route('backend.roles.index');
    }


    public function destroy($id)
    {
        if (!Gate::allows('roles_manage')) {
            return abort(401);
        }
        try {
            $role = Role::findOrFail($id);
            if (!in_array($role->name, config('central.system_roles'))) {
                $role->delete();
            } else {
                notify('error', 'System Role tidak bisa dihapus');
            }
            notify('success', 'Berhasil menghapus data role');
        } catch (Exception $e) {
            notify('error', 'Gagal menghapus data role');
        }

        return redirect()->route('backend.roles.index');
    }


    public function massDestroy(Request $request)
    {
        if (!Gate::allows('roles')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Role::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
