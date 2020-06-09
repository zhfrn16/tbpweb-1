@extends('layouts.admin')

@section('breadcrumb')
    {!!  cui()->breadcrumb([
        'Home' => route('home'),
        'List Seminar KP' => '#'
    ]) !!}
@endsection
@php

@endphp

@section('toolbar')
    {!! cui()->toolbar_btn(route('frontend.myintern-seminars.create'), 'cil-playlist-add', 'Buat Seminar') !!}
    {!! cui()->toolbar_btn(route('frontend.myintern-seminars.edit', [$kpid]), 'cil-fork ','Edit Seminar') !!}
    {!! cui()->toolbar_btn(route('frontend.myintern-seminars.show', [$kpid]), 'cil-contact','Lihat Seminar') !!}
@endsection

@section('content')

    <div class="card">

        <div class="card-header">
            <strong>Detail KP</strong>
        </div>

        <div class="card-body">
            <table class="">
                <thead class="thead-light">
        
                </thead>
                <tbody>
                       {{-- PR Cari cara Fetch Array Ya!!! --}}
                       @foreach ($data as $row)
                           
                       
                            <tr>
                                <td><b>Judul Laporan KP</b></td>
                            <td>  : {{$row->title}}</td>
                            </tr>
                            <tr>
                                <td><b>Dosen Pembimbing</b>  </td>
                                <td>  :
                            @php
                                $angka=1;
                            @endphp 
                            @foreach ($dosbing as $oke)
                                
                            {{$angka}}.&nbsp;{{$oke->name}}&nbsp;
                            @php
                                $angka++;
                            @endphp
                            @endforeach </td>
                            </tr>
                            <tr>
                                <td> <b>Peserta KP </b> </td> <td> :</td>
                            </tr>
                            @php
                                $noo=1;
                            @endphp
                                  
                                    @foreach($row->proposal->members as $member)
                                    <tr>
                                            
                                            <td>&nbsp;&nbsp;{{$noo}}.&nbsp;{{$member->student->name }} <br>
                                           {{-- spasi paksa --}}
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                            <small style="margin: center">{{$member->student->nim }}<br></small>
                                             </td>
                                    </tr>
                                    @php
                                        $noo++;
                                    @endphp
                                    @endforeach
                                
                                
                       
                            <tr>
                                <td><b>Tempat Pelaksanaan KP</b> </td>
                                <td>  : {{$row->proposal->agency->name}} </td>
                            </tr>
                            <tr>
                                <td><b>Waku Pelaksanaan KP </b></td>
                            <td>  :  {{date('j F Y', strtotime($row->start_at))}} s/d {{date('j F Y', strtotime($row->end_at))}}</td>
                            </tr>
                            <tr>
                                <td><b>Pembimbing KP Lapangan</b> </td>
                                <td>  : {{$row->field_advisor_name}} </td>
                            </tr>
                        
                        @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">

        </div>

    </div>

@endsection