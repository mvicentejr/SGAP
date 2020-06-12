@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Nova Compra - Adicionar Produtos</h2>
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
    </div>
    <br><br>
    <form action="/itenscompras/{{$compra->id}}/adicionar">
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
            @foreach ($compra->itens as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->produto->id}}</td>
                <td>{{$item->produto->descricao}}</td>
                <td>{{$item->produto->unidade}}</td>
                <td>{{$item->quantidade}}</td>
                <td>{{$item->itemvalor}}</td>
                <td>{{$item->itemtotal}}</td>
                <td>
                    <form action="{{route('itenscompras.destroy', $item->id)}}" method="POST">
                        <a class="btn btn-primary" href="{{ route('itenscompras.edit', $item->id) }}">Editar</a>
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger" type="submit">Remover</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <br>
        <a class="btn btn-dark" href="{{route('pagamentos.adicionar', $compra->id)}}">Finalizar Compra</a>
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

