@extends('layout')
@section('content')

<h2 class="text-center">Relatório de Funcionários - Geral</h2>
<br><br>
<div class="table-responsive">
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Cargo</th>
            <th>Cadastro</th>
            <th>Nome Completo</th>
            <th>Apelido</th>
            <th>Telefone</th>
            <th>Email</th>
        </tr>
    @foreach ($funcionarios as $funcionario)
        <tr>
            <td>{{$funcionario->id}}</td>
            <td>{{$funcionario->cargo->descricao}}</td>
            <td>{{date('d/m/Y', strtotime($funcionario->datacadastro))}}</td>
            <td>{{$funcionario->nome}}</td>
            <td>{{$funcionario->apelido}}</td>
            <td>{{$funcionario->fone1}}</td>
            <td>{{$funcionario->email}}</td>
        </tr>
    @endforeach
    </table>
</div>

@endsection
