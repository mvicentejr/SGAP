<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = ['id', 'descricao'];

    protected $table = 'marcas';

    public function produtos()
    {
        return $this->hasMany('App\Produto');
    }
}
