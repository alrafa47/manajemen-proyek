<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function bidangkeahlian()
    {
        return $this->belongsTo(bidangkeahlian::class);
    }
    public function proyek()
    {
        return $this->belongsTo(Proyek::class);
    }
    public function penugasan()
    {
        return $this->hasMany(penugasan::class);
    }
    public function pegawai()
    {
        return $this->belongsTo(pegawai::class);
    }
}
