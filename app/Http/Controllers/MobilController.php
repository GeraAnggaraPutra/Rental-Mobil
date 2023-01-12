<?php

namespace App\Http\Controllers;
use App\Models\Mobil;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class MobilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobil = Mobil::all();
        return view('mobil.index', compact('mobil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mobil.create');
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
            'merk' => 'required',
            'nama_mobil' => 'required',
            'foto' => 'required|image|max:2048',
            'stock' => 'required',
            'harga' => 'required',
            'tahun' => 'required',
            'warna' => 'required',
            'no_polisi' => 'required',
        ]);

        $mobil = new Mobil();
        $mobil->merk = $request->merk;
        $mobil->nama_mobil = $request->nama_mobil;
        if($request->hasFile('foto')){
            $image = $request->file('foto');
            $name = rand(1000,9999).$image->getClientOriginalName();
            $image->move('images/mobil/', $name);
            $mobil->foto = $name;
        }
        $mobil->stock = $request->stock;
        $mobil->harga = $request->harga;
        $mobil->tahun = $request->tahun;
        $mobil->warna = $request->warna;
        $mobil->no_polisi = $request->no_polisi;
        $mobil->save();
        Alert::success('Done', 'Data berhasil dibuat');
        return redirect()->route('mobil.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mobil = Mobil::findOrFail($id);
        return view('mobil.show', compact('mobil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobil = Mobil::findOrFail($id);
        return view('mobil.edit', compact('mobil'));
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
            'merk' => 'required',
            'nama_mobil' => 'required',
            'foto' => 'required|image|max:2048',
            'stock' => 'required',
            'harga' => 'required',
            'tahun' => 'required',
            'warna' => 'required',
            'no_polisi' => 'required',
        ]);

        $mobil = Mobil::findOrFail($id);
        $mobil->merk = $request->merk;
        $mobil->nama_mobil = $request->nama_mobil;
        if($request->hasFile('foto')){
            $mobil->deleteImage(); // menghapus foto sebelum di update
            $image = $request->file('foto');
            $name = rand(1000,9999).$image->getClientOriginalName();
            $image->move('images/mobil/', $name);
            $mobil->foto = $name;
        }
        $mobil->stock = $request->stock;
        $mobil->harga = $request->harga;
        $mobil->tahun = $request->tahun;
        $mobil->warna = $request->warna;
        $mobil->no_polisi = $request->no_polisi;
        $mobil->save();
        Alert::success('Done', 'Data berhasil diedit');
        return redirect()->route('mobil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mobil = Mobil::findOrFail($id);
        $mobil->deleteImage();
        $mobil->delete();
        Alert::success('Done', 'Data berhasil dihapus')->autoClose(2000);
        return redirect()->route('mobil.index');
    }
}
