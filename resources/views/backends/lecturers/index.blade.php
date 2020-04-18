@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Dosen' => route('backend.lecturers.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('lecturers_manage')
    {!! cui()->toolbar_btn(route('backend.lecturers.create'), 'cil-library-add', 'Tambah') !!}
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
                                {{ $lecturers->links() }}
                            </div>
                        </div>
                    </div>

                    <table class="{{ config('style.table') }}">
                        <thead class="{{ config('style.thead') }}">
                        <tr>
                            <th class="text-center"><i class="cil-people"></i> </th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>NIK</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($lecturers as $lecturer)
                            <tr>
                                <td class="text-center"><img src="{{ asset($lecturer->photo_url_s) }}" class="{{ config('style.photo') }}" alt="Photo"> </td>
                                <td>{{ $lecturer->name }}</td>
                                <td>{{ $lecturer->nip }}</td>
                                <td>{{ $lecturer->nik }}</td>
                                <td class="text-center">
                                    {!! cui()->btn_view(route('backend.lecturers.show', [$lecturer->id])) !!}
                                    @can('lecturers_manage')
                                    {!! cui()->btn_edit(route('backend.lecturers.edit', [$lecturer->id])) !!}
                                    {!! cui()->btn_delete(route('backend.lecturers.destroy', [$lecturer->id]), "Anda yakin akan menghapus data dosen ini?") !!}
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <h6 class="text-center">Tidak ada dosen</h6>
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
                                {{ $lecturers->links() }}
                            </div>
                        </div>
                    </div>

                </div><!--card-body-->


            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

@endsection
