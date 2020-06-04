<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cep extends Model
{
    protected $fillable = ['id', 'codigo', 'rua', 'bairro', 'cidade', 'uf'];

    public function funcionarios()
    {
        return $this->hasMany('App\Funcionario');
    }
}
