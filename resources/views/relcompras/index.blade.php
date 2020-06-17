@extends('layout')
@section('content')

<h2 class="text-center">Relatórios de Compras</h2>
<br><br>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <div class="field">
            <h5>Relatório Geral de Compras</h5>
        </div>
        <div class="field">
            <a class="btn btn-primary" href="{{ route('relcompras.geral') }}">Gerar</a>
        </div>
        <br><br>
        <div class="field">
            <h5>Relatório de Compras por Fornecedor</h5>
        </div>
        <form class="form" action="/relcompras/fornecedor" method="POST">
        @csrf
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-6">
                        <select class="custom-select mr-sm-2" id="fornecedor" name="fornecedor">
                            <option selected>Escolha o Fornecedor</option>
                            @foreach ($fornecedores as $fornecedor)
                                <option value="{{$fornecedor->id}}">{{$fornecedor->nome}}</option>
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
