@extends('layouts.admin')

@section('breadcrumb')
    {!!  cui()->breadcrumb([
        'Home' => route('home'),
        'Roles' => route('backend.roles.index'),
        'Tambah' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui()->toolbar_btn(route('backend.roles.index'), 'cil-list', 'List Role')!!}
@endsection

@section('content')

    {{ html()->form('POST', route('backend.roles.store'))->open() }}

    <div class="card">

        <div class="card-header">
            <strong><i class="cil-library-add"></i> Tambah Role</strong>
        </div>

        <div class="card-body">

            <div class="col-xs-12 form-group">
                {{ html()->label('Name*', 'name')->class(['control-label']) }}
                {{ html()->text('name', old('name'))->class(['form-control', 'is-invalid' => $errors->has('name')])->id('name') }}
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
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
            {{ html()->submit('Tambah')->class('btn btn-primary') }}
        </div>

    </div>

    {{ html()->form()->close() }}

@endsection

