@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Editar Fornecedor</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="{{ route('fornecedores.update', $fornecedor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="field">
            <strong>ID: </strong> {{$fornecedor->id}}
        </div>
        <div class="field">
            <strong>Data de Cadastro: </strong> {{date('d/m/Y H:i', strtotime($fornecedor->datacadastro))}}
        </div>
        <div class="field">
            <strong>Razão Social: </strong>
            <div class="control">
                <input type="text" class="input" name="nome" value="{{$fornecedor->nome}}">
            </div>
        </div>
        <div class="field">
            <strong>Nome Fantasia: </strong>
            <div class="control">
                <input type="text" class="input" name="apelido" value="{{$fornecedor->apelido}}">
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col-6">
                    <strong>CNPJ: </strong>
                    <div class="control">
                        <input type="text" class="input" name="cnpj" value="{{$fornecedor->cnpj}}" required pattern="/^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}|(\d{14})$" placeholder="88.888.888/8888-88">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col-6">
                    <strong>Inscrição Estadual: </strong>
                    <div class="control">
                        <input type="text" class="input" name="ie" value="{{$fornecedor->ie}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col-4">
                    <strong>CEP: </strong>
                    <div class="control">
                        <input type="text" class="input" name="cep" value="{{$fornecedor->cep}}" id="cep">
                    </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col">
                    <strong>Rua: </strong>
                    <div class="control">
                        <input type="text" class="input" name="rua" value="{{$fornecedor->rua}}" id="rua">
                    </div>
                </div>
                <div class="col-2">
                    <strong>Número: </strong>
                    <div class="control">
                        <input type="text" class="input" name="numero" value="{{$fornecedor->numero}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col-6">
                    <strong>Bairro: </strong>
                    <div class="control">
                        <input type="text" class="input" name="bairro" value="{{$fornecedor->bairro}}" id="bairro">
                    </div>
                </div>
                <div class="col">
                    <strong>Complemento: </strong>
                    <div class="control">
                        <input type="text" class="input" name="complemento" value="{{$fornecedor->complemento}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col">
                    <strong>Cidade: </strong>
                    <div class="control">
                        <input type="text" class="input" name="cidade" value="{{$fornecedor->cidade}}" id="cidade">
                    </div>
                </div>
                <div class="col-2">
                    <strong>Estado: </strong>
                    <div class="control">
                        <input type="text" class="input" name="uf" value="{{$fornecedor->uf}}" id="uf">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col">
                    <strong>Telefone 1: </strong>
                    <div class="control">
                        <input type="text" class="input" name="fone1" value="{{$fornecedor->fone1}}" required pattern="\([0-9]{2}\)[\s][0-9]{4,6}-[0-9]{3,4}">
                    </div>
                </div>
                <div class="col">
                    <strong>Telefone 2: </strong>
                    <div class="control">
                        <input type="text" class="input" name="fone2" value="{{$fornecedor->fone2}}" pattern="\([0-9]{2}\)[\s][0-9]{4,6}-[0-9]{3,4}">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <strong>Email: </strong>
            <div class="control">
                <input type="email" class="input" name="email" value="{{$fornecedor->email}}">
            </div>
        </div>
        <div class="field">
            <strong>Observações: </strong>
            <div class="control">
                <input type="text" class="input" name="observacao" value="{{$fornecedor->observacao}}">
            </div>
        </div>
        <br><br>
        <input type="submit" class="button btn-success" value="Gravar">
        <a class="btn btn-warning" href="{{route('fornecedores.index')}}">Voltar</a>
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
