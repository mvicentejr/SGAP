@extends('layout')
@section('content')

<h2 class="text-center">Relatório de Vendas - Por Cliente</h2>
<br><br>
<div class="table-responsive">
    <div class="pull-right">
        <strong>Cliente: </strong> {{$cliente->nome}}
    </div>
    <br>
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Data Venda</th>
            <th>Funcionário</th>
            <th>Status</th>
            <th>Total</th>
        </tr>
    @foreach ($vendas as $venda)
        <tr>
            <td>{{$venda->id}}</td>
            <td>{{date('d/m/Y', strtotime($venda->datavenda))}}</td>
            <td>{{$venda->funcionario->apelido}}</td>
            <td>{{$venda->status->descricao}}</td>
            <td>R$ {{$venda->total}}</td>
        </tr>
    @endforeach
    </table>
    <br>
    <div class="pull-right">
        <strong>Total de Vendas: </strong> {{$total}}
    </div>
    <div class="pull-right">
        <strong>Valor Total: </strong> R$ {{$totalvalor}}
    </div>
</div>

@endsection
