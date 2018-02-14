<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class audio
 * @package App\Models
 * @version July 15, 2017, 10:20 am UTC
 */
class audio extends Model
{

    public $table = 'audio';
    


    public $fillable = [
        'title','audio_categories_id',
        'desc',
        'file_path'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'desc' => 'string',
        'file_path' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
