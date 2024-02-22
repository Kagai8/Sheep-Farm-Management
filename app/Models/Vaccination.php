<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function disease()
    {
        return $this->belongsTo(Disease::class);
    }

    public function goat()
    {
        return $this->belongsTo(Goat::class);
    }
}
