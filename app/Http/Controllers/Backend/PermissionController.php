<?php

namespace App\Http\Controllers\Backend;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePermissionsRequest;
use App\Http\Requests\Admin\UpdatePermissionsRequest;

class PermissionController extends Controller
{

    public function index()
    {
        if (!Gate::allows('roles_access')) {
            return abort(401);
        }

        $permissions = Permission::all();

        return view('backends.permissions.index', compact('permissions'));
    }


    public function create()
    {
        if (!Gate::allows('roles_manage')) {
            return abort(401);
        }

        return view('backends.permissions.create');
    }


    public function store(StorePermissionsRequest $request)
    {
        if (!Gate::allows('roles_manage')) {
            return abort(401);
        }
        try {
            if (Permission::create($request->all())) {
                notify('success', 'Data permission berhasil disimpan');
            } else {
                notify('error', 'Gagal menyimpan data permission');
            }
        } catch (InvalidArgumentException $e) {
            notify('error', 'Terjadi kesalahan: '.$e->getMessage());
        }

        return redirect()->route('backend.permissions.index');
    }


    public function edit($id)
    {
        if (!Gate::allows('roles_manage')) {
            return abort(401);
        }
        $permission = Permission::findOrFail($id);

        return view('backends.permissions.edit', compact('permission'));
    }


    public function update(UpdatePermissionsRequest $request, $id)
    {
        if (!Gate::allows('roles_manage')) {
            return abort(401);
        }
        $permission = Permission::findOrFail($id);

        if ($permission->update($request->all())) {
            notify('success', 'Permission berhasil diupdate');
        } else {
            notify('error', 'Permission gagal diupdate');
        }

        return redirect()->route('backend.permissions.index');
    }


    public function destroy($id)
    {
        if (!Gate::allows('roles_manage')) {
            return abort(401);
        }
        $permission = Permission::findOrFail($id);

        if ($permission->delete()) {
            notify('success', 'Permission berhasil dihapus');
        }

        return redirect()->route('backend.permissions.index');
    }

    public function massDestroy(Request $request)
    {
        if (!Gate::allows('roles_manage')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Permission::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
