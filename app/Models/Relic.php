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
        return $this->belongsTo(Star::class, 'stars_id', 'id');
    }
}
