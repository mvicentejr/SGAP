<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItensVenda extends Model
{
    protected $fillable = ['id', 'venda_id', 'produto_id', 'quantidade', 'itemvalor', 'itemtotal'];

    protected $table = 'itensvendas';


    public $timestamps = false;

    public function venda()
    {
        return $this->belongsTo('App\Venda');
    }

    public function produto()
    {
        return $this->belongsTo('App\Produto');
    }

}
