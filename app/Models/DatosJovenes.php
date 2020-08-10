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
class DatosJovenes extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'datos_jovenes';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_datos_jovenes';

    /**
     * @var array
     */
    protected $fillable = [
    	'id_datos_jovenes', 
        'gl_rut',
        'gl_nombres',
        'gl_apellidos',
        'fc_nacimiento',
        'nr_telefono',
        'gl_email',
        'id_region',
        'id_comuna',
        'gl_ciudad',
        'gl_calle',
        'nr_calle',
    	'gl_sexo',
        'bo_validar',
        'bo_spam',
        'json_otros_datos'
    ];//, 'size'];

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
