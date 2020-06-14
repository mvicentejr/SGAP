@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Cadastrar Nova Venda</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="/vendas" method="POST">
        @csrf
            <div class="field">
                <div class="form-row">
                    <div class="col-4">
                        <strong>Data Venda: </strong>
                        <div class="control">
                            <input type="date" class="input" name="datavenda">
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" class="input" name="status" value="1">
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
                    <label class="mr-sm-2" for="cliente"><strong>Cliente: </strong></label>
                    <select class="custom-select mr-sm-2" id="cliente" name="cliente">
                            <option selected></option>
                        @foreach ($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
            </div>
            <br><br>
            <input type="submit" class="button btn-success" value="Gravar">
            <input type="reset" class="button btn-secondary" value="Limpar">
            <a class="btn btn-warning" href="{{route('vendas.index')}}">Voltar</a>
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
