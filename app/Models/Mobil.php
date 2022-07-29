<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    public $fillable = ['merk', 'nama_mobil', 'stock', 'harga'];
    public $timestamps = true;

    public function transaksi(){
        
        return $this->hasMany(Transaksi::class, 'id_mobil');
    }

    public function laporan(){
        
        return $this->hasMany(Laporan::class, 'id_mobil');
    }
}
