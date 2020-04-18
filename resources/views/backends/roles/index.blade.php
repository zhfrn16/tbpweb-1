@inject('request', 'Illuminate\Http\Request')
@extends('layouts.admin')

@section('breadcrumb')
    {!!  cui()->breadcrumb([
        'Home' => route('home'),
        'Roles' => route('backend.roles.index')
    ]) !!}
@endsection

@section('toolbar')
    @can('roles_manage')
        {!! cui()->toolbar_btn(route('backend.permissions.index'), 'cil-user-follow', 'Permissions') !!}
        {!! cui()->toolbar_btn(route('backend.roles.create'), 'cil-library-add', 'Tambah') !!}
    @endcan
@endsection

@section('content')

    <div class="card">

        <div class="card-header">
            <strong> <i class="cil-list"></i> Role </strong>
        </div>

        <div class="card-body">

            <table class="{{ config('style.table') }}">
                <thead class="{{ config('style.thead') }}">
                <tr>
                    <th class="text-center">Role</th>
                    <th class="text-center">Permission</th>
                    @can('roles_manage')
                        <th class="text-center">Aksi</th>
                    @endcan
                </tr>
                </thead>

                <tbody>
                @if (count($roles) > 0)
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>
                                <h5>
                                    @foreach ($role->permissions()->pluck('name') as $permission)
                                        <span class="badge badge-lg badge-primary">{{ $permission }}</span>
                                    @endforeach
                                </h5>
                            </td>
                            @can('roles_manage')
                                <td class="text-center">
                                    <div class="btn-group">
                                        {!! cui()->btn_edit(route('backend.roles.edit',[$role->id])) !!}
                                        &nbsp;
                                        @if (!in_array($role->name, config('central.system_roles')))
                                            {!! cui()->btn_delete(route('backend.roles.destroy', $role->id), 'Anda yakin menghapus role ini?') !!}
                                            @else
                                            {!! cui()->btn_disabled('#', 'cil-trash', '') !!}
                                        @endif
                                    </div>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

    </div>
@endsection

