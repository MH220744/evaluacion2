<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    protected $table = 'cupons';

    protected $fillable = [
        'codigo', 'descripcion', 'fecha_e', 'canjeado'
    ];

    protected $casts = [
        'fecha_e' => 'datetime',
        'canjeado' => 'boolean',
    ];
}
