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
class GrupoFormacionTipo extends Model
{
    static $TIPO_ADOLESCENTES = 1;
	static $TIPO_JOVENES = 2;
	static $TIPO_VARONES = 3;
	static $TIPO_DAMAS = 4;
	static $TIPO_AÑOS_DORADOS = 5;
	static $TIPO_MATRIMONIOS = 6;

	public $table = "grupos_formacion_tipos";

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_grupo_formacion_tipo';

    /**
     * @var array
     */
    protected $fillable = [
    	'id_grupo_formacion_tipo',
		'id_ministerio',
		'id_ministerio_departamento',
		'gl_nombre',
		'gl_descripcion',
		'json_datos',
		'bo_activo',
		'created_at',
		'updated_at',
	];

	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

	/**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'json_datos' => 'array',
    ];



    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function ministerio()
	{
		return $this->belongsTo(Ministerio::class, 'id_ministerio', 'id_ministerio');
	}

	/**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function departamento()
	{
		return $this->belongsTo(MinisterioDepartamento::class, 'id_ministerio_departamento', 'id_ministerio_departamento');
	}


	/**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grupos_formacion()
    {
        return $this->hasMany(GrupoFormacion::class, 'id_grupo_formacion_tipo', 'id_grupo_formacion_tipo');
    }

}
