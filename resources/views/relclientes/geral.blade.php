@extends('layout')
@section('content')

<h2 class="text-center">Relatório Geral de Clientes</h2>
<br><br>
<div class="table-responsive">
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Cadastro</th>
            <th>Nome</th>
            <th>Apelido</th>
            <th>Status</th>
        </tr>
    @foreach ($clientes as $cliente)
        <tr>
            <td>{{$cliente->id}}</td>
            <td>{{$cliente->tipo->descricao}}</td>
            <td>{{date('d/m/Y', strtotime($cliente->datacadastro))}}</td>
            <td>{{$cliente->nome}}</td>
            <td>{{$cliente->apelido}}</td>
            <td>{{$cliente->status->descricao}}</td>
        </tr>
    @endforeach
    </table>
    <br>
    <div class="pull-right">
        <strong>Total de Clientes: </strong> {{$total}}
    </div>
</div>

@endsection
