<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipoequipo extends Model
{
    public $table = 'tipoequipos';

    public $fillable = [
        'tipo',
        'descripcion'
    ];

    protected $casts = [
        'tipo' => 'string',
        'descripcion' => 'string'
    ];

    public static $rules = [
        'tipo' => 'required'
    ];

    /**
     * Get all of the vehiculos for the Tipoequipo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehiculos(): HasMany
    {
        return $this->hasMany(Vehiculo::class,'tipoequipo_id', 'id');
    }
    
}
