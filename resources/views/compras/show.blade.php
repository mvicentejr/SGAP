@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Mostrar Compra</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <div class="field">
            <strong>Compra: </strong> {{$compra->id}}
        </div>
        <div class="field">
            <strong>Data Compra: </strong> {{date('d/m/Y', strtotime($compra->datacompra))}}
        </div>
        <div class="field">
            <strong>Fornecedor: </strong> {{$compra->fornecedor->nome}}
        </div>
        <div class="field">
            <strong>Nota Fiscal: </strong> {{$compra->nota}}
        </div>
        <div class="field">
            <strong>Total: </strong> R$ {{$compra->total}}
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
            @foreach ($compra->itens as $item)
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
        <a class="btn btn-warning" href="{{route('compras.index')}}">Voltar</a>
    </div>
</div>

@endsection
