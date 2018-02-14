<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Video
 * @package App\Models
 * @version July 25, 2017, 6:45 am UTC
 */
class Video extends Model
{
    use SoftDeletes;

    public $table = 'videos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'video_category_id',
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
        'video_category_id' => 'integer',
        'title' => 'string',
        'thumbnail' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'desc string text'
    ];

    
}
