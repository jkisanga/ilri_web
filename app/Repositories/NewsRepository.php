<?php

namespace App\Repositories;

use App\Models\News;
use InfyOm\Generator\Common\BaseRepository;

class NewsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'summary',
        'image_path',
        'story',
        'published_date',
        'published',
        'published_by'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return News::class;
    }
}
