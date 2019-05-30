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


    static $MINISTERIO_DISCIPULADO_FUNDAMENTAL = 1;
	static $MINISTERIO_COMUNIDAD_DE_VIDA = 2;
	static $MINISTERIO_ICM = 3;
	static $MINISTERIO_NIÑOS_Y_ADOLESCENTES = 4;
	static $MINISTERIO_JOVENES_INTERMEDIOS = 5;
	static $MINISTERIO_JOVENES_ADULTOS = 6;
	static $MINISTERIO_MATRIMONIOS = 7;
	static $MINISTERIO_DAMAS = 8;
	static $MINISTERIO_VARONES = 9;
	static $MINISTERIO_AÑOS_DORADOS = 10;
	static $MINISTERIO_MISERICORDIA = 11;
	static $MINISTERIO_MISIONES = 12;
	static $MINISTERIO_MUSICA = 13;
	static $MINISTERIO_ORACION = 14;
	static $MINISTERIO_MEDIOS = 15;


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

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tipos_grupos_formacion()
    {
        return $this->hasMany(GrupoFormacionTipo::class);
    }

    /**
     * One to Many relation
     * 	Mensajes de contacto realziados a través de la página
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mensajes()
    {
        return $this->hasMany(Contact::class);
    }

    /**
     * One to Many relation
     * [Relationship with conditions and ordering]
     * 		Docs: https://laravel-news.com/eloquent-tips-tricks
     * @return [type] [description]
     */
    public function perfiles(){
    	return $this->hasMany(Perfil::class, 'id_ministerio', 'id_ministerio')->where('bo_activo', true)->where('bo_estado', 1);//->orderBy('email');
    }

}
