@extends('layouts.admin')

@section('breadcrumb')
    {!!  cui()->breadcrumb([
        'Home' => route('home'),
        'Tambah Peserta Seminar KP' => '#'
    ]) !!}
@endsection

@section('content')

<div class="card">

    <div class="card-body">
        
        <form action="../audiences" method="POST">
            @csrf
            <h5 class="">Daftar Peserta Seminar</h5>
            <div class="form-group">
                @foreach ($datas as $row)
                    {{-- <label for="">ID INTERNSHIP</label> --}}
                    <input type="text" value="{{$row->id}}" name="internship_id" hidden></>
                @endforeach
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div><strong>Judul Laporan KP</strong></div>
                    <div>{{ $internships->title }}</div>
                </div>
                <div class="form-group">
                    <div><strong>Penyaji</strong></div>
                    <div>{{ $internships->student->name }}</div>
                </div>
                <div class="form-group">
                    <div><strong>Tempat</strong></div>
                    <div>{{$internships->room->name}} - {{$internships->room->building->name}}</div>
                </div>
                <div class="form-group">
                    <div><strong>Waktu</strong></div>
                    <div>{{date('j F Y', strtotime($internships->seminar_date))}} Jam {{$internships->seminar_time}} WIB</div>
                </div>
            </div>
            <h5 class="">Pilih Peserta Seminar</h5>
            <div class="input-group">
                
                <select name="student_id" class="custom-select" id="inputGroupSelect04">
                    @foreach ($students as $student)
                        <option value="{{$student->id}}">{{$student->name}}</option>
                    @endforeach
                </select>

                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Tambah Peserta</button>
                </div>
            </div>
                
        </form> 


        <table class="table table-outline table-hover">
            <br>
            {{-- <h5>List Peserta Yang Sudah Ditambahkan</h5> --}}
            <thead class="thead-light">
                <tr>
               
                    
                    <th scope="col">No. </th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Aksi</th>
                </tr>
               
            </thead>

            <tbody>
                @php
                $angka=1;
                 @endphp

                @foreach ($audiences as $row)
                    <tr>
                        <td>{{$angka}}</td>
                        <td>{{$row->nim}}</td>
                        <td>{{$row->name}}</td>
                        
                        <td>
                            <form method="POST" action="./{{$row->student_id}}" 
                                onsubmit="return confirm('Yakin akan menghapus data?')">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <div class="form-group">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </div>
                            </form>
                        </td>
                        
                    </tr>
                    @php
                    $angka++;
                @endphp
                @endforeach
            </tbody>
        </table> 

    </div>
</div> 
@endsection
