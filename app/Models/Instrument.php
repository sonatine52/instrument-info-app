<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    use HasFactory;

    public function accessories() {
        return $this->hasMany(Accessory::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
