<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    public function bidangkeahlian()
    {
        return $this->belongsTo(bidangkeahlian::class);
    }
    public function proyeks()
    {
        return $this->belongsTo(proyeks::class);
    }
    public function penugasan()
    {
        return $this->hasMany(penugasan::class);
    }
}
