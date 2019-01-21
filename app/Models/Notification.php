<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $type
 * @property int $notifiable
 * @property string $data
 * @property string $read_at
 */
class Notification extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['type', 'notifiable', 'data', 'read_at'];

}
