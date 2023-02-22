<?php

namespace App\Repositories;

use App\Models\Connection;
use App\Repositories\BaseRepository;

class ConnectionRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Connection::class;
    }
}
