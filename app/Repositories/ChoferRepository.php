<?php

namespace App\Repositories;

use App\Models\Chofer;
use App\Repositories\BaseRepository;

class ChoferRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nombre',
        'apellidos',
        'dirparticular',
        'ci'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Chofer::class;
    }
}
