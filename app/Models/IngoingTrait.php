<?php

namespace App\Models;

use App\Models\Ingoing;

/**
 * Un "Rasgo" (trait) es similar a una clase abstracta, ya que no se puede crear una instancia de sí mismo, 
 * pero contiene métodos que se pueden usar en una clase concreta. Los rasgos se introdujeron en PHP 
 * en la versión 5.4 y se usan ampliamente en el marco de trabajo de Laravel. 
 * Son ideales para reducir el efecto limitante de la herencia única, lo que permite 
 * la exposición de los métodos como si estuvieran definidos en la clase de llamada. 
 *
 * 
 * Docs: https://www.conetix.com.au/blog/simple-guide-using-traits-laravel-5
 *
 * IngoingTrait (Entrante): se encarga de registrar en la tabla ingoing los registros entrantes
 * Esto lo utiliza para determinar cuales son los nuevos registros y listara en el dashboard (nuevos usuarios, nuevos comentarios, etc.)
 * En la practica, es bastante inutil, porque podria reemplazarse por un campo en la tabla en cuestión y facilitar mucho mas el desarrollo
 */
trait IngoingTrait
{
    /**
     * Morph One relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
	public function ingoing()
	{
		return $this->morphOne(Ingoing::class, 'ingoing');
	}
}
