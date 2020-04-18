@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Gedung' => route('backend.buildings.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui()->toolbar_btn(route('backend.rooms.index'), 'cil-building', 'Ruangan') !!}
    @can('rooms_manage')
        {!! cui()->toolbar_btn(route('backend.buildings.create'), 'cil-library-add', 'Tambah') !!}
    @endcan
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="cil-list"></i> List Dosen</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $buildings->links() }}
                            </div>
                        </div>
                    </div>

                    <table class="{{ config('style.table') }}">
                        <thead class="{{ config('style.thead') }}">
                        <tr>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Jumlah Lantai</th>
                            <th class="text-center">Tahun Pembangunan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($buildings as $building)
                            <tr>
                                <td>{{ $building->name }}</td>
                                <td>{{ $building->floors }}</td>
                                <td>{{ $building->build_at }}</td>
                                <td class="text-center">
                                    {!! cui()->btn_view(route('backend.buildings.show', [$building->id])) !!}
                                    @can('rooms_manage')
                                        {!! cui()->btn_edit(route('backend.buildings.edit', [$building->id])) !!}
                                        {!! cui()->btn_delete(route('backend.buildings.destroy', [$building->id]), "Anda yakin akan menghapus data gedung ini?") !!}
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <h6 class="text-center">Tidak ada gedung</h6>
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
                                {{ $buildings->links() }}
                            </div>
                        </div>
                    </div>

                </div><!--card-body-->


            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

@endsection
