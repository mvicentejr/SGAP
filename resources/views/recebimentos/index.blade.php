@extends('layout')
@section('content')

<h2 class="text-center">Contas a Receber</h2>
<br>
<div class="table-responsive">
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
    <tr>
        <th>ID</th>
        <th>Data Venda</th>
        <th>Venda</th>
        <th>Tipo</th>
        <th>Parcela</th>
        <th>Total</th>
        <th>Valor</th>
        <th>Status</th>
        <th>Vencimento</th>
        <th>Ações</th>
    </tr>
    @foreach ($recebimentos as $recebimento)
        <tr>
            <td>{{$recebimento->id}}</td>
            <td>{{date('d/m/Y', strtotime($recebimento->venda->datavenda))}}</td>
            <td>{{$recebimento->venda->id}}</td>
            <td>{{$recebimento->tipopag->descricao}}</td>
            <td>{{$recebimento->parcela}}</td>
            <td>{{$recebimento->totalparc}}</td>
            <td>{{$recebimento->valor}}</td>
            <td>{{$recebimento->status->descricao}}</td>
            <td>{{date('d/m/Y', strtotime($recebimento->vencimento))}}</td>
            <td>
                <a class="btn btn-success" href="{{ route('recebimentos.edit', $recebimento->id) }}">Pagar</a>
            </td>
        </tr>
    @endforeach
    </table>
</div>
<br><br>
<h2 class="text-center">Contas Recebidas</h2>
<br>
<div class="table-responsive">
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
    <tr>
        <th>ID</th>
        <th>Data Compra</th>
        <th>Compra</th>
        <th>Forma Pagto</th>
        <th>Parcela</th>
        <th>Total</th>
        <th>Valor</th>
        <th>Status</th>
        <th>Pagamento</th>
        <th>Ações</th>
    </tr>
    @foreach ($recebidos as $recebido)
        <tr>
            <td>{{$recebido->id}}</td>
            <td>{{date('d/m/Y', strtotime($recebido->venda->datavenda))}}</td>
            <td>{{$recebido->venda->id}}</td>
            <td>{{$recebido->tipopag->descricao}}</td>
            <td>{{$recebido->parcela}}</td>
            <td>{{$recebido->totalparc}}</td>
            <td>{{$recebido->valor}}</td>
            <td>{{$recebido->status->descricao}}</td>
            <td>{{date('d/m/Y', strtotime($recebido->pagamento))}}</td>
            <td>
                <a class="btn btn-secondary" href="{{ route('recebimentos.show', $recebido->id) }}">Mostar</a>
            </td>
        </tr>
    @endforeach
    </table>
</div>
<br><br>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif

@endsection
