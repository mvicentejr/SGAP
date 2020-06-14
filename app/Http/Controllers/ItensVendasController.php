<?php

namespace App\Http\Controllers;

use App\ItensVenda;
use App\Venda;
use App\Produto;
use Illuminate\Http\Request;

class ItensVendasController extends Controller
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
            'venda' => 'required',
            'produto' => 'required',
            'quantidade' => 'required | numeric',
            'itemvalor' => 'required | numeric',
            'itemtotal' => 'required | numeric',
        ]);

        $produto = Produto::findOrFail($request->produto);
        $venda = Venda::findOrFail($request->venda);

        if ($request->quantidade > $produto->estoque){
            return redirect()->route('itensvendas.edit', $venda->id)->with('success', 'Quantidade Indisponível em Estoque!');
        }
        else {
            $insert = [
                'venda_id' => $request->venda,
                'produto_id' => $request->produto,
                'quantidade' => $request->quantidade,
                'itemvalor' => $request->itemvalor,
                'itemtotal' => $request->itemtotal
            ];

            ItensVenda::create($insert);

            $produto->estoque -= $request->quantidade;
            $produto->ultvenda = $venda->datavenda;
            $produto->update();
            $venda->subtotal += $request->itemtotal;
            $venda->subtotal = round($venda->subtotal,2);
            $venda->update();

            return redirect()->route('vendas.edit', $venda->id)->with('success', 'Produto adicionado com sucesso!');
        }
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
        $item = ItensVenda::findorFail($item);
        $produtos = Produto::query()->where('estoque','>',0)->select(['*'])->orderBy('descricao')->get();
        $venda = Venda::findOrFail($item->venda->id);

        return view('itensvendas.edit', ['item' => $item, 'produtos' => $produtos, 'venda' => $venda]);
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
        $item = ItensVenda::findorFail($item);

        $request->validate([
            'venda' => 'required',
            'produto' => 'required',
            'quantidade' => 'required | numeric',
            'itemvalor' => 'required | numeric',
            'itemtotal' => 'required | numeric',
        ]);

        $produto = Produto::findOrFail($request->produto);
        $venda = Venda::findOrFail($request->venda);

        if ($request->quantidade > $produto->estoque){
            return redirect()->route('itensvendas.edit', $venda->id)->with('success', 'Quantidade Indisponível em Estoque!');
        }
        else {
            $update = [
                'venda_id' => $request->venda,
                'produto_id' => $request->produto,
                'quantidade' => $request->quantidade,
                'itemvalor' => $request->itemvalor,
                'itemtotal' => $request->itemtotal
            ];

            $venda->subtotal -= $item->itemtotal;
            $venda->update();
            $produto->estoque += $item->quantidade;
            $produto->update();

            $item->update($update);

            $produto->estoque -= $request->quantidade;
            $produto->ultvenda = $venda->datavenda;
            $produto->update();
            $venda->subtotal += $request->itemtotal;
            $venda->subtotal = round($venda->subtotal,2);
            $venda->update();

            return redirect()->route('vendas.edit', $venda->id)->with('success', 'Item '. $produto->descricao .' atualizado com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $item)
    {
        $item = ItensVenda::findorFail($item);

        $produto = Produto::findOrFail($item->produto->id);
        $venda = Venda::findOrFail($item->venda->id);
        $produto->estoque += $item->quantidade;
        $produto->update();
        $venda->subtotal -= $item->itemtotal;
        $venda->total = round($venda->subtotal,2);
        $venda->update();

        $item->delete();

        return redirect()->route('vendas.edit', $venda->id)->with('success', 'Item removido com sucesso!');
    }

    public function adicionar(int $venda)
    {
        $venda = Venda::findorFail($venda);
        $produtos = Produto::query()->where('estoque','>',0)->select(['*'])->orderBy('descricao')->get();
        return view('itensvendas.adicionar', ['venda' => $venda, 'produtos'=> $produtos]);
    }
}
