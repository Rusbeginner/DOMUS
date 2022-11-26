<?php

namespace App\Repositories;

use App\Models\Tarjetamagnetica;
use App\Repositories\BaseRepository;

class TarjetamagneticaRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'notarjeta',
        'fechavenc',
        'combustible_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Tarjetamagnetica::class;
    }
}
