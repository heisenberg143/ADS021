<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrcamentoItem extends Model
{
    Use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'orcamentos_itens';
    //
    protected   $fillable = [
        'tamanho','cor','detalhe','valor','cliente_id','tipos_itens_id',

    ];
    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
    public function tipo_itens()
    {
        return $this->belongsTo('App\TipoItem');
    }
}
