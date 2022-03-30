<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $primaryKey = 'idc';
    protected $fillable=['idc', 'nombre'];
}
