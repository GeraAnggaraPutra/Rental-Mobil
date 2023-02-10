<?php

namespace App\Imports;

use App\Models\Supir;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SupirImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Supir([
            'nama' => $row['nama'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'no_telp' => $row['no_telp'],
            'status' => $row['status'],
            'alamat' => $row['alamat']
        ]);
    }
}
