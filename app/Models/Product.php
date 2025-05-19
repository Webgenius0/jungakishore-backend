<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'enter_prise_id',
        'category_id',
        'sub_category_id',
        'name',
        'slug',
        'short_name',
        'price_per_unit',
        'unit_parameter', // e.g., 'kg', 'litre', 'g'
        'created_by',
        'status',
    ];

    protected $casts = [
        'enter_prise_id' => 'integer',
        'category_id' => 'integer',
        'sub_category_id' => 'integer',
        'price_per_unit' => 'float',
        'unit_parameter' => 'string',
        'created_by' => 'integer',
        'status' => 'string',
    ];
}
