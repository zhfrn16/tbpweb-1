<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function edit($id)
    {
        if (!Gate::allows('users_manage')) {
            return abort(403);
        }
        $user = User::findOrFail($id);
        $roles = Role::get();

        return view('backends.users.password', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        if (!Gate::allows('users_manage')) {
            return abort(403);
        }

        $user = User::findOrFail($id);
        //Update Password
        if (!empty(request('password'))) {
            $user->password = bcrypt($request->password);
        }

        // Update Status Aktif
        if ($request->has('active')) {
            $user->active = 1;
        } else {
            $user->active = 0;
        }

        // Update Role
        $roles = request('roles') ?? [];
        $user->syncRoles($roles);

        if ($user->save()) {
            notify('success', 'Berhasil mengubah password user');
            if ($user->type == User::STUDENT)
                return redirect()->route('backend.students.show', [$user->id]);
            elseif ($user->type == User::LECTURER)
                return redirect()->route('backend.lecturers.show', [$user->id]);
            else
                return redirect()->route('backend.staffs.show', [$user->id]);
        }
        notify('error', 'Gagal mengubah data pegawai');
        return redirect()->back();
    }
}
