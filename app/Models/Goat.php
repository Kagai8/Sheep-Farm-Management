<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Goat extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }

    public function BreedingEvents()
    {
        return $this->hasMany(BreedingEvent::class);
    }
    
}
