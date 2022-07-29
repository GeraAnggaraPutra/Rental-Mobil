<?php

namespace App\Http\Controllers;
use App\Models\Mobil;
use Illuminate\Http\Request;

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
            'stock' => 'required',
            'harga' => 'required',
        ]);

        $mobil = new Mobil();
        $mobil->merk = $request->merk;
        $mobil->nama_mobil = $request->nama_mobil;
        $mobil->stock = $request->stock;
        $mobil->harga = $request->harga;
        $mobil->save();
        return redirect()->route('mobil.index')
            ->with('success', 'Data berhasil dibuat!');
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
            'stock' => 'required',
            'harga' => 'required',
        ]);

        $mobil = Mobil::findOrFail($id);
        $mobil->merk = $request->merk;
        $mobil->nama_mobil = $request->nama_mobil;
        $mobil->stock = $request->stock;
        $mobil->harga = $request->harga;
        $mobil->save();
        return redirect()->route('mobil.index')
            ->with('success', 'Data berhasil diedit!');
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
        $mobil->delete();
        return redirect()->route('mobil.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
