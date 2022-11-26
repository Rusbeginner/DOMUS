<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipolubricante extends Model
{
    public $table = 'tipolubricantes';

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
     * Get all of the lubricantes for the Tipolubricante
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lubricantes()
    {
        return $this->hasMany(Lubricante::class);
    }

    
}
