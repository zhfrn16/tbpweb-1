<div class="form-group">
    <label class="form-label" for="title">Judul Laporan Seminar KP</label>
    {{ html()->text('title')->class(["form-control", "is-invalid" => $errors->has('title')])->id('title')->placeholder("Judul Laporan Seminar KP") }}
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
    {{ html()->select('seminar_room_id')->options($rooms)->class(["form-control", "is-invalid" => $errors->has('seminar_room_id')])->id('seminar_room_id')}}
    @error('seminar_room_id')
    <div class="invalid-feedback">{{ $errors->first('seminar_room_id') }}</div>
    @enderror
</div>

<!-- Text Field Input grade-->
<div class="form-group">
    <label class="form-label" for="grade">Catatan Hasil Seminar KP</label>
    {{ html()->textarea('grade')->class(["form-control", "is-invalid" => $errors->has('grade')])->id('grade')->placeholder("Catatan Hasil Seminar KP") }}
    @error('grade')
    <div class="invalid-feedback">{{ $errors->first('grade') }}</div>
    @enderror
</div>

<div class="form-group">
    <label class="form-label" for="file_report">Upload Berkas File</label>
    {{ html()->file('file_report')->class(["form-control", "is-invalid" => $errors->has('file_report')])->id('file_report')}}
    @error('file_report')
    <div class="invalid-feedback">{{ $errors->first('file_report') }}</div>
    @enderror
</div>


</div>