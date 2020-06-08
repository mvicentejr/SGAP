<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\StatusCliente;
use App\TipoCliente;
use Illuminate\Http\Request;

class ClientesjController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::query()->where('tipo','=',2)->select(['*'])->orderBy('id')->get();
        foreach ($clientes as $cliente)
            $cliente->status = StatusCliente::findOrFail($cliente->status);
        return view('clientesj.index', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = StatusCliente::orderby('id')->get();
        return view('clientesj.create', ['status' => $status ]);
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
            'status' => 'required',
            'nome' => 'required',
            'cnpj' => 'required',
            'ie' => 'required',
            'cep' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required | max:2',
            'fone1' => 'required',
            'email' => 'required'
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientesj.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $clientej)
    {
        $cliente = Cliente::findorFail($clientej);
        $cliente->tipo = TipoCliente::findOrFail($cliente->tipo);
        $cliente->status = StatusCliente::findOrFail($cliente->status);
        return view('clientesj.show', ['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $clientej)
    {
        $cliente = Cliente::findorFail($clientej);
        $cliente->tipo = TipoCliente::findOrFail($cliente->tipo);
        $cliente->status = StatusCliente::findorFail($cliente->status);

        $situacao = StatusCliente::orderby('id')->get();

        return view('clientesj.edit', ['cliente' => $cliente, 'situacao' => $situacao]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'status' => 'required',
            'nome' => 'required',
            'cnpj' => 'required',
            'ie' => 'required',
            'cep' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required | max:2',
            'fone1' => 'required',
            'email' => 'required'
        ]);

        $cliente->update($request->all());

        $nome = $request->input('nome');

        return redirect()->route('clientesj.index')->with('success', 'Cliente '. $nome .' atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $clientej)
    {
        $cliente = Cliente::findorFail($clientej);
        $cliente->delete();
        return redirect()->route('clientesj.index')->with('success', 'Cliente removido com sucesso!');
    }
}
