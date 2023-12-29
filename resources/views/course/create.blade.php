@extends('layouts.main')

@section('page-title', 'Criar Curso')

@section('content')
<h1>Criar Curso</h1>

<form method="POST" action="{{ route('courses.store') }}">
    @csrf
    <div class="form-inputs">
        <label for="name">Nome do Curso</label>
        <input type="text" name="name" id="name" />

        <label for="acronym">Sigla</label>
        <input type="text" name="acronym" id="acronym" />

        <label for="type">Tipo</label>
        <select name="type" id="type">
            <option value="" disabled>Selecione um tipo</option>
            <option value="Ensino Fundamental">Ensino Fundamental</option>
            <option value="Ensino Médio">Ensino Médio</option>
            <option value="Ensino Técnico">Ensino Técnico</option>
            <option value="Bacharelado">Bacharelado</option>
            <option value="Licenciatura">Licenciatura</option>
            <option value="Tecnólogo">Tecnólogo</option>
            <option value="Especialização">Especialização</option>
            <option value="Mestrado">Mestrado</option>
            <option value="Doutorado">Doutorado</option>
        </select>

        <label for="institution_id">Instituição</label>
        <select name="institution_id" id="institution_id">
            <option value="" disabled>Selecione uma instituição</option>
            @foreach ($institutions as $institution)
            <option value="{{ $institution->id }}">{{ $institution->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-buttons">
        <button type="submit" class="form-button">Criar Curso</button>
        <button type="button" class="form-button-cancel" onclick="window.history.back()">Cancelar</button>
    </div>
</form>
@endsection