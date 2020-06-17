<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Fornecedor;
use App\Funcionario;
use Illuminate\Http\Request;
use PDF;

class RelComprasController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedor::orderby('nome')->get();

        return view('relcompras.index', ['fornecedores' => $fornecedores]);
    }

    public function geral()
    {
        $compras = Compra::all();

        $total = 0;
        $totalvalor = 0;

        foreach ($compras as $compra){
            $compra->funcionario = Funcionario::findOrFail($compra->funcionario);
            $compra->fornecedor = Fornecedor::findOrFail($compra->fornecedor);
            $total++;
            $totalvalor += $compra->total;
        }

        $data = ['compras' => $compras, 'total' => $total, 'totalvalor' => $totalvalor];
        $pdf = PDF::loadView('relcompras/geral', $data)->setPaper('a4','landscape');

        return $pdf->stream('geral.pdf');
    }

    public function fornecedor(Request $request)
    {
        $fornecedor = Fornecedor::findOrFail($request->fornecedor);
        $compras = Compra::query()->where('fornecedor','=',$fornecedor->id)->select(['*'])->orderBy('id')->get();
        $total = 0;
        $totalvalor = 0;
        foreach ($compras as $compra){
            $compra->funcionario = Funcionario::findOrFail($compra->funcionario);
            $total++;
            $totalvalor += $compra->total;
        }

        $data = ['compras' => $compras, 'fornecedor' => $fornecedor, 'total' => $total, 'totalvalor' => $totalvalor];
        $pdf = PDF::loadView('relcompras/fornecedor', $data)->setPaper('a4','landscape');

        return $pdf->stream('fornecedor.pdf');

    }
}
