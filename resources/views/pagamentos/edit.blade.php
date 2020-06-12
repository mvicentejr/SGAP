@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Realizar Pagamento</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="{{ route('pagamentos.update', $pagamento->id) }}" method="POST">
        @csrf
        @method('PUT')
            <div class="field">
                <strong>ID: </strong> {{$pagamento->id}}
            </div>
            <div class="field">
                <strong>Data Compra: </strong> {{date('d/m/Y', strtotime($pagamento->compra->datacompra))}}
            </div>
            <div class="field">
                <strong>Compra: </strong> {{$pagamento->compra->id}}
            </div>
            <div class="field">
                <strong>Tipo: </strong> {{$pagamento->tipopag->descricao}}
            </div>
            <div class="field">
                <strong>Parcela: </strong> {{$pagamento->parcela}}
            </div>
            <div class="field">
                <strong>Total Parcelas: </strong> {{$pagamento->totalparc}}
            </div>
            <div class="field">
                <strong>Valor: </strong> R$ {{$pagamento->valor}}
            </div>
            <input type="hidden" name="status" value="2">
            <div class="field">
                <strong>Data Vencimento: </strong> {{date('d/m/Y', strtotime($pagamento->vencimento))}}
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-4">
                    <strong>Data Pagamento: </strong>
                        <div class="control">
                            <input type="date" class="input" name="pagamento">
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <input type="submit" class="button btn-success" value="Gravar">
            <a class="btn btn-warning" href="{{route('pagamentos.index')}}">Voltar</a>
        </form>
    </div>
</div>

@endsection
