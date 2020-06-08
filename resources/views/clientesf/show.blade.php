@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Mostrar Cliente</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
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
                <strong>Status: </strong> {{$cliente->status->descricao}}
            </div>
            <div class="field">
                <strong>Nome: </strong> {{$cliente->nome}}
            </div>
            <div class="field">
                <strong>Apelido: </strong> {{$cliente->apelido}}
            </div>
            <div class="field">
                <strong>CPF: </strong> {{$cliente->cpf}}
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>RG: </strong> {{$cliente->rg}}
                    </div>
                    <div class="col">
                        <strong>Orgão Emissor: </strong> {{$cliente->oemissor}}
                    </div>
                </div>
            </div>
            <div class="field">
                <strong>Data de Nascimento: </strong> {{date('d/m/Y', strtotime($cliente->datanasc))}}
            </div>
            <div class="field">
                <strong>Gênero: </strong> {{$cliente->genero}}
            </div>
            <div class="field">
                <strong>Estado Civil: </strong> {{$cliente->estcivil}}
            </div>
            <div class="field">
                <strong>Cônjuge: </strong> {{$cliente->conjuge}}
            </div>
            <div class="field">
                <strong>CEP: </strong> {{$cliente->cep}}
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-8">
                        <strong>Rua: </strong> {{$cliente->rua}}
                    </div>
                    <div class="col">
                        <strong>Número: </strong> {{$cliente->numero}}
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Bairro: </strong> {{$cliente->bairro}}
                    </div>
                    <div class="col">
                        <strong>Complemento: </strong> {{$cliente->complemento}}
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Cidade: </strong> {{$cliente->cidade}}
                    </div>
                    <div class="col">
                        <strong>Estado: </strong> {{$cliente->uf}}
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Telefone 1: </strong> {{$cliente->fone1}}
                    </div>
                    <div class="col">
                        <strong>Telefone 2: </strong> {{$cliente->fone2}}
                    </div>
                </div>
            </div>
            <div class="field">
                <strong>Email: </strong> {{$cliente->email}}
            </div>
            <div class="field">
                <strong>Observações: </strong> {{$cliente->observacao}}
            </div>
            <br>
            <a class="btn btn-warning" href="{{route('clientesf.index')}}">Voltar</a>
        </div>
    </div>

@endsection
