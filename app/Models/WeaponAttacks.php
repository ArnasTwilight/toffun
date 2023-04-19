<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeaponAttacks extends Model
{
    use HasFactory;

    protected $table = 'weapon_attacks';
    protected $guarded = false;
}
