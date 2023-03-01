<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Mobil extends Model
{
    use HasFactory;
    use Sluggable;

    public $fillable = ['id_merk', 'nama_mobil', 'foto','status', 'harga','tahun','no_polisi','warna', 'slug'];
    public $timestamps = true;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_mobil'
            ]
        ];
    }

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'id_merk');
    }

    public function transaksi(){

        return $this->hasMany(Transaksi::class, 'id_mobil');
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
