<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    Use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected   $fillable = [
        'foto','nome','telefone','email','data_nascimento','endereco_id',

    ];

    public function endereco() {
        return $this->belongsTo('App\Endereco');
    }

    public function orcamentos() {
        return $this->hasMany('App\Orcamento');
    }

    public function orcamentos_itens() {
        return $this->hasMany('App\OrcamentoItem');
    }

}