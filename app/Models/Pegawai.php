<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    public function jabatan()
    {
        return $this->belongsTo(jabatan::class);
    }

    public function proyek()
    {
        return $this->hasMany(proyek::class);
    }

}
