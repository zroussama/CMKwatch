<?php

namespace App\Repositories;

use App\Models\CMK;
use App\Repositories\BaseRepository;

class CMKRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'CMK_ID',
        'Facturation'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return CMK::class;
    }
}
