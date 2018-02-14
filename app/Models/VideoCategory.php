<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class VideoCategory
 * @package App\Models
 * @version July 25, 2017, 6:28 am UTC
 */
class VideoCategory extends Model
{
    use SoftDeletes;

    public $table = 'video_categories';
    

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
