@extends('layout')
@section('content')

<h2 class="text-center">Listar Compras</h2>
<br><br>
<form action="/vendas/create">
    <div class="field">
        <div class="control">
            <button type="submit" class="btn btn-primary">Nova Compra</button>
        </div>
    </div>
</form>
<br>
<div class="table-responsive">
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
    <tr>
        <th>ID</th>
        <th>Data Compra</th>
        <th>Fornecedor</th>
        <th>Nota Fiscal</th>
        <th>Total</th>
        <th>Ações</th>
    </tr>
    @foreach ($compras as $compra)
        <tr>
            <td>{{$compra->id}}</td>
            <td>{{date('d/m/Y', strtotime($compra->datacompra))}}</td>
            <td>{{$compra->fornecedor->nome}}</td>
            <td>{{$compra->nota}}</td>
            <td>R$ {{$compra->total}}</td>
            <td>
                <a class="btn btn-secondary" href="{{ route('compras.show', $compra->id) }}">Mostrar</a>
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
