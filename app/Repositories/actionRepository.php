<?php

namespace App\Repositories;

use App\Models\action;
use InfyOm\Generator\Common\BaseRepository;

class actionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return action::class;
    }
}
