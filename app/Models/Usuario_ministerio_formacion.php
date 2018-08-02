<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_usuario_ministerio_formacion
 * @property boolean $bo_participante
 * @property boolean $bo_activo
 * @property string $fc_inicio
 * @property string $fc_fin
 * @property boolean $bo_finalizado
 * @property int $id_ministerio
 * @property int $id_usuario
 */
class Usuario_ministerio_formacion extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Usuario_ministerio_formacion';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_usuario_ministerio_formacion';

    /**
     * @var array
     */
    protected $fillable = ['bo_participante', 'bo_activo', 'fc_inicio', 'fc_fin', 'bo_finalizado', 'id_ministerio', 'id_usuario'];

}
