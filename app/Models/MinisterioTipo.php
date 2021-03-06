<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_ministerio_tipo
 * @property string $gl_nombre
 * @property string $gl_descripcion
 */
class MinisterioTipo extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_ministerio_tipo';

    /**
     * @var array
     */
    protected $fillable = ['gl_nombre', 'gl_descripcion'];

}
