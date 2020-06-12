@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Compra - Adicionar Pagamentos</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="/pagamentos" method="POST">
        @csrf
            <div class="field">
                <strong>Compra: </strong> {{$compra->id}}
                <input type="hidden" class="input" name="compra" value="{{$compra->id}}">
            </div>
            <div class="field">
                <strong>Total: </strong> {{$compra->total}}
                <input type="hidden" class="input" name="compra" value="{{$compra->id}}">
            </div>
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-4">
                    <label class="mr-sm-2" for="tipopag"><strong>Forma de Pagamento: </strong></label>
                    <select class="custom-select mr-sm-2" id="tipopag" name="tipopag">
                        <option selected></option>
                        @foreach ($tipopags as $tipopag)
                            <option value="{{$tipopag->id}}">{{$tipopag->descricao}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-4">
                        <strong>Número de Parcelas: </strong>
                        <div class="control">
                            <input type="number" class="input" name="totalparc">
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <input type="submit" class="button btn-success" value="Gravar">
            <input type="reset" class="button btn-secondary" value="Limpar">
            <a class="btn btn-warning" href="{{route('compras.edit', $compra->id)}}">Voltar</a>
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
