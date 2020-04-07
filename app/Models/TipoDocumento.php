<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'tipo_documento';

    protected $primaryKey = 'id_tipo_documento';

    public function buscadores()
    {
        return $this->hasMany(Buscador::class, 'id_tipo_documento', 'id_tipo_documento');
    }

}
