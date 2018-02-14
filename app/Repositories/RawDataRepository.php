<?php

namespace App\Repositories;

use App\Models\RawData;
use InfyOm\Generator\Common\BaseRepository;

class RawDataRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'summary',
        'data_category_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RawData::class;
    }
}
