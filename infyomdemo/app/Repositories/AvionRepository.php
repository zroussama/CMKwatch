<?php

namespace App\Repositories;

use App\Models\Avion;
use App\Repositories\BaseRepository;

class AvionRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nom',
        'taille',
        'places',
        'ficheClient'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Avion::class;
    }
}
