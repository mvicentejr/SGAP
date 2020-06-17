<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;
use PDF;

class RelFornecedoresController extends Controller
{
    public function index()
    {
        return view('relfornecedores.index');
    }

    public function geral()
    {
        $fornecedores = Fornecedor::all();

        $total = 0;
        foreach ($fornecedores as $fornecedor){
            $total++;
        }

        $data = ['fornecedores' => $fornecedores, 'total' => $total];
        $pdf = PDF::loadView('relfornecedores/geral', $data)->setPaper('a4','landscape');

        return $pdf->stream('geral.pdf');
    }

}
