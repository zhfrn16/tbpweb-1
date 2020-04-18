@extends('layouts.admin')

@section('breadcrumb')
    {!!  cui()->breadcrumb([
        'Home' => route('home'),
        'Roles' => route('backend.roles.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui()->toolbar_btn(route('backend.roles.index'), 'cil-list', 'List Role')!!}
@endsection

@section('content')

    {{ html()->modelForm($role, 'PUT', route('backend.roles.update', $role->id))->open() }}

    <div class="card">

        <div class="card-header">
            <strong><i class="cil-pencil"></i> Edit Role </strong>
        </div>

        <div class="card-body">

            <div class="col-xs-12 form-group">
                {{ html()->label('Name*', 'name')->class(['control-label']) }}
                {{ html()->text('name', old('name'))->class(['form-control', 'is-invalid' => $errors->has('name')])->id('name') }}
                <p class="help-block"></p>
                @if($errors->has('name'))
                    <p class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </p>
                @endif
            </div>

            <div class="col-xs-12 form-group">
                {{ html()->label('Permissions', 'permission')->class('control-label') }}
                <table class="table">
                    @foreach($permissions as $permission)
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox"
                                           class="custom-control-input"
                                           @if($role->hasPermissionTo($permission->name)) checked @endif
                                           id="permission_{{$permission->name}}"
                                           name="permission[{{$permission->name}}]"
                                           value="{{ $permission->name }}">
                                    <label class="custom-control-label"
                                           for="permission_{{$permission->name}}">{{ $permission->name }}</label>
                                </div>
                            </td>
                            <td>
                                {{ $permission->desc }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>

        <div class="card-footer">
            {{ html()->submit('Simpan')->class('btn btn-primary') }}
        </div>

    </div>

    {{ html()->closeModelForm() }}

@endsection
