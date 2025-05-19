<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PondPlanktonReading extends Model
{
    /** @use HasFactory<\Database\Factories\PondPlanktonReadingFactory> */
    use HasFactory;

    protected $fillable = ['pond_plankton_id', 'plankton_subcategory_id', 'value'];

    public function pondPlankton()
    {
        return $this->belongsTo(PondPlankton::class);
    }

    // public function subcategory()
    // {
    //     return $this->belongsTo(PlanktonSubcategory::class, 'plankton_subcategory_id');
    // }
}
