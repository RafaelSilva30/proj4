<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class programa extends Model
{
protected $primaryKey = 'idprograma';
  protected $fillable = ['idprograma','nome','data_validade'];
}
