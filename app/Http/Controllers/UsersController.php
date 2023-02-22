<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DetailUser;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::All();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
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

        $user = User::findOrFail($id);

        if($user->detailUser == null){
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'role' => 'required',
            ]);
            if($request->password){
                $validated = $request->validate([
                    'password' => 'min:8',
                ]);
            }
        }else{
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'role' => 'required',
                'nama' => 'required',
                'nik' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required',
                'email' => 'required',
            ]);
            if($request->password){
                $validated = $request->validate([
                    'password' => 'min:8',
                ]);
            }
        }

        $detail = DetailUser::where('id_user', $id)->first();
        $detail->nama = $request->nama;
        $detail->nik = $request->nik;
        $detail->jenis_kelamin = $request->jenis_kelamin;
        $detail->alamat = $request->alamat;
        $detail->no_telp = $request->no_telp;
        $detail->email = $request->email;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        if ($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        $detail->save();
        toast('Data berhasil diedit','success');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        toast('Data berhasil dihapus','success');
        return back();
    }
}
