@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Editar Cliente</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="{{ route('clientesf.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="field">
            <strong>ID: </strong> {{$cliente->id}}
        </div>
        <div class="field">
            <strong>Tipo: </strong> {{$cliente->tipo->descricao}}
        </div>
        <div class="field">
            <strong>Data de Cadastro: </strong> {{date('d/m/Y H:i', strtotime($cliente->datacadastro))}}
        </div>
        <div class="field">
            <div class="form-row align-items-center">
                <div class="col-4">
                <label class="mr-sm-2" for="status"><strong>Status: </strong></label>
                <select class="custom-select mr-sm-2" id="status" name="status">
                    <option selected value="{{$cliente->status->id}}">{{$cliente->status->descricao}}</option>
                    @foreach ($situacao as $stat)
                        <option value="{{$stat->id}}">{{$stat->descricao}}</option>
                    @endforeach
                </select>
                </div>
            </div>
        </div>
        <div class="field">
            <strong>Nome: </strong>
            <div class="control">
                <input type="text" class="input" name="nome" value="{{$cliente->nome}}">
            </div>
        </div>
        <div class="field">
            <strong>Apelido: </strong>
            <div class="control">
                <input type="text" class="input" name="apelido" value="{{$cliente->apelido}}">
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col-6">
                    <strong>CPF: </strong>
                    <div class="control">
                        <input type="text" class="input" name="cpf" value="{{$cliente->cpf}}" required pattern="^(\d{3}\.\d{3}\.\d{3}-\d{2})|(\d{11})$">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col">
                    <strong>RG: </strong>
                    <div class="control">
                        <input type="text" class="input" name="rg" value="{{$cliente->rg}}">
                    </div>
                </div>
                <div class="col-3">
                    <strong>Órgão Emissor: </strong>
                    <div class="control">
                        <input type="text" class="input" name="oemissor" value="{{$cliente->oemissor}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col-4">
                    <strong>Data de Nascimento: </strong>
                    <div class="control">
                        <input type="date" class="input" name="datanasc" value="{{$cliente->datanasc}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row align-items-center">
                <div class="col-4">
                <label class="mr-sm-2" for="genero"><strong>Gênero: </strong></label>
                <select class="custom-select mr-sm-2" id="genero" name="genero">
                <option selected>{{$cliente->genero}}</option>
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
                <option selected>{{$cliente->estcivil}}</option>
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
                <input type="text" class="input" name="conjuge" value="{{$cliente->conjuge}}">
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col-4">
                    <strong>CEP: </strong>
                    <div class="control">
                        <input type="text" class="input" name="cep" value="{{$cliente->cep}}" id="cep">
                    </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col">
                    <strong>Rua: </strong>
                    <div class="control">
                        <input type="text" class="input" name="rua" value="{{$cliente->rua}}" id="rua">
                    </div>
                </div>
                <div class="col-2">
                    <strong>Número: </strong>
                    <div class="control">
                        <input type="text" class="input" name="numero" value="{{$cliente->numero}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col-6">
                    <strong>Bairro: </strong>
                    <div class="control">
                        <input type="text" class="input" name="bairro" value="{{$cliente->bairro}}" id="bairro">
                    </div>
                </div>
                <div class="col">
                    <strong>Complemento: </strong>
                    <div class="control">
                        <input type="text" class="input" name="complemento" value="{{$cliente->complemento}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col">
                    <strong>Cidade: </strong>
                    <div class="control">
                        <input type="text" class="input" name="cidade" value="{{$cliente->cidade}}" id="cidade">
                    </div>
                </div>
                <div class="col-2">
                    <strong>Estado: </strong>
                    <div class="control">
                        <input type="text" class="input" name="uf" value="{{$cliente->uf}}" id="uf">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col">
                    <strong>Telefone 1: </strong>
                    <div class="control">
                        <input type="text" class="input" name="fone1" value="{{$cliente->fone1}}" required pattern="\([0-9]{2}\)[\s][0-9]{4,6}-[0-9]{3,4}">
                    </div>
                </div>
                <div class="col">
                    <strong>Telefone 2: </strong>
                    <div class="control">
                        <input type="text" class="input" name="fone2" value="{{$cliente->fone2}}" pattern="\([0-9]{2}\)[\s][0-9]{4,6}-[0-9]{3,4}">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <strong>Email: </strong>
            <div class="control">
                <input type="email" class="input" name="email" value="{{$cliente->email}}">
            </div>
        </div>
        <div class="field">
            <strong>Observações: </strong>
            <div class="control">
                <input type="text" class="input" name="observacao" value="{{$cliente->observacao}}">
            </div>
        </div>
        <br><br>
        <input type="submit" class="button btn-success" value="Gravar">
        <a class="btn btn-warning" href="{{route('clientesf.index')}}">Voltar</a>
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
