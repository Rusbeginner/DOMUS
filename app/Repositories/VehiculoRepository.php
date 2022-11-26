<?php

namespace App\Repositories;

use App\Models\Vehiculo;
use App\Repositories\BaseRepository;

class VehiculoRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'tipoequipo_id',
        'modelo',
        'chapa',
        'numotor',
        'numcarroceria',
        'ton',
        'fechafabric',
        'importe',
        'numediobasico',
        'chofer_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Vehiculo::class;
    }
}
