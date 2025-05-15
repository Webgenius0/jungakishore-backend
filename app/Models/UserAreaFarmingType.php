<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAreaFarmingType extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'area_farming_type_id',
        'status',
    ];

    protected $casts = [
        'user_id'               => 'integer',
        'area_farming_type_id'  => 'integer',
        'status'                => 'string',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function areaFarmingType()
    {
        return $this->belongsTo(AreaFarmingType::class);
    }
}
