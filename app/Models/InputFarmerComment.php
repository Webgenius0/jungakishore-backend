<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputFarmerComment extends Model
{
    /** @use HasFactory<\Database\Factories\InputFarmerCommentFactory> */
    use HasFactory;

    protected $fillable = [
        'input_observation_id', 'pond_positive', 'pond_negative', 'comment',
        'images', 'created_by', 'status'
    ];

    protected $casts = [
        'images' => 'array',
        'created_by' => 'integer',
        'status' => 'string',
    ];

    public function inputObservation()
    {
        return $this->belongsTo(InputObservation::class);
    }
}
