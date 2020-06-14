<?php

namespace App\Http\Controllers;

use App\Compra;
use App\ItensCompra;
use App\Produto;
use Illuminate\Http\Request;

class ItensComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'compra' => 'required',
            'produto' => 'required',
            'quantidade' => 'required | numeric',
            'itemvalor' => 'required | numeric',
            'itemtotal' => 'required | numeric',
        ]);

         $insert = [
            'compra_id' => $request->compra,
            'produto_id' => $request->produto,
            'quantidade' => $request->quantidade,
            'itemvalor' => $request->itemvalor,
            'itemtotal' => $request->itemtotal
        ];
        ItensCompra::create($insert);

        $produto = Produto::findOrFail($request->produto);
        $compra = Compra::findOrFail($request->compra);
        $produto->estoque += $request->quantidade;
        $produto->ultcompra = $compra->datacompra;
        $produto->update();
        $compra->total += $request->itemtotal;
        $compra->total = round($compra->total,2);
        $compra->update();

        return redirect()->route('compras.edit', $compra->id)->with('success', 'Produto adicionado com sucesso!');
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
    public function edit(int $item)
    {
        $item = ItensCompra::findorFail($item);

        $produtos = Produto::orderby('descricao')->get();

        return view('itenscompras.edit', ['item' => $item, 'produtos' => $produtos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $item)
    {
        $item = ItensCompra::findorFail($item);

        $request->validate([
            'compra' => 'required',
            'produto' => 'required',
            'quantidade' => 'required | numeric',
            'itemvalor' => 'required | numeric',
            'itemtotal' => 'required | numeric',
        ]);

        $update = [
            'compra_id' => $request->compra,
            'produto_id' => $request->produto,
            'quantidade' => $request->quantidade,
            'itemvalor' => $request->itemvalor,
            'itemtotal' => $request->itemtotal
        ];

        $compra->total -= $item->itemtotal;
        $compra->update();

        $item->update($update);

        $produto = Produto::findOrFail($request->produto);
        $compra = Compra::findOrFail($request->compra);
        $produto->estoque += $request->quantidade;
        $produto->ultcompra = $compra->datacompra;
        $produto->update();
        $compra->total += $request->itemtotal;
        $compra->total = round($compra->total,2);
        $compra->update();

        return redirect()->route('compras.edit', $compra->id)->with('success', 'Item '. $produto->descricao .' atualizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $item)
    {
        $item = ItensCompra::findorFail($item);

        $produto = Produto::findOrFail($item->produto->id);
        $compra = Compra::findOrFail($item->compra->id);
        $produto->estoque -= $item->quantidade;
        $produto->update();
        $compra->total -= $item->itemtotal;
        $compra->total = round($compra->total,2);
        $compra->update();

        $item->delete();

        return redirect()->route('compras.edit', $compra->id)->with('success', 'Item removido com sucesso!');
    }

    public function adicionar(int $compra)
    {
        $compra = Compra::findorFail($compra);
        $produtos = Produto::orderby('descricao')->get();
        return view('itenscompras.adicionar', ['compra' => $compra, 'produtos'=> $produtos]);
    }
}
