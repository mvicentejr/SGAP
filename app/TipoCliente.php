<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCliente extends Model
{
    protected $fillable = ['id', 'descricao'];

    protected $table = 'tipoclientes';

    public function clientes()
    {
        return $this->hasMany('App\Cliente');
    }
}
