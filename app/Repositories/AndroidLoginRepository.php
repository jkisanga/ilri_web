<?php

namespace App\Repositories;

use App\Models\Access\User;
use InfyOm\Generator\Common\BaseRepository;

class AndroidLoginRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'email',
        'password'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }
}
