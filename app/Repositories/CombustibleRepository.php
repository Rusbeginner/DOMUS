<?php

namespace App\Repositories;

use App\Models\Combustible;
use App\Repositories\BaseRepository;

class CombustibleRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nombre',
        'descripcion'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Combustible::class;
    }
}
