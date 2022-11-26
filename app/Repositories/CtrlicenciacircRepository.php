<?php

namespace App\Repositories;

use App\Models\Ctrlicenciacirc;
use App\Repositories\BaseRepository;

class CtrlicenciacircRepository extends BaseRepository
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
        return Ctrlicenciacirc::class;
    }
}
