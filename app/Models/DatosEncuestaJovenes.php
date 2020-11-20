<?php

namespace App\Models;

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
class DatosEncuestaJovenes extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'datos_encuesta_jovenes';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_datos_encuesta_joven';

    /**
     * @var array
     */
    protected $fillable = [
    	'id_datos_encuesta_joven', 
        'gl_rut',
        'gl_ciudad_verano',
        'gl_participarias',
        'gl_ciudad',
        'gl_dia_actividad',
        'gl_fin_semestre',
        'gl_tematica_clubs',
        'gl_retiro',
        'gl_dia_retiro',
        'gl_seminario',
        'gl_dia_seminario',
    	'gl_actividades'
    ];//, 'size'];

    

}
