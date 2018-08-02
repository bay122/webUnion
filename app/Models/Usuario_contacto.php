<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_usuario_contacto
 * @property int $id_usuario
 * @property int $id_usuario_tipo_contacto
 * @property boolean $bo_estado
 * @property string $gl_json_dato_contacto
 */
class Usuario_contacto extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'usuarios_contacto';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_usuario_contacto';

    /**
     * @var array
     */
    protected $fillable = ['id_usuario', 'id_usuario_tipo_contacto', 'bo_estado', 'gl_json_dato_contacto'];

}
