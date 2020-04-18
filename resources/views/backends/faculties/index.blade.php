@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Fakultas' => route('backend.faculties.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui()->toolbar_btn(route('backend.departments.index'), 'cil-bank', 'Prodi') !!}
    @can('faculties_manage')
        {!! cui()->toolbar_btn(route('backend.faculties.create'), 'cil-library-add', 'Tambah') !!}
    @endcan
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="cil-list"></i> List Fakultas</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $faculties->links() }}
                            </div>
                        </div>
                    </div>

                    <table class="{{ config('style.table') }}">
                        <thead class="{{ config('style.thead') }}">
                        <tr>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Singkatan</th>
                            @can('faculties_manage')
                                <th class="text-center">Aksi</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($faculties as $faculty)
                            <tr>
                                <td>{{ $faculty->name }}</td>
                                <td class="text-center">{{ $faculty->abbreviation }}</td>
                                @can('faculties_manage')
                                    <td class="text-center">
                                        {!! cui()->btn_edit(route('backend.faculties.edit', [$faculty->id])) !!}
                                        {!! cui()->btn_delete(route('backend.faculties.destroy', [$faculty->id]), "Anda yakin akan menghapus data fakultas ini?") !!}
                                    </td>
                                @endcan
                            </tr>
                        @empty
                            <tr>
                                @can('faculties_manage')
                                    <td colspan="3">
                                        <h6 class="text-center">Tidak ada data Fakultas</h6>
                                    </td>
                                @else
                                    <td colspan="2">
                                        <h6 class="text-center">Tidak ada data Fakultas</h6>
                                    </td>
                                @endif
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right">

                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $faculties->links() }}
                            </div>
                        </div>
                    </div>

                </div><!--card-body-->


            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

@endsection
