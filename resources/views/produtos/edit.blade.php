@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Editar Produto</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="{{ route('produtos.update', $produto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="pull-right">
            <h5>Dados Gerais: </h5>
        </div>
        <div class="field">
            <strong>ID: </strong> {{$produto->id}}
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col-6">
                    <strong>Código Original: </strong>
                    <div class="control">
                        <input type="text" class="input" name="codoriginal" value="{{$produto->codoriginal}}">
                    </div>
                </div>
                <div class="col-6">
                    <strong>Código Fabricante: </strong>
                    <div class="control">
                        <input type="text" class="input" name="codfabrica" value="{{$produto->codfabrica}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <strong>Descrição: </strong>
            <div class="control">
                <input type="text" class="input" name="descricao" value="{{$produto->descricao}}">
            </div>
        </div>
        <div class="field">
            <strong>Aplicação: </strong>
            <div class="control">
                <input type="text" class="input" name="aplicacao" value="{{$produto->aplicacao}}">
            </div>
        </div>
        <div class="field">
            <div class="form-row align-items-center">
                <div class="col-4">
                <label class="mr-sm-2" for="marca"><strong>Marca: </strong>{{$produto->marca->descricao}}</label>
                <select class="custom-select mr-sm-2" id="marca" name="marca">
                    <option selected>{{$produto->marca->id}}</option>
                    @foreach ($marcas as $marca)
                        <option value="{{$marca->id}}">{{$marca->descricao}}</option>
                    @endforeach
                </select>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row align-items-center">
                <div class="col-4">
                <label class="mr-sm-2" for="montadora"><strong>Montadora: </strong>{{$produto->montadora->descricao}}</label>
                <select class="custom-select mr-sm-2" id="montadora" name="montadora">
                    <option selected>{{$produto->montadora->id}}</option>
                    @foreach ($montadoras as $montadora)
                        <option value="{{$montadora->id}}">{{$montadora->descricao}}</option>
                    @endforeach
                </select>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col-4">
                    <strong>Unidade: </strong>
                    <div class="control">
                        <input type="text" class="input" name="unidade" value="{{$produto->unidade}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col-4">
                    <strong>NCM/SH: </strong>
                    <div class="control">
                        <input type="text" class="input" name="ncmsh" maxlength="8" value="{{$produto->ncmsh}}">
                    </div>
                </div>
                <div class="col-4">
                    <strong>CST: </strong>
                    <div class="control">
                        <input type="text" class="input" name="cst" maxlength="2" value="{{$produto->cst}}">
                    </div>
                </div>
                <div class="col-3">
                    <strong>CFOP: </strong>
                    <div class="control">
                        <input type="text" class="input" name="cfop" maxlength="4" value="{{$produto->cfop}}">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="pull-right">
            <h5>Custo do Produto: </h5>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col-6">
                    <strong>Custo Compra: </strong> {{$produto->custo}}
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
                    <strong>Custo Total: </strong> {{$produto->ctotal}}
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col-6">
                    <strong>Lucro (%): </strong> {{$produto->perlucro}}
                </div>
                <div class="col">
                    <strong>Valor Venda: </strong> {{$produto->valorvenda}}
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
        <br><br>
        <input type="submit" class="button btn-success" value="Gravar">
        <a class="btn btn-warning" href="{{route('produtos.index')}}">Voltar</a>
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

    <script>
        let custo = document.getElementById('custo');
        let despesa = document.getElementById('despesa');
        let icms = document.getElementById('icms');
        let ctotal = document.getElementById('ctotal');
        let perlucro = document.getElementById('perlucro');
        let valorvenda = document.getElementById('valorvenda');

        function calculaCusto(){
            ctotal.value = 0;
            if(custo.value && despesa.value && icms.value){
                ctotal.value = (parseFloat(custo.value) +
                            (parseFloat(custo.value) * (parseFloat(despesa.value) / 100) +
                            (parseFloat(custo.value)*parseFloat(icms.value)/100))).toFixed(2);
            }
        }

        function calculaTotal(){
            valorvenda.value = 0;
            if(perlucro.value){
                valorvenda.value = (parseFloat(custo.value) +
                            (parseFloat(custo.value) * (parseFloat(despesa.value) / 100) +
                            (parseFloat(custo.value) * parseFloat(icms.value) / 100)) *
                            (1 + (parseFloat(perlucro.value) / 100))).toFixed(2);
            }
        }
    </script>

@endsection
