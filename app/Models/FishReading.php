<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishReading extends Model
{
    /** @use HasFactory<\Database\Factories\FishReadingFactory> */
    use HasFactory;
    protected $fillable = [
        'type',
        'related_id',
        'parameter_id',
        'quantity',
        'average_weight_g',
        'total_weight_kg',
    ];

    protected $casts = [
        'quantity' => 'integer',
        'average_weight_g' => 'decimal:2',
        'total_weight_kg' => 'decimal:2',
    ];

    // Example dynamic relation
    public function relatedModel()
    {
        return match ($this->type) {
            'stock' => $this->belongsTo(BiomassStock::class, 'related_id'),
            'growth' => $this->belongsTo(BiomassGrowth::class, 'related_id'),
            'harvest' => $this->belongsTo(BiomassHarvest::class, 'related_id'),
            'transfer' => $this->belongsTo(BiomassTransfer::class, 'related_id'),
            'mortality' => $this->belongsTo(BiomassMortality::class, 'related_id'),
            default => null,
        };
    }

    public function parameter()
    {
        return $this->belongsTo(Parameter::class);
    }
}
