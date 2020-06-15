@extends('layout')
@section('content')

<h2 class="text-center">Relatórios Funcionários</h2>
<br><br>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <div class="field">
            <h5>Relatório Geral</h5>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col-6">
                    Relatório Geral de Funcionários
                </div>
                <div class="col">
                    <a class="btn btn-primary" href="{{ route('relfuncionarios.geral') }}">Gerar</a>
                </div>
            </div>
        </div>
        <br><br>
        <div class="field">
            <h5>Relatório por Cargo</h5>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>Cargo</th>
                <th></th>
            </tr>
        @foreach ($cargos as $cargo)
            <tr>
                <td> {{$cargo->descricao}} </td>
                <td>
                    <a class="btn btn-primary" href="{{ route('relfuncionarios.cargo', $cargo->id) }}">Gerar</a>
                </td>
            </tr>
        @endforeach
        </table>

    </div>
</div>


@endsection
