<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Funcionario;
use App\StatusVenda;
use App\Venda;
use Illuminate\Http\Request;

class VendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendas = Venda::query()->where('status','=',1)->select(['*'])->orderBy('id')->get();
        $fvendas = Venda::query()->where('status','=',2)->select(['*'])->orderBy('id')->get();
        foreach ($vendas as $venda){
            $venda->funcionario = Funcionario::findOrFail($venda->funcionario);
            $venda->cliente = Cliente::findOrFail($venda->cliente);
            $venda->status = StatusVenda::findOrFail($venda->status);
        }
        foreach ($fvendas as $fvenda){
            $fvenda->funcionario = Funcionario::findOrFail($fvenda->funcionario);
            $fvenda->cliente = Cliente::findOrFail($fvenda->cliente);
            $fvenda->status = StatusVenda::findOrFail($fvenda->status);
        }
        return view('vendas.index', ['vendas' => $vendas, 'fvendas' => $fvendas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $funcionarios = Funcionario::orderby('id')->get();
        $clientes = Cliente::orderby('id')->get();
        return view('vendas.create', ['funcionarios' => $funcionarios, 'clientes'=> $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'datavenda' => 'required',
            'funcionario' => 'required',
            'cliente' => 'required',
        ]);

        $venda = Venda::create($request->all());

        return redirect()->route('vendas.edit', $venda->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $fvenda)
    {
        $venda = Venda::findorFail($fvenda);
        $venda->cliente = Cliente::findOrFail($venda->cliente);
        $venda->funcionario = Funcionario::findOrFail($venda->funcionario);
        $venda->status = StatusVenda::findOrFail($venda->status);

        return view('vendas.show', ['venda' => $venda]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $venda)
    {
        $venda = Venda::findorFail($venda);
        $venda->funcionario = Funcionario::findOrFail($venda->funcionario);
        $venda->cliente = Cliente::findorFail($venda->cliente);
        $venda->status = StatusVenda::findOrFail($venda->status);

        return view('vendas.edit', ['venda' => $venda]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cancelar(int $venda)
    {
        $venda = Venda::findOrFail($venda);
        $venda->status = 3;
        $venda->update();

        return redirect()->route('vendas.index')->with('success', 'Venda '. $venda->id. ' Item removido com sucesso!');
    }
}
