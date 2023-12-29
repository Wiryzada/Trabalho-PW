@extends('layouts.main')

@section('page-title', 'Editar Instituição')

@section('content')
<h1>Editar Instituição</h1>

<form method="POST" action="{{ route('institutions.update', $institution->id) }}">
    @csrf
    @method('PUT')
    <div class="form-inputs">
        <label for="name">Nome da Instituição</label>
        <input type="text" name="name" id="name" value="{{ $institution->name }}" />

        <label for="acronym">Sigla</label>
        <input type="text" name="acronym" id="acronym" value="{{ $institution->acronym }}" />
    </div>
    <div class="form-buttons">
        <button type="submit" class="form-button">Editar Instituição</button>
        <button type="button" class="form-button-cancel" onclick="window.history.back()">Cancelar</button>
    </div>
</form>
@endsection