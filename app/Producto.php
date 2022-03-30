<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table='productos';
    protected $primaryKey = 'id';
    protected $fillable=['id', 'nombre',
    'precio',
    'foto',
    'descripcion',
    'categoria_id',];
}
