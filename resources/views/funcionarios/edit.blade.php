@extends('layout')
@section('content')
<div class="col-lg-6 margin-tb">
    <div class="pull-right">
        <h2><center>Editar Funcionário<center></h2>
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="{{ route('funcionarios.update', $funcionario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="field">
            <strong>ID: </strong> {{$funcionario->id}}
        </div>
        <div class="field">
            <strong>Data de Cadastro: </strong> {{date('d/m/Y H:i', strtotime($funcionario->datacadastro))}}
        </div>
        <div class="form-row align-items-center">
            <div class="col-auto my-1">
              <label class="mr-sm-2" for="estcivil"><strong>Cargo: </strong>{{$funcionario->cargo->descricao}}</label>
              <select class="custom-select mr-sm-2" id="cargo" name="cargo">
              <option selected>{{$funcionario->cargo->id}}</option>
                @foreach ($cargos as $cargo)
                    <option value="{{$cargo->id}}">{{$cargo->descricao}}</option>
                @endforeach
              </select>
            </div>
        </div>
        <div class="field">
            <strong>Nome: </strong>
            <div class="control">
                <input type="text" class="input" name="nome" value="{{$funcionario->nome}}">
            </div>
        </div>
        <div class="field">
            <strong>Apelido: </strong>
            <div class="control">
                <input type="text" class="input" name="apelido" value="{{$funcionario->apelido}}">
            </div>
        </div>
        <div class="field">
            <strong>CPF: </strong>
            <div class="control">
                <input type="text" class="input" name="cpf" value="{{$funcionario->cpf}}">
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <strong>RG: </strong>
                <div class="control">
                    <input type="text" class="input" name="rg" value="{{$funcionario->rg}}">
                </div>
            </div>
            <div class="col-3">
                <strong>Órgão Emissor: </strong>
                <div class="control">
                    <input type="text" class="input" name="oemissor" value="{{$funcionario->oemissor}}">
                </div>
            </div>
        </div>
        <div class="field">
            <strong>Data de Nascimento: </strong>
            <div class="control">
                <input type="date" class="input" name="datanasc" value="{{$funcionario->datanasc}}">
            </div>
        </div>
        <div class="form-row align-items-center">
            <div class="col-auto my-1">
              <label class="mr-sm-2" for="genero"><strong>Gênero: </strong></label>
              <select class="custom-select mr-sm-2" id="genero" name="genero">
              <option selected>{{$funcionario->genero}}</option>
                @foreach ($generos as $genero)
                    <option value="{{$genero}}">{{$genero}}</option>
                @endforeach
              </select>
            </div>
        </div>
        <div class="form-row align-items-center">
            <div class="col-auto my-1">
              <label class="mr-sm-2" for="estcivil"><strong>Estado Civil: </strong></label>
              <select class="custom-select mr-sm-2" id="estcivil" name="estcivil">
              <option selected>{{$funcionario->estcivil}}</option>
                @foreach ($estados as $estado)
                    <option value="{{$estado}}">{{$estado}}</option>
                @endforeach
              </select>
            </div>
        </div>
        <div class="field">
            <strong>Cônjuge: </strong>
            <div class="control">
                <input type="text" class="input" name="conjuge" value="{{$funcionario->conjuge}}">
            </div>
        </div>
        <div class="form-row align-items-center">
            <div class="col-auto my-1">
            <label class="mr-sm-2" for="cep"><strong>CEP: </strong>
                {{$funcionario->cep->codigo}} - {{$funcionario->cep->rua}} - {{$funcionario->cep->bairro}} - {{$funcionario->cep->cidade}} - {{$funcionario->cep->uf}}</label>
              <select class="custom-select mr-sm-2" id="cep" name="cep">
              <option selected>{{$funcionario->cep->id}}</option>
                @foreach ($ceps as $cep)
                    <option value="{{$cep->id}}">{{$cep->codigo}} - {{$cep->rua}} - {{$cep->bairro}} - {{$cep->cidade}} - {{$cep->uf}}</option>
                @endforeach
              </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col-3">
                <strong>Número: </strong>
                <div class="control">
                    <input type="text" class="input" name="numero" value="{{$funcionario->numero}}">
                </div>
            </div>
            <div class="col">
                <strong>Complemento: </strong>
                <div class="control">
                    <input type="text" class="input" name="complemento" value="{{$funcionario->complemento}}">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <strong>Telefone 1: </strong>
                <div class="control">
                    <input type="text" class="input" name="fone1" value="{{$funcionario->fone1}}">
                </div>
            </div>
            <div class="col">
                <strong>Telefone 2: </strong>
                <div class="control">
                    <input type="text" class="input" name="fone2" value="{{$funcionario->fone2}}">
                </div>
            </div>
        </div>
        <div class="field">
            <strong>Email: </strong>
            <div class="control">
                <input type="text" class="input" name="email" value="{{$funcionario->email}}">
            </div>
        </div>
        <div class="field">
            <strong>Observações: </strong>
            <div class="control">
                <input type="text" class="input" name="observacao" value="{{$funcionario->observacao}}">
            </div>
        </div>
        <br><br>
        <input type="submit" class="button btn-success" value="Gravar">
        <input type="reset" class="button btn-secondary" value="Limpar">
        <a class="btn btn-warning" href="{{route('funcionarios.index')}}">Voltar</a>
    </form>
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
