<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    public $fillable = ['id_transaksi','bukti_transfer', 'metode_pembayaran', 'status']; 

    public $timestamps = true;

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }

    public function image(){
        if($this->bukti_transfer && file_exists(public_path('images/bukti-transfer/'. $this->bukti_transfer))){
            return asset('images/bukti-transfer/'. $this->bukti_transfer);
        }else{
            return asset('images/no_image.jpg');
        }
    }
    
    public function deleteImage(){
        if($this->bukti_transfer && file_exists(public_path('images/bukti-transfer/'.$this->bukti_transfer))){
            return unlink(public_path('images/bukti-transfer/'. $this->bukti_transfer));
        }
    }
}
