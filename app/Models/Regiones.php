<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_region
 * @property string $gl_nombre_region
 * @property string $gl_nombre_corto
 * @property float $gl_latitud
 * @property float $gl_longitud
 */
class Regiones extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_region';

    /**
     * @var array
     */
    protected $fillable = ['gl_nombre_region', 'gl_nombre_corto', 'gl_latitud', 'gl_longitud'];

}
