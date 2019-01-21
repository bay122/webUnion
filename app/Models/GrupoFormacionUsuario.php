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
        'id_grupo_formacion',
        'fc_ingreso',
        'bo_moredador',
        'json_otros_datos',
    ];

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grupo_formacion()
    {
        return $this->belongsTo(GrupoFormacion::class);
    }
}
