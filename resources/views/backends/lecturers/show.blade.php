@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Dosen' => route('backend.lecturers.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('users_manage')
        {!! cui()->toolbar_btn(route('backend.users.edit', [$lecturer->id]), 'cil-lock-locked', 'Password') !!}
    @endcan
    @can('lecturers_manage')
        {!! cui()->toolbar_delete(route('backend.lecturers.destroy', [$lecturer->id]), $lecturer->id, 'cil-trash', 'Hapus', 'Anda yakin akan menghapus dosen ini?') !!}
        {!! cui()->toolbar_btn(route('backend.lecturers.edit', $lecturer->id), 'cil-pencil', 'Edit') !!}
        {!! cui()->toolbar_btn(route('backend.lecturers.create'), 'cil-library-add', 'Tambah') !!}
    @endcan
    {!! cui()->toolbar_btn(route('backend.lecturers.index'), 'cil-list', 'List Dosen') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <i class="fa fa-edit"></i> <strong>Detail Dosen</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    @include('backends.lecturers._detail')
                </div>

                {{--CARD FOOTER--}}
                <div class="card-footer">
                </div>

            </div>
        </div>

        <div class="col-md-4">
            @include('backends.lecturers._photo')
        </div>
    </div>

@endsection
