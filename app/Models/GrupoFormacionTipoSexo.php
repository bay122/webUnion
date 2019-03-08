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
class GrupoFormacionTipoSexo extends Model
{
    static $TIPO_MASCULINO = 1;
	static $TIPO_FEMENINO = 2;
	static $TIPO_MIXTO = 3;

	public $table = "grupos_formacion_tipos_sexo";

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_grupo_formacion_tipos_sexo';


    /**
     * @var array
     */
    protected $fillable = [
    	'id_grupo_formacion_tipos_sexo',
		'gl_nombre',
		'created_at',
		'updated_at',
	];

	/**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grupos_formacion()
    {
        return $this->hasMany(GrupoFormacion::class, 'id_grupo_formacion_tipos_sexo', 'id_grupo_formacion_tipos_sexo');
    }

}
