<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    public function provinsi(){
        return $this->hasMany(kabupaten::class);
    }
    public function kabupaten(){
        return $this->hasMany(kabupaten::class);
    }
    public function desa()
    {
        return $this->hasMany(desa::class);
    }
}
