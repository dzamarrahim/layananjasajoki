<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Layanan;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Charts\TransaksiBulananChart;

class WelcomeController extends Controller
{
    public function welcome(TransaksiBulananChart $chart)
    {
        $pelanggan = Pelanggan::count();
        $layanan = Layanan::count();
        $user = User::count();
        $datatransaksi = Transaksi::count();
        $notransaksi = Transaksi::count();

        $tanggal_awal = date('Y-m-01');
        $tanggal_akhir = date('Y-m-d');

        $data_tanggal = array();
        $data_pendapatan = array();

        $tahun = date('Y');
        $bulan = date('m');

        while (strtotime($tanggal_awal) <= strtotime($tanggal_akhir)) {
            $data_tanggal[] = (int) substr($tanggal_awal, 8, 2);

            $total_transaksi = Transaksi::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('total');

            $pendapatan = $total_transaksi;
            $data_pendapatan[] += $pendapatan;

            $tanggal_awal = date('Y-m-d', strtotime("+1 day", strtotime($tanggal_awal)));

            // Menampilkan Pendapatan Total
            $transaksi = Transaksi::All();
            $totalpenjualan = Transaksi::sum('total');

            // Menampilkan Pendapatan Hari Ini
            $penjualanday = Transaksi::whereDate('created_at', now()->format('y-m-d'))->sum('total');

            // Menampilkan Pendapatan Bulan Ini
            $penjualanmonth = Transaksi::whereYear('created_at', $tahun)->whereMonth('created_at', $bulan)->sum('total');

            $penjualanyear = Transaksi::whereYear('created_at', $tahun)->sum('total'); 
        }
        
        return view('welcome',[
            "pelanggan"=>$pelanggan,
            "layanan"=> $layanan,
            "user"=>$user,
            "totalpenjualan"=>$totalpenjualan,
            "penjualanday"=>$penjualanday,  
            "penjualanmonth"=>$penjualanmonth,  
            "penjualanyear"=>$penjualanyear,  
            "notransaksi"=>$notransaksi,  
            "chart" => $chart->build(),
            "datatransaksi" => Transaksi::latest()->take(5)->get(),
            "title"=>"Dashboard"
        ]);
        
    }

    
}

