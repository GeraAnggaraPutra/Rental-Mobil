<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    public $fillable = ['id_pembayaran', 'id_mobil', 'tgl_pesan', 'total_bayar'];

    public $timestamps = true;

    public function pembayaran(){
        
        return $this->belongsTo(Pembayaran::class, 'id_pembayaran');
    }

    public function mobil(){
        
        return $this->belonsTo(Mobil::class, 'id_mobil');
    }

    public function laporan(){
        
        return $this->hasOne(Laporan::class, 'id_transaksi');
    }
}
