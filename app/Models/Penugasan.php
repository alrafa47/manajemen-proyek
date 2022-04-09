<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penugasan extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function file()
    {
        return $this->hasMany(file::class);
    }
    public function tugas()
    {
        return $this->belongsTo(tugas::class);
    }
    public function pegawai()
    {
        return $this->belongsTo(pegawai::class);
    }
}
