@extends('layout')
@section('content')

<h2 class="text-center">Relatório de Compras - Por Fornecedor</h2>
<br><br>
<div class="table-responsive">
    <div class="pull-right">
        <strong>Fornecedor: </strong> {{$fornecedor->nome}}
    </div>
    <br>
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Data Compra</th>
            <th>Funcionário</th>
            <th>Nota</th>
            <th>Total</th>
        </tr>
    @foreach ($compras as $compra)
        <tr>
            <td>{{$compra->id}}</td>
            <td>{{date('d/m/Y', strtotime($compra->datacompra))}}</td>
            <td>{{$compra->funcionario->apelido}}</td>
            <td>{{$compra->nota}}</td>
            <td>R$ {{$compra->total}}</td>
        </tr>
    @endforeach
    </table>
    <br>
    <div class="pull-right">
        <strong>Total de Compras: </strong> {{$total}}
    </div>
    <div class="pull-right">
        <strong>Valor Total: </strong> R$ {{$totalvalor}}
    </div>
</div>

@endsection
