<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItensCompra extends Model
{
    protected $fillable = ['compra', 'produto', 'quantidade', 'itemvalor', 'itemtotal'];

    protected $table = 'itenscompras';


    public $timestamps = false;

    public function compra()
    {
        return $this->belongsTo('App\Compra');
    }

    public function produto()
    {
        return $this->belongsTo('App\Produto');
    }
}
