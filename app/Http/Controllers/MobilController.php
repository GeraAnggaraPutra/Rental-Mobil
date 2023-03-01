<?php

namespace App\Http\Controllers;

use App\Exports\MobilExport;
use App\Models\Mobil;
use App\Models\Merk;
use Excel;
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
        $merk = Merk::All();
        return view('mobil.create', compact('merk'));
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
            'id_merk' => 'required',
            'nama_mobil' => 'required',
            'foto' => 'required|image|max:2048',
            'status' => 'required',
            'harga' => 'required',
            'tahun' => 'required',
            'warna' => 'required',
            'no_polisi' => 'required',
        ]);

        $mobil = new Mobil();
        $mobil->id_merk = $request->id_merk;
        $mobil->nama_mobil = $request->nama_mobil;
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/mobil/', $name);
            $mobil->foto = $name;
        }
        $mobil->status = $request->status;
        $mobil->harga = $request->harga;
        $mobil->tahun = $request->tahun;
        $mobil->warna = $request->warna;
        $mobil->no_polisi = $request->no_polisi;
        $mobil->save();
        toast('Data berhasil dibuat', 'success');
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
        $merks = Merk::All();
        return view('mobil.edit', compact('mobil', 'merks'));
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
            'id_merk' => 'required',
            'nama_mobil' => 'required',
            // 'foto' => 'required|image|max:2048',
            'status' => 'required',
            'harga' => 'required',
            'tahun' => 'required',
            'warna' => 'required',
            'no_polisi' => 'required',
        ]);

        if ($request->hasFile('foto')) {
            $validated = $request->validate([
                'foto' => 'required|image|max:2048',
            ]);
        }
        $mobil = Mobil::findOrFail($id);
        $mobil->id_merk = $request->id_merk;
        $mobil->nama_mobil = $request->nama_mobil;
        if ($request->hasFile('foto')) {
            $mobil->deleteImage(); // menghapus foto sebelum di update
            $image = $request->file('foto');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/mobil/', $name);
        }
        $mobil->foto = $request->hasFile('foto') ? $name : $mobil->foto;
        $mobil->status = $request->status;
        $mobil->harga = $request->harga;
        $mobil->tahun = $request->tahun;
        $mobil->warna = $request->warna;
        $mobil->no_polisi = $request->no_polisi;
        $mobil->save();
        toast('Data berhasil diedit', 'success');
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
        toast('Data berhasil dihapus', 'success');
        return redirect()->route('mobil.index');
    }

    // export
    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        ob_end_clean();
        ob_start();
        return Excel::download(new MobilExport, 'mobil.xlsx');
    }
}
