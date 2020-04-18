<!-- Input (Select) Gedung -->
<div class="form-group">
    <label class="form-label" for="building_id">Gedung</label>
    {{ html()->select('building_id')->options($buildings)->class(["form-control", "is-invalid" => $errors->has('building_id')])->id('building_id')->placeholder('Gedung Tempat Ruangan') }}
    @error('building_id')
    <div class="invalid-feedback">{{ $errors->first('building_id') }}</div>
    @enderror
</div>

<!-- Text Field Input for Nama Ruangan -->
<div class="form-group">
    <label class="form-label" for="name">Nama</label>
    {{ html()->text('name')->class(["form-control", "is-invalid" => $errors->has('name')])->id('name')->placeholder('Nama Ruangan') }}
    @error('name')
    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
    @enderror
</div>

<!-- Text Field Input for Number -->
<div class="form-group">
    <label class="form-label" for="number">No Urut</label>
    {{ html()->text('number')->class(["form-control", "is-invalid" => $errors->has('number')])->id('number')->placeholder('No Urut Ruangan') }}
    @error('number')
    <div class="invalid-feedback">{{ $errors->first('number') }}</div>
    @enderror
</div>

<!-- Text Field Input for Lantai -->
<div class="form-group">
    <label class="form-label" for="floor">Lantai</label>
    {{ html()->text('floor')->class(["form-control", "is-invalid" => $errors->has('floor')])->id('floor')->placeholder('Lantai tempat ruangan berada') }}
    @error('floor')
    <div class="invalid-feedback">{{ $errors->first('floor') }}</div>
    @enderror
</div>

<!-- Text Field Input for Kapasitas -->
<div class="form-group">
    <label class="form-label" for="capacity">Kapasitas</label>
    {{ html()->text('capacity')->class(["form-control", "is-invalid" => $errors->has('capacity')])->id('capacity')->placeholder('Kapasitas Ruangan') }}
    @error('capacity')
    <div class="invalid-feedback">{{ $errors->first('capacity') }}</div>
    @enderror
</div>

<!-- Text Field Input for Ukuran Ruangan -->
<div class="form-group">
    <label class="form-label" for="size">Ukuran Ruangan</label>
    {{ html()->text('size')->class(["form-control", "is-invalid" => $errors->has('size')])->id('size')->placeholder('Ukuran ruangan dalam meter persegi') }}
    @error('size')
    <div class="invalid-feedback">{{ $errors->first('size') }}</div>
    @enderror
</div>
