<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_pais
 * @property int $gl_nombre
 */
class Paises extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_pais';

    /**
     * @var array
     */
    protected $fillable = ['gl_nombre'];

}
