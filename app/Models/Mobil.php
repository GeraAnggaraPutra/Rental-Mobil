<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    public $fillable = ['merk', 'nama_mobil', 'foto','stock', 'harga'];
    public $timestamps = true;

    public function transaksi(){
        
        return $this->hasMany(Transaksi::class, 'id_mobil');
    }

    public function laporan(){
        
        return $this->hasMany(Laporan::class, 'id_mobil');
    }

    // method menampilkan image(foto)
    public function image(){
        if($this->foto && file_exists(public_path('images/mobil/'. $this->foto))){
            return asset('images/mobil/'. $this->foto);
        }else{
            return asset('images/no_image.jpg');
        }
    }
    // menghapus image(foto) di storage(penyimpanan) public
    public function deleteImage(){
        if($this->foto && file_exists(public_path('images/mobil/'.$this->foto))){
            return unlink(public_path('images/mobil/'. $this->foto));
        }
    }
}
