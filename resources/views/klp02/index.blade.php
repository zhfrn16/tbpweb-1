@extends('layouts.admin')

@section('breadcrumb')
    {!!  cui()->breadcrumb([
        'Home' => route('home'),
        'List Seminar KP' => '#'
    ]) !!}
@endsection

@section('content')

    <div class="card">

        <div class="card-header">
            <strong>List Seminar KP</strong>
        </div>

        <div class="card-body">
            <table class="table table-outline table-hover">
                <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Judul KP</th>
                    <th>Instansi/Perusahaan</th>
                    <th>Alamat</th>
                    <th>Tanggal di buat</th>
                    <th>Lihat</th>
                </tr>
                </thead>
                <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($data as $row)
                        
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$row->title}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->address}}</td>
                                <td>{{$row->created_at}}</td>
                                <td>
                                    {!! cui()->btn_view(route('frontend.myinterns.show', [$row->id])) !!}
                                </td>
                            </tr>
                        
                            @php
                                $no++;
                            @endphp
                          @empty
                          <tr>
                              <td colspan="5">Belum ada seminar</td>
                          </tr>
                        @endforelse
                      
                </tbody>
            </table>
        </div>

        <div class="card-footer">

        </div>

    </div>

@endsection
