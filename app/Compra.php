<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = ['id', 'datacompra', 'funcionario', 'fornecedor', 'nota', 'total'];

    protected $table = 'compras';


    public $timestamps = false;

    public function funcionario()
    {
        return $this->belongsTo('App\Funcionario');
    }

    public function fornecedor()
    {
        return $this->belongsTo('App\Fornecedor');
    }

    public function itens()
    {
        return $this->hasMany('App\ItensCompra');
    }
}
