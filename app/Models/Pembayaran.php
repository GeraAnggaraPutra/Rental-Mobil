<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    public $fillable = ['total_bayar', 'id_user'];
    public $timestamps = true;

    public function customer(){
        
        return $this->belongsTo(Customer::class, 'id_user');
    }
    public function transaksi(){
        
        return $this->hasOne(Transaksi::class, 'id_pembayaran');
    }
}
