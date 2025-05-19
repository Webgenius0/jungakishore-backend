<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PondMicrobeReading extends Model
{
    /** @use HasFactory<\Database\Factories\PondMicrobeReadingFactory> */
    use HasFactory;
    protected $fillable = ['pond_microbe_id', 'parameter_id', 'value'];

    public function pondMicrobe()
    {
        return $this->belongsTo(PondMicrobe::class);
    }

    public function parameter()
    {
        return $this->belongsTo(Parameter::class);
    }
}
