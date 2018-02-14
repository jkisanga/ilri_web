<?php

namespace App\Repositories;

use App\Models\Document;
use InfyOm\Generator\Common\BaseRepository;

class DocumentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'summury',
        'file_path',
        'file_nam'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Document::class;
    }
}
