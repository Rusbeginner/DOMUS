<?php

namespace App\Models;

use App\Models\Tipoequipo;
use App\Models\Aslubricante;
use App\Models\Ctrlcombustible;
use App\Models\Ctrlicenciacirc;
use App\Models\Ctrlicenciaoperativa;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    public $table = 'vehiculos';

    public $fillable = [
        'tipoequipo_id',
        'modelo',
        'chapa',
        'numotor',
        'numcarroceria',
        'ton',
        'fechafabric',
        'importe',
        'numediobasico',
        'chofer_id'
    ];

    protected $casts = [
        'tipoequipo_id' => 'integer',
        'modelo' => 'string',
        'chapa' => 'string',
        'numotor' => 'integer',
        'numcarroceria' => 'integer',
        'ton' => 'integer',
        'fechafabric' => 'date:d-m-Y',
        'importe' => 'double',
        'numediobasico' => 'string',
        'chofer_id' => 'integer'
    ];

    public static $rules = [
        'tipoequipo_id' => 'required',
        'chapa' => 'required',
        'numediobasico' => 'required',
        'chofer_id' => 'required'
    ];

    public function tipoequipo()
    {
        return $this->belongsTo(Tipoequipo::class, 'tipoequipo_id');
    }

    /**
     * Get the chofer that owns the Vehiculo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function chofer()
    {
        return $this->belongsTo(Chofer::class);
    }

    /**
     * Get all of the crtlicenciaoperativas for the Vehiculo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function crtlicenciaoperativas()
    {
        return $this->hasMany(Ctrlicenciaoperativa::class, 'vehiculo_id', 'id');
    }


    /**
     * Get all of the aslubricantes for the Vehiculo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function aslubricantes()
    {
        return $this->hasMany(Aslubricante::class);
    }

    /**
     * Get all of the ctrlcombustibles for the Vehiculo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ctrlcombustibles()
    {
        return $this->hasMany(Ctrlcombustible::class, 'vehiculo_id', 'id');
    }

    /**
     * Get all of the ctrlicenciacircs for the Vehiculo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ctrlicenciacircs()
    {
        return $this->hasMany(Ctrlicenciacirc::class, 'vehiculo_id', 'id');
    }
    
}
