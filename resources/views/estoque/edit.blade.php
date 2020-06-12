@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Estoque - Editar Custo</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="{{ route('estoque.update', $produto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="field">
            <strong>ID: </strong> {{$produto->id}}
        </div>
        <div class="field">
            <strong>Descrição: </strong> {{$produto->descricao}}
        </div>
        <div class="field">
            <strong>Aplicação: </strong> {{$produto->aplicacao}}
        </div>
        <div class="field">
            <strong>Data Compra: </strong> {{date('d/m/Y', strtotime($produto->ultcompra))}}
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col-6">
                    <strong>Custo Atual: </strong> R$ {{$produto->custo}}
                </div>
                <div class="col">
                    <strong>Última Compra: </strong> R$ {{$novoitem->itemvalor}}
                </div>
            </div>
        </div>
        <br>
        <div class="pull-right">
            <h5>Atualizar Custo: </h5>
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
                        <input type="text" class="input" name="despesa" id="despesa" onkeyup="calculaCusto()" value="{{$produto->despesa}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="form-row">
                <div class="col-6">
                    <strong>ICMS (%): </strong>
                    <div class="control">
                        <input type="text" class="input" name="icms" id="icms" onkeyup="calculaCusto()" value="{{$produto->icms}}">
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
                        <input type="text" class="input" name="perlucro" id="perlucro" onkeyup="calculaTotal()" value="{{$produto->perlucro}}">
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
        <br><br>
        <input type="submit" class="button btn-success" value="Atualizar">
        <a class="btn btn-warning" href="{{route('estoque.index')}}">Voltar</a>
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
