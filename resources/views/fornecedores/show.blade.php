@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Mostrar Fornecedor</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
            <div class="field">
                <strong>ID: </strong> {{$fornecedor->id}}
            </div>
            <div class="field">
                <strong>Data de Cadastro: </strong> {{date('d/m/Y H:i', strtotime($fornecedor->datacadastro))}}
            </div>
            <div class="field">
                <strong>Razão Social: </strong> {{$fornecedor->nome}}
            </div>
            <div class="field">
                <strong>Nome Fantasia: </strong> {{$fornecedor->apelido}}
            </div>
            <div class="field">
                <strong>CNPJ: </strong> {{$fornecedor->cnpj}}
            </div>
            <div class="field">
                <strong>Inscrição Estadual: </strong> {{$fornecedor->ie}}
            </div>
            <div class="field">
                <strong>CEP: </strong> {{$fornecedor->cep}}
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-8">
                        <strong>Rua: </strong> {{$fornecedor->rua}}
                    </div>
                    <div class="col">
                        <strong>Número: </strong> {{$fornecedor->numero}}
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Bairro: </strong> {{$fornecedor->bairro}}
                    </div>
                    <div class="col">
                        <strong>Complemento: </strong> {{$fornecedor->complemento}}
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Cidade: </strong> {{$fornecedor->cidade}}
                    </div>
                    <div class="col">
                        <strong>Estado: </strong> {{$fornecedor->uf}}
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Telefone 1: </strong> {{$fornecedor->fone1}}
                    </div>
                    <div class="col">
                        <strong>Telefone 2: </strong> {{$fornecedor->fone2}}
                    </div>
                </div>
            </div>
            <div class="field">
                <strong>Email: </strong> {{$fornecedor->email}}
            </div>
            <div class="field">
                <strong>Observações: </strong> {{$fornecedor->observacao}}
            </div>
            <br>
            <a class="btn btn-warning" href="{{route('fornecedores.index')}}">Voltar</a>
        </div>
    </div>

@endsection
