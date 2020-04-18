<!-- Name Text Field Input -->
<div class="form-group">
    <label class="form-label" for="name">Nama</label>
    {{ html()->text('name')->class(["form-control", "is-invalid" => $errors->has('name')])->id('name')->placeholder('Nama Lengkap Prodi/Jurusan') }}
    @error('name')
    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
    @enderror
</div>

<!-- Abbreviation Text Field Input -->
<div class="form-group">
    <label class="form-label" for="abbreviation">Singkatan</label>
    {{ html()->text('abbreviation')->class(['form-control', 'is-invalid' => $errors->has('abbreviation')])->id('abbreviation')->placeholder('Kode Singkat Prodi/Jurusan') }}
    @error('abbreviation')
    <div class="invalid-feedback">{{ $errors->first('abbreviation') }}</div>
    @enderror
</div>

<!-- Input (Select) for Fakultas -->
<div class="form-group">
    <label class="form-label" for="faculty_id">Fakultas</label>
    {{ html()->select('faculty_id')->options($faculties)->class(["form-control", "is-invalid" => $errors->has('faculty_id')])->id('faculty_id') }}
    @error('faculty_id')
    <div class="invalid-feedback">{{ $errors->first('faculty_id') }}</div>
    @enderror
</div>

<!-- Text Field Input for National Code -->
<div class="form-group">
    <label class="form-label" for="national_code">Kode Nasional</label>
    {{ html()->text('national_code')->class(["form-control", "is-invalid" => $errors->has('national_code')])->id('national_code')->placeholder('Kode Nasional') }}
    @error('national_code')
    <div class="invalid-feedback">{{ $errors->first('national_code') }}</div>
    @enderror
</div>
