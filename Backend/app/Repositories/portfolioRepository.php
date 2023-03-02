<?php

namespace App\Repositories;

use App\Models\portfolio;
use App\Repositories\BaseRepository;

class portfolioRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'contrat',
        'date_contrat',
        'kbis',
        'autre_fichier'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return portfolio::class;
    }
}
