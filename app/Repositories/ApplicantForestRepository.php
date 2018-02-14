<?php

namespace App\Repositories;

use App\Models\ApplicantForest;
use InfyOm\Generator\Common\BaseRepository;

class ApplicantForestRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'applicant_id',
        'forest_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ApplicantForest::class;
    }
}
