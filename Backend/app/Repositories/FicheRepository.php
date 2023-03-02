<?php

namespace App\Repositories;

use App\Models\Fiche;
use App\Repositories\BaseRepository;

class FicheRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'entreprise',
        'domaine_activite',
        'gerant_nom',
        'gerant_prenom',
        'gerant_tel',
        'gerant_email',
        'autre_nom',
        'autre_prenom',
        'autre_tel',
        'autre_email',
        'autre_fonction',
        'Pays_Origine',
        'Ville_Origine',
        'Prod_pays',
        'prod_ville',
        'Prod_adress',
        'Origin_adress',
        'logo'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Fiche::class;
    }
}
