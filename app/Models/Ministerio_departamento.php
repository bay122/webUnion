<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_ministerio_departamento
 * @property int $gl_nombre
 * @property int $bo_activo
 * @property int $id_ministerio_ministerio
 */
class Ministerio_departamento extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ministerios_departamentos';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_ministerio_departamento';

    /**
     * @var array
     */
    protected $fillable = ['gl_nombre', 'bo_activo', 'id_ministerio_ministerio'];

}
