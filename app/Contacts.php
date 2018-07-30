<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $message
 */
class Contacts extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'message'];

}
