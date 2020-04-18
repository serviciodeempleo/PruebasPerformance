<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estilo extends Model
{
    protected $table = 'estilo';

    protected $primaryKey = 'id_estilo';

    public function resultadosBuscador()
    {
        return $this->hasMany(ResultadoBuscador::class, 'id_estilo', 'id_estilo');
    }

    public function buscadores()
    {
        return $this->belongsToMany(Buscador::class, 'resultado_buscador', 'id_estilo', 'id_buscador');
    }
}
