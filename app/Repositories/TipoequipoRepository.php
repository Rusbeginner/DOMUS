<?php

namespace App\Repositories;

use App\Models\Tipoequipo;
use App\Repositories\BaseRepository;

class TipoequipoRepository extends BaseRepository
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
        return Tipoequipo::class;
    }
}
