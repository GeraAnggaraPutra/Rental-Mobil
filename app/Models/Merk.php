<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory;

    public $fillable = ['merk'];
    public $timestamps = true;

    public function mobil(){
        return $this->hasMany(Mobil::class, 'id_merk');
    }
}
