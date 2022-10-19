<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rarity extends Model
{
    use HasFactory;

    protected $table = 'rarity';
    protected $guarded = false;

    public function weapon()
    {
        return $this->hasMany(Weapon::class, 'rarity_id','id');
    }

    public function food()
    {
        return $this->hasMany(Food::class, 'rarity_id','id');
    }

    public function ingredient()
    {
        return $this->hasMany(Ingredient::class, 'rarity_id','id');
    }

    public function matrix()
    {
        return $this->hasMany(Matrix::class, 'rarity_id','id');
    }

    public function character()
    {
        return $this->hasMany(Character::class, 'rarity_id','id');
    }

}
