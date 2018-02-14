<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class RawData
 * @package App\Models
 * @version June 15, 2017, 6:30 am UTC
 */
class RawData extends Model
{

    public $table = 'raw_datas';
    


    public $fillable = [
        'title',
        'summary',
        'file_path',
        'data_category_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'summary' => 'string',
        'data_category_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
