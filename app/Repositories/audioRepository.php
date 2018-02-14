<?php

namespace App\Repositories;

use App\Models\audio;
use InfyOm\Generator\Common\BaseRepository;

class audioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'desc',
        'file_path'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return audio::class;
    }
}
