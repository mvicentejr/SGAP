<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Marca;
use App\Montadora;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::orderby('descricao')->get();

        return view('estoque.index', ['produtos' => $produtos]);
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
    public function show(int $estoque)
    {
        $produto = Produto::findorFail($estoque);
        $produto->marca = Marca::findOrFail($produto->marca);
        $produto->montadora = Montadora::findOrFail($produto->montadora);
        return view('estoque.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $estoque)
    {
        $produto = Produto::findorFail($estoque);
        $produto->marca = Marca::findOrFail($produto->marca);
        $produto->montadora = Montadora::findorFail($produto->montadora);

        return view('estoque.edit', ['produto' => $produto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $estoque)
    {
        $produto = Produto::findorFail($estoque);

        $request->validate([
            'custo' => 'required',
            'despesa' => 'required',
            'icms' => 'required',
            'ctotal' => 'required',
            'perlucro' => 'required',
            'valorvenda' => 'required',
            'eminimo' => 'required | numeric',
            'emaximo' => 'required | numeric',
        ]);

        $produto->update($request->all());
        //$produto = Produto::query()->where('id','=', $estoque)->update(['custo' => 'custo', 'despesa' => 'despesa', 'icms' => 'icms', 'ctotal' => 'ctotal', 'perlucro' => 'perlucro', 'valorvenda' => 'valorvenda', 'eminimo' => 'eminimo', 'emaximo' => 'emaximo']);

        $desc = $request->input('descricao');

        return redirect()->route('estoque.index')->with('success', 'Produto '. $desc .' atualizado com sucesso!');
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
