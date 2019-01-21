<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_usuario_tipo_contacto
 * @property int $gl_nombre
 */
class UsuarioTipoContacto extends Model
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
