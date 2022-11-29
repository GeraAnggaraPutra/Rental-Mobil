<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mobil;

class MobilController extends Controller
{
    public function allMobil()
    {
        $mobils = Mobil::all();
        $response = [
            'success' => true,
            'message' => 'berhasil',
            'data' => $mobils,
            'status' => 200,
        ];
        return response()->json($response);
    }

    public function singleMobil($id)
    {
        $mobils = Mobil::find($id);
        if ($mobils) {
            $response = [
                'success' => true,
                'message' => 'data berhasil ditemukan',
                'data' => $mobils,
                'status' => 200,
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'data tidak ditemukan',
                'status' => 404,
            ];
        }
        return response()->json($response);
    }
}
