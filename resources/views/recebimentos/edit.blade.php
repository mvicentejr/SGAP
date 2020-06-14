@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Realizar Pagamento</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="{{ route('recebimentos.update', $recebimento->id) }}" method="POST">
        @csrf
        @method('PUT')
            <div class="field">
                <strong>ID: </strong> {{$recebimento->id}}
            </div>
            <div class="field">
                <strong>Data Venda: </strong> {{date('d/m/Y', strtotime($recebimento->venda->datavenda))}}
            </div>
            <div class="field">
                <strong>Venda: </strong> {{$recebimento->venda->id}}
            </div>
            <div class="field">
                <strong>Tipo: </strong> {{$recebimento->tipopag->descricao}}
            </div>
            <div class="field">
                <strong>Parcela: </strong> {{$recebimento->parcela}}
            </div>
            <div class="field">
                <strong>Total Parcelas: </strong> {{$recebimento->totalparc}}
            </div>
            <div class="field">
                <strong>Valor: </strong> R$ {{$recebimento->valor}}
            </div>
            <input type="hidden" name="status" value="2">
            <div class="field">
                <strong>Data Vencimento: </strong> {{date('d/m/Y', strtotime($recebimento->vencimento))}}
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
            <a class="btn btn-warning" href="{{route('recebimentos.index')}}">Voltar</a>
        </form>
    </div>
</div>

@endsection
