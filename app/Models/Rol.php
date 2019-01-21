<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $gl_nombre
 * @property string $gl_json_permisos
 */
class Rol extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['gl_nombre', 'gl_json_permisos'];

}
