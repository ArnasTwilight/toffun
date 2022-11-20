<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterGift extends Model
{
    use HasFactory;

    protected $table = 'character_gifts';
    protected $guarded = false;
}
