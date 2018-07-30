<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_usuario_auditoria
 * @property int $id_usuario
 * @property string $ultimo_login
 * @property string $id_publica
 * @property string $gl_tipo_medio
 */
class Usuarios_auditoria extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'usuarios_auditoria';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_usuario_auditoria';

    /**
     * @var array
     */
    protected $fillable = ['id_usuario', 'ultimo_login', 'id_publica', 'gl_tipo_medio'];

}
