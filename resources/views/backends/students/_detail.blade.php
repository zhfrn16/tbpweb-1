<!-- Static Field for Name -->
<div class="form-group">
    <div class="form-label">Name</div>
    <div>{{ $student->name }}</div>
</div>

<!-- Static Field for NIM -->
<div class="form-group">
    <div class='form-label'>NIM</div>
    <div>{{ $student->nim }}</div>
</div>

<!-- Static Field for Angkatan -->
<div class="form-group">
    <div class='form-label'>Angkatan</div>
    <div>{{ $student->year }}</div>
</div>

<!-- Static Field for NIK -->
<div class="form-group">
    <div class='form-label'>NIK</div>
    <div>{{ $student->nik ?? "-"}}</div>
</div>

<!-- Static Field for Departmentj -->
<div class="form-group">
    <div class='form-label'>Jurusan/Prodi</div>
    <div>{{ optional($student->department)->name ?? "-" }}</div>
</div>

<div class="row">

    <div class="col-md-6">
        <!-- Static Field for Tempat Lahir -->
        <div class="form-group">
            <div class='form-label'>Tempat Lahir</div>
            <div>{{ $student->birthplace }}</div>
        </div>
    </div>

    <div class="col-md-6">
        <!-- Static Field for Tanggal Lahir -->
        <div class="form-group">
            <div class='form-label'>Tanggal Lahir</div>
            <div>{{ optional($student->birthday)->toDateString() }}</div>
        </div>
    </div>

</div>

<!-- Static Field for Jenis Kelamin -->
<div class="form-group">
    <div class='form-label'>Jenis Kelamin</div>
    <div>{{ $student->gender_text ?? "-" }}</div>
</div>

<!-- Static Field for Agama -->
<div class="form-group">
    <div class='form-label'>Agama</div>
    <div>{{ $student->religion_text ?? "-"}}</div>
</div>

<!-- Static Field for Status Perkawinan -->
<div class="form-group">
    <div class='form-label'>Status Perkawinan</div>
    <div>{{ $student->marital_status_text ?? "-" }}</div>
</div>

<!-- Static Field for Alamat -->
<div class="form-group">
    <div class='form-label'>Alamat</div>
    <div>{{ $student->address ?? "-" }}</div>
</div>

<!-- Static Field for Email -->
<div class="form-group">
    <div class='form-label'>Email</div>
    <div>{{ $student->email ?? "-" }}</div>
</div>

<!-- Static Field for No HP -->
<div class="form-group">
    <div class='form-label'>No HP</div>
    <div>{{ $student->phone ?? "-" }}</div>
</div>

<!-- Static Field for Status -->
<div class="form-group">
    <div class='form-label'>Status</div>
    <div>{{ $student->status_text }}</div>
</div>
