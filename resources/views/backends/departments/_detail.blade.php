<!-- Static Field for Nama -->
<div class="form-group">
    <div class='form-label'>Nama</div>
    <div>{{ $department->name }}</div>
</div>

<!-- Static Field for Singkatan -->
<div class="form-group">
    <div class='form-label'>Singkatan</div>
    <div>{{ $department->abbreviation }}</div>
</div>

<!-- Static Field for Fakultas -->
<div class="form-group">
    <div class='form-label'>Fakultas</div>
    <div>{{ optional($department->faculty)->name }}</div>
</div>

<!-- Static Field for Kode Nasional -->
<div class="form-group">
    <div class='form-label'>Kode Nasional</div>
    <div>{{ $department->national_code }}</div>
</div>
