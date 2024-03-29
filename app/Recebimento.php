<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recebimento extends Model
{
    protected $fillable = ['id', 'venda', 'tipopag', 'parcela', 'totalparc', 'valor', 'status',
                        'vencimento', 'pagamento'];

    protected $table = 'recebimentos';


    public $timestamps = false;

    public function venda()
    {
        return $this->belongsTo('App\Venda');
    }

    public function tipopag()
    {
        return $this->belongsTo('App\TipoPagamento');
    }

    public function status()
    {
        return $this->belongsTo('App\StatusPgto');
    }
}
