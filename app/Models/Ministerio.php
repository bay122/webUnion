<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_ministerio
 * @property string $gl_nombre
 * @property int $id_ministerio_tipo
 * @property string $gl_descripcion
 */
class Ministerio extends Model
{

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ministerios';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_ministerio';

    /**
     * @var array
     */
    protected $fillable = ['gl_nombre', 'id_ministerio_tipo', 'gl_descripcion'];


     /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grupos_formacion()
    {
        return $this->hasMany(GrupoFormacion::class);
    }

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function departamentos()
    {
        return $this->hasMany(MinisterioDepartamento::class);
    }

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarios()
    {
        return $this->hasMany(UsuarioMinisterio::class);
    }

}
