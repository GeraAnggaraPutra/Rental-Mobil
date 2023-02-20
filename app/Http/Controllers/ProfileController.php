<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\DetailUser;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('frontend.profile.index',[
            'title' => 'Profile'
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        //validasi
        $validated = $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
        ]);

        $user = auth()->id();
        $detail = new DetailUser;
        $detail->nama = $request->nama;
        $detail->nik = $request->nik;
        $detail->jenis_kelamin = $request->jenis_kelamin;
        $detail->alamat = $request->alamat;
        $detail->no_telp = $request->no_telp;
        $detail->email = $request->email;
        $detail->id_user = $user;
        $detail->save();
        toast('Data berhasil dibuat','success');
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validasi
        $validated = $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
        ]);

        $user = auth()->id();
        $detail = DetailUser::where('id_user', $user)->first();
        $detail->nama = $request->nama;
        $detail->nik = $request->nik;
        $detail->jenis_kelamin = $request->jenis_kelamin;
        $detail->alamat = $request->alamat;
        $detail->no_telp = $request->no_telp;
        $detail->email = $request->email;
        $detail->save();
        toast('Data berhasil diedit','success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
