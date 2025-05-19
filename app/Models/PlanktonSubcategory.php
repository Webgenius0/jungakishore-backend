<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanktonSubcategory extends Model
{
    /** @use HasFactory<\Database\Factories\PlanktonSubcategoryFactory> */
    use HasFactory;
    protected $fillable = [
        'enterprise_id',
        'plankton_category_id',
        'name',
        'slug',
        'short_name',
        'created_by',
        'status'
    ];

    protected $casts = [
        'enterprise_id' => 'integer',
        'plankton_category_id' => 'integer',
        'name' => 'string',
        'slug' => 'string',
        'short_name' => 'string',
        'created_by' => 'integer',
        'status' => 'string',
    ];

    public function category()
    {
        return $this->belongsTo(PlanktonCategory::class, 'plankton_category_id');
    }
}
