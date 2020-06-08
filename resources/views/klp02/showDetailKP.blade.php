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
                                <td>Judul Laporan KP </td>
                            <td>  : {{$row->title}}</td>
                            </tr>
                            <tr>
                                <td>Dosen Pembimbing </td>
                                <td>  : </td>
                            </tr>
                            <tr>
                                <td>Peserta KP  </td> <td> :</td>
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
                                <td>Tempat Pelaksanaan KP </td>
                                <td>  : {{$row->proposal->agency->name}} </td>
                            </tr>
                            <tr>
                                <td>Waku Pelaksanaan KP </td>
                            <td>  :  {{$row->start_at}} s/d {{$row->end_at}}</td>
                            </tr>
                            <tr>
                                <td>Pembimbing KP Lapangan </td>
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