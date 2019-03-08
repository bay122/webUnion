<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Events\ModelCreated;
#use Illuminate\Support\Facades\Storage;

/**
 * @property int $id_grupo_formacion
 * @property Ministerio $id_ministerio
 * @property MinisterioDepartamento $id_ministerio_departamento
 * @property int $nr_cupo_maximo
 * @property int $nr_cupo_minimo
 * @property string $fc_estimada_inicio
 * @property string $fc_inicio
 * @property strin $fc_estimada_fin
 * @property string $fc_fin
 * @property int $bo_estado
 * @property string $json_datos
 */
class GrupoFormacion extends Model
{
	use IngoingTrait;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'grupos_formacion';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_grupo_formacion';

	/**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => ModelCreated::class,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_grupo_formacion', 
        'id_ministerio', 
        'id_ministerio_departamento', 
        'id_grupo_formacion_tipo',
        'id_grupo_formacion_tipos_sexo',
        'nr_cupo_maximo', 
        'nr_cupo_minimo', 
        'hr_inicio',
		'hr_fin',
		'nr_dia_semana',//día de la semana en el cual se realizara (1: lun, 2: mar, 3: mier, etc)
        'fc_estimada_inicio', 
        'fc_inicio', 
        'fc_estimada_fin', 
        'fc_fin', 
        'bo_activo',//Relación con el ministerio activa (1: activo, 0: finalizado)
        'bo_estado', //Registro eliminado (1: activo, 0: eliminado)
        'json_datos',
        'id_usuario_crea',
        'id_usuario_actualiza',
        'created_at',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'fc_estimada_inicio',
        'fc_inicio',
        'fc_estimada_fin',
        'fc_fin',
        'created_at',
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
	 * Date Casting
	 * Al usar el tipo dateo el datetimemodelo de conversión, puede especificar el formato de la fecha.
	 * Este formato se utilizará cuando el modelo se serialice a una matriz o JSON
	 * @TODO: probar esta función
	 * 
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
    /*
	protected $casts = [
	    'created_at' => 'datetime:Y-m-d',
	];
    */
    	



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
    public function integrantes()
    {
        return $this->hasMany(GrupoFormacionUsuario::class, 'id_grupo_formacion', 'id_grupo_formacion')->where('bo_activo', true)->where('bo_estado', 1);
    }

    /**
     * One to Many relation
     * [Relationship with conditions and ordering]
     * 		Docs: https://laravel-news.com/eloquent-tips-tricks
     * @return [type] [description]
     */
    public function moderadores(){
    	return $this->hasMany(GrupoFormacionUsuario::class, 'id_grupo_formacion', 'id_grupo_formacion')->where('bo_moderador', true)->where('bo_activo', true)->where('bo_estado', 1);//->orderBy('email');
    }

    /**
     * One to Many relation
     * [Relationship with conditions and ordering]
     * 		Docs: https://laravel-news.com/eloquent-tips-tricks
     * @return [type] [description]
     */
    public function asistentes(){
    	return $this->hasMany(GrupoFormacionUsuario::class, 'id_grupo_formacion', 'id_grupo_formacion')->where('bo_moderador', false)->where('bo_activo', true)->where('bo_estado', 1);//->orderBy('email');
    }

    /**
     * One to Many relation
     * [Relationship with conditions and ordering]
     * 		Docs: https://laravel-news.com/eloquent-tips-tricks
     * @return [type] [description]
     */
    public function historial_moderadores(){
    	return $this->hasMany(GrupoFormacionUsuario::class, 'id_grupo_formacion', 'id_grupo_formacion')->where('bo_moderador', true)->where('bo_estado', 1);//->orderBy('email');
    }



    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tipo_grupo_formacion()
    {
        return $this->belongsTo(GrupoFormacionTipo::class, 'id_grupo_formacion_tipo', 'id_grupo_formacion_tipo');
    }

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tipo_sexo()
    {
        return $this->belongsTo(GrupoFormacionTipoSexo::class, 'id_grupo_formacion_tipos_sexo', 'id_grupo_formacion_tipos_sexo');
    }
    

}
