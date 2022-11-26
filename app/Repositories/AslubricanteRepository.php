<?php

namespace App\Repositories;

use App\Models\Aslubricante;
use App\Repositories\BaseRepository;

class AslubricanteRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'vehiculo_id',
        'lubricante_id',
        'asignacion',
        'fechaini',
        'fechafin'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Aslubricante::class;
    }
}
