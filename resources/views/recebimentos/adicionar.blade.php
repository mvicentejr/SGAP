@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Venda - Adicionar Recebimentos</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="/recebimentos" method="POST">
        @csrf
            <div class="field">
                <strong>Venda: </strong> {{$venda->id}}
                <input type="hidden" class="input" name="venda" value="{{$venda->id}}">
            </div>
            <div class="field">
                <strong>Subtotal: </strong>
                <input type="text" class="input" name="subtotal" value="{{$venda->subtotal}}" id="subtotal" onkeyup="calculaTotal()">
            </div>
            <div class="field">
                <strong>Desconto (%): </strong>
                <input type="text" class="input" name="desconto" id="desconto" onkeyup="calculaTotal()">
            </div>
            <div class="field">
                <strong>Total: </strong>
                <input type="text" class="input" name="total" value="" id="total">
            </div>
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-4">
                    <label class="mr-sm-2" for="tipopag"><strong>Forma de Pagamento: </strong></label>
                    <select class="custom-select mr-sm-2" id="tipopag" name="tipopag">
                        <option selected></option>
                        @foreach ($tipopags as $tipopag)
                            <option value="{{$tipopag->id}}">{{$tipopag->descricao}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-4">
                        <strong>Número de Parcelas: </strong>
                        <div class="control">
                            <input type="number" class="input" name="totalparc">
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <input type="submit" class="button btn-success" value="Gravar">
            <input type="reset" class="button btn-secondary" value="Limpar">
            <a class="btn btn-warning" href="{{route('vendas.index')}}">Voltar</a>
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
        let subtotal = document.getElementById('subtotal');
        let desconto = document.getElementById('desconto');
        let total = document.getElementById('total');

        function calculaTotal(){
            total.value = 0;
            if(subtotal.value && desconto.value){
                total.value = (parseFloat(subtotal.value)-(parseFloat(subtotal.value)*parseFloat(desconto.value)/100)).toFixed(2);
            }
        }
    </script>

@endsection
