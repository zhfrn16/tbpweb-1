@extends('layouts.admin')

@section('breadcrumb')
    {!!  cui()->breadcrumb([
        'Home' => route('home'),
        'Detail Seminar KP' => '#'
    ]) !!}
@endsection

@section('toolbar')
{!! cui()->toolbar_btn(route('frontend.myintern-seminars.audiences.create', [$kpid]), 'cil-people ','Kelola Peserta Seminar') !!}   
@endsection

@section('content')

   
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong><i class="cil-user"></i> Detail Seminar KP</strong>
                    </div>
        
                    <div class="card-body">
                        
                    
        
                        <!-- Static Field for Nama -->
                        <div class="form-group">
                            <div><strong>Judul Laporan KP</strong></div>
                            <div>{{ $data->title }}</div>
                        </div>
                        <div class="form-group">
                            <div><strong>Penyaji</strong></div>
                            <div>{{ $mhs->name }}</div>
                        </div>
                        
        
                        <!-- Static Field for Username -->
                        <div class="form-group">
                            <div><strong>Dosen Pembimbing</strong></div>
                            
                        <div>{{$data->lecturer->name}}</div>
                        </div>

                        <div class="form-group">
                            <div><strong>Dosen Penguji KP</strong></div>
                            <div>
                               <table>
                                   <tr>
                                       <td>1. </td>
                                       <td>{{$data->lecturer->name}}</td>   
                                   </tr>
                                   <tr>
                                       <td></td>
                                       <td><small>{{$data->lecturer->nip}}</small></td>
                                   </tr>
                                   <tr>
                                       <td>2. </td>
                                       <td>Stiphen Jawaluddin</td>   
                                   </tr>
                                   <tr>
                                       <td></td>
                                       <td><small>12887766559975</small></td>
                                   </tr>
                               </table>
                            </div>
                        </div>

                        <div class="form-group">
                            <div><strong>Tempat Pelaksanaan Seminar</strong></div>
                            <div>{{$data->room->name}} - {{$data->room->building->name}}</div>
                        </div>
                        <div class="form-group">
                            <div><strong>Waktu Pelaksanaan Seminar</strong></div>
                            <div>
                                <table>
                                <tr>
                                    <td>Tanggal </td>
                                    <td>  : {{date('j F Y', strtotime($data->seminar_date))}} </td>
                                </tr>
                                <tr>
                                    <td>Jam </td>
                                    <td>  : {{$data->seminar_time}} WIB </td>
                                </tr>
                            </table>
                            </div>
                        
                        </div>
        
                        <!-- Static Field for E-Mea -->
                        
        
                        <!-- Static Field for Tipe -->
        

                    </div>
        
                </div>
            </div>
        
    
    
            <div class="col-md-4">
                <div class="card">
                    {{-- CARD HEADER--}}
                    <div class="card-header">
                        <strong><i class="cil-list"></i> List Peserta Semnar</strong>
                    </div>
                    {{-- CARD BODY--}}
                    <div class="form-group">
                        <div class="card-footer">
                            <table class="table table-bordered">
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIM</th>

                                @php
                                $no=1;
                            @endphp
                          
                                @forelse ($data->audience as $peserta)
                                <tr> 
                                    <td> {{$no}}. </td>
                                    <td> {{$peserta->student->name}}</td>
                                    <td> {{$peserta->student->nim}}</td>
                                    
                                </tr>
                                @php
                                    $no++;
                                @endphp

                                @empty
                                   <tr><td colspan="3"> Belum Ada Peserta</td></tr>
                                @endforelse
                            </table>

                        </div>
                    </div>
                </div>
                {{--  --}}
            
                <div class="card">
                    {{-- CARD HEADER--}}
                    <div class="card-header">
                        <strong><i class="cil-list"></i> List Berkas</strong>
                    </div>
                    {{-- CARD BODY--}}
                    <div class="form-group">
                        <div class="card-footer">
                            <table class="table table-bordered">
                               
                                <th>Nama</th>
                                <th>Action</th>

                               <tr>
                                   
                                <td>Laporan </td>
                                @if (isset($data->file_report))                    

                                    <td><a href="{{ asset('storage/file_report/'. $data->file_report) }}">Download</a> </td>

                                 @else
                                 <td> Kosong </td>   
                                @endif
                               </tr>
                               <tr>
                                   <td>Sertifikat </td>
                                   @if (isset($data->file_certificate))                    

                                    <td><a href="{{ asset('storage/file_certificate/'. $data->file_certificate) }}">Download</a> </td>

                                 @else
                                 <td> Kosong </td>   
                                @endif
                               </tr>
                               <tr>
                                   <td>Absen Seminar</td>
                                   @if (isset($data->file_seminar_attendance))                    

                                   <td><a href="{{ asset('storage/file_seminar_attendance/'. $data->file_seminar_attendance) }}">Download</a> </td>

                                @else
                                <td> Kosong </td>   
                               @endif
                               </tr>
                               <tr>
                               
                               <tr>
                                   <td>Catatan Penilaian Lapangan </td>
                                   @if (isset($data->file_field_grade))                    

                                   <td><a href="{{ asset('storage/file_field_grade/'. $data->file_field_grade) }}">Download</a> </td>

                                @else
                                <td> Kosong </td>   
                               @endif
                               </tr>
                               <tr>
                                   <td>Logbook</td>
                                   @if (isset($data->file_logbook))                    

                                   <td><a href="{{ asset('storage/file_logbook/'. $data->file_logbook) }}">Download</a> </td>

                                @else
                                <td> Kosong </td>   
                               @endif
                               </tr>
                               <tr>
                                <td>Laporan Hasil Seminar </td>
                                @if (isset($data->file_seminar_off_report))                    

                                <td><a href="{{ asset('storage/file_seminar_off_report/'. $data->file_seminar_off_report) }}">Download</a> </td>

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
