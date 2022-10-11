<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    use HasFactory;

    protected $table = 'weapon';
    protected $guarded = false;

    public function element()
    {
        return $this->belongsTo(Rarity::class, 'element_id', 'id');
    }

    public function rarity()
    {
        return $this->belongsTo(Rarity::class, 'rarity_id', 'id');
    }
}
