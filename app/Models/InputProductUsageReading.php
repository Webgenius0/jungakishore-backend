<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputProductUsageReading extends Model
{
    /** @use HasFactory<\Database\Factories\InputProductUsageReadingFactory> */
    use HasFactory;

    protected $fillable = [
        'input_remarks_and_rx_id',
        'product_id',
        'quantity',
        'unit',
        'applied_or_not',
        'type',
        'time',
    ];

    protected $casts = [
        'quantity' => 'decimal:2',
        'applied_or_not' => 'boolean',
    ];

    public function inputRemarksAndRxs()
    {
        return $this->belongsTo(InputRemarksAndRx::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
