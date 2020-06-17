@extends('layout')
@section('content')

<h2 class="text-center">Relatório Geral de Produtos</h2>
<br><br>
<div class="table-responsive">
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Marca</th>
            <th>Montadora</th>
            <th>Unidade</th>
            <th>Estoque</th>
            <th>Valor Compra</th>
            <th>Valor Venda</th>
        </tr>
    @foreach ($produtos as $produto)
        <tr>
            <td>{{$produto->id}}</td>
            <td>{{$produto->descricao}}</td>
            <td>{{$produto->marca->descricao}}</td>
            <td>{{$produto->montadora->descricao}}</td>
            <td>{{$produto->unidade}}</td>
            <td>{{$produto->estoque}}</td>
            <td>R$ {{$produto->custo}}</td>
            <td>R$ {{$produto->valorvenda}}</td>
        </tr>
    @endforeach
    </table>
    <br>
    <div class="pull-right">
        <strong>Total de Produtos: </strong> {{$total}}
    </div>
</div>

@endsection
