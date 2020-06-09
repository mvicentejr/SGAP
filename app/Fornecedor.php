<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $fillable = ['id', 'tipo', 'datacadastro', 'nome', 'apelido', 'cnpj', 'ie', 'cep', 'rua',
                        'numero', 'bairro', 'complemento', 'cidade', 'uf', 'fone1', 'fone2', 'email',
                        'observacao'];

    protected $table = 'fornecedores';


    public $timestamps = false;


}
