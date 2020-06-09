@extends('layouts.admin')

@section('breadcrumb')
    
     {!!  cui()->breadcrumb([
        'Home' => route('home'),
        'List Seminar KP' => route('frontend.myinterns.index'),
        'Create Laporan Seminar KP' => '#'
        
    ]) !!}

@endsection


@section('toolbar')
{!! cui()->toolbar_btn(route('frontend.myintern-seminars.audiences.create', [$kpid]), 'cil-people ','Tambah Peserta Seminar') !!}

@endsection




@section('content')

 <div class='card'>
        <div class='card-header'>
            <strong>Tambah Form Pelaporan</strong>
        </div>
  

    <div class="card-body">
    	<form action="{{route('frontend.myintern-seminars.store')}}" method="POST">
    		@csrf
   
            <div class="form-group">
    				<label class="form-label">Judul KP</label>
    				<input type="text" class="form-control" placeholder="Masukkan Judul KP" name="title">
  			</div>
  			<div class="form-group">
    				<label class="form-label">Tanggal Seminar</label>
    				<input type="date" class="form-control" placeholder="Masukkan Tanggal" name="seminar_date">
  			</div>
  			<div class="form-group">
    				<label class="form-label">Waktu Seminar</label>
    				<input type="time" class="form-control" placeholder="Masukkan Waktu" name="seminar_tima">
  			</div>
  			<div class="form-group">
    				<label class="form-label">Ruang Seminar</label>
    				<select name="seminar_room_id" class="custom-select" id="inputGroupSelect04">
                    @foreach ($rooms as $rooms)
                        <option value="{{$rooms->id}}">{{$rooms->name}}</option>
                    @endforeach
                </select>
  			</div>
            <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Tambah Peserta</button>
            </div>

    	</form>
      </div>
  </div>

@endsection