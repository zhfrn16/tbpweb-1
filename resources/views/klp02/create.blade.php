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
    <div class="row justify-content-center">
        <div class="col">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                    {{ html()->modelForm('GET', route('frontend.myintern-seminars.store'))->open()}}
                        {{--CARD HEADER --}}
                        <div class="card-header">
                            <strong><i class="cil-pencil"></i> Tambah Form Pelaporan Seminar</strong>
                        </div>

                        {{-- CARD BODY--}}
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label" for="seminar_room_id">Peserta Seminar KP</label>
                                {{ html()->select('student_id')->options($students)->class(["form-control", "is-invalid" => $errors->has('student_id')])->id('student_id')}}
                                @error('student_id')
                                <div class="invalid-feedback">{{ $errors->first('student_id') }}</div>
                                @enderror
                            </div>



                            @include('klp02._form')
                        </div>

                        {{-- CARD FOOTER--}}
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Simpan"/>
                        </div>

                    {{ html()->closeModelForm() }}    
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection