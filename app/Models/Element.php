<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;

    protected $table = 'element';
    protected $guarded = false;

    public function weapon()
    {
        return $this->hasMany(Weapon::class, 'element_id','id');
    }
}
