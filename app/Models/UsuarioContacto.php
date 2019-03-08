<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_usuario_contacto
 * @property int $id_usuario
 * @property int $id_usuario_tipo_contacto
 * @property boolean $bo_estado
 * @property string $gl_json_dato_contacto
 */
class UsuarioContacto extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'usuarios_contacto';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_usuario_contacto';

    /**
     * @var array
     */
    protected $fillable = ['id_usuario', 'id_usuario_tipo_contacto', 'bo_activo', 'gl_json_dato_contacto'];

	static $TIPO_CONTACTO_TELEFONO_FIJO = 1;
	static $TIPO_CONTACTO_TELEFONO_MOVIL = 2;
	static $TIPO_CONTACTO_DIRECCION = 3;
	static $TIPO_CONTACTO_EMAIL = 4;
	static $TIPO_CONTACTO_CASILLA_POSTAL = 5;

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tipo_contacto()
    {
        return $this->belongsTo(UsuarioTipoContacto::class, 'id_usuario_tipo_contacto', 'id_usuario_tipo_contacto');
    }

}
