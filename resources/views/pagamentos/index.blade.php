@extends('layout')
@section('content')

<h2 class="text-center">Contas a Pagar</h2>
<br>
<div class="table-responsive">
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
    <tr>
        <th>ID</th>
        <th>Data Compra</th>
        <th>Compra</th>
        <th>Tipo</th>
        <th>Parcela</th>
        <th>Total</th>
        <th>Valor</th>
        <th>Status</th>
        <th>Vencimento</th>
        <th>Ações</th>
    </tr>
    @foreach ($pagamentos as $pagamento)
        <tr>
            <td>{{$pagamento->id}}</td>
            <td>{{date('d/m/Y', strtotime($pagamento->compra->datacompra))}}</td>
            <td>{{$pagamento->compra->id}}</td>
            <td>{{$pagamento->tipopag->descricao}}</td>
            <td>{{$pagamento->parcela}}</td>
            <td>{{$pagamento->totalparc}}</td>
            <td>{{$pagamento->valor}}</td>
            <td>{{$pagamento->status->descricao}}</td>
            <td>{{date('d/m/Y', strtotime($pagamento->vencimento))}}</td>
            <td>
                <a class="btn btn-success" href="{{ route('pagamentos.edit', $pagamento->id) }}">Pagar</a>
            </td>
        </tr>
    @endforeach
    </table>
</div>
<br><br>
<h2 class="text-center">Contas Pagas</h2>
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
    @foreach ($pagpagos as $pagpago)
        <tr>
            <td>{{$pagpago->id}}</td>
            <td>{{date('d/m/Y', strtotime($pagpago->compra->datacompra))}}</td>
            <td>{{$pagpago->compra->id}}</td>
            <td>{{$pagpago->tipopag->descricao}}</td>
            <td>{{$pagpago->parcela}}</td>
            <td>{{$pagpago->totalparc}}</td>
            <td>{{$pagpago->valor}}</td>
            <td>{{$pagpago->status->descricao}}</td>
            <td>{{date('d/m/Y', strtotime($pagpago->pagamento))}}</td>
            <td>
                <a class="btn btn-secondary" href="{{ route('pagamentos.show', $pagpago->id) }}">Mostar</a>
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
