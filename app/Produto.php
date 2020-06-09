<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['id', 'codoriginal', 'codfabrica', 'descricao', 'aplicacao', 'marca',
                        'montadora', 'unidade', 'ncmsh', 'cst', 'cfop', 'custo', 'despesa', 'icms',
                        'ctotal', 'perlucro', 'valorvenda', 'estoque', 'eminimo', 'emaximo', 'ultcompra',
                        'ultvenda'];

    protected $table = 'produtos';


    public $timestamps = false;

    public function marca()
    {
        return $this->belongsTo('App\Marca');
    }

    public function montadora()
    {
        return $this->belongsTo('App\Montadora');
    }
}
