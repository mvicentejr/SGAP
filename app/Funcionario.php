<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = ['id', 'datacadastro', 'cargo', 'nome', 'apelido', 'cpf', 'rg','oemissor',
                        'datanasc', 'genero', 'estcivil', 'conjuge', 'cep', 'rua', 'numero', 'bairro',
                        'complemento', 'cidade', 'uf', 'fone1', 'fone2', 'email', 'observacao'];

    protected $table = 'funcionarios';

    public $timestamps = false;

    public function cargo()
    {
        return $this->belongsTo('App\Cargo');
    }

}
