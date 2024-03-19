<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class NasabahController extends Controller
{
    public function index(){
        $nasabahs = Nasabah::all();
        return view('index', compact('nasabahs'));
    }

    public function create(){
        if(Auth::user()->role === 'guest'){
            return redirect('/');
        }
        return view('create');
    }

    public function store(Request $request){

        // return $request;

        // cek validasi
        $request->validate([
            'nama' => 'required|min:3',
            'saldo' => 'required|numeric',
        ]);

        Nasabah::create([
            'nama' => $request->nama,
            'saldo' => $request->saldo,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('nasabah.index')->with(['success' => 'Data berhasil disimpan !']);

    }

    public function edit($id){
        // return $id;
        $nasabah = Nasabah::find($id);
        return view('edit', compact('nasabah'));
    }

    public function update(Request $request, $id){
        // return $request.$id;

        $request->validate([
            'nama' => 'required|min:3',
            'saldo' => 'required|numeric',
        ]);

        $nasabah = Nasabah::find($id);
        $nasabah->update([
            'nama' => $request->nama,
            'saldo' => $request->saldo,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('nasabah.index')->with(['success' => 'Data '. $nasabah->nama .' berhasil di update']);
    }

    public function hapus($id){
        // return $id;
        $nasabah = Nasabah::find($id);
        // return $nasabah;
        $nasabah->delete();

        return redirect()->route('nasabah.index')->with(['success' => 'Data '. $nasabah->nama .' berhasil di hapus']);
    }

    public function cari(Request $request){
        $cari = $request->input('cari');
        $hasil = Nasabah::whereAny(['nama', 'keterangan'], 'like', "%$cari%")->get();
        // return $hasil;
        return view('index', ['nasabahs' => $hasil]);
    }

}
