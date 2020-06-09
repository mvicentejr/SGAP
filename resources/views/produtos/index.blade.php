@extends('layout')
@section('content')

<h2 class="text-center">Listar Produtos</h2>
<br><br>
<form action="/produtos/create">
    <div class="field">
        <div class="control">
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </div>
    </div>
</form>
<br>
<div class="table-responsive">
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
    <tr>
        <th>ID</th>
        <th>Descrição</th>
        <th>Aplicação</th>
        <th>Marca</th>
        <th>Montadora</th>
        <th>Ações</th>
    </tr>
    @foreach ($produtos as $produto)
        <tr>
            <td>{{$produto->id}}</td>
            <td>{{$produto->descricao}}</td>
            <td>{{$produto->aplicacao}}</td>
            <td>{{$produto->marca->descricao}}</td>
            <td>{{$produto->montadora->descricao}}</td>
            <td>
                <a class="btn btn-secondary" href="{{ route('produtos.show', $produto->id) }}">Mostrar</a>
                <a class="btn btn-success" href="{{ route('produtos.edit', $produto->id) }}">Editar</a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$produto->id}}">
                    Remover
                </button>
            </td>
        </tr>

         <!-- Modal -->
    <div class="modal fade" id="exampleModal{{$produto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$produto->nome}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('produtos.destroy', $produto->id)}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <div class="modal-body">
                            <h5 class="text-center">Produto {{$produto->id}} - {{$produto->descricao}}</h5>
                            <br>
                            <p class="text-center">
                                Tem certeza da remoção?
                            </p>
                            <input type="hidden" name="funcionario_id" id="cat_id" value="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não, Cancelar</button>
                            <button type="submit" class="btn btn-danger">Sim, Remover</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>

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
