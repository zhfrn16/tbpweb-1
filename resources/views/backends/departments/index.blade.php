@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Prodi' => route('backend.departments.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('faculties_manage')
        {!! cui()->toolbar_btn(route('backend.faculties.index'), 'cil-bank', 'Fakultas') !!}
    @endcan
    @can('departments_manage')
        {!! cui()->toolbar_btn(route('backend.departments.create'), 'cil-library-add', 'Tambah') !!}
    @endcan
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="cil-list"></i> List Prodi</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $departments->links() }}
                            </div>
                        </div>
                    </div>

                    <table class="{{ config('style.table') }}">
                        <thead class="{{ config('style.thead') }}">
                        <tr>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Singkatan</th>
                            <th class="text-center">Fakultas</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($departments as $department)
                            <tr>
                                <td>{{ $department->name }}</td>
                                <td>{{ $department->abbreviation }}</td>
                                <td>{{ optional($department->faculty)->name }}</td>
                                    <td class="text-center">
                                        {!! cui()->btn_view(route('backend.departments.show', [$department->id])) !!}
                                        @can('departments_manage')
                                        {!! cui()->btn_edit(route('backend.departments.edit', [$department->id])) !!}
                                        {!! cui()->btn_delete(route('backend.departments.destroy', [$department->id]), "Anda yakin akan menghapus data Prodi ini?") !!}
                                        @endcan
                                    </td>
                            </tr>
                        @empty
                            <tr>
                                @can('departments_manage')
                                    <td colspan="4">
                                        <h6 class="text-center">Tidak ada data Prodi</h6>
                                    </td>
                                @else
                                    <td colspan="3">
                                        <h6 class="text-center">Tidak ada data Prodi</h6>
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
                                {{ $departments->links() }}
                            </div>
                        </div>
                    </div>

                </div><!--card-body-->


            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

@endsection
