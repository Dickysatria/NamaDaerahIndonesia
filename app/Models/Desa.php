<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;
    public function provinsi(){
        return $this->hasMany(kabupaten::class);
    }
    public function kecamatan(){
        return $this->hasMany(kecamatan::class);
    }
    public function kabupaten()
    {
        return $this->hasMany(kabupaten::class);
    }
}
