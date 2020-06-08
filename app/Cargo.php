<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable = ['id', 'descricao'];

    protected $table = 'cargos';

    public function funcionarios()
    {
        return $this->hasMany('App\Funcionario');
    }

}
