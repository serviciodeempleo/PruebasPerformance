<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buscador extends Model
{
    protected $table = 'buscador';

    protected $primaryKey = 'id_buscador';

    public function resultadosBuscador()
    {
        return $this->hasMany(ResultadoBuscador::class, 'id_buscador', 'id_buscador');
    }

    public function perfiles()
    {
        return $this->belongsToMany(Perfil::class, 'resultado_buscador', 'id_buscador', 'id_perfil');
    }

    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'id_tipo_documento');
    }

    public function prestadorUsuario()
    {
        return $this->belongsTo(PrestadorUsuario::class, 'id_prestador_usuario');
    }

}
