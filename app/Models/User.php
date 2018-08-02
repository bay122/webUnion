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
        'name', 'email', 'password', 'role', 'confirmed', 'valid', 'bo_bloqueado', 'bo_tripulante', 'bo_corporacion'
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
}
