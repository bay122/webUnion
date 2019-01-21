<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_ministerio_departamento
 * @property int $gl_nombre
 * @property int $bo_activo
 * @property int $id_ministerio_ministerio
 */
class MinisterioDepartamento extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ministerios_departamentos';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_ministerio_departamento';

    /**
     * @var array
     */
    protected $fillable = ['gl_nombre', 'bo_activo', 'id_ministerio_ministerio'];

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ministerio()
    {
        return $this->belongsTo(Ministerio::class);
    }

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grupos_formacion()
    {
        return $this->hasMany(GruposFormacion::class);
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
