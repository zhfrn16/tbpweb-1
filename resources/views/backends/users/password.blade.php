@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Dosen' => route('backend.lecturers.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('breadcrumb-menu')
    {!! cui()->toolbar_btn(route('backend.students.index'), 'cil-list', 'List Mahasiswa') !!}
    {!! cui()->toolbar_btn(route('backend.lecturers.index'), 'cil-list', 'List Dosen') !!}
    {!! cui()->toolbar_btn(route('backend.staffs.index'), 'cil-list', 'List Tendik') !!}
@endsection

@section('content')

    <div class="card">

        {{ html()->form('PUT', route('backend.users.update', [$user->id]))->open() }}

        <div class="card-header">
            <strong>Edit Pengguna</strong>
        </div>

        <div class="card-body">
            <!-- Static Field for Name -->
            <div class="form-group">
                <div><strong>Name</strong></div>
                <div>{{ $user->name }}</div>
            </div>

            <!-- Static Field for Username -->
            <div class="form-group">
                <div><strong>Username</strong></div>
                <div>{{ $user->username }}</div>
            </div>

            <!-- Static Field for Email -->
            <div class="form-group">
                <div><strong>Email</strong></div>
                <div>{{ $user->email }}</div>
            </div>

            <!-- Text Field Input for Password -->
            <div class="form-group">
                <label class="form-label" for="password"><strong>Password</strong></label>
                {{ html()->password('password')->class(["form-control", "is-invalid" => $errors->has('password')])->id('password')->placeholder('Kosongkan jika tidak ingin mengubah password') }}
                @error('password')
                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                @enderror
            </div>

            <div class="form-group">
                <strong>{{ html()->label('Roles', 'roles')->class(['control-label']) }}</strong>
                @foreach($roles as $role)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox"
                               class="custom-control-input"
                               @if($user->hasRole($role)) checked @endif
                               id="role_{{$role->name}}"
                               name="roles[{{$role->name}}]"
                               value="{{ $role->name }}">
                        <label class="custom-control-label"
                               for="role_{{$role->name}}">{{ $role->name }}</label>
                    </div>
                @endforeach
            </div>

            <div class="col-xs-12 form-group">
                <strong>{{ html()->label('Status User', 'active')->class(['control-label']) }}</strong>
                <div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox"
                               class="custom-control-input"
                               @if($user->active == 1) checked @endif
                               id="active"
                               name="active"
                               value="1">
                        <label class="custom-control-label"
                               for="active">Aktif</label>
                    </div>
                    @error('active'))
                        <div class="invalid-feedback"> {{ $errors->first('active') }} </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="card-footer">
            <input type="submit" class="btn btn-primary" value="Simpan"/>
        </div>

    </div>

    {{ html()->form()->close() }}

@endsection
