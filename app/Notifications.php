<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $type
 * @property int $notifiable
 * @property string $data
 * @property string $read_at
 */
class Notifications extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['type', 'notifiable', 'data', 'read_at'];

}
