<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfil';
    protected $primaryKey = 'id_perfil';

    public function resultadosBuscador()
    {
        return $this->hasMany(ResultadoBuscador::class, 'id_perfil', 'id_perfil');
    }

    public function buscadores()
    {
        return $this->belongsToMany(Buscador::class, 'resultado_buscador', 'id_perfil', 'id_buscador');
    }

}
