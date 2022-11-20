<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;

    protected $table = 'gift';
    protected $guarded = false;

    public function character()
    {
        return $this->belongsToMany(Character::class, 'character_gifts', 'gift_id', 'character_id');
    }

    public function rarity()
    {
        return $this->belongsTo(Rarity::class, 'rarity_id', 'id');
    }
}
