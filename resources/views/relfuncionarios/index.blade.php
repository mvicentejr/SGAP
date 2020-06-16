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
            <a class="btn btn-primary" href="{{ route('relfuncionarios.geral') }}">Gerar</a>
        </div>
        <br><br>
        <div class="field">
            <h5>Relatório por Cargo</h5>
        </div>
        <form class="form" action="/relfuncionarios/cargo" method="POST">
        @csrf
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-4">
                        <select class="custom-select mr-sm-2" id="cargo" name="cargo">
                            <option selected>Escolha o Cargo</option>
                            @foreach ($cargos as $cargo)
                                <option value="{{$cargo->id}}">{{$cargo->descricao}}</option>
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
