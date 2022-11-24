<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supir extends Model
{
    use HasFactory;

    public $fillable = ['nama', 'jenis_kelamin', 'no_telp', 'status','alamat'];
    public $timestamps = true;
}
