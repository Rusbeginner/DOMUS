<?php

namespace App\Models;

use App\Models\Ctrlcombustible;
use Illuminate\Database\Eloquent\Model;

class Combustible extends Model
{
    public $table = 'combustibles';

    public $fillable = [
        'nombre',
        'descripcion'
    ];

    protected $casts = [
        'nombre' => 'string',
        'descripcion' => 'string'
    ];

    public static $rules = [
        'nombre' => 'required'
    ];

    public function Tarjetamagneticas()
    {
        return $this->hasMany(Tarjetamagnetica::class);
    }

    /**
     * Get all of the ctrlcombustibles for the Combustible
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ctrlcombustibles(): HasMany
    {
        return $this->hasMany(Ctrlcombustible::class, 'combustible_id', 'id');
    }
    
}
