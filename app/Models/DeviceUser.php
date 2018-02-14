<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class DeviceUser
 * @package App\Models
 * @version May 20, 2017, 11:02 am UTC
 */
class DeviceUser extends Model
{

    public $table = 'device_users';
    


    public $fillable = [
        'name',
        'email',
        'phone',
        'IME_NO',
        'device_name',
        'username',
        'password'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Name' => 'string',
        'Email' => 'string',
        'Phone' => 'string',
        'IME_NO' => 'string',
        'Device_Name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    
}
