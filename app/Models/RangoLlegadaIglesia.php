<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_llegada_iglesia
 * @property int $id_region
 * @property string $gl_nombre_comuna
 * @property float $gl_latitud
 * @property float $gl_logintud
 */
class RangoLlegadaIglesia extends Model
{

	public $table = "rangos_llegada_iglesia";

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_llegada_iglesia';


    /**
     * @var array
     */
    protected $fillable = ['id_llegada_iglesia', 'gl_nombre'];



}
