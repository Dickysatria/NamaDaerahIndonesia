<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    public function kabupaten(){
        return $this->hasMany(kabupaten::class);
    }
    public function kecamatan(){
        return $this->hasMany(kecamatan::class);
    }
    public function desa()
    {
        return $this->hasMany(desa::class);
    }
}
