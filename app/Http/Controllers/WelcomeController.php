<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Layanan;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $pelanggan = Pelanggan::count();
        $layanan = Layanan::count();
        $user = User::count();
        $datatransaksi = Transaksi::count();

        $tanggal_awal = date('Y-m-01');
        $tanggal_akhir = date('Y-m-d');

        $data_tanggal = array();
        $data_pendapatan = array();

        while (strtotime($tanggal_awal) <= strtotime($tanggal_akhir)) {
            $data_tanggal[] = (int) substr($tanggal_awal, 8, 2);

            $total_transaksi = Transaksi::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('total');

            $pendapatan = $total_transaksi;
            $data_pendapatan[] += $pendapatan;

            $tanggal_awal = date('Y-m-d', strtotime("+1 day", strtotime($tanggal_awal)));
        }

        return view('welcome',[
            "pelanggan"=>$pelanggan,
            "layanan"=> $layanan,
            "user"=>$user,
            "datatransaksi" => Transaksi::paginate(5),
            "title"=>"Dashboard"
        ]);
        
    }

    
}

