<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_comuna
 * @property int $id_region
 * @property string $gl_nombre_comuna
 * @property float $gl_latitud
 * @property float $gl_logintud
 */
class Comunas extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_comuna';

    /**
     * @var array
     */
    protected $fillable = ['id_region', 'gl_nombre_comuna', 'gl_latitud', 'gl_logintud'];

}
