<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['category_id', 'title', 'slug', 'created_by', 'status'];
    protected $casts = [
        'category_id' => 'integer',
        'title' => 'string',
        'slug' => 'string',
        'created_by' => 'integer',
        'status' => 'string',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
