<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Document
 * @package App\Models
 * @version May 20, 2017, 11:12 am UTC
 */
class Document extends Model
{

    public $table = 'documents';
    


    public $fillable = [
        'title',
        'category_id',
        'email',
        'summary',
        'file_path',
        'file_nam'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'summary' => 'string',
        'file_path' => 'string',
        'file_nam' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
    ];

    
}
