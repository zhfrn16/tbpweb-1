@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Dosen' => route('backend.lecturers.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('lecturers_manage')
    {!! cui()->toolbar_btn(route('backend.lecturers.create'), 'cil-library-add', 'Tambah') !!}
    @endcan
    {!! cui()->toolbar_btn(route('backend.lecturers.index'), 'cil-list', 'List Dosen') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                        {{ html()->modelForm($lecturer, 'PUT', route('backend.lecturers.update', $lecturer->id))->acceptsFiles()->open() }}

                        {{--CARD HEADER --}}
                        <div class="card-header">
                            <strong><i class="cil-pencil"></i> Edit Dosen</strong>
                        </div>

                        {{-- CARD BODY--}}
                        <div class="card-body">
                            @include('backends.lecturers._form')
                        </div>

                        {{-- CARD FOOTER--}}
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Simpan"/>
                        </div>

                        {{ html()->closeModelForm() }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="col-md-4">
                        @include('backends.lecturers._photo')
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
