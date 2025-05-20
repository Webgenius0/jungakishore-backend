<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiomassStock extends Model
{
    /** @use HasFactory<\Database\Factories\BiomassStockFactory> */
    use HasFactory;
    protected $fillable = [
        'biomass_observation_id',
        'doc',
        'comment',
        'images',
        'created_by',
        'status',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function biomassObservation()
    {
        return $this->belongsTo(BiomassObservation::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function fishReadings()
    {
        return $this->hasMany(FishReading::class, 'related_id')->where('type', 'stock');
    }
}
