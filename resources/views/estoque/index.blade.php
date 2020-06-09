@extends('layout')
@section('content')

<h2 class="text-center">Estoque Geral</h2>
<br><br>

<br>
<div class="table-responsive">
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
    <tr>
        <th>ID</th>
        <th>Descrição</th>
        <th>Aplicação</th>
        <th>Preço</th>
        <th>Estoque</th>
        <th>Mínimo</th>
        <th>Máximo</th>
        <th>Ações</th>
    </tr>
    @foreach ($produtos as $produto)
        <tr>
            <td>{{$produto->id}}</td>
            <td>{{$produto->descricao}}</td>
            <td>{{$produto->aplicacao}}</td>
            <td>{{$produto->valorvenda}}</td>
            <td>{{$produto->estoque}}</td>
            <td>{{$produto->eminimo}}</td>
            <td>{{$produto->emaximo}}</td>
            <td>
                <a class="btn btn-secondary" href="{{ route('estoque.show', $produto->id) }}">Mostrar</a>
                <a class="btn btn-success" href="{{ route('estoque.edit', $produto->id) }}">Editar</a>
            </td>
        </tr>
    @endforeach
    </table>
</div>
<br><br>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif

@endsection
