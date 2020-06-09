<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Montadora extends Model
{
    protected $fillable = ['id', 'descricao'];

    protected $table = 'montadoras';

    public function produtos()
    {
        return $this->hasMany('App\Produto');
    }
}
