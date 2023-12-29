@extends('layouts.main')

@section('page-title', 'Editar Curso')

@section('content')
<h1>Editar Curso</h1>

<form method="POST" action="{{ route('courses.update', $course->id) }}">
    @csrf
    @method('PUT')
    <div class="form-inputs">
        <label for="name">Nome do Curso</label>
        <input type="text" name="name" id="name" value="{{ $course->name }}" />

        <label for="acronym">Sigla</label>
        <input type="text" name="acronym" id="acronym" value="{{ $course->acronym }}" />

        <label for="type">Tipo</label>
        <select name="type" id="type">
            <option value="" disabled>Selecione um tipo</option>
            <option value="Ensino Fundamental" {{ $course->type === 'Ensino Fundamental' ? 'selected' : ''
                }}>Ensino Fundamental</option>
            <option value="Ensino Médio" {{ $course->type === 'Ensino Médio' ? 'selected' : '' }}>Ensino Médio
            </option>
            <option value="Ensino Técnico" {{ $course->type === 'Ensino Técnico' ? 'selected' : '' }}>Ensino
                Técnico</option>
            <option value="Bacharelado" {{ $course->type === 'Bacharelado' ? 'selected' : '' }}>Bacharelado
            </option>
            <option value="Licenciatura" {{ $course->type === 'Licenciatura' ? 'selected' : '' }}>Licenciatura
            </option>
            <option value="Tecnólogo" {{ $course->type === 'Tecnólogo' ? 'selected' : '' }}>Tecnólogo</option>
            <option value="Especialização" {{ $course->type === 'Especialização' ? 'selected' : ''
                }}>Especialização</option>
            <option value="Mestrado" {{ $course->type === 'Mestrado' ? 'selected' : '' }}>Mestrado</option>
            <option value="Doutorado" {{ $course->type === 'Doutorado' ? 'selected' : '' }}>Doutorado</option>
        </select>

        <label for="institution_id">Instituição</label>
        <select name="institution_id" id="institution_id">
            <option value="" disabled>Selecione uma instituição</option>
            @foreach ($institutions as $institution)
            <option value="{{ $institution->id }}" {{ $course->institution_id === $institution->id ? 'selected'
                : '' }}>{{ $institution->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-buttons">
        <button type="submit" class="form-button">Editar Curso</button>
        <button type="button" class="form-button-cancel" onclick="window.history.back()">Cancelar</button>
    </div>
</form>
@endsection