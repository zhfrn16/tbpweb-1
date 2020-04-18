@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Gedung' => route('backend.buildings.index'),
        'Ruangan' => route('backend.rooms.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui()->toolbar_btn(route('backend.buildings.index'), 'cil-building', 'Gedung') !!}
    @can('rooms_manage')
        {!! cui()->toolbar_btn(route('backend.rooms.create'), 'cil-library-add', 'Tambah') !!}
    @endcan
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="cil-list"></i> List Ruangan</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $rooms->links() }}
                            </div>
                        </div>
                    </div>

                    <table class="{{ config("style.table") }}">
                        <thead class="{{ config('style.thead') }}">
                        <tr>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Gedung</th>
                            <th class="text-center">Kapasitas</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($rooms as $room)
                            <tr>
                                <td>{{ $room->name }}</td>
                                <td>{{ optional($room->building)->name }}</td>
                                <td>{{ $room->capacity }}</td>
                                <td class="text-center">
                                    {!! cui()->btn_view(route('backend.rooms.show', [$room->id])) !!}
                                    @can('rooms_manage')
                                        {!! cui()->btn_edit(route('backend.rooms.edit', [$room->id])) !!}
                                        {!! cui()->btn_delete(route('backend.rooms.destroy', [$room->id]), "Anda yakin akan menghapus data ruangan ini?") !!}
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <h6 class="text-center">Tidak ada ruangan</h6>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">

                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $rooms->links() }}
                            </div>
                        </div>
                    </div>

                </div><!--card-body-->


            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

@endsection
