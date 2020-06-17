<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\StatusCliente;
use App\TipoCliente;
use Illuminate\Http\Request;
use PDF;

class RelClientesController extends Controller
{
    public function index()
    {
        $situacao = StatusCliente::orderby('id')->get();

        return view('relclientes.index', ['situacao' => $situacao]);
    }

    public function geral()
    {
        $clientes = Cliente::all();

        $total = 0;
        foreach ($clientes as $cliente){
            $cliente->tipo = TipoCliente::findOrFail($cliente->tipo);
            $cliente->status = StatusCliente::findOrFail($cliente->status);
            $total++;
        }

        $data = ['clientes' => $clientes, 'total' => $total];
        $pdf = PDF::loadView('relclientes/geral', $data)->setPaper('a4','landscape');

        return $pdf->stream('geral.pdf');
    }

    public function status(Request $request)
    {
        $status = StatusCliente::findOrFail($request->status);
        $clientes = Cliente::query()->where('status','=',$status->id)->select(['*'])->orderBy('id')->get();
        $total = 0;
        foreach ($clientes as $cliente){
            $cliente->tipo = TipoCliente::findOrFail($cliente->tipo);
            $cliente->status = StatusCliente::findOrFail($cliente->status);
            $total++;
        }

        $data = ['clientes' => $clientes, 'status' => $status, 'total' => $total];
        $pdf = PDF::loadView('relclientes/status', $data)->setPaper('a4','landscape');

        return $pdf->stream('status.pdf');

    }
}
