@extends('layout')
@section('content')

<h2><center>Listar Funcionários</center></h2>
<br>
<br>
<form action="/funcionarios/create">
    <div class="field">
        <div class="control">
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </div>
    </div>
</form>
<br>
<div class="table-responsive">
    <table class="table table-striped table-hover">
    <tr class="table-active">
        <th>ID</th>
        <th>Cargo</th>
        <th>Data de Cadastro</th>
        <th>Nome</th>
        <th>Telefone 1</th>
        <th>Telefone 2</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    @foreach ($funcionarios as $funcionario)
        <tr>
            <td>{{$funcionario->id}}</td>
            <td>{{$funcionario->cargo->descricao}}</td>
            <td>{{date('d/m/Y', strtotime($funcionario->datacadastro))}}</td>
            <td>{{$funcionario->nome}}</td>
            <td>{{$funcionario->fone1}}</td>
            <td>{{$funcionario->fone2}}</td>
            <td>{{$funcionario->email}}</td>
            <td>

                <a class="btn btn-secondary" href="{{ route('funcionarios.show', $funcionario->id) }}">Mostrar</a>
                <a class="btn btn-success" href="{{ route('funcionarios.edit', $funcionario->id) }}">Editar</a>
                <button class="btn btn-danger" data-toggle="modal" data-target="#delete" data-cat_id="{{$funcionario->id}}">Remover</button>

            </td>
        </tr>
    @endforeach
    </table>
</div>

<br>
<br>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif

<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="TituloModalCentralizado">Excluir Funcionário</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('funcionarios.destroy', $funcionario->id)}}" method="POST">
            @csrf
            @method("DELETE")
            <div class="modal-body">
                <h5><center>Funcionário {{$funcionario->id}} - {{$funcionario->nome}}</center></h5>
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
    </div>
  </div>

@endsection
