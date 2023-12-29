@extends('layouts.main')

@section('page-title', 'Instituições')

@section('content')
<div class="header">
    <h1 class="title-header">
        Instituições
    </h1>

    <div class="actions">
        <a href="{{ route('institutions.create') }}">Nova Instituição</a>
    </div>
</div>

<table class="styled-table">
    <thead>
        <tr>
            <th>Instituição</th>
            <th>Sigla</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($institutions as $institution)
        <tr>
            <td>{{ $institution->name }}</td>
            <td>{{ $institution->acronym }}</td>
            <td class="actions-table">
                <a href="{{ route('institutions.edit', $institution->id) }}">Editar</a>
                <form method="POST" action="{{ route('institutions.destroy', $institution->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach

        @if ($institutions->isEmpty())
        <tr>
            <td colspan="3">Não há instituições cadastradas.</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection