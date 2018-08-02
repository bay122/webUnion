<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_ministerio
 * @property string $gl_nombre
 * @property int $id_ministerio_tipo
 * @property string $gl_descripcion
 */
class ministerio extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_ministerio';

    /**
     * @var array
     */
    protected $fillable = ['gl_nombre', 'id_ministerio_tipo', 'gl_descripcion'];

}
