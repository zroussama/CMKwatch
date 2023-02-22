<?php

namespace App\Repositories;

use App\Models\costumer;
use App\Repositories\BaseRepository;

class costumerRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'email',
        'phone'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return costumer::class;
    }
}
