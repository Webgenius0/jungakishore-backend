<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputRemarksAndRxReading extends Model
{
    /** @use HasFactory<\Database\Factories\InputRemarksAndRxReadingFactory> */
    use HasFactory;
    protected $fillable = [
        'input_remarks_and_rx_id',
        'product_id',
        'quantity',
        'unit',
        'applied_or_not',
        'type',
    ];

    protected $casts = [
        'input_remarks_and_rx_id' => 'integer',
        'product_id' => 'integer',
        'unit' => 'string',
        'type' => 'string',
        'quantity' => 'decimal:2',
        'applied_or_not' => 'boolean',
    ];

    public function inputRemarksAndRx()
    {
        return $this->belongsTo(InputRemarksAndRx::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
