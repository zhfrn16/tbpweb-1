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

    	<!-- Create -->
		<div class="form-group">
		    <label class="form-label" for="">Judul KP</label>
		    <input type="text" name="title" class="form-control">
		</div>

		<!-- Create  -->
		<div class="form-group">
		    <label class="form-label" for="">Tanggal Seminar</label>
		    <input type="date" name="seminar_date" class="form-control">
		</div>

		<div class="form-group">
		    <label class="form-label" for="seminar_room_id">Ruang Seminar</label>
		    {{ html()->select('seminar_room_id')->options($rooms)->class(["form-control", "is-invalid" => $errors->has('seminar_room_id')])->id('seminar_room_id')}}
		    @error('seminar_room_id')
		    <div class="invalid-feedback">{{ $errors->first('seminar_room_id') }}</div>
		    @enderror
		</div>

			<!-- Create  -->
		<div class="form-group">
		    <label class="form-label" for="">Waktu Seminar</label>
		    <input type="time" name="seminar_time" class="form-control">
		</div>

		<!-- Create  -->
		<div class="form-group">
		    <label class="form-label" for="">Catatan Hasil Seminar KP</label>
		   	<textarea class="form-control" name="grade" rows="3"></textarea>
		</div>

		<!-- Create -->
		<div class="form-group">
		    <label class="form-label" for="">Upload Berkas File</label>
		    <input type="file" name="file_report" class="form-control">
		</div>
   

    <div class="card-footer">
    <input type="submit" class="btn btn-primary" value="Simpan" />
    </form>
    </div>
      </div>
  </div>

@endsection