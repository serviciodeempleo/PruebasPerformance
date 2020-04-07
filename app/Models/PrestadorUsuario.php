<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrestadorUsuario extends Model
{
    protected $table = 'prestador_usuario';

    protected $primaryKey = 'id_prestador_usuario';

    public function buscadores()
    {
        return $this->hasMany(Buscador::class, 'id_prestador_usuario', 'id_prestador_usuario');
    }

}
