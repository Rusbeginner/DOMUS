<?php

namespace App\Models;

use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Model;

class Ctrlicenciaoperativa extends Model
{
    public $table = 'ctrlicenciaoperativas';

    public $fillable = [
        'vehiculo_id',
        'nocomprobante',
        'fechaemision',
        'fechavenc'
    ];

    protected $casts = [
        'vehiculo_id' => 'integer',
        'nocomprobante' => 'string',
        'fechaemision' => 'date:d-m-Y',
        'fechavenc' => 'date:d-m-Y'
    ];

    public static $rules = [
        'vehiculo_id' => 'required',
        'nocomprobante' => 'required|max:11',
        'fechaemision' => 'required',
        'fechavenc' => 'required'
    ];

    /**
     * Get the vehiculo that owns the Ctrlicenciaoperativa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }

    
}
