<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Pagamento;
use App\StatusPgto;
use App\TipoPagamento;
use Illuminate\Http\Request;

class PagamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagamentos = Pagamento::query()->where('status','=',1)->select(['*'])->orderBy('id')->get();
        $pagpagos = Pagamento::query()->where('status','=',2)->select(['*'])->orderBy('id')->get();
        foreach ($pagamentos as $pagamento){
            $pagamento->compra = Compra::findOrFail($pagamento->compra);
            $pagamento->tipopag = TipoPagamento::findOrFail($pagamento->tipopag);
            $pagamento->status = StatusPgto::findOrFail($pagamento->status);
        }
        foreach ($pagpagos as $pagpago){
            $pagpago->compra = Compra::findOrFail($pagpago->compra);
            $pagpago->tipopag = TipoPagamento::findOrFail($pagpago->tipopag);
            $pagpago->status = StatusPgto::findOrFail($pagpago->status);
        }

        return view('pagamentos.index', ['pagamentos' => $pagamentos, 'pagpagos' => $pagpagos]);
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
            'tipopag'=> 'required',
            'totalparc' => 'required | numeric',
        ]);

        $compra = Compra::findOrFail($request->compra);

        if ($request->tipopag == 1){
            $insert = [
                'compra' => $request->compra,
                'tipopag' => $request->tipopag,
                'parcela' => 1,
                'totalparc' => 1,
                'valor' => $compra->total,
                'status' => 1,
                'vencimento' => date('Y/m/d')
            ];
            Pagamento::create($insert);
        }
        elseif ($request->tipopag == 2){
            $insert = [
                'compra' => $request->compra,
                'tipopag' => $request->tipopag,
                'parcela' => 1,
                'totalparc' => 1,
                'valor' => $compra->total,
                'status' => 1,
                'vencimento' =>  date('Y/m/d', strtotime('+30 days'))
            ];
            Pagamento::create($insert);
        }
        else{
            $parc = 1;
            $valor = $compra->total / $request->totalparc;
            $valor = round($valor,2);
            $venc = date('Y/m/d', strtotime('+30 days'));
            while ($parc <= $request->totalparc)
            {
                $insert = [
                    'compra' => $request->compra,
                    'tipopag' => $request->tipopag,
                    'parcela' => $parc,
                    'totalparc' => $request->totalparc,
                    'valor' => $valor,
                    'status' => 1,
                    'vencimento' => $venc
                ];

                Pagamento::create($insert);

                $parc = $parc + 1;
                $venc =  date('Y/m/d', strtotime('+30 days', strtotime($venc)));

            }

        }

        return redirect()->route('compras.index')->with('success', 'Compra finalizada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $pagpago)
    {
        $pagpago = Pagamento::findorFail($pagpago);
        $pagpago->compra = Compra::findOrFail($pagpago->compra);
        $pagpago->tipopag = TipoPagamento::findOrFail($pagpago->tipopag);

        return view('pagamentos.show', ['pagpago' => $pagpago]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $pagamento)
    {
        $pagamento = Pagamento::findorFail($pagamento);
        $pagamento->compra = Compra::findOrFail($pagamento->compra);
        $pagamento->tipopag = TipoPagamento::findorFail($pagamento->tipopag);

        return view('pagamentos.edit', ['pagamento' => $pagamento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $pagamento)
    {
        $pagamento = Pagamento::findorFail($pagamento);

        $request->validate([
            'pagamento' => 'required'
        ]);

        $pagamento->update($request->all());

        return redirect()->route('pagamentos.index')->with('success', 'Pagamento atualizado com sucesso!');
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

    public function adicionar(int $compra)
    {
        $compra = Compra::findorFail($compra);
        $tipopags = TipoPagamento::orderby('id')->get();
        return view('pagamentos.adicionar', ['compra' => $compra, 'tipopags'=> $tipopags]);
    }

}
