@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Mostrar Produto</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
            <div class="field">
                <strong>ID: </strong> {{$produto->id}}
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Código Original: </strong> {{$produto->codoriginal}}
                    </div>
                    <div class="col-6">
                        <strong>Código Fabricante: </strong> {{$produto->codfabrica}}
                    </div>
                </div>
            </div>
            <div class="field">
                <strong>Descrição: </strong> {{$produto->descricao}}
            </div>
            <div class="field">
                <strong>Aplicação: </strong> {{$produto->aplicacao}}
            </div>
            <div class="field">
                <strong>Marca: </strong> {{$produto->marca->descricao}}
            </div>
            <div class="field">
                <strong>Montadora: </strong> {{$produto->montadora->descricao}}
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-4">
                        <strong>Unidade: </strong> {{$produto->unidade}}
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-4">
                        <strong>NCM/SH: </strong> {{$produto->ncmsh}}
                    </div>
                    <div class="col-4">
                        <strong>CST: </strong> {{$produto->cst}}
                    </div>
                    <div class="col">
                        <strong>CFOP: </strong> {{$produto->cfop}}
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-4">
                        <strong>Custo Produto: </strong> R$  {{$produto->custo}}
                    </div>
                    <div class="col-4">
                        <strong>Despesas (%): </strong> {{$produto->despesa}}
                    </div>
                    <div class="col">
                        <strong>ICMS (%): </strong> {{$produto->icms}}
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-4">
                        <strong>Custo Total: </strong>R$  {{$produto->ctotal}}
                    </div>
                    <div class="col-4">
                        <strong>Lucro (%): </strong> {{$produto->perlucro}}
                    </div>
                    <div class="col">
                        <strong>Valor de Venda: </strong> R$ {{$produto->valorvenda}}
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-4">
                        <strong>Estoque: </strong> {{$produto->estoque}}
                    </div>
                    <div class="col-4">
                        <strong>Estoque Mínimo: </strong> {{$produto->eminimo}}
                    </div>
                    <div class="col">
                        <strong>Estoque Máximo: </strong> {{$produto->emaximo}}
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Última Compra: </strong> {{$produto->ultcompra}}
                    </div>
                    <div class="col">
                        <strong>Última Venda: </strong> {{$produto->ultvenda}}
                    </div>
                </div>
            </div>
            <br>
            <a class="btn btn-warning" href="{{route('produtos.index')}}">Voltar</a>
        </div>
    </div>

@endsection
