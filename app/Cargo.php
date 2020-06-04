<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable = ['id', 'descricao'];

    public function funcionarios()
    {
        return $this->hasMany('App\Funcionario');
    }

}
