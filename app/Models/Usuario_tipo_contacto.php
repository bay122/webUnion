<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_usuario_tipo_contacto
 * @property int $gl_nombre
 */
class Usuario_tipo_contacto extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'usuarios_tipo_contacto';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_usuario_tipo_contacto';

    /**
     * @var array
     */
    protected $fillable = ['gl_nombre'];

}
