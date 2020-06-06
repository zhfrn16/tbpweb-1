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
        @foreach ($datas as $row)
        <form action="./" method="POST">
            @csrf
            <div class="form-group">
                {{-- <label for="">ID INTERNSHIP</label> --}}
                <input type="text" value="{{$row->id}}" name="internship_id" hidden></>
                @endforeach
            </div>
            
            <h5 class="">Pilih Peserta Seminar</h5>
            <div class="input-group">
                
                <select name="student_id" class="custom-select" id="inputGroupSelect04">
                     @foreach ($students as $student)
                    <option value="{{$student->id}}">{{$student->name}}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Tambah Peserta</button>
                </div>
            </div>
                
            </form> 
       


                    <table class="table table-outline table-hover">
                        <br>
                        <h5>List Peserta Yang Sudah Ditambahkan</h5>
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($audiences as $row)
                                <tr>
                                    <td>{{$row->nim}}</td>
                                    <td>{{$row->name}}</td>
                                    <form action="MyInternSeminarAudience.php/destroy"></form>
                                    <td><a href="././{{$row->id}}" class="btn btn-block btn-primary">Delete</a></td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table> 
                </div>
    </div> 
@endsection
