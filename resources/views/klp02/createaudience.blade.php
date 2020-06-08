@extends('layouts.admin')

@section('breadcrumb')
    {!!  cui()->breadcrumb([
        'Home' => route('home'),
        'List Seminar KP' => route('frontend.myinterns.index'),
        'Peserta Seminar KP' => '#'
    ]) !!}
@endsection

@php
@endphp