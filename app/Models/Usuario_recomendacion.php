<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_usuario_recomendaciones
 * @property int $id_usuario
 * @property int $id_usuario_recomendado
 * @property string $gl_json_datos_contacto
 * @property string $fc_recomendacion
 * @property string $fc_entrada_vigencia
 * @property int $id_ministerio
 * @property int $id_departamento
 * @property string $gl_comentario
 */
class Usuario_recomendacion extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_usuario_recomendaciones';

    /**
     * @var array
     */
    protected $fillable = ['id_usuario', 'id_usuario_recomendado', 'gl_json_datos_contacto', 'fc_recomendacion', 'fc_entrada_vigencia', 'id_ministerio', 'id_departamento', 'gl_comentario'];

}
