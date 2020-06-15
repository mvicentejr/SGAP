<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\StatusCliente;
use App\TipoCliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::orderBy('nome')->get();
        foreach ($clientes as $cliente){
            $cliente->status = StatusCliente::findOrFail($cliente->status);
            $cliente->tipo = TipoCliente::findOrFail($cliente->tipo);
        }
        return view('clientes.index', ['clientes' => $clientes]);
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
    public function update(Request $request, int $cliente)
    {
        $cliente = Cliente::findorFail($cliente);

        if ($cliente->status == 1)
            $cliente->status = 2;
        else if($cliente->status == 2)
            $cliente->status = 1;

        $cliente->update($request->all());

        $nome = $request->input('nome');

        return redirect()->route('clientes.index')->with('success', 'Situação do Cliente '. $nome .' alterada com sucesso!');

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
