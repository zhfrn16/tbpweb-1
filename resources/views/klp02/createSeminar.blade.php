@extends('layouts.admin')

@section('breadcrumb')
    {!!  cui()->breadcrumb([
        'Home' => route('home'),
        'List Seminar KP' => route('frontend.myinterns.index'),
        'Create Laporan Seminar KP' => '#'
    ]) !!}
@endsection

@php
@endphp


@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Pelaporan Seminar</strong>
    </div>

    <div class="card-body">
        <form action="{{route('frontend.myintern-seminars.store')}}" method="POST">
        @csrf 

        @include('klp02._form')

    </div>

    <div class="card-footer">
        <input type="submit" class="btn btn-primary" value="Simpan">
    </div>
    </form>


</div>


@endsection