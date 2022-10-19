<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $table = 'ingredients';
    protected $guarded = false;

    public function rarity()
    {
        return $this->belongsTo(Rarity::class, 'rarity_id', 'id');
    }

    public function food()
    {
        return $this->belongsToMany(Food::class, 'food_ingredients', 'ingredient_id','food_id');
    }
}
