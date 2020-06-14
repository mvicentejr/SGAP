@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Mostrar Contas Recebidas</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <div class="field">
            <strong>ID: </strong> {{$recebido->id}}
        </div>
        <div class="field">
            <strong>Data Venda: </strong> {{date('d/m/Y', strtotime($recebido->venda->datavenda))}}
        </div>
        <div class="field">
            <strong>Venda: </strong> {{$recebido->venda->id}}
        </div>
        <div class="field">
            <strong>Tipo: </strong> {{$recebido->tipopag->descricao}}
        </div>
        <div class="field">
            <strong>Parcela: </strong> {{$recebido->parcela}}
        </div>
        <div class="field">
            <strong>Total Parcelas: </strong> {{$recebido->totalparc}}
        </div>
        <div class="field">
            <strong>Valor: </strong> R$ {{$recebido->valor}}
        </div>
        <div class="field">
            <strong>Data Vencimento: </strong> {{date('d/m/Y', strtotime($recebido->vencimento))}}
        </div>
        <div class="field">
            <strong>Data Pagamento: </strong> {{date('d/m/Y', strtotime($recebido->pagamento))}}
        </div>
        <br>
        <a class="btn btn-warning" href="{{route('recebimentos.index')}}">Voltar</a>
    </div>
</div>

@endsection
