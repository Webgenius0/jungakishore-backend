<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaMeasurement extends Model
{
    use HasFactory;

    protected $table = 'area_measurements';
    protected $fillable = [
        'title',
        'slug',
        'short_name',
        'value',
        'status',
    ];

    protected $casts = [
        'title' => 'string',
        'slug' => 'string',
        'short_name' => 'string',
        'value' => 'decimal:2',
        'status' => 'string',
    ];
}
