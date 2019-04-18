<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword as ResetPasswordNotification;
use App\Events\ModelCreated;
use Illuminate\Support\Facades\Storage;

/**
 * @property int $id_usuario
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $role
 * @property string $size
 * @property boolean $valid
 * @property int $bo_bloqueado
 * @property int $bo_tripulante
 * @property boolean $bo_corporacion
 * @property Comment[] $comments
 * @property Post[] $posts
 */
class User extends Authenticatable
{
	use Notifiable, IngoingTrait;

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_usuario';

	/**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => ModelCreated::class,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id_usuario', 
       'name', 
       'email', 
       //'password', 
       'role', 
       'confirmed', 
       'valid', 
       'bo_bloqueado', 
       'bo_tripulante', 
       'bo_corporacion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function datos()
    {
        return $this->hasOne(UsuarioDatos::class, 'id_usuario', 'id_usuario');
    }

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function datos_contacto()
    {
        return $this->hasMany(UsuarioContacto::class, 'id_usuario', 'id_usuario');
    }
    

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grupos_formacion_usuario()
    {
        return $this->hasMany(GrupoFormacionUsuario::class, 'id_usuario', 'id_usuario');
    }

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mensajes()
    {
        return $this->hasMany(Contact::class, 'id_usuario', 'id_usuario_actualiza');
    }

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function discipulados()
    {
        return $this->hasMany(GrupoFormacionUsuario::class, 'id_usuario', 'id_usuario')
        ->where('bo_moderador', true)->where('bo_activo', 1)->where('bo_estado', 1);
    }

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ministerios()
    {
        return $this->hasMany(UsuarioMinisterio::class);
    }

	/**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function posts()
	{
		return $this->hasMany(Post::class);
	}

	/**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Get user files directory
     *
     * @return string|null
     */
    public function getFilesDirectory()
    {
        if ($this->role === 'redac' || $this->role === 'tripulante') {
            $folderPath = 'user' . $this->id;
            if (!in_array($folderPath , Storage::disk('files')->directories())) {
                Storage::disk('files')->makeDirectory($folderPath);
            }
            return $folderPath;
        }
        return null;
    }

   /**
     * One to Many relation
     * [Relationship with conditions and ordering]
     * 		Docs: https://laravel-news.com/eloquent-tips-tricks
     * 		Docs: https://stackoverflow.com/a/25475780
     * @return [type] [description]
     */
    public function perfiles($id_ministerio = null){
    	if(!empty($id_ministerio)){
    		return $this->hasMany(PerfilUsuario::class, 'id_usuario', 'id_usuario')
    					->leftJoin('perfiles', 'perfiles.id_perfil', '=', 'perfiles_usuario.id_perfil')
    					->where('perfiles.id_ministerio', $id_ministerio)
    					->where('perfiles_usuario.bo_activo', true)->where('perfiles_usuario.bo_estado', 1);
    	}else{
    		return $this->hasMany(PerfilUsuario::class, 'id_usuario', 'id_usuario')->where('bo_activo', true)->where('bo_estado', 1);//->orderBy('email');
    	}
    }
}
