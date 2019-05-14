<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contabilista extends Model
{
    protected $primaryKey = 'idcontabilista';
    protected $fillable = ['idcontabilista','nome','contacto','email'];
}
