<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['id', 'tipo', 'datacadastro', 'status', 'nome', 'apelido', 'cnpj', 'cpf', 'ie',
                        'rg', 'oemissor', 'datanasc', 'genero', 'estcivil', 'conjuge', 'cep', 'rua',
                        'numero', 'bairro', 'complemento', 'cidade', 'uf', 'fone1', 'fone2', 'email',
                        'observacao'];

    protected $table = 'clientes';


    public $timestamps = false;

    public function tipo()
    {
        return $this->belongsTo('App\TipoCliente');
    }

    public function status()
    {
        return $this->belongsTo('App\StatusCliente');
    }

}
