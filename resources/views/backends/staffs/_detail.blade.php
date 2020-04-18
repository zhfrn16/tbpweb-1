<!-- Static Field for Nama -->
<div class="form-group">
    <div class='form-label'>Nama</div>
    <div>{{ $staff->name }}</div>
</div>

<!-- Static Field for NIP -->
<div class="form-group">
    <div class='form-label'>NIP</div>
    <div>{{ $staff->nip ?? "-"}}</div>
</div>

<!-- Static Field for NIK -->
<div class="form-group">
    <div class='form-label'>NIK</div>
    <div>{{ $staff->nik ?? "-" }}</div>
</div>

<!-- Static Field for Karpeg -->
<div class="form-group">
    <div class='form-label'>Karpeg</div>
    <div>{{ $staff->karpeg ?? "-" }}</div>
</div>

<!-- Static Field for NPWP -->
<div class="form-group">
    <div class='form-label'>NPWP</div>
    <div>{{ $staff->npwp ?? "-" }}</div>
</div>

<!-- Static Field for Jurusan -->
<div class="form-group">
    <div class='form-label'>Jurusan</div>
    <div>{{ optional($staff->department)->name ?? "-"}}</div>
</div>


<div class="row">
    <div class="col-md-6">
        <!-- Static Field for Tempat Lahir -->
        <div class="form-group">
            <div class='form-label'>Tempat Lahir</div>
            <div>{{ $staff->birthplace ?? "-" }}</div>
        </div>
    </div>

    <div class="col-md-6">
        <!-- Static Field for Tanggal Lahir -->
        <div class="form-group">
            <div class='form-label'>Tanggal Lahir</div>
            <div>{{ optional($staff->birthday)->toDateString() ?? "-"}}</div>
        </div>
    </div>
</div>

<!-- Static Field for Jenis Kelamin -->
<div class="form-group">
    <div class='form-label'>Jenis Kelamin</div>
    <div>{{ $staff->gender_text ?? "-" }}</div>
</div>

<!-- Static Field for Agama -->
<div class="form-group">
    <div class='form-label'>Agama</div>
    <div>{{ $staff->religion_text ?? '-' }}</div>
</div>

<!-- Static Field for Status Perkawinan -->
<div class="form-group">
    <div class='form-label'>Status Perkawinan</div>
    <div>{{ $staff->marital_status_text ?? "-" }}</div>
</div>

<!-- Static Field for Email -->
<div class="form-group">
    <div class='form-label'>Email</div>
    <div>{{ $staff->email ?? "-" }}</div>
</div>

<!-- Static Field for No. HP -->
<div class="form-group">
    <div class='form-label'>No. HP</div>
    <div>{{ $staff->phone ?? "-" }}</div>
</div>

<!-- Static Field for Alamat -->
<div class="form-group">
    <div class='form-label'>Alamat</div>
    <div>{{ $staff->address ?? "-"}}</div>
</div>

<!-- Static Field for Ikatan Kerja -->
<div class="form-group">
    <div class='form-label'>Ikatan Kerja</div>
    <div>{{ $staff->association_type_text ?? '-' }}</div>
</div>


<!-- Static Field for Status -->
<div class="form-group">
    <div class='form-label'>Status</div>
    <div>{{ $staff->status_text ?? "-" }}</div>
</div>
