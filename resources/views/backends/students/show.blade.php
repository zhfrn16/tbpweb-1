@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Mahasiswa' => route('backend.students.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('users_manage')
    {!! cui()->toolbar_btn(route('backend.users.edit', [$student->id]), 'cil-lock-locked', 'Password') !!}
    @endcan
    @can('students_manage')
    {!! cui()->toolbar_delete(route('backend.students.destroy', [$student->id]), $student->id, 'cil-trash', 'Hapus', 'Anda yakin akan menghapus mahasiswa ini?') !!}
    {!! cui()->toolbar_btn(route('backend.students.edit', $student->id), 'cil-pencil', 'Edit') !!}
    {!! cui()->toolbar_btn(route('backend.students.create'), 'cil-library-add', 'Tambah') !!}
    @endcan
    {!! cui()->toolbar_btn(route('backend.students.index'), 'cil-list', 'List Mahasiswa') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">

                        {{-- CARD HEADER--}}
                        <div class="card-header">
                            <strong><i class="cil-zoom"></i> Detail Mahasiswa</strong>
                        </div>

                        {{-- CARD BODY--}}
                        <div class="card-body">
                            @include('backends.students._detail')
                        </div>

                        {{--CARD FOOTER--}}
                        <div class="card-footer">
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    @include('backends.students._photo')
                </div>
            </div>

        </div>
    </div>

@endsection
