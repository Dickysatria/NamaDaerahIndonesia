<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;
    public function provinsi(){
        return $this->hasMany(provinsi::class);
    }
    public function kecamatan(){
        return $this->hasMany(kecamatan::class);
    }
    public function desa()
    {
        return $this->hasMany(desa::class);
    }
}
