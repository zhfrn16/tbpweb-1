@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Proposal KP' => route('frontend.myintern-proposals.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui()->toolbar_btn(route('frontend.myintern-proposals.create'), 'cil-playlist-add', 'Tambah Proposal') !!}
@endsection

@section('content')

    <div class="card">

        <div class="card-header">
            <strong>List Proposal KP</strong>
        </div>

        <div class="card-body">
            <table class="table table-outline table-hover">
                <thead class="thead-light">
                <tr>
                    <th>Instansi</th>
                    <th>Periode</th>
                    <th>Pengusul</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @forelse($internships as $internship)
                    <tr>
                        <td>{{ $internship->proposal->agency->name }}</td>
                        <td>
                            {{ $internship->proposal->start_at }}
                            <br>
                            s/d
                            <br>
                            {{ $internship->proposal->end_at }}
                        </td>
                        <td>
                            @foreach($internship->proposal->members as $member)
                                <div>
                                    {{ $member->student->name }} <br>
                                    <small>{{ $member->student->nim }}</small>
                                </div>
                            @endforeach
                        </td>
                        <td>
                            <h4>{!! $internship->proposal->status_text !!}</h4>
                        </td>
                        <td>
                            {!! cui()->btn_view(route('frontend.myintern-proposals.show', [$internship->proposal->id])) !!}
                            {!! cui()->btn_edit(route('frontend.myintern-proposals.edit', [$internship->proposal->id])) !!}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Belum ada proposal</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">

        </div>

    </div>

@endsection
