<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class LayananController extends Controller
{
    //
    public function index() {
        return view('layanan.index', [
            "title" => "Layanan",
            "data" => Layanan::all()
        ]);
    }

    public function create():View {
        return view('layanan.create')->with([
            "title" => "Tambah Data Layanan",
            "data" => Layanan::all()
        ]);
    }

    public function store(Request $request):RedirectResponse {
        $request->validate([
            "nama" => "required",
            "harga" => "required",
            "description" => "nullable"
        ]);

        Layanan::create($request->all());
        return redirect()->route('layanan.index')->with('success','Data Layanan Berhasil Ditambahkan');
    }

    public function edit(Layanan $layanan):View {
        return view('layanan.edit',compact('layanan'))->with([
            "title" => "Ubah Data Layanan",
            "data" => Layanan::all()
        ]);
    }

    public function update(Layanan $layanan, Request $request):RedirectResponse {
        $request->validate([
            "nama" => "required",
            "harga" => "required",
            "description" => "nullable"
        ]);

       $layanan->update($request->all());
       return redirect()->route('layanan.index')->with('updated','Data Layanan Berhasil Diubah');
    }

    public function show(Layanan $layanan):View {
        return view('layanan.show',compact('layanan'))->with(["title" => "Data Layanan"]);
    }

    public function destroy($id):RedirectResponse {
        Layanan::where('id',$id)->delete();
        return redirect()->route('layanan.index')->with('deleted','Data Layanan Berhasil Dihapus');
    }
}
