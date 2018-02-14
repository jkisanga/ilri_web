<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AudioCategory
 * @package App\Models
 * @version July 25, 2017, 6:34 am UTC
 */
class AudioCategory extends Model
{
    use SoftDeletes;

    public $table = 'audio_categories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'desc',
        'thumbnail'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'desc' => 'string',
        'thumbnail' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
