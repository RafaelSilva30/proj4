<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class entidades extends Model
{
    protected $primaryKey = 'idEntidade';
      protected $fillable = ['idEntidade','nome','contacto','email','validade_contrato','contacto_contabilista','observacoes','concelho','distrito','contabilista','programa'];

    }

