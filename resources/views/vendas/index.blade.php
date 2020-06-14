@extends('layout')
@section('content')

<h2 class="text-center">Listar Vendas</h2>
<br><br>
<form action="/vendas/create">
    <div class="field">
        <div class="control">
            <button type="submit" class="btn btn-success">Nova Venda</button>
        </div>
    </div>
</form>
<br>
<div class="table-responsive">
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
    <tr>
        <th>ID</th>
        <th>Data Venda</th>
        <th>Funcionário</th>
        <th>Cliente</th>
        <th>Status</th>
        <th>Total</th>
        <th>Ações</th>
    </tr>
    @foreach ($vendas as $venda)
        <tr>
            <td>{{$venda->id}}</td>
            <td>{{date('d/m/Y', strtotime($venda->datavenda))}}</td>
            <td>{{$venda->funcionario->apelido}}</td>
            <td>{{$venda->cliente->nome}}</td>
            <td>{{$venda->status->descricao}}</td>
            <td>R$ {{$venda->subtotal}}</td>
            <td>
                <a class="btn btn-success" href="{{ route('recebimentos.adicionar', $venda->id) }}">Finalizar</a>
                <a class="btn btn-primary" href="{{ route('vendas.edit', $venda->id) }}">Editar</a>
                <a class="btn btn-danger" href="{{ route('vendas.cancelar', $venda->id) }}">Cancelar</a>
            </td>
        </tr>
    @endforeach
    </table>
</div>
<br><br>
<h2 class="text-center">Vendas Finalizadas</h2>
<br>
<div class="table-responsive">
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
    <tr>
        <th>ID</th>
        <th>Data Venda</th>
        <th>Funcionário</th>
        <th>Cliente</th>
        <th>Status</th>
        <th>Subtotal</th>
        <th>Desconto (%)</th>
        <th>Total</th>
        <th>Ações</th>
    </tr>
    @foreach ($fvendas as $fvenda)
        <tr>
            <td>{{$fvenda->id}}</td>
            <td>{{date('d/m/Y', strtotime($fvenda->datavenda))}}</td>
            <td>{{$fvenda->funcionario->apelido}}</td>
            <td>{{$fvenda->cliente->nome}}</td>
            <td>{{$fvenda->status->descricao}}</td>
            <td>R$ {{$fvenda->subtotal}}</td>
            <td>{{$fvenda->desconto}}</td>
            <td>R$ {{$fvenda->total}}</td>
            <td>
                <a class="btn btn-secondary" href="{{ route('vendas.show', $fvenda->id) }}">Mostrar</a>
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
