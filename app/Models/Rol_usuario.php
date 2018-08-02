<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_rol
 * @property int $id_usuario_usuario
 */
class Roles_usuario extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'roles_usuario';

    /**
     * @var array
     */
    protected $fillable = ['id_rol', 'id_usuario_usuario'];

}
