<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = ['id', 'status', 'funcionario', 'cliente', 'datavenda', 'subtotal', 'desconto',
                        'total'];

    protected $table = 'vendas';


    public $timestamps = false;

    public function status()
    {
        return $this->belongsTo('App\StatusVenda');
    }

    public function funcionario()
    {
        return $this->belongsTo('App\Funcionario');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function itens()
    {
        return $this->hasMany('App\ItensVenda');
    }
}
