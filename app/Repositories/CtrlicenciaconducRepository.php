<?php

namespace App\Repositories;

use App\Models\Ctrlicenciaconduc;
use App\Repositories\BaseRepository;

class CtrlicenciaconducRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'chofer_id',
        'numlicencia',
        'fechaemi',
        'fechavenc',
        'estadopunt'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Ctrlicenciaconduc::class;
    }
}
