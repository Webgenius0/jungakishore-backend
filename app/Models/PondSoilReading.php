<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PondSoilReading extends Model
{
    /** @use HasFactory<\Database\Factories\PondSoilReadingFactory> */
    use HasFactory;
    protected $fillable = ['pond_soil_id', 'parameter_id', 'value'];

    public function pondSoil()
    {
        return $this->belongsTo(PondSoil::class);
    }

    public function parameter()
    {
        return $this->belongsTo(Parameter::class);
    }
}
