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
        'id_grupo_formacion', 'id_ministerio', 'id_ministerio_departamento', 'nr_cupo_maximo', 'nr_cupo_minimo', 'fc_estimada_inicio', 'fc_inicio', 'fc_estimada_fin', 'fc_fin', 'bo_estado', 'json_datos'
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
    public function grupos_formacion_usuario()
    {
        return $this->hasMany(GrupoFormacionUsuario::class);
    }
}
