<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItensVenda extends Model
{
    protected $fillable = ['venda', 'produto', 'quantidade', 'itemvalor', 'itemtotal'];

    protected $table = 'itensvendas';


    public $timestamps = false;

    public function status()
    {
        return $this->belongsTo('App\Venda');
    }

    public function funcionario()
    {
        return $this->belongsTo('App\Produto');
    }

}
