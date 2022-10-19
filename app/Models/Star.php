<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    use HasFactory;

    protected $table = 'stars';
    protected $guarded = false;

    public function character ()
    {
        return $this->hasOne(Character::class, 'stars_id', 'id');
    }

    public function relic ()
    {
        return $this->hasOne(Relic::class, 'stars_id', 'id');
    }

}
