<?php

namespace App\Http\Controllers;

use App\Models\DetailUser;
use Auth;
use Illuminate\Http\Request;

class ProfileAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile_admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        toast('Data berhasil dibuat', 'success');
        return back();
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
    public function update(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);
        if ($request->password) {
            $validated = $request->validate([
                'password' => 'min:8',
            ]);
        }
        Auth::user()->name = $request->name;
        Auth::user()->email = $request->email;
        Auth::user()->role = $request->role;
        if ($request->password) {
            Auth::user()->password = Hash::make($request->password);
        }
        Auth::user()->save();

        toast('Data berhasil diedit', 'success');
        return back();
    }

    public function updateDetail(Request $request)
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

        $detail = DetailUser::where('id_user', Auth::user()->id)->first();
        $detail->nama = $request->nama;
        $detail->nik = $request->nik;
        $detail->jenis_kelamin = $request->jenis_kelamin;
        $detail->alamat = $request->alamat;
        $detail->no_telp = $request->no_telp;
        $detail->email = $request->email;
        $detail->save();;

        toast('Data berhasil diedit', 'success');
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
