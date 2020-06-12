@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Cadastrar Novo Produto</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="/produtos" method="POST">
        @csrf
            <div class="pull-right">
                <h5>Dados Gerais: </h5>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Código Original: </strong>
                        <div class="control">
                            <input type="text" class="input" name="codoriginal" maxlength="12">
                        </div>
                    </div>
                    <div class="col-6">
                        <strong>Código Fabricante: </strong>
                        <div class="control">
                            <input type="text" class="input" name="codfabrica" maxlength="12">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <strong>Descrição: </strong>
                <div class="control">
                    <input type="text" class="input" name="descricao">
                </div>
            </div>
            <div class="field">
                <strong>Aplicação: </strong>
                <div class="control">
                    <input type="text" class="input" name="aplicacao">
                </div>
            </div>
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-4">
                    <label class="mr-sm-2" for="marca"><strong>Marca: </strong></label>
                    <select class="custom-select mr-sm-2" id="marca" name="marca">
                        <option selected></option>
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
                    <label class="mr-sm-2" for="montadora"><strong>Montadora: </strong></label>
                    <select class="custom-select mr-sm-2" id="montadora" name="montadora">
                        <option selected></option>
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
                            <input type="text" class="input" name="unidade">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-4">
                        <strong>NCM/SH: </strong>
                        <div class="control">
                            <input type="text" class="input" name="ncmsh" maxlength="8" placeholder="88888888">
                        </div>
                    </div>
                    <div class="col-4">
                        <strong>CST: </strong>
                        <div class="control">
                            <input type="text" class="input" name="cst" maxlength="2" placeholder="88">
                        </div>
                    </div>
                    <div class="col-3">
                        <strong>CFOP: </strong>
                        <div class="control">
                            <input type="text" class="input" name="cfop" maxlength="4" placeholder="8888">
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
                        <strong>Preço Compra: </strong>
                        <div class="control">
                            <input type="text" class="input" name="custo" id="custo" onkeyup="calculaCusto()">
                        </div>
                    </div>
                    <div class="col">
                        <strong>Despesas (%): </strong>
                        <div class="control">
                            <input type="text" class="input" name="despesa" id="despesa" onkeyup="calculaCusto()">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>ICMS (%): </strong>
                        <div class="control">
                            <input type="text" class="input" name="icms" id="icms" onkeyup="calculaCusto()">
                        </div>
                    </div>
                    <div class="col">
                        <strong>Custo Total: </strong>
                        <div class="control">
                            <input type="text" class="input" name="ctotal" id="ctotal" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Lucro (%): </strong>
                        <div class="control">
                            <input type="text" class="input" name="perlucro" id="perlucro" onkeyup="calculaTotal()">
                        </div>
                    </div>
                    <div class="col">
                        <strong>Valor Venda: </strong>
                        <div class="control">
                            <input type="text" class="input" name="valorvenda" id="valorvenda" value="">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="pull-right">
                <h5>Estoque: </h5>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-6">
                        <strong>Mínimo: </strong>
                        <div class="control">
                            <input type="number" class="input" name="eminimo">
                        </div>
                    </div>
                    <div class="col">
                        <strong>Máximo: </strong>
                        <div class="control">
                            <input type="number" class="input" name="emaximo">
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <input type="submit" class="button btn-success" value="Gravar">
            <input type="reset" class="button btn-secondary" value="Limpar">
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
