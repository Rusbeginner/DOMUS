<?php

namespace App\Models;

use App\Models\Vehiculo;
use App\Models\Lubricante;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;



class Aslubricante extends Model
{
    public $table = 'aslubricantes';

    public $fillable = [
        'vehiculo_id',
        'lubricante_id',
        'asignacion',
        'fechaini',
        'fechafin'
    ];

    protected $casts = [
        'vehiculo_id' => 'integer',
        'lubricante_id' => 'integer',
        'asignacion' => 'double',
        'fechaini' => 'date:d-m-Y',
        'fechafin' => 'date:d-m-Y'
    ];

    public static $rules = [
        'vehiculo_id' => 'required',
        'lubricante_id' => 'required',
        'asignacion' => 'required',
        'fechaini' => 'required',
        'fechafin' => 'required'
    ];

    /**
     * Get the lubricante that owns the Aslubricante
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lubricante()
    {
        return $this->belongsTo(Lubricante::class, 'lubricante_id');
    }

    /**
     * Get the vehiculo that owns the Aslubricante
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }

    // public function getfechainiAttribute()
    // {
    //     $date = Carbon::parse($this->fechaini);
    //     return $date->format('d-m-Y');
    // }
    
}
