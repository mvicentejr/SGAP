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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
