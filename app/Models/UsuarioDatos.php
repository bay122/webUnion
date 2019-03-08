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
class UsuarioDatos extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'usuarios_datos';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_usuarios_datos';

    /**
     * @var array
     */
    protected $fillable = [
    	'id_usuario', 
    	'gl_rut', 
    	'gl_nombres', 
    	'gl_apellido_paterno', 
    	'gl_apellido_materno', 
    	'id_region', 
    	'id_comuna', 
    	'fc_llegada_iglesia', 
    	'fc_nacimiento', 
    	'id_pais_origen', 
    	'id_nacionalidad', 
    	'gl_sexo'
    ];//, 'size'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'fc_llegada_iglesia',
        'fc_nacimiento',
        'created_at'
    ];


    /**
     * Get the user that owns the phone.
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }

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

    /**
     * Get the user that owns the phone.
     */
    public function pais_origen()
    {
        return $this->belongsTo(Pais::class, 'id_pais', 'id_pais');
    }

    /**
     * Get the user that owns the phone.
     */
    public function nacionalidad()
    {
        return $this->belongsTo(Pais::class, 'id_pais', 'id_pais');
    }

}
