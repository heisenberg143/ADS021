<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoItem extends Model
{
    Use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'tipos_itens';

    protected   $fillable = [
        'foto','codigo','produto','quantidade'

    ];

    public function orcamentos_itens() {
        return $this->hasMany('App\OrcamentoItem');
    }
}
