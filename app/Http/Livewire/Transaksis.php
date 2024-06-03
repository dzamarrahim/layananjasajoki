<?php

namespace App\Http\Livewire;

namespace App\Http\Livewire;

use App\Models\Transaksi;
use App\Models\DetilTransaksi;
use App\Models\Layanan;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class Transaksis extends Component
{
    public $total;
    public $transaksi_id;
    public $layanan_id;
    public $qty = 1;
    public $uang;
    public $kembali;

    public function render()
    {
        $transaksi = Transaksi::where('user_id', Auth::id())->orderBy('id', 'desc')->first();
        
        if ($transaksi) {
            $this->total = $transaksi->total;
            $this->kembali = $this->uang - $this->total;
        }

        $datalayanan = Layanan::all();
        $dataTransaksiDetail = $transaksi ? DetilTransaksi::where('transaksi_id', $transaksi->id)->get() : collect();

        return view('livewire.transaksis', [
            'data' => $transaksi,
            'datalayanan' => $datalayanan,
            'dataTransaksiDetail' => $dataTransaksiDetail
        ]);
    }

    public function store()
    {
        $this->validate([
            'layanan_id' => 'required'
        ]);

        $transaksi = Transaksi::where('user_id', Auth::id())->orderBy('id', 'desc')->first();
        if (!$transaksi) {
            return;
        }

        $this->transaksi_id = $transaksi->id;

        $layanan = Layanan::find($this->layanan_id);
        if (!$layanan) {
            return;
        }

        $harga = $layanan->harga;
        if (is_null($harga)) {
            return;
        }

        DetilTransaksi::create([
            'transaksi_id' => $this->transaksi_id,
            'layanan_id' => $this->layanan_id,
            'qty' => $this->qty,
            'harga' => $harga
        ]);

        $total = $transaksi->total + ($harga * $this->qty);
        $transaksi->update(['total' => $total]);

        $this->layanan_id = null;
        $this->qty = 1;
    }

    public function delete($detiltransaksi_id)
    {
        $detiltransaksi = DetilTransaksi::find($detiltransaksi_id);
        if (!$detiltransaksi) {
            return;
        }

        $detiltransaksi->delete();

        // Update total
        $detiltransaksi = DetilTransaksi::where('transaksi_id', $this->transaksi_id)->get();
        $total = 0;
        foreach ($detiltransaksi as $od) {
            $total += $od->qty * $od->harga;
        }

        try {
            Transaksi::where('id', $this->transaksi_id)->update([
                'total' => $total
            ]);
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function receipt($id)
    {
        return Redirect::route('cetakReceipt')->with(['id' => $id]);
    }
}
