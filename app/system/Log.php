<?php

namespace App\system;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    //
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sys_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject', 'action', 'object', 'created_at', 'updated_at'
    ];
}
