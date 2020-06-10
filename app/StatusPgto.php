<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusPgto extends Model
{
    protected $fillable = ['id', 'descricao'];

    protected $table = 'statuspgtos';

    public function recebimentos()
    {
        return $this->hasMany('App\Recebimento');
    }

    public function pagamentos()
    {
        return $this->hasMany('App\Pagamento');
    }
}
