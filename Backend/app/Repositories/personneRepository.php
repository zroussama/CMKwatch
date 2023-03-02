<?php

namespace App\Repositories;

use App\Models\personne;
use App\Repositories\BaseRepository;

class personneRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nom',
        'prenom'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return personne::class;
    }
}
