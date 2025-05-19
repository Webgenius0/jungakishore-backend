<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PondWaterReading extends Model
{
    /** @use HasFactory<\Database\Factories\PondWaterReadingFactory> */
    use HasFactory;
    protected $fillable = ['pond_water_id', 'parameter_id', 'value'];

    public function pondWater()
    {
        return $this->belongsTo(PondWater::class);
    }

    public function parameter()
    {
        return $this->belongsTo(Parameter::class);
    }
}
