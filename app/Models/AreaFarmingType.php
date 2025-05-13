<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaFarmingType extends Model
{
    use HasFactory;

    protected $table = 'area_farming_types';
    protected $fillable = [
        'title',
        'slug',
        'status',
    ];

    protected $casts = [
        'title' => 'string',
        'slug' => 'string',
        'status' => 'string',
    ];
}
