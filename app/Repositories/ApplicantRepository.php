<?php

namespace App\Repositories;

use App\Models\Applicant;
use InfyOm\Generator\Common\BaseRepository;

class ApplicantRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'full_name',
        'address',
        'district_id',
        'phone_number',
        'email',
        'date_of_birth',
        'registration_number',
        'nationality',
        'passport_number',
        'place_of_issue',
        'passport_expire_date',
        'has_license',
        'has_machine',
        'installation_location',
        'machine_name',
        'capacity_per_year',
        'has_chainsaw_professional',
        'has_trained_operator',
        'college_name',
        'certificate_atachment',
        'has_technician',
        'tax_clearance',
        'certified_financial_statement',
        'factory_type_id',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Applicant::class;
    }
}
