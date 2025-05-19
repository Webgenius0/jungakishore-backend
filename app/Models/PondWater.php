<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PondWater extends Model
{
    /** @use HasFactory<\Database\Factories\PondWaterFactory> */
    use HasFactory;

    protected $fillable = [
        'pond_observation_id',
        'comment',
        'images',
        'created_by',
        'status',
    ];
    protected $casts = [
        'pond_observation_id' => 'integer',
        'comment' => 'string',
        'images' => 'array',
        'created_by' => 'integer',
        'status' => 'string',
    ];
    public function observation()
    {
        return $this->belongsTo(PondObservation::class, 'pond_observation_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
