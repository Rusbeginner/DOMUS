<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarjetamagnetica extends Model
{
    public $table = 'tarjetamagneticas';

    public $fillable = [
        'notarjeta',
        'fechavenc',
        'combustible_id'
    ];

    protected $casts = [
        'fechavenc' => 'date:d-m-Y',
        'combustible_id' => 'integer'
    ];

    public static $rules = [
        'notarjeta' => 'required',
        'fechavenc' => 'required',
        'combustible_id' => 'required'
    ];

    public function combustible()
    {
        return $this->belongsTo(Combustible::class, 'combustible_id');
    }
    
}
