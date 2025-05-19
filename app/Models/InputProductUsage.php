<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputProductUsage extends Model
{
    /** @use HasFactory<\Database\Factories\InputProductUsageFactory> */
    use HasFactory;
    protected $fillable = [
        'input_observation_id','comment', 'images', 'created_by', 'status'
    ];

    protected $casts = [
        'input_observation_id' => 'integer',
        'comment' => 'string',
        'images' => 'array',
        'created_by' => 'integer',
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
