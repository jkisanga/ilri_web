<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class News
 * @package App\Models
 * @version August 7, 2017, 5:40 am UTC
 */
class News extends Model
{
    use SoftDeletes;

    public $table = 'news';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'summary',
        'image_path',
        'story',
        'published_date',
        'published',
        'published_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'summary' => 'string',
        'image_path' => 'string',
        'story' => 'string',
        'published_date' => 'string',
        'published' => 'string',
        'published_by' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    ];

    
}
