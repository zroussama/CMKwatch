<?php

namespace App\Repositories;

use App\Models\Voiture;
use App\Repositories\BaseRepository;

class VoitureRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'address',
        'phone',
        'email',
        'password',
        'created_by'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Voiture::class;
    }
}
