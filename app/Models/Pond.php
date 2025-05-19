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
        'enter_prise_id' => 'integer',
        'name' => 'string',
        'slug' => 'string',
        'size' => 'integer',
        'images' => 'array',
        'location' => 'string',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
        'created_by' => 'integer',
        'status' => 'string',
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
