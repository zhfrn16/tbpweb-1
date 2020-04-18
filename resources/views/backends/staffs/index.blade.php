@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Staff' => route('backend.staffs.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('staffs_manage')
    {!! cui()->toolbar_btn(route('backend.staffs.create'), 'cil-library-add', 'Tambah') !!}
    @endcan
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="cil-list"></i> List Staff</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $staffs->links() }}
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
                        @forelse($staffs as $staff)
                            <tr>
                                <td class="text-center"><img src="{{ asset($staff->photo_url_s) }}" class="{{ config('style.photo') }}" alt="Photo"> </td>
                                <td>{{ $staff->name }}</td>
                                <td>{{ $staff->nip }}</td>
                                <td>{{ $staff->nik }}</td>
                                <td class="text-center">
                                    {!! cui()->btn_view(route('backend.staffs.show', [$staff->id])) !!}
                                    @can('staffs_manage')
                                    {!! cui()->btn_edit(route('backend.staffs.edit', [$staff->id])) !!}
                                    {!! cui()->btn_delete(route('backend.staffs.destroy', [$staff->id]), "Anda yakin akan menghapus data Tendik ini?") !!}
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <h6 class="text-center">Tidak ada tendik</h6>
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
                                {{ $staffs->links() }}
                            </div>
                        </div>
                    </div>

                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

@endsection
