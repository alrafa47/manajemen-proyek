<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penugasan extends Model
{
    use HasFactory;
    public function files()
    {
        return $this->hasMany(files::class);
    }
    public function tugas()
    {
        return $this->belongsTo(tugas::class);
    }
}