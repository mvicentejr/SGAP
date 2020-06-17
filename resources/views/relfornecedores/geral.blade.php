@extends('layout')
@section('content')

<h2 class="text-center">Relatório Geral de Fornecedores</h2>
<br><br>
<div class="table-responsive">
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Cadastro</th>
            <th>Razão Social</th>
            <th>Nome Fantasia</th>
            <th>CNPJ</th>
        </tr>
    @foreach ($fornecedores as $fornecedor)
        <tr>
            <td>{{$fornecedor->id}}</td>
            <td>{{date('d/m/Y', strtotime($fornecedor->datacadastro))}}</td>
            <td>{{$fornecedor->nome}}</td>
            <td>{{$fornecedor->apelido}}</td>
            <td>{{$fornecedor->cnpj}}</td>
        </tr>
    @endforeach
    </table>
    <br>
    <div class="pull-right">
        <strong>Total de Fornecedores: </strong> {{$total}}
    </div>
</div>

@endsection
