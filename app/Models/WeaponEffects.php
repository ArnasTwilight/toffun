<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeaponEffects extends Model
{
    use HasFactory;

    protected $table = 'weapon_effects';
    protected $guarded = false;

    public function character()
    {
        return $this->belongsTo(Character::class, 'id', 'character_id');
    }
}
