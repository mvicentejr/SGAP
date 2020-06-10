<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $fillable = ['id', 'compra', 'tipopag', 'parcela', 'totalparc', 'valor', 'status',
                        'vencimento', 'pagamento'];

    protected $table = 'pagamentos';


    public $timestamps = false;

    public function compra()
    {
        return $this->belongsTo('App\Compra');
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
