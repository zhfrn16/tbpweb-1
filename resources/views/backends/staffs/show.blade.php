@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Tendik' => route('backend.staffs.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('users_manage')
    {!! cui()->toolbar_btn(route('backend.users.edit', [$staff->id]), 'cil-lock-locked', 'Password') !!}
    @endcan
    @can('staffs_manage')
    {!! cui()->toolbar_delete(route('backend.staffs.destroy', [$staff->id]), $staff->id, 'cil-trash', 'Hapus', 'Anda yakin akan menghapus tendik ini?') !!}
    {!! cui()->toolbar_btn(route('backend.staffs.edit', $staff->id), 'cil-pencil', 'Edit') !!}
    {!! cui()->toolbar_btn(route('backend.staffs.create'), 'cil-library-add', 'Tambah') !!}
    @endcan
    {!! cui()->toolbar_btn(route('backend.staffs.index'), 'cil-list', 'List Tendik') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                        {{ html()->modelForm($staff) }}

                        {{-- CARD HEADER--}}
                        <div class="card-header">
                            <i class="fa fa-edit"></i> <strong>Detail Tendik</strong>
                        </div>

                        {{-- CARD BODY--}}
                        <div class="card-body">
                            @include('backends.staffs._detail')
                        </div>

                        {{--CARD FOOTER--}}
                        <div class="card-footer">
                        </div>

                        {{ html()->closeModelForm() }}

                    </div>
                </div>

                <div class="col-md-4">
                    @include('backends.staffs._photo')
                </div>
            </div>

        </div>
    </div>

@endsection
