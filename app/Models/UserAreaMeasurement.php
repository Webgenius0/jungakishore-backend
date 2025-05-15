<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAreaMeasurement extends Model
{
    use HasFactory;
    protected $table = 'user_area_measurements';

    protected $fillable = [
        'user_id',
        'area_measurement_id',
        'status',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'area_measurement_id' => 'integer',
        'status' => 'string',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function areaMeasurement()
    {
        return $this->belongsTo(AreaMeasurement::class);
    }
}
