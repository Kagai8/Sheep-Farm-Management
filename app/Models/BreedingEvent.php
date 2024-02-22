<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreedingEvent extends Model
{
    use HasFactory;

     protected $guarded = [];

    public function goat()
    {
        return $this->belongsTo(Goat::class);
    }

     // Define relationships
    public function ram()
    {
        return $this->belongsTo(Goat::class, 'ram_id');
    }

    public function ewe()
    {
        return $this->belongsTo(Goat::class, 'ewe_id');
    }
}
