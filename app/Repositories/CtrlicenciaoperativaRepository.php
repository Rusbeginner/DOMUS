<?php

namespace App\Repositories;

use App\Models\Ctrlicenciaoperativa;
use App\Repositories\BaseRepository;

class CtrlicenciaoperativaRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'vehiculo_id',
        'nocomprobante',
        'fechaemision',
        'fechavenc'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Ctrlicenciaoperativa::class;
    }
}
