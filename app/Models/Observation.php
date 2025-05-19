<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    /** @use HasFactory<\Database\Factories\ObservationFactory> */
    use HasFactory;

    protected $fillable = [
        'pond_id',
        'unique_id',
        'observed_by_id',
        'status',
    ];

    protected $casts = [
        'pond_id' => 'integer',
        'unique_id' => 'string',
        'observed_by_id' => 'string',
        'status' => 'string',
    ];

    public function pond()
    {
        return $this->belongsTo(Pond::class);
    }
}
