<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    public $fillable = ['id_transaksi', 'id_mobil', 'id_user'];
    public $timestamps = true;

    public function customer(){
        
        return $this->belongsTo(Customer::class, 'id_user');
    }

    public function transaksi(){
        
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }

    public function mobil(){
        
        return $this->belongsTo(Mobil::class, 'id_mobil');
    }
}
