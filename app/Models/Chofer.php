<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    public $table = 'chofers';

    public $fillable = [
        'nombre',
        'apellidos',
        'dirparticular',
        'ci'
    ];

    protected $casts = [
        'nombre' => 'string',
        'apellidos' => 'string',
        'dirparticular' => 'string',
        'ci' => 'string'
    ];

    public static $rules = [
        'nombre' => 'required',
        'apellidos' => 'required',
        'ci' => 'required|min:11|max:11'
    ];

    /**
     * Get the vehiculo associated with the Chofer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vehiculo()
    {
        return $this->hasOne(Vehiculo::class, 'chofer_id', 'id');
    }

    /**
     * Get the licenciaconduc associated with the Chofer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function licenciaconduc()
    {
        return $this->hasOne(Ctrlicenciaconduc::class, 'chofer_id', 'id');
    }
    
}
