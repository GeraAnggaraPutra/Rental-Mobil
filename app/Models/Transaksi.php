<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    public $fillable = ['id_mobil','id_user', 'tgl_sewa','tgl_kembali', 'lama_sewa','supir','total_bayar'
    ,'name', 'nik', 'jenis_kelamin', 'alamat','no_telp','email','status']; //

    public $timestamps = true;

   
    public function mobil(){
        
        return $this->belongsTo(Mobil::class, 'id_mobil');
    }

    public function user(){
        
        return $this->belongsTo(User::class, 'id_user');
    }

}
