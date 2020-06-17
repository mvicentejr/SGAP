<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Funcionario;
use App\StatusVenda;
use App\TipoPagamento;
use App\Venda;
use Illuminate\Http\Request;
use PDF;

class RelVendasController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderby('nome')->get();
        $funcionarios = Funcionario::orderby('apelido')->get();
        $tipopags = TipoPagamento::orderby('id')->get();

        return view('relvendas.index', ['clientes' => $clientes, 'funcionarios' => $funcionarios, 'tipopags' => $tipopags]);
    }

    public function geral()
    {
        $vendas = Venda::all();

        $total = 0;
        $totalvalor = 0;

        foreach ($vendas as $venda){
            $venda->funcionario = Funcionario::findOrFail($venda->funcionario);
            $venda->cliente = Cliente::findOrFail($venda->cliente);
            $venda->status = StatusVenda::findOrFail($venda->status);
            $total++;
            $totalvalor += $venda->total;
        }

        $data = ['vendas' => $vendas, 'total' => $total, 'totalvalor' => $totalvalor];
        $pdf = PDF::loadView('relvendas/geral', $data)->setPaper('a4','landscape');

        return $pdf->stream('geral.pdf');
    }

    public function cliente(Request $request)
    {
        $cliente = Cliente::findOrFail($request->cliente);
        $vendas = Venda::query()->where('cliente','=',$cliente->id)->select(['*'])->orderBy('id')->get();
        $total = 0;
        $totalvalor = 0;
        foreach ($vendas as $venda){
            $venda->funcionario = Funcionario::findOrFail($venda->funcionario);
            $venda->status = StatusVenda::findOrFail($venda->status);
            $total++;
            $totalvalor += $venda->total;
        }

        $data = ['vendas' => $vendas, 'cliente' => $cliente, 'total' => $total, 'totalvalor' => $totalvalor];
        $pdf = PDF::loadView('relvendas/cliente', $data)->setPaper('a4','landscape');

        return $pdf->stream('cliente.pdf');

    }

    public function funcionario(Request $request)
    {
        $funcionario = Funcionario::findOrFail($request->funcionario);
        $vendas = Venda::query()->where('funcionario','=',$funcionario->id)->select(['*'])->orderBy('id')->get();
        $total = 0;
        $totalvalor = 0;
        foreach ($vendas as $venda){
            $venda->cliente = Cliente::findOrFail($venda->cliente);
            $venda->status = StatusVenda::findOrFail($venda->status);
            $total++;
            $totalvalor += $venda->total;
        }

        $data = ['vendas' => $vendas, 'funcionario' => $funcionario, 'total' => $total, 'totalvalor' => $totalvalor];
        $pdf = PDF::loadView('relvendas/funcionario', $data)->setPaper('a4','landscape');

        return $pdf->stream('funcionario.pdf');

    }

    public function periodo(Request $request)
    {
        $inicio = date('Y-m-d', strtotime($request->inicio));
        $fim = date('Y-m-d', strtotime($request->fim));
        $vendas = Venda::query()->where('datavenda','>=',$inicio)->where('datavenda','<=',$fim)->select(['*'])->orderBy('id')->get();
        $total = 0;
        $totalvalor = 0;

        foreach ($vendas as $venda){
            $venda->funcionario = Funcionario::findOrFail($venda->funcionario);
            $venda->cliente = Cliente::findOrFail($venda->cliente);
            $venda->status = StatusVenda::findOrFail($venda->status);
            $total++;
            $totalvalor += $venda->total;
        }

        $data = ['vendas' => $vendas, 'total' => $total, 'totalvalor' => $totalvalor, 'inicio' => $inicio, 'fim' => $fim];
        $pdf = PDF::loadView('relvendas/periodo', $data)->setPaper('a4','landscape');

        return $pdf->stream('periodo.pdf');

    }
}
