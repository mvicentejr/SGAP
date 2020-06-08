<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusCliente extends Model
{
    protected $fillable = ['id', 'descricao'];

    protected $table = 'statusclientes';

    public function clientes()
    {
        return $this->hasMany('App\Cliente');
    }
}
