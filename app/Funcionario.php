<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Funcionario extends Model
{
    Use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected   $fillable = [
        'foto','nome','telefone','email','data_nascimento','cpf','endereco_id',

    ];

    public function endereco() {
        return $this->belongsTo('App\Endereco');
    }
}
