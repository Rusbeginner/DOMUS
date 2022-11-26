<?php

namespace App\Models;

use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Model;

class Ctrlicenciacirc extends Model
{
    public $table = 'ctrlicenciacircs';

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
        'nocomprobante' => 'required',
        'fechaemision' => 'required',
        'fechavenc' => 'required'
    ];

    
    /**
     * Get the vehiculo that owns the Ctrlicenciacirc
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }
}
