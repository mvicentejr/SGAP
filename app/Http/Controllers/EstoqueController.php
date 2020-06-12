<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Marca;
use App\Montadora;
use App\Compra;
use App\ItensCompra;
use App\ItensVenda;
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
        $produtos = Produto::query()->where('estoque','>',0)->select(['*'])->orderBy('descricao')->get();

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
    public function edit(int $produto)
    {
        $produto = Produto::findorFail($produto);

        $item = ItensCompra::query()->where('produto_id','=',$produto->id)->select('*')->orderByDesc('id')->get();
        $novoitem = $item[0];

        return view('estoque.edit', ['produto' => $produto, 'novoitem' => $novoitem]);
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
            'custo' => 'required',
            'despesa' => 'required',
            'icms' => 'required',
            'ctotal' => 'required',
            'perlucro' => 'required',
            'valorvenda' => 'required',
        ]);

        $produto->update($request->all());

        return redirect()->route('estoque.index')->with('success', 'Valor de Venda atualizado com sucesso!');

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
