<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::count();
        if ($request->filled('q')) {
            $query = $query->where('id', 'LIKE', '%' . $request->q . '%');
        }
        if ($request->filled('tanggal_mulai')) {
            $query = $query->where('created_at', '>=', $request->tanggal_mulai);
        }
        if ($request->filled('tanggal_selesai')) {
            $query = $query->where('created_at', '<=', $request->tanggal_selesai);
        }

    
        $transaksi = Transaksi::All();
        $totalpenjualan = Transaksi::sum('total');
        $title = "Laporan Penjualan";
        
        if ($request->page == 'laporan') {
            return view('laporan.laporan', compact('transaksi', 'totalpenjualan', 'title'));
        }

        return view('laporan.laporan', compact('transaksi', 'totalpenjualan', 'title'));
    }
}
