@inject('request', 'Illuminate\Http\Request')

@extends('layouts.admin')

@section('breadcrumb')
    {!!  cui()->breadcrumb([
        'Home' => route('home'),
        'Permission' => route('backend.permissions.index')
    ]) !!}
@endsection

@section('toolbar')
    @can('roles_manage')
        {!! cui()->toolbar_btn(route('backend.roles.index'), 'cil-user-follow', 'Role') !!}
        {!! cui()->toolbar_btn(route('backend.permissions.create'), 'cil-library-add', 'Tambah') !!}
    @endcan
@endsection

@section('content')

    <div class="card">

        <div class="card-header">
            <strong> <i class="cil-list"></i> List Permissions </strong>
        </div>

        <div class="card-body">
            <table class="{{ config('style.table') }}">
                <thead class="{{ config('style.thead') }}">
                <tr>
                    <th>Permissions</th>
                    @can('roles_manage')
                        <th class="text-center">Aksi</th>
                    @endcan
                </tr>
                </thead>

                <tbody>
                @if (count($permissions) > 0)
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            @can('roles_manage')
                                <td class="text-center">
                                    {!! cui()->btn_edit(route('backend.permissions.edit', [$permission->id])) !!}
                                    {!! cui()->btn_delete(route('backend.permissions.destroy', $permission->id), 'Anda yakin menghapus permission ini') !!}
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2">No Permission Available</td>
                    </tr>
                @endif
                </tbody>
            </table>

        </div>

    </div>

@endsection
