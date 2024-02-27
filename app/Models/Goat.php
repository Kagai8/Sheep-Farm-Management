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
    
    public function goatProfile()
    {
        return $this->hasOne(GoatProfile::class);
    }

    public function Vaccinations()
    {
        return $this->hasMany(Vaccination::class);
    }

    public function HealthRecords()
    {
        return $this->hasMany(HealthRecord::class);
    }

    public function breedingEventsAsRam()
    {
        return $this->hasMany(BreedingEvent::class, 'ram_id');
    }

    // Relationship with breeding events where the goat is the ewe
    public function breedingEventsAsEwe()
    {
        return $this->hasMany(BreedingEvent::class, 'ewe_id');
    }

    public function costs()
    {
        return $this->hasMany(Cost::class);
    }

    public function sale()
    {
        return $this->hasOne(Sale::class);
    }
}
