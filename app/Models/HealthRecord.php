<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthRecord extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function goat()
    {
        return $this->belongsTo(Goat::class);
    }
}
