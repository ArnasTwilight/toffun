<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'food';
    protected $guarded = false;

    public function rarity()
    {
        return $this->belongsTo(Rarity::class, 'rarity_id', 'id');
    }

    public function spec()
    {
        return $this->belongsTo(Spec::class, 'spec_id', 'id');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'food_ingredients','food_id','ingredient_id');
    }
}
