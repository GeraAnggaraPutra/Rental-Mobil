<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    use HasFactory;

    public $fillable = ['id_user','nama', 'nik','jenis_kelamin', 'no_telp', 'email','alamat'];
    public $timestamps = true;

    public function user()
    {

        return $this->belongsTo(User::class, 'id_user');
    }
}
