<?php

namespace App\Repositories;

use App\Models\Profile;
use InfyOm\Generator\Common\BaseRepository;

class ProfileRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'title',
        'email',
        'phone',
        'bio',
        'image_path'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Profile::class;
    }
}
