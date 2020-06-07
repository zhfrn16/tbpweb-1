@extends('layouts.admin')

@section('breadcrumb')
    {!!  cui()->breadcrumb([
        'Home' => route('home'),
        'Detail Seminar KP' => '#'
    ]) !!}
@endsection



@section('content')

    <div class="card">

        <div class="card-header">
            <strong>Detail Seminar KP</strong>
        </div>

        <div class="card-body">
            <table class="">
                <thead class="thead-light">
                </thead>
                <tbody>
                    
                           
                       
                            <tr>
                                <td><b>Judul Laporan KP</b> </td>
                            <td>  : {{$data->title}}</td>
                            </tr>
                            <tr>
                                <td><b>Dosen Pembimbing</b> </td>
                            <td> :
                            @php
                                $angka=1;
                            @endphp 
                            @foreach ($dosbing as $oke)
                                
                            {{$angka}}.&nbsp;{{$oke->name}}&nbsp;
                            @php
                                $angka++;
                            @endphp
                            @endforeach</td>
                            </tr>
                            <tr>
                                <td><b>Dosen Penguji</b>  </td> <td> :</td>
                            </tr>
                            @php
                                $noo=1;
                            @endphp
                                  
                                    @foreach($data->proposal->members as $member)
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
                                <td><b>Tempat Pelaksanaan Seminar</b></td>
                                <td>  : {{$data->room->name}} - {{$data->room->building->name}} </td>
                            </tr>
                            <tr>
                                <td><b>Waku Pelaksanaan Seminar </b></td>
                           
                            </tr>
                            <tr>
                                <td>Tanggal </td>
                                <td>  : {{$data->seminar_date}} </td>
                            </tr>
                            <tr>
                                <td>Jam </td>
                                <td>  : {{$data->seminar_time}} WIB </td>
                            </tr>
                        
                     
                </tbody>
            </table>
        </div>

        <div class="card-footer">

        </div>

    </div>

@endsection