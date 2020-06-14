@extends('layout')
@section('content')
<div class="pull-right">
    <h2 class="text-center">Venda - Adicionar Produto</h2>
</div>
<div class="jumbotron">
    <div class="col-lg-6 margin-tb">
        <form class="form" action="/itensvendas" method="POST">
        @csrf
            <div class="field">
                <strong>Venda: </strong> {{$venda->id}}
                <input type="hidden" class="input" name="venda" value="{{$venda->id}}">
            </div>
            <div class="field">
                <div class="form-row align-items-center">
                    <div class="col-4">
                    <label class="mr-sm-2" for="produto"><strong>Produto: </strong></label>
                    <select class="custom-select mr-sm-2" id="produto" name="produto" onchange="transfereValores()">
                        <option selected></option>
                        @foreach ($produtos as $produto)
                    <option value="{{$produto->id}}">{{$produto->descricao}} - {{$produto->valorvenda}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-4">
                        <strong>Quantidade: </strong>
                        <div class="control">
                            <input type="number" class="input" name="quantidade" id="quantidade"  onkeyup="calculaTotal()">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-4">
                        <strong>Valor Unitário: </strong>
                        <div class="control">
                            <input type="text" class="input" name="itemvalor" id="itemvalor"  onkeyup="calculaTotal()">
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="form-row">
                    <div class="col-4">
                        <strong>Valor Total: </strong>
                        <div class="control">
                            <input type="text" class="input" name="itemtotal" id="itemtotal" value="">
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <input type="submit" class="button btn-success" value="Gravar">
            <input type="reset" class="button btn-secondary" value="Limpar">
            <a class="btn btn-warning" href="{{route('vendas.edit', $venda->id)}}">Voltar</a>
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

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif

    <script>
        let quantidade = document.getElementById('quantidade');
        let itemvalor = document.getElementById('itemvalor');
        let itemtotal = document.getElementById('itemtotal');

        function calculaTotal(){
            itemtotal.value = 0;
            if(quantidade.value && itemvalor.value){
                itemtotal.value = (parseFloat(quantidade.value) * parseFloat(itemvalor.value)).toFixed(2);
            }
        }
    </script>

    <script>
        function transfereValores(){
            let select = document.getElementById('produto');
            let valor = parseFloat((select.options[select.selectedIndex].text).split('-')[1].trim());

            document.getElementById('itemvalor').value = valor;

        }
    </script>
@endsection
