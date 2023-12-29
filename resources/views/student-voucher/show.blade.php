@extends('layouts.student')

@section('page-title', 'Solicitar Carteirinha')

@section('content')
<h1>Visualizar Pedido</h1>

<div class="card">
    <div class="card-header">
        <h2>Dados do Estudante</h2>
    </div>
    <div class="card-body">
        <p><strong>Nome:</strong> {{ $voucher->student->user->name }}</p>
        <p><strong>E-mail:</strong> {{ $voucher->student->user->email }}</p>
        <p><strong>CPF:</strong> {{ $voucher->student->cpf }}</p>
        <p><strong>Matrícula:</strong> {{ $voucher->student->enrollment }}</p>
        <p><strong>Curso:</strong> {{ $voucher->student->course->name }}</p>
        <p><strong>Instituição:</strong> {{ $voucher->student->course->institution->name }}</p>
    </div>

    <div class="card-header">
        <h2>Dados do Pedido</h2>

        @if ($voucher->status == 'Pendente')
        <form action="{{ route('student-voucher.update', $voucher->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="Pendente" selected>Pendente</option>
                <option value="Aprovado">Aprovado</option>
                <option value="Reprovado">Reprovado</option>
            </select>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
        @endif
    </div>
    @endsection