<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiomassGrowth extends Model
{
    /** @use HasFactory<\Database\Factories\BiomassGrowthFactory> */
    use HasFactory;
    protected $fillable = [
        'biomass_observation_id',
        'comment',
        'images',
        'created_by',
        'status',
    ];

    protected $casts = [
        'biomass_observation_id' => 'integer',
        'comment' => 'string',
        'images' => 'array',
        'created_by' => 'integer',
        'status' => 'string',
    ];
    public function biomassObservation()
    {
        return $this->belongsTo(BiomassObservation::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
