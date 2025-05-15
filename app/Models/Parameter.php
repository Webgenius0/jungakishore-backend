<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Parameter extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'short_name',
        'unit',
        'short_code',
    ];

    protected $casts = [
        'type'        => 'string',
        'name'        => 'string',
        'short_name'  => 'string',
        'unit'        => 'string',
        'short_code'  => 'string',
    ];

    protected function shortName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtoupper($value),
            set: fn ($value) => strtoupper($value),
        );
    }

    protected function shortCode(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtoupper($value),
            set: fn ($value) => strtoupper($value),
        );
    }
}
