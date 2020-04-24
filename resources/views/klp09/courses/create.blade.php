@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Mata Kuliah' => route('backend.courses.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui()->toolbar_btn(route('backend.courses.index'), 'cil-list', 'List Mata Kuliah') !!}
@endsection

@section('content')

    {{ html()->form('POST', route('backend.courses.store'))->open() }}

    <div class="card">
        <div class="card-header">
            <strong> <i class="cil-plus"></i> Tambah Mata Kuliah</strong>
        </div>

        <div class="card-body">

            @include('klp09.courses._form')

        </div>

        <div class="card-footer">
            <input type="submit" class="btn btn-primary" value="Simpan" />
        </div>
    </div>

    {{ html()->form()->close() }}

@endsection
