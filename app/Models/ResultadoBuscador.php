<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResultadoBuscador extends Model
{
    protected $table = 'resultado_buscador';
    protected $primaryKey = 'id_resultado_buscador';

    public function estilo()
    {
      return $this->belongsTo(Estilo::class, 'id_estilo');
    }

    public function perfil()
    {
      return $this->belongsTo(Perfil::class, 'id_perfil');
    }

    public function buscador()
    {
      return $this->belongsTo(Buscador::class, 'id_buscador');
    }

}
