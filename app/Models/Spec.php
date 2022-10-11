<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    use HasFactory;

    protected $table = 'spec';
    protected $guarded = false;

    public function characters()
    {
        return $this->hasMany(Character::class, 'spec_id', 'id');
    }
}
