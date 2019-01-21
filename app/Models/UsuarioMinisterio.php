<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_usuario_ministerio
 * @property boolean $bo_participante
 * @property boolean $bo_equipo_trabajo
 * @property boolean $bo_directiva
 * @property boolean $bo_activo
 * @property string $fc_inicio
 * @property string $fc_fin
 * @property int $id_ministerio_departamento
 * @property int $id_ministerio
 * @property int $id_usuario_users
 */
class UsuarioMinisterio extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'usuarios_ministerios';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_usuario_ministerio';

    /**
     * @var array
     */
    protected $fillable = ['bo_participante', 'bo_equipo_trabajo', 'bo_directiva', 'bo_activo', 'fc_inicio', 'fc_fin', 'id_usuario'];


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
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

}
