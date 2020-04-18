@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Gedung' => route('backend.buildings.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('rooms_manage')
        {!! cui()->toolbar_delete(route('backend.buildings.destroy', [$building->id]), $building->id, 'cil-trash', 'Hapus', 'Anda yakin akan menghapus dosen ini?') !!}
        {!! cui()->toolbar_btn(route('backend.buildings.edit', $building->id), 'cil-pencil', 'Edit') !!}
        {!! cui()->toolbar_btn(route('backend.buildings.create'), 'cil-library-add', 'Tambah') !!}
    @endcan
    {!! cui()->toolbar_btn(route('backend.buildings.index'), 'cil-list', 'List Gedung') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <i class="cil-zoom"></i> <strong>Detail Gedung</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <!-- Static Field for Nama -->
                    <div class="form-group">
                        <div class='form-label'>Nama</div>
                        <div>{{ $building->name }}</div>
                    </div>

                    <!-- Static Field for Lantai -->
                    <div class="form-group">
                        <div class='form-label'>Lantai</div>
                        <div>{{ $building->floors }}</div>
                    </div>

                    <!-- Static Field for Tahun Pembangunan -->
                    <div class="form-group">
                        <div class='form-label'>Tahun Pembangunan</div>
                        <div>{{ $building->build_at }}</div>
                    </div>
                </div>

                {{--CARD FOOTER--}}
                <div class="card-footer">
                </div>

            </div>
        </div>

    </div>

@endsection
