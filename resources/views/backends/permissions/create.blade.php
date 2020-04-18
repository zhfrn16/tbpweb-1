@extends('layouts.admin')

@section('breadcrumb')
    {!!  cui()->breadcrumb([
        'Home' => route('home'),
        'Permission' => route('backend.permissions.index'),
        'Tambah' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui()->toolbar_btn(route('backend.permissions.index'), 'cil-list', 'List Permission')!!}
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                {{ html()->form('POST', route('backend.permissions.store'))->open() }}

                <div class="card-header">
                    <strong><i class="cil-library-add"></i> Tambah Permissions</strong>
                </div>

                <div class="card-body">

                    @include('backends.permissions._form')

                </div>

                <div class="card-footer">
                    {{ html()->submit('Tambah')->class('btn btn-primary') }}
                </div>


                {{ html()->form()->close() }}

            </div>
        </div>
    </div>

@stop

