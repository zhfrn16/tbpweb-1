@extends('layouts.admin')

@section('breadcrumb')
    {!!  cui()->breadcrumb([
        'Home' => route('home'),
        ' Buat Seminar Baru' => '#'
    ]) !!}
@endsection
@php

@endphp

@section('toolbar')
    {{-- {!! cui()->toolbar_btn(route('frontend.myintern-seminars.create'), 'cil-playlist-add', 'Buat Seminar') !!}
    {!! cui()->toolbar_btn(route('frontend.myintern-seminars.edit', [$kpid]), 'cil-fork ','Edit Seminar') !!}
    {!! cui()->toolbar_btn(route('frontend.myintern-seminars.show', [$kpid]), 'cil-contact','Lihat Seminar') !!} --}}
@endsection

@section('content')

    <div class="card">

        <div class="card-header">
            <strong>Form Buat Seminar KP</strong>
        </div>

        <form action="route('frontend.myintern-seminars.store')" method="post">
            <div class="card-body">
                <table class="" >
                    <thead class="thead-light">
                    </thead>

                    <tbody>
                        <tr>
                            <td>Id</td>
                            <td>:</td>
                            <td><input type="text" name="id"></td>
                        </tr>
                        <tr>
                            <td>judul</td>
                            <td>:</td>
                            <td><input type="text" name="judul"></td>
                        </tr>
                        <tr>
                            <td>internship proposal id</td>
                            <td>:</td>
                            <td>
                                <select name="id_prop" id="">
                                    <option value="x">x</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            {{ html()->form('POST', route('backend.students.store'))->acceptsFiles()->open() }}
                        </tr>

                    </tbody>
                    
                </table>
            </div>
        </form>

        <div class="card-footer">

        </div>

    </div>

@endsection