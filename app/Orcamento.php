<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orcamento extends Model
{
    Use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected   $fillable = [
        'data_inicio','data_fim','observacao', 'cliente_id',

    ];

    public function cliente() {
        return $this->belongsTo('App\Cliente');
    }
}
