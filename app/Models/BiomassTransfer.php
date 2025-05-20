<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiomassTransfer extends Model
{
    /** @use HasFactory<\Database\Factories\BiomassTransferFactory> */
    use HasFactory;
    protected $fillable = [
        'biomass_observation_id',
        'from_pond_id',
        'to_pond_id',
        'comment',
        'images',
        'created_by',
        'status',
    ];

    protected $casts = [
        'biomass_observation_id' => 'integer',
        'from_pond_id' => 'integer',
        'to_pond_id' => 'integer',
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
    public function fishReadings()
    {
        return $this->hasMany(FishReading::class, 'related_id')->where('type', 'transfer');
    }

}
