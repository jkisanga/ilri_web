<?php

namespace App\Repositories;

use App\Models\DeviceUser;
use InfyOm\Generator\Common\BaseRepository;

class DeviceUserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Name',
        'Email',
        'Phone',
        'IME_NO',
        'Device_Name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DeviceUser::class;
    }
}
