<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputRemarksAndRx extends Model
{
    /** @use HasFactory<\Database\Factories\InputRemarksAndRxFactory> */
    use HasFactory;

    protected $fillable = ['input_observation_id', 'bill_amount', 'comment', 'images', 'created_by', 'status'];

    protected $casts = [
        'bill_amount' => 'integer',
        'images' => 'array',
        'created_by' => 'integer',
        'input_observation_id' => 'integer',
        'comment' => 'string',
        'status' => 'string',
    ];

    public function inputObservation()
    {
        return $this->belongsTo(InputObservation::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function inputProductUsageParameterReadings()
    {
        return $this->hasMany(InputProductUsageReading::class);
    }
}
