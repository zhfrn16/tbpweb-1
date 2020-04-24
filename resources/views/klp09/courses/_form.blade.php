<!-- Input (Select) Kurikulum -->
<div class="form-group">
    <label class="form-label" for="curriculum_id">Kurikulum</label>
    {{ html()->select('curriculum_id')->options($curriculums)->class(["form-control", "is-invalid" => $errors->has('curriculum_id')])->id('curriculum_id')->placeholder('Pilih kurikulum') }}
    @error('curriculum_id')
    <div class="invalid-feedback">{{ $errors->first('curriculum_id') }}</div>
    @enderror
</div>

<!-- Text Field Input for Kode Matkul -->
<div class="form-group">
    <label class="form-label" for="code">Kode Matkul</label>
    {{ html()->text('code')->class(["form-control", "is-invalid" => $errors->has('code')])->id('code')->placeholder('Kode Mata Kuliah') }}
    @error('code')
    <div class="invalid-feedback">{{ $errors->first('code') }}</div>
    @enderror
</div>

<!-- Text Field Input for Nama Matkul -->
<div class="form-group">
    <label class="form-label" for="name">Nama Matkul</label>
    {{ html()->text('name')->class(["form-control", "is-invalid" => $errors->has('name')])->id('name')->placeholder('Nama Mata Kuliah') }}
    @error('name')
    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
    @enderror
</div>

<!-- Text Field Input for Singkatan -->
<div class="form-group">
    <label class="form-label" for="abbrev_name">Singkatan</label>
    {{ html()->text('abbrev_name')->class(["form-control", "is-invalid" => $errors->has('abbrev_name')])->id('abbrev_name')->placeholder('Singkatan Nama Mata Kuliah') }}
    @error('abbrev_name')
    <div class="invalid-feedback">{{ $errors->first('abbrev_name') }}</div>
    @enderror
</div>

<!-- Text Field Input for Nama Inggris -->
<div class="form-group">
    <label class="form-label" for="foreign_name">Nama (Inggris)</label>
    {{ html()->text('foreign_name')->class(["form-control", "is-invalid" => $errors->has('foreign_name')])->id('foreign_name')->placeholder('Nama Mata Kuliah dalam bahasa Inggris') }}
    @error('foreign_name')
    <div class="invalid-feedback">{{ $errors->first('foreign_name') }}</div>
    @enderror
</div>

<!-- Text Field Input for Singkatan (Inggris) -->
<div class="form-group">
    <label class="form-label" for="abbrev_foreign_name">Singkatan (Inggris)</label>
    {{ html()->text('abbrev_foreign_name')->class(["form-control", "is-invalid" => $errors->has('abbrev_foreign_name')])->id('abbrev_foreign_name')->placeholder('Singkatan Mata Kuliah dalam bahasa Inggris') }}
    @error('abbrev_foreign_name')
    <div class="invalid-feedback">{{ $errors->first('abbrev_foreign_name') }}</div>
    @enderror
</div>

<!-- Text Field Input for SKS (Total) -->
<div class="form-group">
    <label class="form-label" for="credit">SKS (Total)</label>
    {{ html()->text('credit')->class(["form-control", "is-invalid" => $errors->has('credit')])->id('credit')->placeholder('Jumlah SKS Mata Kuliah') }}
    @error('credit')
    <div class="invalid-feedback">{{ $errors->first('credit') }}</div>
    @enderror
</div>

<!-- Text Field Input for SKS Tatap Muka -->
<div class="form-group">
    <label class="form-label" for="theory_credit">SKS Tatap Muka</label>
    {{ html()->text('theory_credit')->class(["form-control", "is-invalid" => $errors->has('theory_credit')])->id('theory_credit')->placeholder('Jumlah SKS Tatap Muka dari Total SKS') }}
    @error('theory_credit')
    <div class="invalid-feedback">{{ $errors->first('theory_credit') }}</div>
    @enderror
</div>

<!-- Text Field Input for SKS Praktikum -->
<div class="form-group">
    <label class="form-label" for="lab_credit">SKS Praktikum</label>
    {{ html()->text('lab_credit')->class(["form-control", "is-invalid" => $errors->has('lab_credit')])->id('lab_credit')->placeholder('Jumlah SKS untuk Pratek dari Total SKS') }}
    @error('lab_credit')
    <div class="invalid-feedback">{{ $errors->first('lab_credit') }}</div>
    @enderror
</div>

<!-- Text Field Input for SKS Lapangan -->
<div class="form-group">
    <label class="form-label" for="field_credit">SKS Lapangan</label>
    {{ html()->text('field_credit')->class(["form-control", "is-invalid" => $errors->has('field_credit')])->id('field_credit')->placeholder('Jumlah SKS untuk Kerja Lapangan dari Total SKS')}}
    @error('field_credit')
    <div class="invalid-feedback">{{ $errors->first('field_credit') }}</div>
    @enderror
</div>

<!-- Text Field Input for Semester -->
<div class="form-group">
    <label class="form-label" for="semester">Semester</label>
    {{ html()->text('semester')->class(["form-control", "is-invalid" => $errors->has('semester')])->id('semester')->placeholder('Penempatan Semester Mata Kuliah') }}
    @error('semester')
    <div class="invalid-feedback">{{ $errors->first('semester') }}</div>
    @enderror
</div>

<!-- Text Field Input for Keterangan Matkul -->
<div class="form-group">
    <label class="form-label" for="description">Keterangan Matkul</label>
    {{ html()->textarea('description')->class(["form-control", "is-invalid" => $errors->has('description')])->id('description')->placeholder('Deskripsi Singkat tentang Mata Kuliah') }}
    @error('description')
    <div class="invalid-feedback">{{ $errors->first('description') }}</div>
    @enderror
</div>

<!-- Input (Select) Jenis Mata Kuliah -->
<div class="form-group">
    <label class="form-label" for="primary">Jenis Mata Kuliah</label>
    {{ html()->select('primary')->options([1 => 'Wajib', 2 => 'Pilihan'])->class(["form-control", "is-invalid" => $errors->has('primary')])->id('primary')->placeholder('') }}
    @error('primary')
    <div class="invalid-feedback">{{ $errors->first('primary') }}</div>
    @enderror
</div>
