<?php

namespace App\Repositories;

use App\Models\Tipolubricante;
use App\Repositories\BaseRepository;

class TipolubricanteRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'tipo',
        'descripcion'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Tipolubricante::class;
    }
}
