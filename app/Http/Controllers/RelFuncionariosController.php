<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class RelFuncionariosController extends Controller
{
    public function index()
    {
        $cargos = Cargo::orderby('id')->get();

        return view('relfuncionarios.index', ['cargos' => $cargos]);
    }

    public function geral()
    {
        $funcionarios = Funcionario::all();
        $total = 0;
        foreach ($funcionarios as $funcionario){
            $funcionario->cargo = Cargo::findOrFail($funcionario->cargo);
            $total++;
        }
        $data = ['funcionarios' => $funcionarios, 'total' => $total];
        $pdf = PDF::loadView('relfuncionarios/geral', $data)->setPaper('a4','landscape');

        return $pdf->stream('geral.pdf');
    }

    public function cargo(Request $request)
    {
        $cargo = Cargo::findOrFail($request->cargo);
        $funcionarios = Funcionario::query()->where('cargo','=',$cargo->id)->select(['*'])->orderBy('id')->get();
        $total = 0;

        foreach ($funcionarios as $funcionario){
            $funcionario->cargo = Cargo::findOrFail($funcionario->cargo);
            $total++;
        }

        $data = ['funcionarios' => $funcionarios, 'cargo' => $cargo, 'total' => $total];
        $pdf = PDF::loadView('relfuncionarios/cargo', $data)->setPaper('a4','landscape');

        return $pdf->stream('cargo.pdf');

    }
}
