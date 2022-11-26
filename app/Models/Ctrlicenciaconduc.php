<?php

namespace App\Models;

use App\Models\Chofer;
use Illuminate\Database\Eloquent\Model;

class Ctrlicenciaconduc extends Model
{
    public $table = 'ctrlicenciaconducs';

    public $fillable = [
        'chofer_id',
        'numlicencia',
        'fechaemi',
        'fechavenc',
        'estadopunt'
    ];

    protected $casts = [
        'chofer_id' => 'integer',
        'numlicencia' => 'string',
        'fechaemi' => 'date:d-m-Y',
        'fechavenc' => 'date:d-m-Y',
        'estadopunt' => 'string'
    ];

    public static $rules = [
        'chofer_id' => 'required',
        'numlicencia' => 'required',
        'fechaemi' => 'required',
        'fechavenc' => 'required'
    ];

    /**
     * Get the chofer that owns the Ctrlicenciaconduc
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function chofer()
    {
        return $this->belongsTo(Chofer::class, 'chofer_id');
    }
    
}
