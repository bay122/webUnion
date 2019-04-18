<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;
use App\Events\ModelCreated;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $message
 */
class Contact extends Model
{
	/* TODO: sacar ingoinTrait, pero si se saca, se cae el dashboard
	 * IngoingTrait (Entrante): se encarga de registrar en la tabla ingoing los registros entrantes
	 * Esto lo utiliza para determinar cuales son los nuevos registros y listara en el dashboard (nuevos usuarios, nuevos comentarios, etc.)
	 * En la practica, es bastante inutil, porque podria reemplazarse por un campo en la tabla en cuestión y facilitar mucho mas el desarrollo
	 */
    //use IngoingTrait;
    use Notifiable, IngoingTrait;

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
					'name',
					'email',
					'message',
					'id_ministerio',
					'bo_leido',
					'bo_respondido',
					'json_respuestas',
					'bo_validar',
					'bo_spam',
					'created_at',
					'updated_at',
					'id_usuario_actualiza',
				];

	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'json_otros_datos' => 'array',
    ];

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ministerio()
    {
        return $this->belongsTo(Ministerio::class, 'id_ministerio', 'id_ministerio');
    }

    /**
     * One to Many relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuario_crea()
    {	
    	/*(Class, 'foreign_key', 'local_key');*/
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario_actualiza');
    }

}
