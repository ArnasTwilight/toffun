<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relic extends Model
{
    use HasFactory;

    protected $table = 'relics';
    protected $guarded = false;

    public function rarity()
    {
        return $this->belongsTo(Rarity::class, 'rarity_id', 'id');
    }

    public function stars()
    {
        return $this->belongsToMany(Star::class, 'relics_stars', 'relics_id', 'stars_id');
    }
}
