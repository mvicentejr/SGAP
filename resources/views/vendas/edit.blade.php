@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Nova Venda - Adicionar Produtos</h2>
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
            <strong>Total: </strong> R$ {{$venda->subtotal}}
        </div>
    </div>
    <br><br>
    <form action="/itensvendas/{{$venda->id}}/adicionar">
        <div class="field">
            <div class="control">
                <button type="submit" class="btn btn-success">Novo Item</button>
            </div>
        </div>
    </form>
    <br>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Produto</th>
                <th>Unidade</th>
                <th>Quantidade</th>
                <th>Valor Item</th>
                <th>Total Item</th>
                <th>Ações</th>
            </tr>
            @foreach ($venda->itens as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->produto->id}}</td>
                <td>{{$item->produto->descricao}}</td>
                <td>{{$item->produto->unidade}}</td>
                <td>{{$item->quantidade}}</td>
                <td>{{$item->itemvalor}}</td>
                <td>{{$item->itemtotal}}</td>
                <td>
                    <form action="{{route('itensvendas.destroy', $item->id)}}" method="POST">
                        <a class="btn btn-primary" href="{{ route('itensvendas.edit', $item->id) }}">Editar</a>
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger" type="submit">Remover</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <br>
        <a class="btn btn-dark" href="{{route('vendas.index')}}">Terminar</a>
    </div>
</div>

    <br><br>
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Opa!!!</strong>Existem erros na entrada de dados. <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

@endsection

