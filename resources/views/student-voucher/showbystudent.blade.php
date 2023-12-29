@extends('layouts.student')

@section('page-title', 'Solicitar Carteirinha')

@section('content')
<div class="card">
    <div class="card-body">
        <p><strong>Nome:</strong> {{ $voucher->student->user->name }}</p>
        <p><strong>E-mail:</strong> {{ $voucher->student->user->email }}</p>
        <p><strong>CPF:</strong> {{ $voucher->student->cpf }}</p>
        <p><strong>Matrícula:</strong> {{ $voucher->student->enrollment }}</p>
        <p><strong>Curso:</strong> {{ $voucher->student->course->name }}</p>
        <p><strong>Instituição:</strong> {{ $voucher->student->course->institution->name }}</p>
        <p><strong>Validade:</strong> {{
            date('d/m/Y', strtotime($voucher->validity))
            }}</p>
        <p><strong>Código de Uso:</strong> {{ $voucher->code_voucher }}</p>
    </div>
</div>

<style>
    .card {
        width: 100%;
        height: auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .card-body {
        background-color: #e3e6f0;
    }

    .card-header {
        background-color: #fff;
        border-bottom: 1px solid #e3e6f0;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-body {
        padding: 20px;
    }

    .card-body p {
        margin-bottom: 10px;
    }

    .card-body strong {
        font-weight: bold;
    }

    .card-body .btn {
        margin-top: 20px;
    }

    .card-body .btn-primary {
        background-color: #1d68a7;
        border-color: #1d68a7;
    }

    .card-body .btn-primary:hover {
        background-color: #1d68a7;
        border-color: #1d68a7;
    }

    .card-body .btn-primary:focus {
        box-shadow: none;
    }
</style>
@endsection