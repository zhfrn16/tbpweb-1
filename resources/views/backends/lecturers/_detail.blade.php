<!-- Static Field for Nama -->
<div class="form-group">
    <div class='form-label'>Nama</div>
    <div>{{ $lecturer->name }}</div>
</div>

<!-- Static Field for NIP -->
<div class="form-group">
    <div class='form-label'>NIP</div>
    <div>{{ $lecturer->nip ?? "-"}}</div>
</div>

<!-- Static Field for NIDNj -->
<div class="form-group">
    <div class='form-label'>NIDN</div>
    <div>{{ $lecturer->nidn ?? "-" }}</div>
</div>

<!-- Static Field for NIK -->
<div class="form-group">
    <div class='form-label'>NIK</div>
    <div>{{ $lecturer->nik ?? "-" }}</div>
</div>

<!-- Static Field for Karpeg -->
<div class="form-group">
    <div class='form-label'>Karpeg</div>
    <div>{{ $lecturer->karpeg ?? "-" }}</div>
</div>

<!-- Static Field for NPWP -->
<div class="form-group">
    <div class='form-label'>NPWP</div>
    <div>{{ $lecturer->npwp ?? "-" }}</div>
</div>

<!-- Static Field for Jurusan -->
<div class="form-group">
    <div class='form-label'>Jurusan</div>
    <div>{{ optional($lecturer->department)->name ?? "-"}}</div>
</div>


<div class="row">
    <div class="col-md-6">
        <!-- Static Field for Tempat Lahir -->
        <div class="form-group">
            <div class='form-label'>Tempat Lahir</div>
            <div>{{ $lecturer->birthplace ?? "-" }}</div>
        </div>
    </div>

    <div class="col-md-6">
        <!-- Static Field for Tanggal Lahir -->
        <div class="form-group">
            <div class='form-label'>Tanggal Lahir</div>
            <div>{{ optional($lecturer->birthday)->toDateString() ?? "-"}}</div>
        </div>
    </div>
</div>

<!-- Static Field for Jenis Kelamin -->
<div class="form-group">
    <div class='form-label'>Jenis Kelamin</div>
    <div>{{ $lecturer->gender_text ?? "-" }}</div>
</div>

<!-- Static Field for Agama -->
<div class="form-group">
    <div class='form-label'>Agama</div>
    <div>{{ $lecturer->religion_text ?? '-' }}</div>
</div>

<!-- Static Field for Status Perkawinan -->
<div class="form-group">
    <div class='form-label'>Status Perkawinan</div>
    <div>{{ $lecturer->marital_status_text ?? "-" }}</div>
</div>

<!-- Static Field for Email -->
<div class="form-group">
    <div class='form-label'>Email</div>
    <div>{{ $lecturer->email ?? "-" }}</div>
</div>

<!-- Static Field for No. HP -->
<div class="form-group">
    <div class='form-label'>No. HP</div>
    <div>{{ $lecturer->phone ?? "-" }}</div>
</div>

<!-- Static Field for Alamat -->
<div class="form-group">
    <div class='form-label'>Alamat</div>
    <div>{{ $lecturer->address ?? "-"}}</div>
</div>

<!-- Static Field for Ikatan Kerja -->
<div class="form-group">
    <div class='form-label'>Ikatan Kerja</div>
    <div>{{ $lecturer->association_type_text ?? '-' }}</div>
</div>


<!-- Static Field for Status -->
<div class="form-group">
    <div class='form-label'>Status</div>
    <div>{{ $lecturer->status_text ?? "-" }}</div>
</div>
