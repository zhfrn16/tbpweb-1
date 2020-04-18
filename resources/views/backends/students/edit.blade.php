@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Mahasiswa' => route('backend.students.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('students_manage')
    {!! cui()->toolbar_btn(route('backend.students.create'), 'cil-library-add', 'Tambah') !!}
    @endcan
    {!! cui()->toolbar_btn(route('backend.students.index'), 'cil-list', 'List') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">

                        {{ html()->modelForm($student, 'PUT', route('backend.students.update', $student->id))->acceptsFiles()->open() }}

                        {{--CARD HEADER --}}
                        <div class="card-header">
                            <strong><i class="cil-pencil"></i> Edit Mahasiswa</strong>
                        </div>

                        {{-- CARD BODY--}}
                        <div class="card-body">
                            @include('backends.students._form')
                        </div>

                        {{-- CARD FOOTER--}}
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Simpan"/>
                        </div>

                        {{ html()->closeModelForm() }}
                    </div>
                </div>

                <div class="col-md-3">
                    @include('backends.students._photo')
                </div>

            </div>

        </div>
    </div>
@endsection
