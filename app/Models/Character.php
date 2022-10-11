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

}
