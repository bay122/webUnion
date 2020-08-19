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
class DatosMiembros extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'datos_miembros';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_datos_miembro';

    /**
     * @var array
     */
    protected $fillable = [
        'id_datos_miembro',
        'gl_rut',
        'id_datos_jovenes',
        'gl_nombres',
        'gl_apellidos',
        'nr_telefono',
        'gl_email',
        'gl_ciudad',
        'gl_barrio',
        'gl_direccion',
        'gl_latitud',
        'gl_longitud',
        'gl_calle',
        'nr_calle',
        'json_otros_datos',
        'id_llegada_iglesia',
        'gl_llegada_iglesia',
        'id_region',
        'gl_nombre_region',
        'id_comuna',
        'gl_nombre_comuna',
        'fc_nacimiento',
        'gl_sexo',
        'id_tipo_participacion',
        'gl_tipo_participacion',
        'bo_participa_ministerio',
        'gl_ministerio',
        'bo_vive_con_ninos',
        'nr_vive_con_ninos',
        'bo_vive_con_adolescentes',
        'nr_vive_con_adolescentes',
        'bo_validar',
        'bo_spam',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'fc_nacimiento',
        'created_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'json_otros_datos' => 'array',
    ];

    /**
     * Get the user that owns the phone.
     */
    public function region()
    {
        return $this->belongsTo(Region::class, 'id_region', 'id_region');
    }

    /**
     * Get the user that owns the phone.
     */
    public function comuna()
    {
        return $this->belongsTo(Comuna::class, 'id_comuna', 'id_comuna');
    }

}
