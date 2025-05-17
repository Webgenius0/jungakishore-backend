<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiomassObservation extends Model
{
    /** @use HasFactory<\Database\Factories\BiomassObservationFactory> */
    use HasFactory;
    protected $fillable = ['observation_id', 'created_by', 'status'];

    protected $casts = [
        'observation_id' => 'integer',
        'created_by' => 'integer',
        'status' => 'string',
    ];
}
