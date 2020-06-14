@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Mostrar Venda</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <div class="field">
            <strong>Venda: </strong> {{$venda->id}}
        </div>
        <div class="field">
            <strong>Data Venda: </strong> {{date('d/m/Y', strtotime($venda->datavenda))}}
        </div>
        <div class="field">
            <strong>Status: </strong> {{$venda->status->descricao}}
        </div>
        <div class="field">
            <strong>Vendedor: </strong> {{$venda->funcionario->apelido}}
        </div>
        <div class="field">
            <strong>Cliente: </strong> {{$venda->cliente->nome}}
        </div>
        <div class="field">
            <strong>Subtotal: </strong> R$ {{$venda->subtotal}}
        </div>
        <div class="field">
            <strong>Desconto: </strong> R$ {{$venda->desconto * $venda->subtotal / 100}}
        </div>
        <div class="field">
            <strong>Total: </strong> R$ {{$venda->total}}
        </div>
        <br>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Unidade</th>
                <th>Quantidade</th>
                <th>Valor Item</th>
                <th>Total Item</th>
            </tr>
            @foreach ($venda->itens as $item)
            <tr>
                <td>{{$item->produto->id}}</td>
                <td>{{$item->produto->descricao}}</td>
                <td>{{$item->produto->unidade}}</td>
                <td>{{$item->quantidade}}</td>
                <td>{{$item->itemvalor}}</td>
                <td>{{$item->itemtotal}}</td>
            </tr>
            @endforeach
        </table>
        <br>
        <a class="btn btn-warning" href="{{route('vendas.index')}}">Voltar</a>
    </div>
</div>

@endsection
