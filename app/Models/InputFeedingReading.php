<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputFeedingReading extends Model
{
    /** @use HasFactory<\Database\Factories\InputFeedingReadingFactory> */
    use HasFactory;
    protected $fillable = [
        'input_feeding_id',
        'parameter_id',
        'value',
    ];

    protected $casts = [
        'input_feeding_id' => 'integer',
        'parameter_id' => 'integer',
        'value' => 'decimal:2',
    ];

    public function inputFeeding()
    {
        return $this->belongsTo(InputFeeding::class);
    }

    public function parameter()
    {
        return $this->belongsTo(Parameter::class);
    }
}
