<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatrixBonus extends Model
{
    use HasFactory;

    protected $table = 'matrix_bonus';
    protected $guarded = false;

    public function matrix()
    {
        return $this->belongsTo(Matrix::class,'matrix_id','id');
    }
}
