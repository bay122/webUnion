<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_pais
 * @property int $gl_nombre
 */
class Pais extends Model
{
    static $PAIS_CHILE = 152;
	public $table = "paises";

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_pais';


    /**
     * @var array
     */
    protected $fillable = ['id_pais', 'gl_nombre', 'gl_nombre_nacionalidad'];



    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function datos_usuarios()
	{
		return $this->hasMany(UsuarioDatos::class, 'id_pais', 'id_pais');
	}

}
