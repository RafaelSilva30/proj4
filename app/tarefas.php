<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tarefas extends Model
{
    protected $primaryKey = 'idtarefas';
    protected $fillable = ['idtarefas','data_inicio','data_fim','observacao','entidade','utilizador_idutilizador','utilizador_tipoutilizador','tipo_tarefa_idtipo_tarefa'];
}
