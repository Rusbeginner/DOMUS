<?php

namespace App\Repositories;

use App\Models\Lubricante;
use App\Repositories\BaseRepository;

class LubricanteRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nombre',
        'descripcion',
        'tipolubricante_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Lubricante::class;
    }
}
