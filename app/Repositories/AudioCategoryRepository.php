<?php

namespace App\Repositories;

use App\Models\AudioCategory;
use InfyOm\Generator\Common\BaseRepository;

class AudioCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'desc',
        'thumbnail'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AudioCategory::class;
    }
}
