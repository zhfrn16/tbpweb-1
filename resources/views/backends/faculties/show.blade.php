@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Fakultas' => route('backend.faculties.index'),
        'Lihat' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('faculties_manage')
        {!! cui()->toolbar_delete(route('backend.faculties.destroy', [$faculty->id]), $faculty->id, 'cil-trash', 'Hapus', 'Anda yakin akan menghapus Fakultas ini?') !!}
        {!! cui()->toolbar_btn(route('backend.faculties.edit', $faculty->id), 'cil-pencil', 'Edit') !!}
        {!! cui()->toolbar_btn(route('backend.faculties.create'), 'cil-library-add', 'Tambah') !!}
    @endcan
    {!! cui()->toolbar_btn(route('backend.lecturers.index'), 'cil-list', 'List Fakultas') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{ html()->modelForm($faculty) }}

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="cil-zoom"></i> Detail Fakultas</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    @include('backends.faculties._detail')
                </div>

                {{--CARD FOOTER--}}
                <div class="card-footer">
                </div>

                {{ html()->closeModelForm() }}

            </div>
        </div>

    </div>


@endsection
