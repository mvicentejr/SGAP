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
        foreach ($funcionarios as $funcionario)
            $funcionario->cargo = Cargo::findOrFail($funcionario->cargo);

        $data = ['funcionarios' => $funcionarios];
        $pdf = PDF::loadView('relfuncionarios/geral', $data)->setPaper('a4','landscape');

        return $pdf->stream('geral.pdf');
    }

    public function cargo(int $id)
    {
        $cargo = Cargo::findOrFail($id);
        $funcionarios = Funcionario::query()->where('cargo','=',$id)->select(['*'])->orderBy('id')->get();
        foreach ($funcionarios as $funcionario)
            $funcionario->cargo = Cargo::findOrFail($funcionario->cargo);

        $data = ['funcionarios' => $funcionarios, 'cargo' => $cargo];
        $pdf = PDF::loadView('relfuncionarios/cargo', $data)->setPaper('a4','landscape');

        return $pdf->stream('cargo.pdf');

    }
}
