@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Tendik' => route('backend.staffs.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('staffs_manage')
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

                        {{ html()->modelForm($staff, 'PUT', route('backend.staffs.update', $staff->id))->acceptsFiles()->open() }}

                        {{--CARD HEADER --}}
                        <div class="card-header">
                            <strong><i class="cil-pencil"></i> Edit Tendik</strong>
                        </div>

                        {{-- CARD BODY--}}
                        <div class="card-body">
                            @include('backends.staffs._form')
                        </div>

                        {{-- CARD FOOTER--}}
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Simpan"/>
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
