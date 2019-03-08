<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $gl_nombre
 * @property string $gl_json_permisos
 */
class Perfil extends Model
{
	/**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'perfiles';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_perfil';

    /**
     * @var array
     */
    protected $fillable = [
    	'gl_nombre', 
    	'gl_descripcion',
    	'id_ministerio',
    	'id_ministerio_departamento',
    	'gl_json_permisos',
    	'bo_activo',
    	'bo_estado',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'json_datos' => 'array',
    ];

    /**
     * One to Many relation
     * [Relationship with conditions and ordering]
     * 		Docs: https://laravel-news.com/eloquent-tips-tricks
     * @return [type] [description]
     */
    public function usuarios(){
    	return $this->hasMany(PerfilUsuario::class, 'id_perfil', 'id_perfil')->where('bo_activo', true)->where('bo_estado', 1);//->orderBy('email');
    }

    /**
     * One to Many relation
     * [Relationship with conditions and ordering]
     * 		Docs: https://laravel-news.com/eloquent-tips-tricks
     * @return [type] [description]
     */
    public function ministerios(){
    	return $this->hasMany(Ministerio::class, 'id_ministerio', 'id_ministerio')->where('bo_activo', true)->where('bo_estado', 1);//->orderBy('email');
    }

    /**
     * One to Many relation
     * [Relationship with conditions and ordering]
     * 		Docs: https://laravel-news.com/eloquent-tips-tricks
     * @return [type] [description]
     */
    public function departamentos(){
    	return $this->hasMany(Departamento::class, 'id_ministerio_departamento', 'id_ministerio_departamento')->where('bo_activo', true)->where('bo_estado', 1);//->orderBy('email');
    }

}
