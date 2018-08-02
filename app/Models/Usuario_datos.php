<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_usuarios_datos
 * @property int $id_usuario
 * @property string $gl_rut
 * @property string $gl_nombres
 * @property string $gl_apellido_paterno
 * @property string $gl_apellido_materno
 * @property int $id_region
 * @property int $id_comuna
 * @property string $fc_llegada_iglesia
 * @property string $fc_nacimiento
 * @property int $id_pais_origen
 * @property int $id_nacionalidad
 * @property string $gl_sexo
 * @property string $size
 */
class Usuario_datos extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_usuarios_datos';

    /**
     * @var array
     */
    protected $fillable = ['id_usuario', 'gl_rut', 'gl_nombres', 'gl_apellido_paterno', 'gl_apellido_materno', 'id_region', 'id_comuna', 'fc_llegada_iglesia', 'fc_nacimiento', 'id_pais_origen', 'id_nacionalidad', 'gl_sexo', 'size'];

}
