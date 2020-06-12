@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Mostrar Produto</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <div class="pull-right">
            <h5>Dados Gerais: </h5>
        </div>
            <div class="field">
                <strong>ID: </strong> {{$produto->id}}
            </div>
            <div class="field">
                <strong>Código Original: </strong> {{$produto->codoriginal}}
            </div>
            <div class="field">
                <strong>Código Fabricante: </strong> {{$produto->codfabrica}}
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
                <strong>Unidade: </strong> {{$produto->unidade}}
            </div>
            <div class="field">
                <strong>NCM/SH: </strong> {{$produto->ncmsh}}
            </div>
            <div class="field">
                <strong>CST: </strong> {{$produto->cst}}
            </div>
            <div class="field">
                <strong>CFOP: </strong> {{$produto->cfop}}
            </div>
            <br>
            <div class="pull-right">
                <h5>Custo do Produto: </h5>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Preço Compra: </strong> R$  {{$produto->custo}}
                    </div>
                    <div class="col">
                        <strong>Despesas (%): </strong> {{$produto->despesa}}
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>ICMS (%): </strong> {{$produto->icms}}
                    </div>
                    <div class="col">
                        <strong>Custo Total: </strong>R$  {{$produto->ctotal}}
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Lucro (%): </strong> {{$produto->perlucro}}
                    </div>
                    <div class="col">
                        <strong>Valor Venda: </strong> R$ {{$produto->valorvenda}}
                    </div>
                </div>
            </div>
            <br>
            <div class="pull-right">
                <h5>Estoque: </h5>
            </div>
            <div class="field">
                <strong>Atual: </strong> {{$produto->estoque}}
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Mínimo: </strong> {{$produto->eminimo}}
                    </div>
                    <div class="col">
                        <strong>Máximo: </strong> {{$produto->emaximo}}
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Última Compra: </strong> {{date('d/m/Y', strtotime($produto->ultcompra))}}
                    </div>
                    <div class="col">
                        <strong>Última Venda: </strong> {{date('d/m/Y', strtotime($produto->ultvenda))}}
                    </div>
                </div>
            </div>
            <br>
            <a class="btn btn-warning" href="{{route('produtos.index')}}">Voltar</a>
        </div>
    </div>

@endsection
