<?php

namespace App\Http\Controllers;

use App\Recebimento;
use App\Venda;
use App\TipoPagamento;
use App\StatusPgto;
use Illuminate\Http\Request;

class RecebimentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recebimentos = Recebimento::query()->where('status','=',1)->select(['*'])->orderBy('id')->get();
        $recebidos = Recebimento::query()->where('status','=',2)->select(['*'])->orderBy('id')->get();
        foreach ($recebimentos as $recebimento){
            $recebimento->venda = Venda::findOrFail($recebimento->venda);
            $recebimento->tipopag = TipoPagamento::findOrFail($recebimento->tipopag);
            $recebimento->status = StatusPgto::findOrFail($recebimento->status);
        }
        foreach ($recebidos as $recebido){
            $recebido->venda = Venda::findOrFail($recebido->venda);
            $recebido->tipopag = TipoPagamento::findOrFail($recebido->tipopag);
            $recebido->status = StatusPgto::findOrFail($recebido->status);
        }

        return view('recebimentos.index', ['recebimentos' => $recebimentos, 'recebidos' => $recebidos]);
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
            'subtotal' => 'required | numeric',
            'desconto' => 'required | numeric',
            'total' => 'required | numeric',
            'tipopag'=> 'required',
        ]);

        $venda = Venda::findOrFail($request->venda);
        $venda->status = 2;
        $venda->desconto = $request->desconto;
        $venda->total = $request->total;
        $venda->update();

        if ($request->tipopag == 1){
            $insert = [
                'venda' => $request->venda,
                'tipopag' => $request->tipopag,
                'parcela' => 1,
                'totalparc' => 1,
                'valor' => $venda->total,
                'status' => 1,
                'vencimento' => date('Y/m/d')
            ];
            Recebimento::create($insert);
        }
        elseif ($request->tipopag == 2){
            $insert = [
                'venda' => $request->venda,
                'tipopag' => $request->tipopag,
                'parcela' => 1,
                'totalparc' => 1,
                'valor' => $venda->total,
                'status' => 1,
                'vencimento' =>  date('Y/m/d', strtotime('+30 days'))
            ];
            Recebimento::create($insert);
        }
        else{
            $request->validate([
                'totalparc' => 'required | numeric'
            ]);

            $parc = 1;
            $valor = $venda->total / $request->totalparc;
            $valor = round($valor,2);
            $venc = date('Y/m/d', strtotime('+30 days'));
            while ($parc <= $request->totalparc)
            {
                $insert = [
                    'venda' => $request->venda,
                    'tipopag' => $request->tipopag,
                    'parcela' => $parc,
                    'totalparc' => $request->totalparc,
                    'valor' => $valor,
                    'status' => 1,
                    'vencimento' => $venc
                ];

                Recebimento::create($insert);

                $parc = $parc + 1;
                $venc =  date('Y/m/d', strtotime('+30 days', strtotime($venc)));

            }

        }

        return redirect()->route('vendas.index')->with('success', 'Venda finalizada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $recebido)
    {
        $recebido = Recebimento::findorFail($recebido);
        $recebido->venda = Venda::findOrFail($recebido->venda);
        $recebido->tipopag = TipoPagamento::findOrFail($recebido->tipopag);

        return view('recebimentos.show', ['recebido' => $recebido]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $recebimento)
    {
        $recebimento = Recebimento::findorFail($recebimento);
        $recebimento->venda = Venda::findOrFail($recebimento->venda);
        $recebimento->tipopag = TipoPagamento::findorFail($recebimento->tipopag);

        return view('recebimentos.edit', ['recebimento' => $recebimento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $recebimento)
    {
        $recebimento = Recebimento::findorFail($recebimento);

        $request->validate([
            'pagamento' => 'required'
        ]);

        $recebimento->update($request->all());

        return redirect()->route('recebimentos.index')->with('success', 'Pagamento atualizado com sucesso!');
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

    public function adicionar(int $venda)
    {
        $venda = Venda::findorFail($venda);
        $tipopags = TipoPagamento::orderby('id')->get();
        return view('recebimentos.adicionar', ['venda' => $venda, 'tipopags'=> $tipopags]);
    }
}
