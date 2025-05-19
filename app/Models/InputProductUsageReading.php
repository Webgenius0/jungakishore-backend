<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputProductUsageReading extends Model
{
    /** @use HasFactory<\Database\Factories\InputProductUsageReadingFactory> */
    use HasFactory;
    protected $fillable = [
        'input_product_usage_id',
        'product_id',
        'quantity',
        'unit',
    ];

    protected $casts = [
        'input_product_usage_id' => 'integer',
        'product_id' => 'integer',
        'quantity' => 'decimal:2',
        'unit' => 'string',
    ];

    public function inputProductUsage()
    {
        return $this->belongsTo(InputProductUsage::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
