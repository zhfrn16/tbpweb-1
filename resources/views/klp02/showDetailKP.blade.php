@extends('layouts.admin')

@section('breadcrumb')
    {!!  cui()->breadcrumb([
        'Home' => route('home'),
        'Detail KP' => '#'
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


<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <strong><i class="cil-user"></i> Detail KP</strong>
            </div>

            <div class="card-body">
            @foreach ($data as $row)
                
            

                <!-- Static Field for Nama -->
                <div class="form-group">
                    <div><strong>Judul Laporan KP</strong></div>
                    <div>{{ $row->title }}</div>
                </div>

                <!-- Static Field for Username -->
                <div class="form-group">
                    <div><strong>Dosen Pembimbing</strong></div>
                    
                <div>{{$row->lecturer->name}}</div>
                </div>

                <!-- Static Field for E-Mea -->
                <div class="form-group">
                    <div><strong>Peserta KP</strong></div>
                    <div>
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
                    </div>
                </div>

                <!-- Static Field for Tipe -->
                <div class="form-group">
                    <div><strong>Tempat Pelaksanaan KP</strong></div>
                    <div>{{ $row->proposal->agency->name}}</div>
                </div>
                <div class="form-group">
                    <div><strong>Waktu Pelaksanaan KP</strong></div>
                    <div>{{date('j F Y', strtotime($row->start_at))}} s/d {{date('j F Y', strtotime($row->end_at))}}</div>
                </div>
                <div class="form-group">
                    <div><strong>Pembimbing KP Lapangan</strong></div>
                    <div>{{$row->field_advisor_name}}</div>
                </div>

            @endforeach

              


            </div>

        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <div class="card-header">
                <strong><i class="cil-list"></i> List Berkas</strong>
            </div>

            <div class="card-footer">
                <table class="table table-bordered">
                   
                    <th>Nama</th>
                    <th>Action</th>

                   <tr>
                       
                       <td>Laporan </td>
                       @if (isset($row->file_report))                    
                           <td><a href="{{ asset('storage/file_report/'. $row->file_report) }}">Download</a> </td>
                        @else
                        <td> Kosong </td>   
                       @endif
                   </tr>
                   <td>Bukti Penyerahan Laporan</td>
                                   @if (isset($row->file_report_receipt))                    
                                   <td><a href="{{ asset('storage/file_report_receipt/'. $row->file_report_receipt) }}">Download</a> </td>
                                @else
                                <td> Kosong </td>   
                               @endif
                    </tr>
                    <tr>
                        <td>Catatan Penilaian Lapangan </td>
                        @if (isset($row->file_field_grade))                    
                        <td><a href="{{ asset('storage/file_field_grade/'. $row->file_field_grade) }}">Download</a> </td>
                     @else
                     <td> Kosong </td>   
                    @endif
                    </tr>
                </table>

            </div>
        </div>
    </div>
    </div>
</div>


@endsection