<?php

namespace App\Repositories;

use App\Models\DataCategory;
use InfyOm\Generator\Common\BaseRepository;

class DataCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'desc'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DataCategory::class;
    }
}
