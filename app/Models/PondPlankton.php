<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PondPlankton extends Model
{
    /** @use HasFactory<\Database\Factories\PondPlanktonFactory> */
    use HasFactory;
    protected $table = 'pond_planktons';
    protected $fillable = [
        'pond_observation_id',
        'comment',
        'images',
        'created_by',
        'status',
    ];
    protected $casts = [
        'pond_observation_id' => 'integer',
        'comment' => 'string',
        'images' => 'array',
        'created_by' => 'integer',
        'status' => 'string',
    ];
    public function pondObservation()
    {
        return $this->belongsTo(PondObservation::class, 'pond_observation_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
