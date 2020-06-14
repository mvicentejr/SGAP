<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Fornecedor;
use App\Funcionario;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::orderby('id')->get();
        foreach ($compras as $compra)
            $compra->fornecedor = Fornecedor::findOrFail($compra->fornecedor);
        return view('compras.index', ['compras' => $compras]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $funcionarios = Funcionario::orderby('id')->get();
        $fornecedores = Fornecedor::orderby('id')->get();
        return view('compras.create', ['funcionarios' => $funcionarios, 'fornecedores'=> $fornecedores]);
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
            'datacompra' => 'required',
            'funcionario' => 'required',
            'fornecedor' => 'required',
            'nota' => 'required | numeric',
        ]);

        $compra = Compra::create($request->all());

        return redirect()->route('compras.edit', $compra->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $compra)
    {
        $compra = Compra::findorFail($compra);
        $compra->fornecedor = Fornecedor::findOrFail($compra->fornecedor);
        $compra->funcionario = Funcionario::findOrFail($compra->funcionario);
        return view('compras.show', ['compra' => $compra]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $compra)
    {
        $compra = Compra::findorFail($compra);
        $compra->funcionario = Funcionario::findOrFail($compra->funcionario);
        $compra->fornecedor = Fornecedor::findorFail($compra->fornecedor);

        return view('compras.edit', ['compra' => $compra]);
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
}
