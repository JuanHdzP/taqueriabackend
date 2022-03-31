<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    //
    protected $table='ventas';
    protected $primaryKey = 'id';
    protected $fillable=['id', 'fecha',
    'total',
    'cliente_id',
    'empleado_id',];

    
}
