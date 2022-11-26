<?php

namespace App\Repositories;

use App\Models\Ctrlcombustible;
use App\Repositories\BaseRepository;

class CtrlcombustibleRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'vehiculo_id',
        'combustible_id',
        'plan',
        'real',
        'fechaini',
        'fechafin'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Ctrlcombustible::class;
    }
}
