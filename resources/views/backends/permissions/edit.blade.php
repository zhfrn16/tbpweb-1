@extends('layouts.admin')

@section('breadcrumb')
    {!!  cui()->breadcrumb([
        'Home' => route('home'),
        'Permission' => route('backend.permissions.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui()->toolbar_btn(route('backend.permissions.index'), 'cil-list', 'List Permission')!!}
@endsection

@section('content')

    <div class="card">

        {{ html()->modelForm($permission, 'PUT', route('backend.permissions.update', $permission->id))->open() }}

        <div class="card-header">
            <strong><i class="cil-pencil"></i> Edit Permissions</strong>
        </div>

        <div class="card-body">

            @include('backends.permissions._form')

        </div>

        <div class="card-footer">
            {{ html()->submit('Simpan')->class('btn btn-primary') }}
        </div>

        {{ html()->closeModelForm() }}

    </div>


@stop

