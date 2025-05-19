<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['enter_prise_id', 'title', 'slug', 'created_by', 'status'];
    protected $casts = [
        'enter_prise_id' => 'integer',
        'title' => 'string',
        'slug' => 'string',
        'created_by' => 'integer',
        'status' => 'string',
    ];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class, 'enter_prise_id');
    }
}
