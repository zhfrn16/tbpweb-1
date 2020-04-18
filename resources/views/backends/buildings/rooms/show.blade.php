@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Gedung' => route('backend.buildings.index'),
        'Ruangan' => route('backend.rooms.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('rooms_manage')
        {!! cui()->toolbar_delete(route('backend.rooms.destroy', [$room->id]), $room->id, 'cil-trash', 'Hapus', 'Anda yakin akan menghapus ruangan ini?') !!}
        {!! cui()->toolbar_btn(route('backend.rooms.edit', $room->id), 'cil-pencil', 'Edit') !!}
        {!! cui()->toolbar_btn(route('backend.rooms.create'), 'cil-library-add', 'Tambah') !!}
    @endcan
    {!! cui()->toolbar_btn(route('backend.rooms.index'), 'cil-list', 'List Ruangan') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <i class="fa fa-edit"></i> <strong>Detail Ruangan</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <!-- Static Field for Nama Ruangan -->
                    <div class="form-group">
                        <div class='form-label'>Nama Ruangan</div>
                        <div>{{ $room->name }}</div>
                    </div>

                    <!-- Static Field for Gedung -->
                    <div class="form-group">
                        <div class='form-label'>Gedung</div>
                        <div>{{ optional($room->building)->name ?? "-" }}</div>
                    </div>

                    <!-- Static Field for No. Urut -->
                    <div class="form-group">
                        <div class='form-label'>No. Urut</div>
                        <div>{{ $room->number ?? "-"}}</div>
                    </div>

                    <!-- Static Field for Lantai -->
                    <div class="form-group">
                        <div class='form-label'>Lantai</div>
                        <div>{{ $room->floor ?? "-"}}</div>
                    </div>

                    <!-- Static Field for capacity -->
                    <div class="form-group">
                        <div class='form-label'>capacity</div>
                        <div>{{ $room->capacity ?? "-" }}</div>
                    </div>

                    <!-- Static Field for Ukuran -->
                    <div class="form-group">
                        <div class='form-label'>Ukuran</div>
                        <div>{{ $room->size ?? "-" }} m<sup>2</sup> </div>
                    </div>
                </div>

                {{--CARD FOOTER--}}
                <div class="card-footer">
                </div>

            </div>
        </div>

    </div>

@endsection
