<?php

namespace App\Models;

use App\Models\Aslubricante;
use Illuminate\Database\Eloquent\Model;

class Lubricante extends Model
{
    public $table = 'lubricantes';

    public $fillable = [
        'nombre',
        'descripcion',
        'tipolubricante_id'
    ];

    protected $casts = [
        'nombre' => 'string',
        'descripcion' => 'string',
        'tipolubricante_id' => 'integer'
    ];

    public static $rules = [
        'nombre' => 'required'
    ];


    /**
     * Get the tipolubricante that owns the Lubricante
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipolubricante()
    {
        return $this->belongsTo(Tipolubricante::class,'tipolubricante_id');
    }

    /**
     * Get all of the aslubricantes for the Lubricante
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function aslubricantes(): HasMany
    {
        return $this->hasMany(Aslubricante::class, 'lubricante_id', 'id');
    }
    
}
