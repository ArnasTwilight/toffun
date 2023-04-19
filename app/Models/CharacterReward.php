<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterReward extends Model
{
    use HasFactory;

    protected $table = 'character_reward';
    protected $guarded = false;

    public function reward()
    {
        return $this->belongsTo(Character::class, 'character_id', 'id');
    }

}
