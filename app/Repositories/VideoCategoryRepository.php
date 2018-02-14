<?php

namespace App\Repositories;

use App\Models\VideoCategory;
use InfyOm\Generator\Common\BaseRepository;

class VideoCategoryRepository extends BaseRepository
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
        return VideoCategory::class;
    }
}
