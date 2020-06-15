@extends('layout')
@section('content')

<h2 class="text-center">Bloquear / Desbloquear Clientes</h2>
<br><br>
<div class="table-responsive">
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
    <tr>
        <th>ID</th>
        <th>Tipo</th>
        <th>Data Cadastro</th>
        <th>Nome</th>
        <th>Apelido</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>
    @foreach ($clientes as $cliente)
        <tr>
            <td>{{$cliente->id}}</td>
            <td>{{$cliente->tipo->descricao}}</td>
            <td>{{date('d/m/Y', strtotime($cliente->datacadastro))}}</td>
            <td>{{$cliente->nome}}</td>
            <td>{{$cliente->apelido}}</td>
            <td>{{$cliente->status->descricao}}</td>
            <td>
                <form action="{{route('clientes.update', $cliente->id)}}" method="POST">
                    @csrf
                    @method("PUT")
                    <button class="btn btn-success" type="submit">Alterar</button>
                </form>
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
