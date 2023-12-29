@extends('layouts.main')

@section('page-title', 'Página Inicial')

@section('content')
<div class="header">
    <h1 class="title-header">
        Pedidos
    </h1>
</div>

<table class="styled-table">
    <thead>
        <tr>
            <th>Data do Pedido</th>
            <th>Estudante</th>
            <th>Curso</th>
            <th>Instituição</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>

        @foreach($orders as $order)
        <tr>
            <td>{{ $order->created_at->format('d/m/Y') }}</td>
            <td>{{ $order->student->user->name }}</td>
            <td>{{ $order->student->course->name }}</td>
            <td>{{ $order->student->course->institution->name }}</td>
            <td>{{ $order->status }}</td>
            <td class="actions-table">
                <a href="{{ route('student-voucher.show', $order->id) }}" class="btn btn-primary">Visualizar</a>
            </td>
        </tr>
        @endforeach

        @if ($orders->isEmpty())
        <tr>
            <td colspan="5">Não há pedidos cadastrados.</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection