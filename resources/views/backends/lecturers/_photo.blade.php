<div class="card">
    {{-- CARD HEADER--}}
    <div class="card-header">
        <i class="cil-camera"></i> <strong>Foto </strong>
    </div>

    {{-- CARD BODY--}}
    <div class="card-body">
        <div class="text-center">
            <img src="{{ asset($lecturer->photo_url_m) }}" class="img-fluid rounded" alt="...">
        </div>
    </div>
</div>
