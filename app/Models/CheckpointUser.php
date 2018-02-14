<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class CheckpointUser
 * @package App\Models
 * @version March 1, 2017, 4:39 pm UTC
 */
class CheckpointUser extends Model
{

    public $table = 'checkpoint_users';
    


    public $fillable = [
        'user_id',
        'checkpoint_id',
        'pin_code',
        'username'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'checkpoint_id' => 'integer',
        'pin_code' => 'integer',
        'status' => 'string',
        'username' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'username' => 'required',
        'pin_code' => 'required',
    ];

    public function user(){return $this->belongsTo('App\Models\Access\User\User','user_id','id');}
    public function checkpointRef(){return $this->belongsTo('App\Models\Checkpoint','checkpoint_id', 'id');}

    
}
