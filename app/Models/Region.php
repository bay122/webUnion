<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_region
 * @property string $gl_nombre_region
 * @property string $gl_nombre_corto
 * @property float $gl_latitud
 * @property float $gl_longitud
 */
class Region extends Model
{
    static $REGION_VALPARAISO = 5;

	public $table = "regiones";

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_region';

    /**
     * @var array
     */
    protected $fillable = ['gl_nombre_region', 'gl_nombre_corto', 'gl_latitud', 'gl_longitud'];


    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function comunas()
	{
		return $this->hasMany(Comuna::class, 'id_region', 'id_region');
	}

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function datos_usuarios()
	{
		return $this->hasMany(UsuarioDatos::class, 'id_region', 'id_region');
	}

}
