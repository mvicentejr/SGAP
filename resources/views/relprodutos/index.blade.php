@extends('layout')
@section('content')

<h2 class="text-center">Relatórios de Produtos</h2>
<br><br>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <div class="field">
            <h5>Relatório Geral de Estoque</h5>
        </div>
        <div class="field">
            <a class="btn btn-primary" href="{{ route('relprodutos.estoque') }}">Gerar</a>
        </div>
        <br><br>
        <div class="field">
            <h5>Relatório Geral de Produtos</h5>
        </div>
        <div class="field">
            <a class="btn btn-primary" href="{{ route('relprodutos.geral') }}">Gerar</a>
        </div>
        <br><br>
        <div class="field">
            <h5>Relatório de Produtos por Marca</h5>
        </div>
        <form class="form" action="/relprodutos/marca" method="POST">
        @csrf
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-4">
                        <select class="custom-select mr-sm-2" id="marca" name="marca">
                            <option selected>Escolha a Marca</option>
                            @foreach ($marcas as $marca)
                                <option value="{{$marca->id}}">{{$marca->descricao}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" class="button btn-primary" value="Gerar">
        </form>
        <br><br>
        <div class="field">
            <h5>Relatório de Produtos por Montadora</h5>
        </div>
        <form class="form" action="/relprodutos/montadora" method="POST">
        @csrf
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-4">
                        <select class="custom-select mr-sm-2" id="montadora" name="montadora">
                            <option selected>Escolha a Montadora</option>
                            @foreach ($montadoras as $montadora)
                                <option value="{{$montadora->id}}">{{$montadora->descricao}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" class="button btn-primary" value="Gerar">
        </form>
    </div>
</div>


@endsection
