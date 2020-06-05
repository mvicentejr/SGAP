@extends('layout')
@section('content')
<div class="pull-right">
    <h2><center>Mostrar Funcionário<center></h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
            <div class="field">
                <strong>ID: </strong> {{$funcionario->id}}
            </div>
            <div class="field">
                <strong>Data de Cadastro: </strong> {{date('d/m/Y H:i', strtotime($funcionario->datacadastro))}}
            </div>
            <div class="field">
                <strong>Cargo: </strong> {{$funcionario->cargo->descricao}}
            </div>
            <div class="field">
                <strong>Nome: </strong> {{$funcionario->nome}}
            </div>
            <div class="field">
                <strong>Apelido: </strong> {{$funcionario->apelido}}
            </div>
            <div class="field">
                <strong>CPF: </strong> {{$funcionario->cpf}}
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>RG: </strong> {{$funcionario->rg}}
                    </div>
                    <div class="col">
                        <strong>Orgão Emissor: </strong> {{$funcionario->oemissor}}
                    </div>
                </div>
            </div>
            <div class="field">
                <strong>Data de Nascimento: </strong> {{date('d/m/Y', strtotime($funcionario->datanasc))}}
            </div>
            <div class="field">
                <strong>Gênero: </strong> {{$funcionario->genero}}
            </div>
            <div class="field">
                <strong>Estado Civil: </strong> {{$funcionario->estcivil}}
            </div>
            <div class="field">
                <strong>Cônjuge: </strong> {{$funcionario->conjuge}}
            </div>
            <div class="field">
                <strong>CEP: </strong> {{$funcionario->cep}}
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-8">
                        <strong>Rua: </strong> {{$funcionario->rua}}
                    </div>
                    <div class="col">
                        <strong>Número: </strong> {{$funcionario->numero}}
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Bairro: </strong> {{$funcionario->bairro}}
                    </div>
                    <div class="col">
                        <strong>Complemento: </strong> {{$funcionario->complemento}}
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Cidade: </strong> {{$funcionario->cidade}}
                    </div>
                    <div class="col">
                        <strong>Estado: </strong> {{$funcionario->uf}}
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Telefone 1: </strong> {{$funcionario->fone1}}
                    </div>
                    <div class="col">
                        <strong>Telefone 2: </strong> {{$funcionario->fone2}}
                    </div>
                </div>
            </div>
            <div class="field">
                <strong>Email: </strong> {{$funcionario->email}}
            </div>
            <div class="field">
                <strong>Observações: </strong> {{$funcionario->observacao}}
            </div>
            <br>
            <a class="btn btn-warning" href="{{route('funcionarios.index')}}">Voltar</a>
        </div>
    </div>

@endsection
