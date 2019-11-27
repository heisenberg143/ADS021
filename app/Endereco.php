<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model
{
    Use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected   $fillable = [
        'cep','logradouro','complemento','numero','bairro','uf','municipio',

    ];

    public function funcionarios() {
        return $this->hasMany('App\Funcionario');
    }
    public function clientes() {
        return $this->hasMany('App\Cliente');
    }
}
