@extends('layouts.main')

@section('page-title', 'Criar Instituição')

@section('content')
<h1>Criar Instituição</h1>

<form method="POST" action="{{ route('institutions.store') }}">
    @csrf
    <div class="form-inputs">
        <label for="name">Nome da Instituição</label>
        <input type="text" name="name" id="name" />

        <label for="acronym">Sigla</label>
        <input type="text" name="acronym" id="acronym" />
    </div>
    <div class="form-buttons">
        <button type="submit" class="form-button">Criar Instituição</button>
        <button type="button" class="form-button-cancel" onclick="window.history.back()">Cancelar</button>
    </div>
</form>
@endsection