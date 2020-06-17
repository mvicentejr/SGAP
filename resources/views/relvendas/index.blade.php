@extends('layout')
@section('content')

<h2 class="text-center">Relatórios de Vendas</h2>
<br><br>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <div class="field">
            <h5>Relatório Geral de Vendas</h5>
        </div>
        <div class="field">
            <a class="btn btn-primary" href="{{ route('relvendas.geral') }}">Gerar</a>
        </div>
        <br><br>
        <div class="field">
            <h5>Relatório de Vendas por Cliente</h5>
        </div>
        <form class="form" action="/relvendas/cliente" method="POST">
        @csrf
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-6">
                        <select class="custom-select mr-sm-2" id="cliente" name="cliente">
                            <option selected>Escolha o Cliente</option>
                            @foreach ($clientes as $cliente)
                                <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" class="button btn-primary" value="Gerar">
        </form>
        <br><br>
        <div class="field">
            <h5>Relatório de Vendas por Funcionário</h5>
        </div>
        <form class="form" action="/relvendas/funcionario" method="POST">
        @csrf
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-6">
                        <select class="custom-select mr-sm-2" id="funcionario" name="funcionario">
                            <option selected>Escolha o Funcionário</option>
                            @foreach ($funcionarios as $funcionario)
                                <option value="{{$funcionario->id}}">{{$funcionario->apelido}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" class="button btn-primary" value="Gerar">
        </form>
        <br><br>
        <div class="field">
            <h5>Relatório de Vendas por Período</h5>
        </div>
        <form class="form" action="/relvendas/periodo" method="POST">
        @csrf
        <div class="field">
            <div class="form-row">
                <div class="col-4">
                    <strong>Data Inicial: </strong>
                    <div class="control">
                        <input type="date" class="input" name="inicio">
                    </div>
                </div>
                <div class="col-1"></div>
                <div class="col-4">
                    <strong>Data Final: </strong>
                    <div class="control">
                        <input type="date" class="input" name="fim">
                    </div>
                </div>
            </div>
        </div>
            <input type="submit" class="button btn-primary" value="Gerar">
        </form>
    </div>
</div>


@endsection
