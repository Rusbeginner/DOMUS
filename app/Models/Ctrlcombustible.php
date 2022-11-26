<?php

namespace App\Models;

use App\Models\Vehiculo;
use App\Models\Combustible;
use Illuminate\Database\Eloquent\Model;

class Ctrlcombustible extends Model
{
    public $table = 'ctrlcombustibles';

    public $fillable = [
        'vehiculo_id',
        'combustible_id',
        'plan',
        'real',
        'fechaini',
        'fechafin'
    ];

    protected $casts = [
        'vehiculo_id' => 'integer',
        'combustible_id' => 'integer',
        'plan' => 'double',
        'real' => 'double',
        'fechaini' => 'date:d-m-Y',
        'fechafin' => 'date:d-m-Y'
    ];

    public static $rules = [
        'vehiculo_id' => 'required',
        'combustible_id' => 'required',
        'plan' => 'required',
        'fechaini' => 'required',
        'fechafin' => 'required'
    ];

    /**
     * Get the vehiculo that owns the Ctrlcombustible
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }

    /**
     * Get the combustible that owns the Ctrlcombustible
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function combustible()
    {
        return $this->belongsTo(Combustible::class, 'combustible_id');
    }
    
}
