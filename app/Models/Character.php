<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $table = 'character';
    protected $guarded = false;

    public function spec()
    {
        return $this->belongsTo(Spec::class, 'spec_id', 'id');
    }

    public function rarity()
    {
        return $this->belongsTo(Rarity::class, 'rarity_id', 'id');
    }

    public function weapon()
    {
        return $this->belongsTo(Weapon::class, 'weapon_id', 'id');
    }

    public function matrix()
    {
        return $this->belongsTo(Matrix::class, 'matrix_id', 'id');
    }

    public function stars()
    {
        return $this->belongsTo(Star::class, 'stars_id', 'id');
    }

    public function gift()
    {
        return $this->belongsToMany(Gift::class, 'character_gifts', 'character_id', 'gift_id');
    }

//    public function effects($characterId)
//    {
//        return WeaponEffects::query()->where('character_id', $characterId)->get();
//    }

}
