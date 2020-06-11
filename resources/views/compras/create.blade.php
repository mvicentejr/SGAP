@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Cadastrar Nova Compra</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="/compras" method="POST">
        @csrf
            <div class="field">
                <div class="form-row">
                    <div class="col-4">
                        <strong>Data Compra: </strong>
                        <div class="control">
                            <input type="date" class="input" name="datacompra">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-4">
                    <label class="mr-sm-2" for="funcionario"><strong>Funcionário: </strong></label>
                    <select class="custom-select mr-sm-2" id="funcionario" name="funcionario">
                            <option selected></option>
                        @foreach ($funcionarios as $funcionario)
                            <option value="{{$funcionario->id}}">{{$funcionario->apelido}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-4">
                    <label class="mr-sm-2" for="fornecedor"><strong>Fornecedor: </strong></label>
                    <select class="custom-select mr-sm-2" id="fornecedor" name="fornecedor">
                            <option selected></option>
                        @foreach ($fornecedores as $fornecedor)
                            <option value="{{$fornecedor->id}}">{{$fornecedor->apelido}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-4">
                        <strong>Nota Fiscal: </strong>
                        <div class="control">
                            <input type="text" class="input" name="nota">
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <input type="submit" class="button btn-success" value="Gravar">
            <input type="reset" class="button btn-secondary" value="Limpar">
            <a class="btn btn-warning" href="{{route('compras.index')}}">Voltar</a>
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
