<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoatProfile extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }

    public function goat()
    {
        return $this->belongsTo(Goat::class);
    }

    public function ewe()
    {
        return $this->belongsTo(Goat::class,'ewe_id');
    }

    public function ram()
    {
        return $this->belongsTo(Goat::class,'ram_id');
    }
}
