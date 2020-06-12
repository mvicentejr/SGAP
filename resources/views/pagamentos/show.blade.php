@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Mostrar Contas Pagas</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <div class="field">
            <strong>ID: </strong> {{$pagpago->id}}
        </div>
        <div class="field">
            <strong>Data Compra: </strong> {{date('d/m/Y', strtotime($pagpago->compra->datacompra))}}
        </div>
        <div class="field">
            <strong>Compra: </strong> {{$pagpago->compra->id}}
        </div>
        <div class="field">
            <strong>Tipo: </strong> {{$pagpago->tipopag->descricao}}
        </div>
        <div class="field">
            <strong>Parcela: </strong> {{$pagpago->parcela}}
        </div>
        <div class="field">
            <strong>Total Parcelas: </strong> {{$pagpago->totalparc}}
        </div>
        <div class="field">
            <strong>Valor: </strong> R$ {{$pagpago->valor}}
        </div>
        <div class="field">
            <strong>Data Vencimento: </strong> {{date('d/m/Y', strtotime($pagpago->vencimento))}}
        </div>
        <div class="field">
            <strong>Data Pagamento: </strong> {{date('d/m/Y', strtotime($pagpago->pagamento))}}
        </div>
        <br>
        <a class="btn btn-warning" href="{{route('pagamentos.index')}}">Voltar</a>
    </div>
</div>

@endsection
