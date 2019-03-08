<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Events\ModelCreated;

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
class GrupoFormacionUsuario extends Model
{
    use IngoingTrait;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'grupos_formacion_usuarios';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_grupo_formacion_usuario';

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
    	'id_grupo_formacion_usuario',
        'id_grupo_formacion',
        'id_usuario',
		'fc_ingreso',
		'fc_salida',
		'bo_moderador',
		'json_otros_datos',
		'bo_activo',//Relación con el ministerio activa (1: activo, 0: finalizado)
		'bo_estado',//Registro eliminado (1: activo, 0: eliminado)
		'created_at',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'fc_ingreso',
        'fc_salida',
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
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id_usuario_crea', 'id_usuario_actualiza', 'updated_at'
    ];

    
	/**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grupo_formacion()
    {
        return $this->belongsTo(GrupoFormacion::class, 'id_grupo_formacion', 'id_grupo_formacion');
    }

}
