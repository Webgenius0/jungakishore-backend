<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputRemarksAndRx extends Model
{
    /** @use HasFactory<\Database\Factories\InputRemarksAndRxFactory> */
    use HasFactory;

    protected $fillable = ['input_observation_id', 'product_id', 'type', 'comment', 'images', 'created_by', 'status'];

    protected $casts = [
        'images' => 'array',
        'created_by' => 'integer',
        'input_observation_id' => 'integer',
        'product_id' => 'integer',
        'type' => 'string',
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
}
