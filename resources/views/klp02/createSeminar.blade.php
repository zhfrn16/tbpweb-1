@extends('layouts.admin')

@section('breadcrumb')
    
     {!!  cui()->breadcrumb([
        'Home' => route('home'),
        'List Seminar KP' => route('frontend.myinterns.index'),
        'Create Laporan Seminar KP' => '#'
        
    ]) !!}

@endsection


@section('toolbar')
{!! cui()->toolbar_btn(route('frontend.myintern-seminars.audiences.create', [$kpid]), 'cil-people ','Kelola Peserta Seminar') !!}

@endsection




@section('content')
<div class="col-md-10">
 <div class='card'>
        <div class='card-header'>
            <strong>Tambah Form Pelaporan</strong>
        </div>
  

    <div class="card-body">
        {{ html()->modelForm($kpid, 'post', route('frontend.myintern-seminars.store'))->acceptsFiles()->open()}}
            @csrf
           
            <div class="form-group">
                <label class="form-label" for="title">Judul Laporan Seminar KP</label>
                {{ html()->text('title')->class(["form-control", "is-invalid" => $errors->has('title')])->id('title')->placeholder('Judul Laporan KP') }}
                @error('title')
                <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                @enderror
            </div>
            
            <!-- Text Field Input Tanggal Seminar -->
            <div class="form-group">
                <label class="form-label" for="seminar_date">Tanggal Seminar</label>
                {{ html()->date('seminar_date')->class(["form-control", "is-invalid" => $errors->has('seminar_date')])->id('seminar_date') }}
                @error('seminar_date')
                <div class="invalid-feedback">{{ $errors->first('seminar_date') }}</div>
                @enderror
            </div>
            
            <!-- Text Field Input seminar time-->
            <div class="form-group">
                <label class="form-label" for="seminar_time">Waktu Seminar</label>
                {{ html()->time('seminar_time')->class(["form-control", "is-invalid" => $errors->has('seminar_time')])->id('seminar_time') }}
                @error('seminar_time')
                <div class="invalid-feedback">{{ $errors->first('seminar_time') }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label class="form-label" for="seminar_room_id">Ruang Seminar</label>
                <select  class="form-control" name="seminar_room_id" id="seminar_room_id">
                    @foreach ($rooms as $rooms)
                <option value="{{$rooms->id}}">{{$rooms->name}}</option>
                    @endforeach
                </select>
            </div>
            
            <!-- Text Field Input grade-->
            <div class="form-group">
                <label class="form-label" for="grade">Catatan Hasil Seminar KP</label>
                {{ html()->textarea('grade')->class(["form-control", "is-invalid" => $errors->has('grade')])->id('grade')->placeholder("Catatan Hasil Seminar KP") }}
                @error('grade')
                <div class="invalid-feedback">{{ $errors->first('grade') }}</div>
                @enderror
            </div>
            {{-- File --}}
            <div class="form-group">
                <label class="form-label" for="file_report">Upload File Laporan</label>
                {{ html()->file('file_report')->class(["form-control", "is-invalid" => $errors->has('file_report')])->id('file_report')}}
                @error('file_report')
                <div class="invalid-feedback">{{ $errors->first('file_report') }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="file_field_grade">Upload Catatan Penilaian Lapangan</label>
                {{ html()->file('file_field_grade')->class(["form-control", "is-invalid" => $errors->has('file_field_grade')])->id('file_field_grade')}}
                @error('file_field_grade')
                <div class="invalid-feedback">{{ $errors->first('file_field_grade') }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="file_logbook">Upload Logbook</label>
                {{ html()->file('file_logbook')->class(["form-control", "is-invalid" => $errors->has('file_logbook')])->id('file_logbook')}}
                @error('file_logbook')
                <div class="invalid-feedback">{{ $errors->first('file_logbook') }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="file_report_receipt">Bukti Penyerahan Laporan</label>
                {{ html()->file('file_report_receipt')->class(["form-control", "is-invalid" => $errors->has('file_report_receipt')])->id('file_report_receipt')}}
                @error('file_report_receipt')
                <div class="invalid-feedback">{{ $errors->first('file_report_receipt') }}</div>
                @enderror
            </div>

            {{-- File --}}
   
            
            <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Tambah</button>
            </div>
      
            {{ html()->closeModelForm() }} 
      </div>
    </div>
  </div>

@endsection