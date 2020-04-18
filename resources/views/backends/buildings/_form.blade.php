<!-- Name Text Field Input -->
<div class="form-group">
    <label class="form-label" for="name">Nama</label>
    {{ html()->text('name')->class(["form-control", "is-invalid" => $errors->has('name')])->id('name')->placeholder('Nama Gedung') }}
    @error('name')
    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
    @enderror
</div>

<!-- Text Field Input for Jumlah Lantai -->
<div class="form-group">
    <label class="form-label" for="floors">Jumlah Lantai</label>
    {{ html()->text('floors')->class(["form-control", "is-invalid" => $errors->has('floors')])->id('floors')->placeholder('Jumlah Lantai') }}
    @error('floors')
    <div class="invalid-feedback">{{ $errors->first('floors') }}</div>
    @enderror
</div>

<!-- Text Field Input for Tahun Pembangunan -->
<div class="form-group">
    <label class="form-label" for="build_at">Tahun Pembangunan</label>
    {{ html()->text('build_at')->class(["form-control", "is-invalid" => $errors->has('build_at')])->id('build_at')->placeholder('Tahun Pembangunan') }}
    @error('build_at')
    <div class="invalid-feedback">{{ $errors->first('build_at') }}</div>
    @enderror
</div>


