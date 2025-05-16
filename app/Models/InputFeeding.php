<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputFeeding extends Model
{
    /** @use HasFactory<\Database\Factories\InputFeedingFactory> */
    use HasFactory;
    protected $casts = [
        'no_of_feed_bags' => 'integer',
        'dob' => 'decimal:2',
        'gnc' => 'decimal:2',
        'moc' => 'decimal:2',
        'pallet' => 'decimal:2',
        'images' => 'array',
        'comment' => 'string',
        'created_by' => 'integer',
        'status' => 'string',
    ];

    public function inputObservation()
    {
        return $this->belongsTo(InputObservation::class);
    }
}
