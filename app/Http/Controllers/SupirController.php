<?php

namespace App\Http\Controllers;
use App\Models\Supir;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class SupirController extends Controller
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
        $supir = Supir::all();
        return view('supir.index', compact('supir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supir.create');
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
            'status' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required'
        ]);

        $supir = new Supir();
        $supir->nama = $request->nama;
        $supir->status = $request->status;
        $supir->no_telp = $request->no_telp;
        $supir->alamat = $request->alamat;
        $supir->save();
        Alert::success('Done', 'Data berhasil dibuat');
        return redirect()->route('supir.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supir = Supir::findOrFail($id);
        return view('supir.show', compact('supir'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supir = Supir::findOrFail($id);
        return view('supir.edit', compact('supir'));
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
            'status' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);

        $supir = Supir::findOrFail($id);
        $supir->nama = $request->nama;
        $supir->status = $request->status;
        $supir->no_telp = $request->no_telp;
        $supir->alamat = $request->alamat;
        $supir->save();
        Alert::success('Done', 'Data berhasil diedit');
        return redirect()->route('supir.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supir = Supir::findOrFail($id);
        $supir->delete();
        Alert::success('Done', 'Data berhasil dihapus')->autoClose(2000);
        return redirect()->route('supir.index');
    }
}
