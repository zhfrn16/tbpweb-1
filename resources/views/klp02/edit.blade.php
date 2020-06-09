@extends('layouts.admin')

@section('breadcrumb')
    {!!  cui()->breadcrumb([
        'Home' => route('home'),
        'List Seminar KP' => route('frontend.myinterns.index'),
        'Detail KP' => route('frontend.myinterns.show', [$kpid]),
        'Edit Seminar KP' => '#'
    ]) !!}
@endsection

@php
@endphp

@section('toolbar')
{!! cui()->toolbar_btn(route('frontend.myintern-seminars.audiences.create', [$kpid]), 'cil-people ','Tambah Peserta Seminar') !!}

@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                    {{ html()->modelForm($kpid, 'PATCH', route('frontend.myintern-seminars.update', [$kpid]))->open()}}
                        {{--CARD HEADER --}}
                        <div class="card-header">
                            <strong><i class="cil-pencil"></i> Edit Seminar</strong>
                        </div>

                        {{-- CARD BODY--}}
                        <div class="card-body">
                        <div class="form-group">
                        @foreach($data as $row)

                            <label class="form-label" for="title">Peserta KP &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
                                        : {{$row->student->name}}


                            </label>


                        
                        </div>

                            @include('klp02._form')
                            
                            @endforeach
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