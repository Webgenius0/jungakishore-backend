<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pond extends Model
{
    use HasFactory;

    protected $fillable = [
        'enter_prise_id',
        'name',
        'slug',
        'size',
        'images',
        'location',
        'latitude',
        'longitude',
        'created_by',
        'status',
    ];

    protected $casts = [
        'images' => 'array',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

    // Relationships (Optional)
    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class, 'enter_prise_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
