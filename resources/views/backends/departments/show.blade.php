@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Prodi' => route('backend.departments.index'),
        'Lihat' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('departments_manage')
        {!! cui()->toolbar_delete(route('backend.departments.destroy', [$department->id]), $department->id, 'cil-trash', 'Hapus', 'Anda yakin akan menghapus Prodi ini?') !!}
        {!! cui()->toolbar_btn(route('backend.departments.edit', $department->id), 'cil-pencil', 'Edit') !!}
        {!! cui()->toolbar_btn(route('backend.departments.create'), 'cil-library-add', 'Tambah') !!}
    @endcan
    {!! cui()->toolbar_btn(route('backend.departments.index'), 'cil-list', 'List Prodi') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{ html()->modelForm($department) }}

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="cil-zoom"></i> Detail Prodi</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    @include('backends.departments._detail')
                </div>

                {{--CARD FOOTER--}}
                <div class="card-footer">
                </div>

                {{ html()->closeModelForm() }}

            </div>
        </div>

    </div>


@endsection
