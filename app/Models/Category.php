<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Category
 * @package App\Models
 * @version June 6, 2017, 10:08 pm UTC
 */
class Category extends Model
{

    public $table = 'categories';
    


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
