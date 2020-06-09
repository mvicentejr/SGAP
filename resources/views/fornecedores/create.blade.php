@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Cadastrar Novo Fornecedor</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="/fornecedores" method="POST">
        @csrf
            <div class="field">
                <strong>Razão Social: </strong>
                <div class="control">
                    <input type="text" class="input" name="nome">
                </div>
            </div>
            <div class="field">
                <strong>Nome Fantasia: </strong>
                <div class="control">
                    <input type="text" class="input" name="apelido">
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>CNPJ: </strong>
                        <div class="control">
                            <input type="text" class="input" name="cnpj" required pattern="/^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}|(\d{14})$" placeholder="88.888.888/8888-88">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Inscrição Estadual: </strong>
                        <div class="control">
                            <input type="text" class="input" name="ie" placeholder="888.888.888.888">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-4">
                        <strong>CEP: </strong>
                        <div class="control">
                            <input type="text" class="input" name="cep" id="cep">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col">
                        <strong>Rua: </strong>
                        <div class="control">
                            <input type="text" class="input" name="rua" id="rua">
                        </div>
                    </div>
                    <div class="col-2">
                        <strong>Número: </strong>
                        <div class="control">
                            <input type="text" class="input" name="numero">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Bairro: </strong>
                        <div class="control">
                            <input type="text" class="input" name="bairro" id="bairro">
                        </div>
                    </div>
                    <div class="col">
                        <strong>Complemento: </strong>
                        <div class="control">
                            <input type="text" class="input" name="complemento">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col">
                        <strong>Cidade: </strong>
                        <div class="control">
                            <input type="text" class="input" name="cidade" id="cidade">
                        </div>
                    </div>
                    <div class="col-2">
                        <strong>Estado: </strong>
                        <div class="control">
                            <input type="text" class="input" name="uf" id="uf">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col">
                        <strong>Telefone 1: </strong>
                        <div class="control">
                            <input type="text" class="input" name="fone1" required placeholder="(88) 88888-8888" pattern="\([0-9]{2}\)[\s][0-9]{4,6}-[0-9]{3,4}">
                        </div>
                    </div>
                    <div class="col">
                        <strong>Telefone 2: </strong>
                        <div class="control">
                            <input type="text" class="input" name="fone2" placeholder="(88) 88888-8888" pattern="\([0-9]{2}\)[\s][0-9]{4,6}-[0-9]{3,4}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <strong>Email: </strong>
                <div class="control">
                    <input type="email" class="input" name="email">
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
