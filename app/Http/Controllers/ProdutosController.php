<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Marca;
use App\Montadora;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::orderby('id')->get();
        foreach ($produtos as $produto){
            $produto->marca = Marca::findOrFail($produto->marca);
            $produto->montadora = Montadora::findOrFail($produto->montadora);
        }

        return view('produtos.index', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::orderby('id')->get();
        $montadoras = Montadora::orderby('id')->get();
        return view('produtos.create', ['marcas' => $marcas, 'montadoras'=> $montadoras]);
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
            'codoriginal' => 'required',
            'codfabrica' => 'required',
            'descricao' => 'required',
            'aplicacao' => 'required',
            'marca' => 'required',
            'montadora' => 'required',
            'unidade' => 'required',
            'ncmsh' => 'required | numeric',
            'cst' => 'required | numeric',
            'cfop' => 'required | numeric',
        ]);

        Produto::create($request->all());

        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( int $produto)
    {
        $produto = Produto::findorFail($produto);
        $produto->marca = Marca::findOrFail($produto->marca);
        $produto->montadora = Montadora::findOrFail($produto->montadora);
        return view('produtos.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $produto)
    {
        $produto = Produto::findorFail($produto);
        $produto->marca = Marca::findOrFail($produto->marca);
        $produto->montadora = Montadora::findorFail($produto->montadora);

        $marcas = Marca::orderby('id')->get();
        $montadoras = Montadora::orderby('id')->get();

        return view('produtos.edit', ['produto' => $produto, 'marcas' => $marcas, 'montadoras' => $montadoras]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $produto)
    {
        $produto = Produto::findorFail($produto);

        $request->validate([
            'codoriginal' => 'required',
            'codfabrica' => 'required',
            'descricao' => 'required',
            'aplicacao' => 'required',
            'marca' => 'required',
            'montadora' => 'required',
            'unidade' => 'required',
            'ncmsh' => 'required | numeric',
            'cst' => 'required | numeric',
            'cfop' => 'required | numeric',
        ]);

        $produto->update($request->all());

        $desc = $request->input('descricao');

        return redirect()->route('produtos.index')->with('success', 'Produto '. $desc .' atualizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $produto)
    {
        $produto = Produto::findorFail($produto);
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto removido com sucesso!');
    }
}
