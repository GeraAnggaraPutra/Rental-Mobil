<?php

namespace App\Models;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    public $fillable = ['id_mobil', 'tgl_sewa', 'tgl_kembali', 'lama_sewa', 'supir', 'total_bayar', 'status', 'invoice_no']; //

    public $timestamps = true;

    use AutoNumberTrait;

    /**
         * Return the autonumber configuration array for this model.
         *
         * @return array
         */public function getAutoNumberOptions()
    {
        return [
            'invoice_no' => [
                'format' => function () {
                    return date('Y.m.d') . '/RC/?';
                },
                'length' => 4,
            ],
        ];
    }

    public function mobil()
    {

        return $this->belongsTo(Mobil::class, 'id_mobil');
    }

    public function user()
    {

        return $this->belongsTo(User::class, 'id_user');
    }

    public function pembayaran()
    {

        return $this->hasOne(Pembayaran::class, 'id_transaksi');
    }

}
