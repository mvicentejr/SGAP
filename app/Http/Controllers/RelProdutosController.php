<?php

namespace App\Http\Controllers;

use App\Marca;
use App\Montadora;
use App\Produto;
use Illuminate\Http\Request;
use PDF;

class RelProdutosController extends Controller
{
    public function index()
    {
        $marcas = Marca::orderby('descricao')->get();
        $montadoras = Montadora::orderby('descricao')->get();

        return view('relprodutos.index', ['marcas' => $marcas, 'montadoras' => $montadoras]);
    }

    public function geral()
    {
        $produtos = Produto::all();

        $total = 0;
        foreach ($produtos as $produto){
            $produto->marca = Marca::findOrFail($produto->marca);
            $produto->montadora = Montadora::findOrFail($produto->montadora);
            $total++;
        }

        $data = ['produtos' => $produtos, 'total' => $total];
        $pdf = PDF::loadView('relprodutos/geral', $data)->setPaper('a4','landscape');

        return $pdf->stream('geral.pdf');
    }

    public function estoque()
    {
        $produtos = Produto::query()->where('estoque','>',0)->select(['*'])->orderBy('descricao')->get();

        $total = 0;
        foreach ($produtos as $produto){
            $total++;
        }

        $data = ['produtos' => $produtos, 'total' => $total];
        $pdf = PDF::loadView('relprodutos/estoque', $data)->setPaper('a4','landscape');

        return $pdf->stream('estoque.pdf');
    }

    public function marca(Request $request)
    {
        $marca = Marca::findOrFail($request->marca);
        $produtos = Produto::query()->where('marca','=',$marca->id)->select(['*'])->orderBy('id')->get();
        $total = 0;
        foreach ($produtos as $produto){
            $produto->montadora = Montadora::findOrFail($produto->montadora);
            $total++;
        }

        $data = ['produtos' => $produtos, 'marca' => $marca, 'total' => $total];
        $pdf = PDF::loadView('relprodutos/marca', $data)->setPaper('a4','landscape');

        return $pdf->stream('marca.pdf');

    }

    public function montadora(Request $request)
    {
        $montadora = Montadora::findOrFail($request->montadora);
        $produtos = Produto::query()->where('marca','=',$montadora->id)->select(['*'])->orderBy('id')->get();
        $total = 0;
        foreach ($produtos as $produto){
            $produto->marca = Marca::findOrFail($produto->marca);
            $total++;
        }

        $data = ['produtos' => $produtos, 'montadora' => $montadora, 'total' => $total];
        $pdf = PDF::loadView('relprodutos/montadora', $data)->setPaper('a4','landscape');

        return $pdf->stream('montadora.pdf');

    }
}
