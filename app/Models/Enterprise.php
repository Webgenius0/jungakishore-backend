<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'created_by',
        'status',
    ];

    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'created_by' => 'integer',
        'status' => 'string',
    ];
    // Relationships (Optional)
    public function ponds()
    {
        return $this->hasMany(Pond::class, 'enter_prise_id');
    }
    public function users()
    {
        return $this->hasMany(User::class, 'created_by');
    }
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
