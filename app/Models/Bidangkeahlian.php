<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidangkeahlian extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tugas()
    {
        return $this->hasMany(tugas::class);
    }
}
