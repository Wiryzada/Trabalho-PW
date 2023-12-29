@extends('layouts.main')

@section('page-title', 'Cursos')

@section('content')
<div class="header">
    <h1 class="title-header">
        Cursos
    </h1>

    <div class="actions">
        <a href="{{ route('courses.create') }}">Novo Curso</a>
    </div>
</div>

<table class="styled-table">
    <thead>
        <tr>
            <th>Curso</th>
            <th>Sigla</th>
            <th>Grau Acadêmico</th>
            <th>Instituição</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($courses as $course)
        <tr>
            <td>{{ $course->name }}</td>
            <td>
                @if ($course->acronym)
                {{ $course->acronym }}
                @else
                -
                @endif
            </td>
            <td>{{ $course->type }}</td>
            <td>{{ $course->institution_name }}</td>
            <td class="actions-table">
                <a href="{{ route('courses.edit', $course->id) }}" class="edit-table">Editar</a>
                <form method="POST" action="{{ route('courses.destroy', $course->id) }}" class="delete-table">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach

        @if ($courses->isEmpty())
        <tr>
            <td colspan="3">Não há cursos cadastrados.</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection