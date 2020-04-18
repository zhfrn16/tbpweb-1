<div class="form-group">
    {{ html()->label('Name*', 'name')->class(['control-label']) }}
    {{ html()->text('name', old('name'))->class(['form-control', 'is-invalid' => $errors->has('name')])->id('name') }}
    @if($errors->has('name'))
        <div class="invalid-feedback">
            {{ $errors->first('name') }}
        </div>
    @endif
</div>

