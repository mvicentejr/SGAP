<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = ['id', 'datacadastro', 'cargo', 'nome', 'apelido', 'cpf', 'rg',
                            'oemissor', 'datanasc', 'genero', 'estcivil', 'conjuge', 'cep', 'numero',
                            'complemento', 'fone1', 'fone2', 'email', 'observacao'];


    public $timestamps = false;

    public function cargo()
    {
        return $this->belongsTo('App\Cargo');
    }

    public function cep()
    {
        return $this->belongsTo('App\Cep');
    }
}
