@extends('layout')
@section('content')

<h2 class="text-center">Relatórios de Fornecedores</h2>
<br><br>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <div class="field">
            <h5>Relatório Geral de Fornecedores</h5>
        </div>
        <div class="field">
            <a class="btn btn-primary" href="{{ route('relfornecedores.geral') }}">Gerar</a>
        </div>
    </div>
</div>


@endsection
