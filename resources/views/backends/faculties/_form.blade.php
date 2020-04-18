<!-- Name Text Field Input -->
<div class="form-group">
    <label class="form-label" for="name">Nama</label>
    {{ html()->text('name')->class(["form-control", "is-invalid" => $errors->has('name')])->id('name')->placeholder('Nama Fakultas') }}
    @error('name')
    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
    @enderror
</div>

<!-- Abbreviation Text Field Input -->
<div class="form-group">
    <label class="form-label" for="abbreviation">Singkatan</label>
    {{ html()->text('abbreviation')->class(['form-control', 'is-invalid' => $errors->has('abbreviation')])->id('abbreviation')->placeholder('Singkatan Fakultas') }}
    @error('abbreviation')
    <div class="invalid-feedback">{{ $errors->first('abbreviation') }}</div>
    @enderror
</div>

