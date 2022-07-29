<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public $fillable = ['username', 'email', 'password', 'no_telp'];
    public $timestamps = true;
    public function pembayaran(){
        
        return $this->hasMany(Pembayaran::class, 'id_user');
    }

    public function laporan(){
        
        return $this->hasMany(Laporan::class, 'id_user');
    }
}
