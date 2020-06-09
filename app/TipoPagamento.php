<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPagamento extends Model
{
    protected $fillable = ['id', 'descricao'];

    protected $table = 'tipopagamentos';

    public function recebimentos()
    {
        return $this->hasMany('App\Recebimento');
    }
}
