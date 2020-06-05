@extends('layout')
@section('content')
<div class="pull-right">
    <h2><center>Editar Funcionário<center></h2>
</div>
<div class="jumbotron">
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
        <div class="field">
            <div class="form-row align-items-center">
                <div class="col-4">
                <label class="mr-sm-2" for="estcivil"><strong>Cargo: </strong>{{$funcionario->cargo->descricao}}</label>
                <select class="custom-select mr-sm-2" id="cargo" name="cargo">
                <option selected>{{$funcionario->cargo->id}}</option>
                    @foreach ($cargos as $cargo)
                        <option value="{{$cargo->id}}">{{$cargo->descricao}}</option>
                    @endforeach
                </select>
                </div>
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
            <div class="form-row">
                <div class="col-6">
                    <strong>CPF: </strong>
                    <div class="control">
                        <input type="text" class="input" name="cpf" value="{{$funcionario->cpf}}" required pattern="^(\d{3}\.\d{3}\.\d{3}-\d{2})|(\d{11})$">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
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
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col-4">
                    <strong>Data de Nascimento: </strong>
                    <div class="control">
                        <input type="date" class="input" name="datanasc" value="{{$funcionario->datanasc}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row align-items-center">
                <div class="col-4">
                <label class="mr-sm-2" for="genero"><strong>Gênero: </strong></label>
                <select class="custom-select mr-sm-2" id="genero" name="genero">
                <option selected>{{$funcionario->genero}}</option>
                    @foreach ($generos as $genero)
                        <option value="{{$genero}}">{{$genero}}</option>
                    @endforeach
                </select>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row align-items-center">
                <div class="col-4">
                <label class="mr-sm-2" for="estcivil"><strong>Estado Civil: </strong></label>
                <select class="custom-select mr-sm-2" id="estcivil" name="estcivil">
                <option selected>{{$funcionario->estcivil}}</option>
                    @foreach ($estados as $estado)
                        <option value="{{$estado}}">{{$estado}}</option>
                    @endforeach
                </select>
                </div>
            </div>
        </div>
        <div class="field">
            <strong>Cônjuge: </strong>
            <div class="control">
                <input type="text" class="input" name="conjuge" value="{{$funcionario->conjuge}}">
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col-4">
                    <strong>CEP: </strong>
                    <div class="control">
                        <input type="text" class="input" name="cep" value="{{$funcionario->cep}}" id="cep">
                    </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col">
                    <strong>Rua: </strong>
                    <div class="control">
                        <input type="text" class="input" name="rua" value="{{$funcionario->rua}}" id="rua">
                    </div>
                </div>
                <div class="col-2">
                    <strong>Número: </strong>
                    <div class="control">
                        <input type="text" class="input" name="numero" value="{{$funcionario->numero}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col-6">
                    <strong>Bairro: </strong>
                    <div class="control">
                        <input type="text" class="input" name="bairro" value="{{$funcionario->bairro}}" id="bairro">
                    </div>
                </div>
                <div class="col">
                    <strong>Complemento: </strong>
                    <div class="control">
                        <input type="text" class="input" name="complemento" value="{{$funcionario->complemento}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col">
                    <strong>Cidade: </strong>
                    <div class="control">
                        <input type="text" class="input" name="cidade" value="{{$funcionario->cidade}}" id="cidade">
                    </div>
                </div>
                <div class="col-2">
                    <strong>Estado: </strong>
                    <div class="control">
                        <input type="text" class="input" name="uf" value="{{$funcionario->uf}}" id="uf">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col">
                    <strong>Telefone 1: </strong>
                    <div class="control">
                        <input type="text" class="input" name="fone1" value="{{$funcionario->fone1}}" required pattern="\([0-9]{2}\)[\s][0-9]{4,6}-[0-9]{3,4}">
                    </div>
                </div>
                <div class="col">
                    <strong>Telefone 2: </strong>
                    <div class="control">
                        <input type="text" class="input" name="fone2" value="{{$funcionario->fone2}}" pattern="\([0-9]{2}\)[\s][0-9]{4,6}-[0-9]{3,4}">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <strong>Email: </strong>
            <div class="control">
                <input type="email" class="input" name="email" value="{{$funcionario->email}}">
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
