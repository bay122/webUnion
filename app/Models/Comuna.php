<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_comuna
 * @property int $id_region
 * @property string $gl_nombre_comuna
 * @property float $gl_latitud
 * @property float $gl_logintud
 */
class Comuna extends Model
{
    static $COMUNA_VALPARAISO = 35;
    static $COMUNA_VIÑA_DEL_MAR = 37;
    static $COMUNA_QUILPUE = 27;

	public $table = "comunas";

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

	/**
     * Get the user that owns the phone.
     */
    public function region()
    {
        return $this->belongsTo(Region::class, 'id_region', 'id_region');
    }

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function datos_usuarios()
	{
		return $this->hasMany(UsuarioDatos::class, 'id_comuna', 'id_comuna');
	}

}
