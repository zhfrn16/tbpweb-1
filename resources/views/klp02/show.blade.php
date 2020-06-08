@extends('layouts.admin')

@section('breadcrumb')
    {!!  cui()->breadcrumb([
        'Home' => route('home'),
        'List Seminar KP' => route('frontend.myinterns.index'),
        'Detail KP' => route('frontend.myinterns.show', [$kpid]),
        'Lihat Seminar' => '#'
    ]) !!}
@endsection
@php
@endphp

@section('toolbar')
    <!-- {!! cui()->toolbar_btn(route('frontend.myintern-seminars.edit', [$kpid]), 'cil-pencil', 'Edit Seminar') !!} -->
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <i class="fa fa-edit"></i> <strong>Detail Seminar KP</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">

                    <!-- Static Field for Nama Ruangan -->
                    <div class="form-group">

                    <div class="form-group">
                                @foreach ($data as $row)
                                    <div class="form-group">
                                        <label class="form-label" for="title">Judul Laporan KP &emsp;&emsp;&emsp;&emsp; : &nbsp; {{$row->title}}</label>
                                    </div>

            
                                    <div class="form-group">
                                        <label class="form-label" for="student_id">Peserta KP &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; : 
                                        &nbsp; {{$row->student->name}}
                                        <!-- @php
                                            $noo=1;
                                        @endphp

                                        @foreach($row->proposal->members as $member)
                                        
                                            <tr>
                                                <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{$noo}}.&nbsp;{{$member->student->name }}
                                                <small> &emsp;&emsp;&emsp;&emsp; {{$member->student->nim }}<br></small>
                                                </td>
                                            </tr>
                                            @php
                                                $noo++; 
                                            @endphp
                                        @endforeach -->

                                        </label>

                                        <!-- {{$row->proposal->members}} -->

                                    </div>
                    
                                    <div class="form-group">
                                        <label class="form-label" for="field">Dosen Pembimbing  &emsp;&emsp;&emsp;&nbsp; :&nbsp;{{$row->advisor_id}} </label>

                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="internship_proposal_id">Tempat Pelaksanaan KP  &emsp; :&nbsp;{{$row->proposal->agency->name}} </label>
                                    </div> 

                                    <div class="form-group">
                                        <label class="form-label" for="start_at">Waktu Pelaksanaan KP &emsp;&nbsp;&nbsp; :&nbsp;{{$row->start_at}} s/d {{$row->end_at}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="field_advisor_name">Pembimbing Lapangan KP : {{$row->field_advisor_name}}</label>
                                    </div>

                                    <!-- bagian seminar -->
                                    <div class="form-group">
                                        <label class="form-label" for="seminar_date">Tanggal Seminar KP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp; : {{$row->seminar_date ?? "-"}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="seminar_time">Waktu Seminar KP &emsp;&emsp;&emsp;&nbsp;&nbsp; 
                                        : {{$row->seminar_time  ?? "-"}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="seminar_room_id">Ruang Seminar KP &emsp;&emsp;&emsp;&nbsp;&nbsp;
                                        : &nbsp;{{ optional($row->room)->name  ?? "-"}}</label>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="grade">Catatan Hasil Seminar KP : &nbsp;{{$row->grade ?? "-"}}</label>
                                    </div>

                                @endforeach
                        </div>

                        


                    </div>


                </div>

                {{--CARD FOOTER--}}
                <div class="card-footer">
                </div>

            </div>
        </div>

    </div>

@endsection
