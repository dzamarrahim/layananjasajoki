<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\View\View;
use App\Models\DetilTransaksi;

class CetakController extends Controller
{
    //
    public function receipt():View {
        $id=session()->get('id');

        $transaksi=Transaksi::find($id);
        // dd ($transaksi)
        $detiltransaksi=DetilTransaksi::where('transaksi_id',$id)->get();
        return view('penjualan.receipt')->with([
            "dataTransaksi" => $transaksi,
            "dataDetilTransaksi" => $detiltransaksi
        ]);

    }
}
