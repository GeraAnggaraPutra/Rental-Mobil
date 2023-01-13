<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    public $fillable = ['id_mobil', 'tgl_sewa','tgl_kembali', 'lama_sewa','supir','total_bayar','status']; //

    public $timestamps = true;


    public function mobil(){

        return $this->belongsTo(Mobil::class, 'id_mobil');
    }

    public function user(){

        return $this->belongsTo(User::class, 'id_user');
    }

}
