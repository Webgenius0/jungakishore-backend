<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanktonCategory extends Model
{
    /** @use HasFactory<\Database\Factories\PlanktonCategoryFactory> */
    use HasFactory;
    protected $fillable = ['enterprise_id','name', 'slug', 'type', 'status'];

    protected $casts = [
        'type' => 'string',
        'status' => 'string',
    ];

    public function subcategories()
    {
        return $this->hasMany(PlanktonSubcategory::class);
    }
}
