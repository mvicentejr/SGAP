@extends('layout')
@section('content')
<div class="col-lg-6 margin-tb">
    <div class="pull-right">
        <h2><center>Cadastrar Novo Funcionário<center></h2>
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="/funcionarios" method="POST">
        @csrf
            <div class="form-row align-items-center">
                <div class="col-auto my-1">
                  <label class="mr-sm-2" for="estcivil"><strong>Cargo: </strong></label>
                  <select class="custom-select mr-sm-2" id="cargo" name="cargo">
                        <option selected></option>
                    @foreach ($cargos as $cargo)
                        <option value="{{$cargo->id}}">{{$cargo->descricao}}</option>
                    @endforeach
                  </select>
                </div>
            </div>
            <div class="field">
                <strong>Nome: </strong>
                <div class="control">
                    <input type="text" class="input" name="nome">
                </div>
            </div>
            <div class="field">
                <strong>Apelido: </strong>
                <div class="control">
                    <input type="text" class="input" name="apelido">
                </div>
            </div>
            <div class="field">
                <strong>CPF: </strong>
                <div class="control">
                    <input type="text" class="input" name="cpf">
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <strong>RG: </strong>
                    <div class="control">
                        <input type="text" class="input" name="rg">
                    </div>
                </div>
                <div class="col-3">
                    <strong>Órgão Emissor: </strong>
                    <div class="control">
                        <input type="text" class="input" name="oemissor">
                    </div>
                </div>
            </div>
            <div class="field">
                <strong>Data de Nascimento: </strong>
                <div class="control">
                    <input type="date" class="input" name="datanasc">
                </div>
            </div>
            <div class="form-row align-items-center">
                <div class="col-auto my-1">
                  <label class="mr-sm-2" for="genero"><strong>Gênero: </strong></label>
                  <select class="custom-select mr-sm-2" id="genero" name="genero">
                    <option selected></option>
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
                    <option selected></option>
                    @foreach ($estados as $estado)
                        <option value="{{$estado}}">{{$estado}}</option>
                    @endforeach
                  </select>
                </div>
            </div>
            <div class="field">
                <strong>Cônjuge: </strong>
                <div class="control">
                    <input type="text" class="input" name="conjuge">
                </div>
            </div>
            <div class="form-row align-items-center">
                <div class="col-auto my-1">
                  <label class="mr-sm-2" for="cep"><strong>CEP: </strong></label>
                  <select class="custom-select mr-sm-2" id="cep" name="cep">
                    <option selected></option>
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
                        <input type="text" class="input" name="numero">
                    </div>
                </div>
                <div class="col">
                    <strong>Complemento: </strong>
                    <div class="control">
                        <input type="text" class="input" name="complemento">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <strong>Telefone 1: </strong>
                    <div class="control">
                        <input type="text" class="input" name="fone1">
                    </div>
                </div>
                <div class="col">
                    <strong>Telefone 2: </strong>
                    <div class="control">
                        <input type="text" class="input" name="fone2">
                    </div>
                </div>
            </div>
            <div class="field">
                <strong>Email: </strong>
                <div class="control">
                    <input type="text" class="input" name="email">
                </div>
            </div>
            <div class="field">
                <strong>Observações: </strong>
                <div class="control">
                    <input type="text" class="input" name="observacao">
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
