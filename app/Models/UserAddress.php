<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;
    
    protected $table = 'user_addresses';
    protected $fillable = [
        'user_id',
        'address',
        'latitude',
        'longitude',
        'status',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'address' => 'string',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
        'status' => 'string',
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
