<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class DataCategory
 * @package App\Models
 * @version June 15, 2017, 6:19 am UTC
 */
class DataCategory extends Model
{

    public $table = 'data_categories';
    


    public $fillable = [
        'name',
        'desc'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'desc' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
